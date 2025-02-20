<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send FCM Notification</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
        <h1 class="text-xl font-bold mb-4">Send FCM Notification</h1>

        @if (session('status'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
            {{ session('status') }}
        </div>
        @elseif (session('error'))
        <div class="bg-red-200 text-red-800 p-2 mb-4 rounded">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('notifications.send') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="fcm_token" class="block text-gray-700">FCM Token</label>
                <input type="text" name="fcm_token" id="fcm_token" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="body" class="block text-gray-700">Body</label>
                <textarea name="body" id="body" class="w-full p-2 border rounded" required></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send Notification</button>
        </form>
    </div>
</body>

</html>