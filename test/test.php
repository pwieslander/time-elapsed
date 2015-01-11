<?php
require __DIR__.'/../src/TimeElapsed.php';

$timezone = new \DateTimeZone("Europe/Stockholm");

$date = new \DateTime('2015-01-01 15:00:00', $timezone);
$now = new \DateTime(null, $timezone);

$options = ['verbose' => true];
$localization = require __DIR__.'/my_localization.php';

$elapsed = new Pwa\TimeElapsed($date, $now, $options, $localization);
$elapsed->getElapsedTime();