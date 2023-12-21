<?php

require_once 'AppController.php';

class ErrorController extends AppController {

    public function filenotfound()
    {
        $this->render('error');
    }
}