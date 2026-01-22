#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <ArduinoJson.h>
#include "DHT.h"
#define DHTPIN 5
#define DHTTYPE DHT22
DHT dht(DHTPIN, DHTTYPE);

ESP8266WiFiMulti WiFiMulti;

void setup() {

  dht.begin();
  Serial.begin(115200);
  Serial.println();
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
    //read DTH data
    float h = dht.readHumidity();
    float t = dht.readTemperature();
    // check if returns are valid, if they are NaN (not a number) then something went wrong!
    if (isnan(t) || isnan(h)) {
      Serial.println("Failed to read from DHT");
    }
    else {
      Serial.print("Humidity: ");
      Serial.print(h);
      Serial.print(" %\t");
      Serial.print("Temperature: ");
      Serial.print(t);
      Serial.println(" *C");
    }
    sendDataToServer(String(t), String(h));
  }
  delay(10000);
}

void sendDataToServer(String temp, String hum) {
  // Check WiFi Status
  if (WiFi.status() == WL_CONNECTED) {
    Serial.println("connected");
    HTTPClient http;  //Object of class HTTPClient
    //encode jeson
    StaticJsonDocument<300> scrDoc;
    //{"temp":28,"hum":85,"co":20,"gas":2,"device_id":"28"}
    scrDoc["temp"] = temp;
    scrDoc["hum"] = hum;
    scrDoc["gas"] = 0;
    scrDoc["co"] = 0;
    scrDoc["device_id"] = "34";

    char JSONMessageBuffer[300];
    serializeJson(scrDoc, JSONMessageBuffer);
    Serial.println(JSONMessageBuffer);

    String url = "http://192.168.101.57/auto_sys/src/api/environment_device_api.php";
    http.addHeader("Content-Type", "application/json");
    http.begin(url);

    int httpCode = http.POST(JSONMessageBuffer);
    String response = http.getString();

    Serial.println(response);
    //Check the returning code
    http.end();   //Close connection

  }
}
