<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NotificationController extends Controller
{
    public function countNotificationsNotCheckOfUser($userId){
        $count = Notification::where([
            ['customer_id', '=', $userId],
            ['state', '=', 0]
        ])->get()->count();
        return response()->json([
            'count' => $count
        ]);
    }

    public function viewNotificationNotCheck($userId){
        $notifications = Notification::where([
            ['customer_id', '=', $userId],
            ['state', '=', 0]
        ])->take(5)->get();
        foreach($notifications as $notification){
            $notification->sender = User::find($notification->sender_id)->name;
            $notification->question = Str::limit(Question::find($notification->question_id)->title, 20);
            $notification->createdAt = $notification->created_at->diffForHumans(Carbon::now());
        }
        return view('notification.dropdown.notifications_list', [
            'notifications' => $notifications
        ]);
    }

    public function viewNotificationsList($userId){
        $notifications = Notification::where('customer_id', '=', $userId)->orderBy('created_at', 'DESC')->get();
        foreach($notifications as $notification){
            $notification->sender = User::find($notification->sender_id)->name;
            $notification->question = Str::limit(Question::find($notification->question_id)->title, 20);
            $notification->createdAt = $notification->created_at->diffForHumans(Carbon::now());
        }
        return view('notification.notifications_list', [
            'notifications' => $notifications
        ]);
    }

    public function setCheckNotification($id){
        $notification = Notification::find($id);
        $notification->state = 1;
        $notification->save();
        return reponse()->json([
            'message' => 'read notifications!'
        ]);
    }

    public function createNotification(Request $request){
        if($request->customerId != $request->senderId){
            $notification = new Notification;
            $notification->content = $request->content;
            $notification->customer_id = $request->customerId;
            $notification->sender_id = $request->senderId;
            $notification->question_id = $request->questionId;
            $notification->state = 0;
            $notification->save();
        }
         
        return response()->json([
            'message' => 'success!'
        ]);
    }
}
