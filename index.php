<?php

$path = $_SERVER["REQUEST_URI"];

$path = trim($path, "/");

echo $path;

$actions = explode("/",$path);

if($actions[0] === 'dashboard')
{
    include '/public/src/dashboard.html';
}
else
{
    include '/public/src/login.html';
}


echo 'Hi there 👋';
