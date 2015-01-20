<?php
/**
 * You can override these setting by passing your own config.php by 
 * calling TimeElapsed::setOptions($your_config).
 */

return array(
	// It is not safe to rely on the system's timezone settings,
	// but we will suppress the warning.
	'timezone' => @date_default_timezone_get(),

	// Use for debugging/test.
	'verbose' => false,	
);