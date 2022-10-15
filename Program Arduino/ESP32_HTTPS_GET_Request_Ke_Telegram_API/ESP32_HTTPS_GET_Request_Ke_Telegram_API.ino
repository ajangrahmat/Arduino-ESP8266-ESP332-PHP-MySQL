#include <WiFi.h>
#include <HTTPClient.h>
const char* ssid = "isi nama wifi";
const char* password = "isi password wifi";
String url = "https://api.telegram.org/bot00000:XXXXXXXXXXXX/sendMessage";
String chat_id = "0000000";

#include<ArduinoJson.h>

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);

  Serial.print("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.print("OK! IP=");
  Serial.println(WiFi.localIP());
  Serial.print("Fetching " + url + "... ");

  HTTPClient http;
  url = url + "?chat_id=" + chat_id + "&text=Halo+Selamat+Datang+guys";
  http.begin(url);
  int httpResponseCode = http.GET();
  if (httpResponseCode > 0) {
    Serial.print("HTTP ");
    Serial.println(httpResponseCode);
    String payload = http.getString();
    Serial.println();
    Serial.println(payload);

    // Stream& input;
    StaticJsonDocument<512> doc;
    DeserializationError error = deserializeJson(doc, payload);
    if (error) {
      Serial.print("deserializeJson() failed: ");
      Serial.println(error.c_str());
      return;
    }
    bool ok = doc["ok"]; // true
    JsonObject result = doc["result"];
    int result_message_id = result["message_id"]; // 5
    JsonObject result_from = result["from"];
    long long result_from_id = result_from["id"]; // 5540928792
    bool result_from_is_bot = result_from["is_bot"]; // true
    const char* result_from_first_name = result_from["first_name"]; // "ArduMeka"
    const char* result_from_username = result_from["username"]; // "ArduMekaBot"
    
    JsonObject result_chat = result["chat"];
    long result_chat_id = result_chat["id"]; // 262249300
    const char* result_chat_first_name = result_chat["first_name"]; // "Ajang"
    const char* result_chat_last_name = result_chat["last_name"]; // "Rahmat"
    const char* result_chat_username = result_chat["username"]; // "ajangrahmat"
    const char* result_chat_type = result_chat["type"]; // "private"
    long result_date = result["date"]; // 1665754033
    const char* result_text = result["text"]; // "Halo Selamat Datang guys"

    Serial.println("Isi Pesan: " + String(result_text));


  }
  else {
    Serial.print("Error code: ");
    Serial.println(httpResponseCode);
    Serial.println(":-(");
  }

}

void loop() {
  delay(100);
}
