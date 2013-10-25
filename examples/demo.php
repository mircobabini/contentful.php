<?php namespace Contentful;
require_once '../contentful.php';

$ACCESS_TOKEN = 'b4c0n73n7fu1';

$client = Client::get ($ACCESS_TOKEN);
$client->space ('cfexampleapi');
$client->contentTypes ('cfexampleapi');
$client->contentType ('cat', 'cfexampleapi');
$client->entries ('cfexampleapi');
$client->entry ('nyancat', 'cfexampleapi');
$client->assets ('cfexampleapi');
$client->asset ('nyancat', 'cfexampleapi');

