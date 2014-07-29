<?php

Event::listen('Droit.*', 'Droit\Listeners\EmailNotifier');
Event::listen('Droit.*', 'Droit\Listeners\InscriptionCreation');
Event::listen('Droit.*', 'Droit\Listeners\DocumentGenerator');