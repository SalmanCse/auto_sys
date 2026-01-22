#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <ArduinoJson.h>

int lightPort1 = 16;
int fanPort2 = 5;
int acPort3 = 4;
int motorPort4 = 0;

ESP8266WiFiMulti WiFiMulti;

void setup() {
  Serial.begin(115200);

  pinMode(lightPort1, OUTPUT);
  pinMode(fanPort2, OUTPUT);
  pinMode(acPort3, OUTPUT);
  pinMode(motorPort4, OUTPUT);
  digitalWrite(lightPort1, LOW);
  digitalWrite(fanPort2, LOW);
  digitalWrite(acPort3, LOW);
  digitalWrite(motorPort4, LOW);

  for (uint8_t t = 4; t > 0; t--) {
    Serial.printf("[SETUP] WAIT %d...\n", t);
    Serial.flush();
    delay(1000);
  }

  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("Training_Center", "ditc2019");
}

void loop() {

  // wait for WiFi connection
  if ((WiFiMulti.run() == WL_CONNECTED)) {

    sendDataToServer();
  }
  delay(2000);
}

void sendDataToServer() {
  // Check WiFi Status
  if (WiFi.status() == WL_CONNECTED) {
    Serial.println("connected");
    HTTPClient http;  //Object of class HTTPClient
    String url = "http://192.168.101.57:80/auto_sys/src/api/industrial_device_api.php?id=33";
    http.begin(url);
    int httpCode = http.GET();
    String response = http.getString();
//    Serial.println(response);
    //Check the returning code


    if (httpCode > 0) {
      // Parsing
      const size_t bufferSize = JSON_OBJECT_SIZE(2) + JSON_OBJECT_SIZE(3) + JSON_OBJECT_SIZE(5) + JSON_OBJECT_SIZE(8) + 370;
      DynamicJsonDocument doc(bufferSize);
      DeserializationError error = deserializeJson(doc, response);

      if (error) {
        Serial.print("deserializeJson() faild with code");
        Serial.println(error.c_str());
        return;
      }
      JsonArray arr = doc.as<JsonArray>();
      for (JsonObject ob : arr) {
        const char* port_no = ob["port_no"];
        const char* portStatus = ob["status"];
        if (String(port_no) == "1" && String(portStatus) == "0") {
          digitalWrite(lightPort1, LOW);
          Serial.println("Light Off");
        } else if (String(port_no) == "1" && String(portStatus) == "1") {
          digitalWrite(lightPort1, HIGH);
          Serial.println("Light On");
        }else if (String(port_no) == "2" && String(portStatus) == "0") {
          digitalWrite(fanPort2, LOW);
          Serial.println("Fan Off");
        } else if (String(port_no) == "2" && String(portStatus) == "1") {
          digitalWrite(fanPort2, HIGH);
          Serial.println("Fan On");
        }else if (String(port_no) == "3" && String(portStatus) == "0") {
          digitalWrite(acPort3, LOW);
          Serial.println("AC Off");
        } else if (String(port_no) == "3" && String(portStatus) == "1") {
          digitalWrite(acPort3, HIGH);
          Serial.println("AC On");
        }else if (String(port_no) == "4" && String(portStatus) == "0") {
          digitalWrite(motorPort4, LOW);
          Serial.println("Motor Off");
        } else if (String(port_no) == "4" && String(portStatus) == "1") {
          digitalWrite(motorPort4, HIGH);
          Serial.println("Motor On");
        }
      }

    }
    http.end();   //Close connection
  }
}
