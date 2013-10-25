<?php namespace Contentful; // just for ease

// remove the ../ if you are out from the examples directory
require_once '../contentful.php';

// demo token from the official docs
$ACCESS_TOKEN = 'b4c0n73n7fu1';

// instance the client
$client = Client::get ($ACCESS_TOKEN);

// use it for your needs
$client->space ('cfexampleapi');

$client->contentTypes ('cfexampleapi');
$client->contentType ('cat', 'cfexampleapi');

$client->entries ('cfexampleapi');
$client->entry ('nyancat', 'cfexampleapi');

$client->assets ('cfexampleapi');
$client->asset ('nyancat', 'cfexampleapi');


