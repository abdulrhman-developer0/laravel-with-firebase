<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;

class NotificationController extends Controller
{
    // Display the notification form
    public function index()
    {
        return view('send-notification');
    }

    // Handle sending notification to a given FCM token
    public function send(Request $request)
    {
        $request->validate([
            'fcm_token' => 'required',
            'title'     => 'required',
            'body'      => 'required',
        ]);

        $fcmToken = $request->input('fcm_token');
        $title    = $request->input('title');
        $body     = $request->input('body');

        /** @var Messaging $messaging */
        $messaging = app('firebase.messaging');

        // Create a CloudMessage targeting the specified token
        $message = CloudMessage::new()
            ->toToken($fcmToken)
            ->withNotification([
                'title' => $title,
                'body'  => $body,
            ]);

        try {
            $messaging->send($message);
            return back()->with('status', 'Notification sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error sending notification: ' . $e->getMessage());
        }
    }
}