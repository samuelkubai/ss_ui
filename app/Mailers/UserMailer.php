<?php namespace App\Mailers;


use Illuminate\Support\Facades\Mail;

class UserMailer
{
    /**
     * Send email confirmation to a user.
     *
     * @param $user
     * @param $code
     * @return mixed
     */
    public static function sendConfirmationMailTo($user, $code)
    {
        $data = [
            'name' => $user->firstName. ' ' . $user->lastName,
            'link' => url('/profile/activate/'. $code),
        ];


        return Mail::send('ss.email.confirm', $data , function($message) use ($user)
        {
            $message->to($user->email, $user->firstName)->subject('Confirm your E-mail!');
        });
    }

}