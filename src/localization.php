<?php
/**
 * These functions determines the format of the outputted elapsed time.
 * You can override these functions by passing your own localization
 * functions to TimeElapsed with method TimeElapsed::setLocalization($your_localization).
 */

return [
	// Will be called if diff is < 1 minute.
	'seconds_ago' => function ($seconds) {
		return 'a few seconds ago';
	},
	// Will be called if diff is >= 1 minute and < 1 hour.
	'minutes_ago' => function ($minutes) {
		if ($minutes < 10) {
			return 'a few minutes ago';
		} else {
			return floor($minutes) . ' minutes ago';
		}
	},
	// Will be called if diff is >= 1 hour and < 1 day.
	'hours_ago'	=> function ($hours) {
		if (floor($hours) == 1) {
			return 'an hour ago';
		} else {
			return floor($hours) . ' hours ago';
		}
	},
	// Will be called if diff is >= day and < 1 week.
	'days_ago' => function ($days) {
		if (floor($days) == 1) {
			return 'a day ago';
		} else {
			return floor($days) . ' days ago';
		}
	},
	// Will be called if diff is >= 1 week and < 1 month.
	'weeks_ago'	=> function ($weeks) {
		if (floor($weeks) == 1) {
			return 'a week ago';
		} else {
			return floor($weeks) . ' weeks ago';
		}
	},
	// Will be called if diff is >= 1 month and < 1 year.
	'months_ago' => function ($months) {
		if (floor($months) == 1) {
			return 'a month ago';
		} else {
			return floor($months) . ' months ago';
		}
	},
	// Will be called if diff is >= 1 year.
	'years_ago'	=> function ($years) {
		if (floor($years) == 1) {
			return 'a year ago';
		} else {
			return floor($years) . ' years ago';
		}
	},
];