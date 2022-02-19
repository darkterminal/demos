<?php

require 'vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\DummyPrintConnector;
use Mike42\Escpos\CapabilityProfile;

// Make sure you load a Star print connector or you may get gibberish.
$connector = new DummyPrintConnector();
$profile = CapabilityProfile::load("TSP600");
$printer = new Printer($connector);
$printer -> text("Hello world!\n");
$printer -> cut();

// Get the data out as a string
$data = $connector -> getData();
echo json_encode(['text' => $data]);

// Close the printer when done.
$printer -> close();