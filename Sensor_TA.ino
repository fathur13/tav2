#ifdef ESP32
  #include <WiFi.h>
  #include <HTTPClient.h>
#else
  #include <ESP8266WiFi.h>
  #include <ESP8266HTTPClient.h>
  #include <WiFiClient.h>
  #include "DHT.h"
  #define DHTPIN D7
  #define DHTTYPE DHT11
  DHT dht(DHTPIN, DHTTYPE);
  #define SOUND_VELOCITY 0.034
  #define CM_TO_INCH 0.393701
  const int trigPin = 12;
  const int echoPin = 14;

  // Pin definitions
#define RAIN_PIN D2
#define ANALOG_PIN A0
  
#endif
const char* ssid     = "Fathur";
const char* password = "12345678";
//const char* ssid     = "a";
//const char* password = "12345678";
//const char* ssid     = "Depot2,4";
//const char* password = "kopisusu";

//const char* serverName = "http://192.168.1.17/arduino/index.php";
//const char* serverName = "http://192.168.137.1/tav2/api/sensorpost?key=c9e9f59fa51f2ab7dab3355f01c6f705a8d3a6c3bc5b7b8b5709d2b9ca3df3ff";
const char* serverName = "http://simba.codewrite.my.id/api/sensorpost?key=c9e9f59fa51f2ab7dab3355f01c6f705a8d3a6c3bc5b7b8b5709d2b9ca3df3ff";

//String apiKeyValue = "tPmAT5Ab3j7F9";
float suhu;
float kelembapan;
long duration;
float distanceCm;
float distanceInch;

String sensorName = "Pawan 1";
String sensorLocation = "-1.845277, 109.966761";

void setup() {
  Serial.begin(9600);
  dht.begin();
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
  pinMode(echoPin, INPUT); // Sets the echoPin as an Input
  pinMode(RAIN_PIN, INPUT);
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());


}

void loop() {
  if(WiFi.status()== WL_CONNECTED){
    WiFiClient client;
    HTTPClient http;
    float kelembapan = dht.readHumidity();
    float suhu = dht.readTemperature();
    digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  // Sets the trigPin on HIGH state for 10 micro seconds
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  
  // Reads the echoPin, returns the sound wave travel time in microseconds
  duration = pulseIn(echoPin, HIGH);
  
  // Calculate the distance
  distanceCm = duration * SOUND_VELOCITY/2;
  
  // Convert to inches
  distanceInch = distanceCm * CM_TO_INCH;
  
  // Prints the distance on the Serial Monitor
  Serial.print("Jarak (cm): ");
  Serial.println(distanceCm);
    
  int rainSensorValue = digitalRead(RAIN_PIN);
  int analogSensorValue = analogRead(ANALOG_PIN);
  Serial.print("Rain sensor value: ");
  Serial.println(rainSensorValue);
  Serial.print("Analog sensor value: ");
  Serial.println(analogSensorValue);
  if (analogSensorValue < 600) {
    Serial.println("It's raining!");
  } else {
    Serial.println("It's not raining.");
  }
    http.begin(client, serverName);
    
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    String rainStatus = (analogSensorValue < 600) ? "1" : "2";
     String httpRequestData = "sensor=" + sensorName
                             + "&location=" + sensorLocation + "&value1=" + suhu
                             + "&value2=" + kelembapan + "&value3=" + distanceCm +"&value4=" + rainStatus;
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);
    
    int httpResponseCode = http.POST(httpRequestData);
             
    if (httpResponseCode>0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
  delay(1000);  
}
