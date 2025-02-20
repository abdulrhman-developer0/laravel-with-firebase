// Import Firebase scripts
importScripts(
    "https://www.gstatic.com/firebasejs/10.7.1/firebase-app-compat.js"
);
importScripts(
    "https://www.gstatic.com/firebasejs/10.7.1/firebase-messaging-compat.js"
);

// Your Firebase configuration object (use public keys only)
const firebaseConfig = {
    apiKey: "AIzaSyCWwXDseeFFKwBKl1kXiMCjRRa8JY8-av4",
    authDomain: "test-project-82bcc.firebaseapp.com",
    projectId: "test-project-82bcc",
    storageBucket: "test-project-82bcc.firebasestorage.app",
    messagingSenderId: "978339669942",
    appId: "1:978339669942:web:fc3d5ddfec6cb369d6c317",
    measurementId: "G-1BWEWD008X",
};

// Initialize Firebase in the service worker
firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

// Handle background messages
messaging.onBackgroundMessage((payload) => {
    console.log("Received background message: ", payload);
    const { title, body } = payload.notification;
    const notificationOptions = {
        body: body,
        icon: "/firebase-logo.png", // Update with your icon if needed
    };

    self.registration.showNotification(title, notificationOptions);
});
