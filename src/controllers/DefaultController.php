<?php

class DefaultController {

    function login() {
        include __DIR__.'/../../public/views/login.html';
    }

    public function dashboard() {

        var_dump("ok");
        include __DIR__.'/../../public/views/dashboard.html';
    }
}