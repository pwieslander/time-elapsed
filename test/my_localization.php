<?php
/**
 * My localization functions in Swedish.
 */

return array(
	// Will be called if diff is < 1 minute.
	'seconds_ago' => function ($seconds) {
		return 'nyss';
	},
	// Will be called if diff is >= 1 minute and < 1 hour.
	'minutes_ago' => function ($minutes) {
		if ($minutes < 10) {
			return 'ett par minuter';
		} else {
			return floor($minutes) . ' minuter';
		}
	},
	// Will be called if diff is >= 1 hour and < 1 day.
	'hours_ago'	=> function ($hours) {
		if (floor($hours) == 1) {
			return '1 timma';
		} else {
			return floor($hours) . ' timmar';
		}
	},
	// Will be called if diff is >= day and < 1 week.
	'days_ago' => function ($days) {
		if (floor($days) == 1) {
			return '1 dag';
		} else {
			return floor($days) . ' dagar';
		}
	},
	// Will be called if diff is >= 1 week and < 1 month.
	'weeks_ago'	=> function ($weeks) {
		if (floor($weeks) == 1) {
			return '1 vecka';
		} else {
			return floor($weeks) . ' veckor';
		}
	},
	// Will be called if diff is >= 1 month and < 1 year.
	'months_ago' => function ($months) {
		if (floor($months) == 1) {
			return '1 månad';
		} else {
			return floor($months) . ' månader';
		}
	},
	// Will be called if diff is >= 1 year.
	'years_ago'	=> function ($years) {
		return floor($years) . ' år';
	},
);