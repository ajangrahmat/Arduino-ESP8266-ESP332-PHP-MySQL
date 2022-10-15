int trig = 13;
int echo = 12;
long durasi, jarak;

#include <WiFi.h>
#include <HTTPClient.h>
const char* ssid = "isi nama wifi";
const char* password = "isi password wifi";
String server = "http://000.111.000.111/belajarmysql";
String url;

unsigned const long jeda = 5000;
unsigned long zero = 0;

void setup() {
  pinMode(trig, OUTPUT);
  pinMode(echo, INPUT);
  Serial.begin(115200);

  Serial.print("Connecting to WiFi");
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.print("OK! IP=");
  Serial.println(WiFi.localIP());

}

void loop() {
  digitalWrite(trig, LOW);
  delayMicroseconds(8);
  digitalWrite(trig, HIGH);
  delayMicroseconds(8);
  digitalWrite(trig, LOW);
  delayMicroseconds(8);

  durasi = pulseIn(echo, HIGH);
  jarak = (durasi / 2) / 29.1;
  
  if (jarak > 0) {
    Serial.println(jarak);

    if (millis() - zero >= jeda) {

      HTTPClient http;
      url = server + "/input.php?jarak=" + String(jarak);
      Serial.println(url);
      http.begin(url);
      http.addHeader("Content-Type","application/x-www-form-urlencoded");
      int httpResponseCode = http.POST("jarak=" + String(jarak));
      if (httpResponseCode > 0) {
        Serial.print("HTTP ");
        Serial.println(httpResponseCode);
        String payload = http.getString();
        Serial.println();
        Serial.println(payload);
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
        Serial.println(":-(");
      }

      zero = millis();
    }
    
  }

}
