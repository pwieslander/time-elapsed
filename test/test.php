<?php
require __DIR__.'/../src/TimeElapsed.php';

$timezone = new \DateTimeZone("Europe/Stockholm");

$date = new \DateTime('2015-01-01 10:00:00', $timezone);
$now = new \DateTime(null, $timezone);

$options = array('verbose' => true);
$localization = require __DIR__.'/my_localization.php';

$elapsed = new Pwa\TimeElapsed($date, $now, $options, $localization);
$elapsed->getElapsedTime();

$date = new \DateTime('2015-01-08 15:00:00', $timezone);
$elapsed->setStartDate($date);
$elapsed->getElapsedTime();