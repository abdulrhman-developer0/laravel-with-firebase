import { initializeApp } from "firebase/app";
import { getMessaging, getToken, onMessage } from "firebase/messaging";

const firebaseConfig = {
    apiKey: "AIzaSyCWwXDseeFFKwBKl1kXiMCjRRa8JY8-av4",
    authDomain: "test-project-82bcc.firebaseapp.com",
    projectId: "test-project-82bcc",
    storageBucket: "test-project-82bcc.firebasestorage.app",
    messagingSenderId: "978339669942",
    appId: "1:978339669942:web:fc3d5ddfec6cb369d6c317",
    measurementId: "G-1BWEWD008X",
};

const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);

export const requestPermission = async () => {
    try {
        const token = await getToken(messaging, {
            vapidKey: firebaseConfig.vapidKey,
        });
        if (token) {
            console.log("FCM Token:", token);
            document.getElementById("fcmToken").textContent = token;
        } else {
            console.log("No FCM token received.");
        }
    } catch (error) {
        console.error("Error getting FCM token:", error);
    }
};

export const onMessageListener = (listener) => {
    onMessage(messaging, (payload) => {
        console.log("Message received:", payload);
        listener(payload);
    });
};
