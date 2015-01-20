pwa/time-elapsed
=========

A PHP class to print the elapsed time between two DateTime objects in a nice (and highly modifiable) format.

Setup
-----
To add this package as a local, per-project dependency to your project, simply add a
dependency on `pwa/time-elapsed` to your project's `composer.json` file.

```js
{
    "require": {
        "pwa/time-elapsed": "dev-master"
    }
}
```

Because this class uses namespacing, when instantiating the object, you need to use the fully qualified namespace:

```php
$elapsed = new \Pwa\TimeElapsed($start);
```

Usage
-----
This class prints the elapsed time, between two DateTime objects, in a formatted way determined by the anonymous functions found in src/localization.php.
E.g. this function will be called if elapsed time is >= 1 week and < 1 month:
```php
'weeks_ago'	=> function ($weeks) {
	if (floor($weeks) == 1) {
		return 'a week ago';
	} else {
		return floor($weeks) . ' weeks ago';
	}
},
```
You can easily pass your own localization functions to the TimeElapsed class, to override default localization/format:
```php
$timezone = new \DateTimeZone("Europe/Stockholm");
$date = new \DateTime('2015-01-01 15:00:00', $timezone);

$elapsed = new TimeElapsed($date);
echo $elapsed->getElapsedTime(); // Between $date and $now = DateTime(null, $timezone);
// Output: a week ago

$localization = '/path/to/my_localization.php';
$elapsed->setLocalization($localization);

echo $elapsed->getElapsedTime();
// Output: one week ago

$localization = '/path/to/my_french_localization.php';
$elapsed->setLocalization($localization);

echo $elapsed->getElapsedTime();
// Output: Il ya 1 semaine
```
You may also pass an end date when instantianting the object:
```php
$start = new \DateTime('2015-01-01 15:00:00', $timezone);
$end = new \DateTime('2015-01-01 15:00:05', $timezone);

$elapsed = new TimeElapsed($start, end);
echo $elapsed->getElapsedTime();
// Output: a few seconds ago
```


License
------------------

This software is free software and carries a MIT license.
