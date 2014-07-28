<?php namespace Droit\Listeners;

use Laracasts\Commander\Events\EventListener;
use Droit\User\Events\UserWasCreated;
use Droit\Colloque\Events\InscriptionWasCreated;

class EmailNotifier extends EventListener {

    public function whenUserWasCreated(UserWasCreated $event)
    {
        $data = ['user' => $event->user];

        \Mail::send('emails.user.create', $data , function($message)
        {
            $message->to('cindy.leschaud@gmail.com', 'Cindy Leschaud')->subject('User was created!!');
        });
    }

    public function whenInscriptionWasCreated(InscriptionWasCreated $event)
    {
        $data = ['inscription' => $event->inscription];

        \Mail::send('emails.inscription.create', $data , function($message)
        {
            $message->to('cindy.leschaud@gmail.com', 'Cindy Leschaud')->subject('Inscription was created!!');
        });
    }

    public function whenInscriptionWasUpdated(InscriptionWasUpdated $event)
    {
        $data = ['inscription' => $event->inscription];

        \Mail::send('emails.inscription.update', $data , function($message)
        {
            $message->to('cindy.leschaud@gmail.com', 'Cindy Leschaud')->subject('Inscription was updated!!');
        });
    }


}