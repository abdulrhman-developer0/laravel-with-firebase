import "./bootstrap";
import { requestPermission, onMessageListener } from "./fcm";

// Request FCM token on button click
document.getElementById("getTokenBtn").addEventListener("click", () => {
    requestPermission();
});

// Display incoming notification data on the page
onMessageListener((payload) => {
    console.log("Notification received:", payload);
    const notificationElement = document.getElementById("notificationData");
    notificationElement.innerHTML = `
        <strong>Title:</strong> ${payload.notification.title} <br>
        <strong>Body:</strong> ${payload.notification.body}
    `;

    console.log("new notification");
});

// Register the Firebase service worker
if ("serviceWorker" in navigator) {
    navigator.serviceWorker
        .register("/firebase-messaging-sw.js")
        .then((registration) => {
            console.log("Service Worker registered:", registration);
        })
        .catch((error) => {
            console.error("Service Worker registration failed:", error);
        });
}
