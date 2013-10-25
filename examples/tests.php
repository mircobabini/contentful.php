<?php namespace Contentful; // just for ease

// remove the ../ if you are out from the examples directory
require_once '../contentful.php';

// demo token from the official docs
$ACCESS_TOKEN = 'b4c0n73n7fu1';

// instance the client
$client = Client::get ($ACCESS_TOKEN);
ensure ($client instanceof Client);

// test space
$space = $client->space ('cfexampleapi');
ensure (!!@$space->sys->type && $space->sys->type !== 'Error');

// test contentTypes and contentType
$contentTypes = $client->contentTypes ('cfexampleapi');
ensure (!!@$contentTypes->sys->type && $contentTypes->sys->type !== 'Error');
$contentType = $client->contentType ('cat', 'cfexampleapi');
ensure (!!@$contentType->sys->type && $contentType->sys->type !== 'Error');

// test entries and entry
$entries = $client->entries ('cfexampleapi');
ensure (!!@$entries->sys->type && $entries->sys->type !== 'Error');
$entry = $client->entry ('nyancat', 'cfexampleapi');
ensure (!!@$entry->sys->type && $entry->sys->type !== 'Error');

// test assets and asset
$assets = $client->assets ('cfexampleapi');
ensure (!!@$assets->sys->type && $assets->sys->type !== 'Error');
$asset = $client->asset ('nyancat', 'cfexampleapi');
ensure (!!@$asset->sys->type && $asset->sys->type !== 'Error');


