<?php namespace Droit\Listeners;

use Laracasts\Commander\Events\EventListener;
use Droit\User\Events\UserWasCreated;


class EmailNotifier extends EventListener {

    public function whenUserWasCreated(UserWasCreated $event)
    {
        $data = ['user' => $event->user];

        \Mail::send('emails.user.create', $data , function($message)
        {
            $message->to('cindy.leschaud@gmail.com', 'Cindy Leschaud')->subject('User was created!!');
        });
    }

}