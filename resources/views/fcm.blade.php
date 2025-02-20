<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCM Notifications</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col items-center justify-center h-screen bg-gray-100 p-4">
    <h1 class="text-2xl font-bold mb-4">Firebase Cloud Messaging</h1>

    <button id="getTokenBtn" class="px-4 py-2 bg-blue-600 text-white rounded-md">Get FCM Token</button>
    <div class="mt-4 p-2 border rounded bg-white shadow-md">
        <p class="font-semibold">Your FCM Token:</p>
        <textarea id="fcmToken" class="w-full p-2 border rounded text-sm bg-gray-100" readonly></textarea>
    </div>

    <h2 class="text-xl font-bold mt-6">Received Notification:</h2>
    <div id="notificationData" class="mt-2 p-4 border rounded bg-white shadow-md w-2/3 text-sm"></div>

    @vite('resources/js/app.js')
</body>

</html>