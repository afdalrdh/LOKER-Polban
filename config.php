<?php
	require_once __DIR__ . "/vendor/autoload.php";
	$user = (new MongoDB\Client)->db_tubes_loker->user;
	$admin = (new MongoDB\Client)->db_tubes_loker->admin;
	$loker = (new MongoDB\Client)->db_tubes_loker->loker;
	$pelamar = (new MongoDB\Client)->db_tubes_loker->pelamar;
	$collection = (new MongoDB\Client)->db_tubes_loker->user;