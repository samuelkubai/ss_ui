<?php namespace App\Mailers;


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
    public function sendFileUploadNotification($group,$file,$url)
    {
        $counter = 5;

        foreach($group->followers()->get() as $user)
        {
            if(!$group->isSupervisedBy($user))
            {
                $data = [
                    'name' => $user->fullName(),
                    'fileName' => $file->name,
                    'groupName' => $group->name,
                    'link' => $url,
                    'sender' => $file->user()->first()->fullName()
                ];

                Mail::later($counter, 'inspina.email.new_file', $data, function($message) use ($user)
                {
                    $message->to($user->email, $user->fullName())->subject('New File Uploaded.');

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
    public function sendNewPinNotification($group, $notice ,$url)
    {
        $counter = 5;

        foreach($group->followers()->get() as $user)
        {
            if(!$group->isSupervisedBy($user) && $user->isMailable()) {
                $data = [
                    'name' => $user->fullName(),
                    'groupName' => $group->name,
                    'pinSender' => $notice->user()->first()->fullName(),
                    'pinTitle' => $notice->title,
                    'link' => $url,
                ];

                Mail::later($counter, 'inspina.email.new_pin', $data, function ($message) use ($user) {
                    $message->to($user->email, $user->fullName())->subject('New Notice Pinned.');

                });


                $this->smsService->send($user->telNumber, 'A new notice has been pinned in skoolspace group: '.$group->name.'. Notice: '.$notice->title.' => '.$notice->message . ' Learn More: '. $url);

                $counter++;
            }
        }
    }

}