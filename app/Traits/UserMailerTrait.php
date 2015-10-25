<?php namespace App\Traits;

use App\Mailers\UserMailer as userMailer;
use App\User;

trait UserMailerTrait
{
    /**
     * Send the user an email confirmation email.
     *
     * @param User $user
     * @param $code
     * @return bool
     */
    public function sendConfirmationMailTo(User $user, $code)
    {
        userMailer::sendConfirmationMailTo($user, $code);
        return true;
    }
}