<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationCollection;

class NotificationController extends MainController
{
    public function index()
    {
        $auth = Auth()->guard('api')->user();
        $user = User::find($auth->id);
        $notifications = $user->notifications()
            ->orderByRaw('read_at IS NOT NULL')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
        return $this->sendDataCollection(new NotificationCollection($notifications));
    }

    public function read($id)
    {
        $auth = Auth()->guard('api')->user();
        $user = User::find($auth->id);
        $notification = $user->notificationsUnread()->where('id', $id)->first();
        if (!$notification) {
            return $this->messageError(__('site.notification_not_found'));
        }
        $notification->markAsRead();
        return $this->messageSuccess(__('site.notification_read_successfully'));
    }

    public function readAll()
    {
        $auth = Auth()->guard('api')->user();
        $user = User::find($auth->id);
        $notifications = $user->notificationsUnread()->get();
        if ($notifications->count() == 0) {
            return $this->messageError(__('site.no_unread_notifications'));
        }
        $user->markNotificationAsRead($notifications);
        return $this->messageSuccess(__('site.notifications_read_successfully'));
    }

    public function destroy($id)
    {
        $auth = auth()->guard('api')->user();
        $user = User::find($auth->id);
        $notification = $user->notifications()->where('id', $id)->first();
        if (!$notification) {
            return $this->messageError(__('site.notification_not_found'));
        }
        $notification->delete();
        return $this->messageSuccess(__('site.notification_deleted_successfully'));
    }
}
