<?php
/**
 * A class to print the elapsed time between two DateTime objects in a nice 
 * (and highly modifiable) format.
 *
 * @author Peter Wieslander <peter.wieslander@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @copyright 2015 The Authors
 */

namespace Pwa;

class TimeElapsed
{
	/**
	 * Properties.
	 */
	private $start;
	private $end;
	private $options; 		// See config.php for available options.
	private $localization; 	// See localization.php for more info. 

	/**
	 *
	 * @param DateTime $start datetime.
	 * @param DateTime $end datetime.
	 * @param array $options.
	 * @param array $localization functions.
	 *
	 * @return void
	 */
	public function __construct(
		$start = null,
		$end = null,
		$options = [],
		$localization = []
	) {
		$this->setOptions($options);
		$this->setLocalization($localization);

		$timezone = new \DateTimeZone($this->options['timezone']);

		$this->start = $start ? $start : new \DateTime(null, $timezone);
		$this->end = $end ? $end : new \DateTime(null, $timezone);
	}

	public function setOptions($options)
	{
		$default = require __DIR__.'/config.php';
		$this->options = array_merge($default, $options);
	}

	public function setLocalization($localization)
	{
		$default = require __DIR__.'/localization.php';
		$this->localization = array_merge($default, $localization);
	}

	public function getElapsedTime()
	{
		$timestamp_start = $this->start->getTimestamp();
		$timestamp_end = $this->end->getTimestamp();

		$diff_seconds = $timestamp_end - $timestamp_start;

		$diff_minutes 	= $diff_seconds / 60;
		$diff_hours 	= $diff_minutes / 60;
		$diff_days		= $diff_hours / 12;
		$diff_weeks		= $diff_days / 7;
		$diff_months	= $diff_weeks / 4;
		$diff_years		= $diff_months / 12;

		if ($diff_years >= 1) {
			$elapsed = $this->localization['years_ago']($diff_years);
		} elseif ($diff_months >= 1) {
			$elapsed = $this->localization['months_ago']($diff_months);
		} elseif ($diff_weeks >= 1) {
			$elapsed = $this->localization['weeks_ago']($diff_weeks);
		} elseif ($diff_days >= 1) {
			$elapsed = $this->localization['days_ago']($diff_days);
		} elseif ($diff_hours >= 1) {
			$elapsed = $this->localization['hours_ago']($diff_hours);
		} elseif ($diff_minutes >= 1) {
			$elapsed = $this->localization['minutes_ago']($diff_minutes);
		} else {
			$elapsed = $this->localization['seconds_ago']($diff_seconds);
		}

		if ($this->options['verbose']) {
			echo "Start:\t" . $this->start->format('Y-m-d H:i:s') . PHP_EOL;
			echo "end:\t" . $this->end->format('Y-m-d H:i:s') . PHP_EOL;

			echo PHP_EOL . "Difference:" . PHP_EOL;
			echo floor($diff_seconds) 	. " seconds" 	. PHP_EOL;
			echo floor($diff_minutes)	. " minutes"	. PHP_EOL;
			echo floor($diff_hours)		. " hours"		. PHP_EOL;
			echo floor($diff_days)		. " days"		. PHP_EOL;
			echo floor($diff_weeks)		. " weeks"		. PHP_EOL;
			echo floor($diff_months)	. " months"		. PHP_EOL;
			echo floor($diff_years)		. " years"		. PHP_EOL;

			echo PHP_EOL . "Final output:" . PHP_EOL;
			echo $elapsed . PHP_EOL;
		}
		
		return $elapsed;
	}
}