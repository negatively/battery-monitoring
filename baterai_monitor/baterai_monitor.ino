#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
 
const char* ssid = "Nama Wifi";
const char* password = "Password WiFi";

//IP Address Server yang terpasang XAMPP
const char *host = "192.168.43.59"; //Menyesuaikan dengan alamat
const int waktu = 30000; //30 detik
 
void setup_wifi() {
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(1000);
    Serial.println("Connecting...");
  }
 
  Serial.println("Connected successfully.");
}
 
void setup() {
  pinMode(2, OUTPUT);
  Serial.begin(115200);
  setup_wifi();
}

int value = 0;

void loop() {
  // Proses Pengiriman -----------------------------------------------------------
  delay(waktu);
  ++value;
 
  // Membaca Sensor Analog -------------------------------------------------------
  int datasensor1=analogRead(A0);
  int datasensor2=analogRead(A0);
  int datasensor3=analogRead(A0);
  int datasensor4=analogRead(A0);
  int datasensor5=analogRead(A0);
  int datasensor6=analogRead(A0);
  Serial.print(datasensor1); Serial.print(" | ");
  Serial.print(datasensor2); Serial.print(" | ");
  Serial.print(datasensor3); Serial.print(" | ");
  Serial.print(datasensor4); Serial.print(" | ");
  Serial.print(datasensor5); Serial.print(" | ");
  Serial.print(datasensor6); Serial.println(" | ");
  Serial.print("connecting to ");
  Serial.println(host);
 
  // Mengirimkan ke alamat host dengan port 80 -----------------------------------
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
 
  // Isi Konten yang dikirim adalah alamat ip si esp -----------------------------
  String url = "/web-testiot/write-data.php?data1=";
  url += datasensor1;
  url += "&data2=";
  url += datasensor2;
  url += "&data3=";
  url += datasensor3;
  url += "&data4=";
  url += datasensor4;
  url += "&data5=";
  url += datasensor5;
  url += "&data6=";
  url += datasensor6;

 
  Serial.print("Requesting URL: ");
  Serial.println(url);
 
  // Mengirimkan Request ke Server -----------------------------------------------
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 1000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
 
  // Read all the lines of the reply from server and print them to Serial
  while (client.available()) {
    String line = client.readStringUntil('\r');
    Serial.print(line);
  }
 
  Serial.println();
  Serial.println("closing connection");
}
