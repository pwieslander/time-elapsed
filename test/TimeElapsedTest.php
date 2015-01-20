<?php
namespace Pwa;

class TimeElapsedTest extends \PHPUnit_Framework_TestCase
{
	protected function setUp()
	{
		require_once __DIR__.'/../src/TimeElapsed.php';
	}

	public function testDifferentElapsedTimes()
	{
		$timezone = new \DateTimeZone("Europe/Stockholm");

		$start = new \DateTime('2015-01-01 10:00:00', $timezone);
		$end = new \DateTime('2015-01-01 10:00:01', $timezone);

		$elapsed = new TimeElapsed($start, $end);
	
		$res = $elapsed->getElapsedTime();
		$exp = 'a few seconds ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-5 minutes');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = 'a few minutes ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-25 minutes');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '30 minutes ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-30 minutes');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = 'an hour ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-1 hour');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '2 hours ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-22 hours');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = 'a day ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-1 day');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '2 days ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-5 days');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = 'a week ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-1 week');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '2 weeks ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-2 week');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = 'a month ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-1 month');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '2 months ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-10 month');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = 'a year ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-1 year');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '2 years ago';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");
	}

	public function testLocalization()
	{
		$timezone = new \DateTimeZone("Europe/Stockholm");

		$start = new \DateTime('2015-01-01 10:00:00', $timezone);
		$end = new \DateTime('2015-01-01 10:00:01', $timezone);

		$elapsed = new TimeElapsed($start, $end);

		$localization = require __DIR__.'/my_localization.php';
		$elapsed->setLocalization($localization);
	
		$res = $elapsed->getElapsedTime();
		$exp = 'nyss';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-5 minutes');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = 'ett par minuter';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-25 minutes');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '30 minuter';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-30 minutes');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '1 timma';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-1 hour');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '2 timmar';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-22 hours');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '1 dag';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-1 day');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '2 dagar';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-5 days');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '1 vecka';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-1 week');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '2 veckor';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-2 week');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '1 månad';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-1 month');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '2 månader';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-10 month');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '1 år';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");

		$start->modify('-1 year');
		$elapsed->setStartDate($start);

		$res = $elapsed->getElapsedTime();
		$exp = '2 år';

		$this->assertEquals($res, $exp, "Elapsed time missmatch.");
	}

	public function testVerbose()
	{
		$timezone = new \DateTimeZone("Europe/Stockholm");

		$start = new \DateTime('2015-01-01 10:00:00', $timezone);
		$end = new \DateTime('2015-01-01 10:00:01', $timezone);

		$elapsed = new TimeElapsed($start, $end);

		$options = array('verbose' => true);

		$elapsed->setOptions($options);
		$elapsed->getElapsedTime();
	}
}