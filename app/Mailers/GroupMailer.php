<?php namespace App\Mailers;


use App\File;
use App\Group;
use App\Notice;
use Illuminate\Support\Facades\Mail;

class GroupMailer
{
    /**
     * Send a new file shared email notification.
     *
     * @param $group
     * @param $file
     * @param $url
     */
    public static function sendFileUploadNotification(Group $group, File $file,$url)
    {
        $counter = 5;

        foreach($group->members()->get() as $user)
        {
            if($user->id != $file->user->id)
            {
                $data = [
                    'name' => $user->fullName(),
                    'fileName' => $file->name,
                    'groupName' => $group->name,
                    'link' => $url,
                    'sender' => $file->user->fullName()
                ];

                Mail::later($counter, 'ss.email.new_file', $data, function($message) use ($user, $file)
                {
                    $message->to($user->email, $user->fullName())->subject($file->user->fullName(). ' added a file.');

                });

                $counter++;
            }
        }

    }

    /**
     * Send new notice creation email notification.
     *
     * @param $group
     * @param $notice
     * @param $url
     */
    public static function sendNewPinNotification(Group $group, Notice $notice ,$url)
    {
        $counter = 5;

        foreach($group->members()->get() as $user)
        {
            if($user->isMailable() && $user->id != $notice->user->id)
            {
                $data = [
                    'name' => $user->fullName(),
                    'groupName' => $group->name,
                    'pinSender' => $notice->user->fullName(),
                    'pinTitle' => $notice->title,
                    'pinMessage' => $notice->message,
                    'link' => $url,
                ];

                Mail::later($counter, 'ss.email.new_pin', $data, function ($message) use ($user, $notice) {
                    $message->to($user->email, $user->fullName())->subject($notice->user->fullName(). ' pinned a notice.');
                });
                $counter++;
            }
        }
    }

}