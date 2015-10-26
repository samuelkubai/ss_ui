<?php namespace App\Traits;


use App\File;
use App\Group;
use App\Mailers\GroupMailer;
use App\Notice;
use App\User;

trait GroupMailerTrait
{

    /**
     * Send the user an email confirmation email.
     *
     * @param File $file
     * @param Group $group
     * @return bool
     */
    public function sendFileUploadNotification(File $file, Group $group)
    {
        $url = url('/group/'.$group->username.'/files/');
        GroupMailer::sendFileUploadNotification($group, $file, $url);
        return true;
    }

    /**
     * Send the user an email confirmation email.
     *
     * @param Group $group
     * @param Notice $notice
     * @return bool
     */
    public function sendNewPinNotification(Group $group,Notice $notice)
    {
        $url = url('/noticeboard/');
        GroupMailer::sendNewPinNotification($group, $notice, $url);
        return true;
    }
}