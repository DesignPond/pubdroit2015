<?php

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    public function __construct()
    {
        $this->custom = new \Custom;
    }

    public function titreCivilite()
    {
        return  $this->custom->whatCivilite($this->civilite);
    }

}