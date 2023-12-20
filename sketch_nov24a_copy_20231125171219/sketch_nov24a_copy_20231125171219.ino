#include <Servo.h>
#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>

const char *ssid = "Nyek2";
const char *password = "1c691ae6a05cGalo@@";

ESP8266WebServer server(80);
Servo myServo;

const int buttonPin = D2;  // I-assign ang pin na ginamit para sa button
int buttonState = 0;
int lastButtonState = HIGH;  // I-set ang huling button state sa HIGH para sa unang iteration
bool servoRotated = false;

void setup() {
    Serial.begin(115200);

    // Connect to Wi-Fi
    WiFi.begin(ssid, password);
    while (WiFi.status() != WL_CONNECTED) {
        delay(1000);
        Serial.println("Connecting to WiFi...");
    }

    // Print the assigned IP address
    Serial.println("Connected! IP address: " + WiFi.localIP().toString());

    // Define server endpoints
    server.on("/clear_all_endpoint", HTTP_GET, handleClearAll);

    // Start server
    server.begin();

    // Initialize servo
    myServo.attach(D1);  // Gamitin ang tamang GPIO pin para sa iyong servo
    pinMode(buttonPin, INPUT_PULLUP);  // Gamitin ang internal pull-up resistor
}

void loop() {
    server.handleClient();

    // Check for button press
    buttonState = digitalRead(buttonPin);

    if (buttonState == LOW && lastButtonState == HIGH && !servoRotated) {
        // Execute rotation only if button is pressed, and it wasn't pressed before
        rotateServo();
        servoRotated = true;  // I-set ang flag para hindi ito ma-rotate ulit
    }

    lastButtonState = buttonState;
}

void handleClearAll() {
    // Perform actions to clear all items
    rotateServo();

    // Send response to client
    server.send(200, "text/plain", "Clear All request received");
}

void rotateServo() {
    // Code to rotate servo 180 degrees
    myServo.write(180);
    delay(1000);  // I-adjust ang delay kung kinakailangan
    myServo.write(0);

    // I-reset ang flag para ma-rotate ulit sa susunod na pag-press ng button
    servoRotated = false;
}