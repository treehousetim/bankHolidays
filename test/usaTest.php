<?php declare(strict_types=1);

use \treehousetim\bankHolidays;
use PHPUnit\Framework\TestCase;

class usaTests extends TestCase
{
	public $holiday;
	//------------------------------------------------------------------------
	public function testInstance()
	{
		$this->assertInstanceOf(
			\treehousetim\bankHolidays\usa::class,
			$this->holiday
		);
	}
	//------------------------------------------------------------------------
	public function testNewYear()
	{
		$this->holiday = $this->holiday->year( 2022 );
		// 2022 new years is on a saturday and not observed
		$this->assertEquals(
			'2022/01/01',
			$this->holiday->newYearsDay()
		);
		$detail = $this->holiday->getNewYearsDetail();
		$this->assertFalse( $detail['observed'], 'New Year Is Not Observed' );

		$this->holiday = $this->holiday->year( 2019 );
		$this->assertEquals(
			'2019/01/01',
			$this->holiday->newYearsDay()
		);
		$detail = $this->holiday->getNewYearsDetail();
		$this->assertTrue( $detail['observed'], 'New Year Is Observed' );

		$this->holiday = $this->holiday->year( 2023 );
		$this->assertEquals(
			'2023/01/02',
			$this->holiday->newYearsDay()
		);
		$detail = $this->holiday->getNewYearsDetail();
		$this->assertTrue( $detail['observed'], 'New Year Is Observed' );
	}
	//------------------------------------------------------------------------
	public function testMLK()
	{
		$this->assertEquals(
			'2019/01/21',
			$this->holiday->year( 2019 )->martinLutherKingJrDay()
		);

		$this->assertEquals(
			'2024/01/15',
			$this->holiday->year( 2024 )->martinLutherKingJrDay()
		);

		$this->assertEquals(
			'2000/01/17',
			$this->holiday->year( 2000 )->martinLutherKingJrDay()
		);
	}
	//------------------------------------------------------------------------
	public function testMLKException()
	{
		$this->expectException( \Exception::class );
		$this->holiday->year( 1999 )->martinLutherKingJrDay();
	}
	//------------------------------------------------------------------------
	public function testPresidentsDay()
	{
		$this->assertEquals(
			'2019/02/18',
			$this->holiday->year( 2019 )->presidentsDay()
		);

		$this->assertEquals(
			'2021/02/15',
			$this->holiday->year( 2021 )->presidentsDay()
		);

		$this->assertEquals(
			'2037/02/16',
			$this->holiday->year( 2037 )->presidentsDay()
		);
	}
	//------------------------------------------------------------------------
	public function testMemorialDay()
	{
		$this->assertEquals(
			'2019/05/27',
			$this->holiday->year( 2019 )->memorialDay()
		);

		$this->assertEquals(
			'2033/05/30',
			$this->holiday->year( 2033 )->memorialDay()
		);

		$this->assertEquals(
			'2032/05/31',
			$this->holiday->year( 2032 )->memorialDay()
		);
	}
	//------------------------------------------------------------------------
	public function testJuneteenth()
	{
		$this->assertEquals(
			'2021/06/19',
			$this->holiday->year( 2021 )->juneteenth()
		);
		$detail = $this->holiday->year( 2021 )->getJuneteenthDetail();
		$this->assertFalse( $detail['observed'], 'Juneteenth Is Not Observed' );

		$this->assertEquals(
			'2022/06/20',
			$this->holiday->year( 2022 )->juneteenth()
		);
		$detail = $this->holiday->year( 2022 )->getJuneteenthDetail();
		$this->assertTrue( $detail['observed'], 'Juneteenth Is Observed' );
	}
	//------------------------------------------------------------------------
	public function testIndependenceDay()
	{
		$this->holiday = $this->holiday->year( 2015 );

		$this->assertEquals(
			'2015/07/04',
			$this->holiday->independenceDay()
		);
		$detail = $this->holiday->getIndependenceDayDetail();
		$this->assertFalse( $detail['observed'], 'Independence Day Is Not Observed' );

		$this->holiday = $this->holiday->year( 2019 );
		$this->assertEquals(
			'2019/07/04',
			$this->holiday->independenceDay()
		);
		$detail = $this->holiday->getIndependenceDayDetail();
		$this->assertTrue( $detail['observed'], 'Independence Day Is Observed' );

		$this->holiday = $this->holiday->year( 2020 );
		$this->assertEquals(
			'2020/07/04',
			$this->holiday->independenceDay()
		);
		$detail = $this->holiday->getIndependenceDayDetail();
		$this->assertFalse( $detail['observed'], 'Independence Day Is Not Observed' );

		$this->holiday = $this->holiday->year( 2021 );
		$this->assertEquals(
			'2021/07/05',
			$this->holiday->independenceDay()
		);
		$detail = $this->holiday->getIndependenceDayDetail();
		$this->assertTrue( $detail['observed'], 'Independence Day Is Observed' );


		$this->holiday = $this->holiday->year( 2033 );
		$this->assertEquals(
			'2033/07/04',
			$this->holiday->independenceDay()
		);
		$detail = $this->holiday->getIndependenceDayDetail();
		$this->assertTrue( $detail['observed'], 'Independence Day Is Observed' );

		$this->holiday = $this->holiday->year( 2031 );
		$this->assertEquals(
			'2031/07/04',
			$this->holiday->independenceDay()
		);
		$detail = $this->holiday->getIndependenceDayDetail();
		$this->assertTrue( $detail['observed'], 'Independence Day Is Observed' );

		$this->holiday = $this->holiday->year( 2032 );
		$this->assertEquals(
			'2032/07/05',
			$this->holiday->independenceDay()
		);
		$detail = $this->holiday->getIndependenceDayDetail();
		$this->assertTrue( $detail['observed'], 'Independence Day Is Observed' );
	}
	//------------------------------------------------------------------------
	public function testLaborDay()
	{
		$this->holiday = $this->holiday->year( 2019 );
		$this->assertEquals(
			'2019/09/02',
			$this->holiday->laborDay()
		);
		$detail = $this->holiday->getLaborDayDetail();
		$this->assertTrue( $detail['observed'], 'Labor Day Is Observed' );

		$this->assertEquals(
			'2020/09/07',
			$this->holiday->year( 2020 )->laborDay()
		);

		$this->assertEquals(
			'2025/09/01',
			$this->holiday->year( 2025 )->laborDay()
		);
	}
	//------------------------------------------------------------------------
	public function testColumbusDay()
	{
		$this->holiday = $this->holiday->year( 2019 );
		$this->assertEquals(
			'2019/10/14',
			$this->holiday->columbusDay()
		);
		$detail = $this->holiday->getColumbusDayDetail();
		$this->assertTrue( $detail['observed'], 'Columbus Day Is Observed' );

		$this->assertEquals(
			'2018/10/08',
			$this->holiday->year( 2018 )->columbusDay()
		);

		$this->assertEquals(
			'2023/10/09',
			$this->holiday->year( 2023 )->columbusDay()
		);

		$this->assertEquals(
			'2036/10/13',
			$this->holiday->year( 2036 )->columbusDay()
		);
	}
	//------------------------------------------------------------------------
	public function testVeteransDay()
	{
		$this->holiday = $this->holiday->year( 2019 );
		$this->assertEquals(
			'2019/11/11',
			$this->holiday->veteransDay()
		);
		$detail = $this->holiday->getVeteransDayDetail();
		$this->assertTrue( $detail['observed'], 'Veterans Day Is Observed' );


		$this->holiday = $this->holiday->year( 2018 );
		$this->assertEquals(
			'2018/11/12',
			$this->holiday->veteransDay()
		);
		$detail = $this->holiday->getVeteransDayDetail();
		$this->assertTrue( $detail['observed'], 'Veterans Day Is Observed' );


		$this->holiday = $this->holiday->year( 2017 );
		$this->assertEquals(
			'2017/11/11',
			$this->holiday->veteransDay()
		);
		$detail = $this->holiday->getVeteransDayDetail();
		$this->assertFalse( $detail['observed'], 'Veterans Day Is Not Observed' );

		$this->holiday = $this->holiday->year( 2023 );
		$this->assertEquals(
			'2023/11/11',
			$this->holiday->veteransDay()
		);
		$detail = $this->holiday->getVeteransDayDetail();
		$this->assertFalse( $detail['observed'], 'Veterans Day Is Not Observed' );
	}
	//------------------------------------------------------------------------
	public function testThanksgivingDay()
	{
		$this->holiday = $this->holiday->year( 2019 );
		$this->assertEquals(
			'2019/11/28',
			$this->holiday->thanksgivingDay()
		);

		$detail = $this->holiday->getThanksgivingDayDetail();
		$this->assertTrue( $detail['observed'], 'Thanksgiving Day Is Observed' );


		$this->holiday = $this->holiday->year( 2017 );
		$this->assertEquals(
			'2017/11/23',
			$this->holiday->thanksgivingDay()
		);
		$detail = $this->holiday->getThanksgivingDayDetail();
		$this->assertTrue( $detail['observed'], 'Thanksgiving Day Is Observed' );


		$this->holiday = $this->holiday->year( 2036 );
		$this->assertEquals(
			'2036/11/27',
			$this->holiday->thanksgivingDay()
		);
		$detail = $this->holiday->getThanksgivingDayDetail();
		$this->assertTrue( $detail['observed'], 'Thanksgiving Day Is Observed' );
	}
	//------------------------------------------------------------------------
	public function testChristmasDay()
	{
		$this->assertEquals(
			'2019/12/25',
			$this->holiday->year( 2019 )->christmasDay()
		);

		$this->assertEquals(
			'2020/12/25',
			$this->holiday->year( 2020 )->christmasDay()
		);


		$this->holiday = $this->holiday->year( 2021 );
		$this->assertEquals(
			'2021/12/25',
			$this->holiday->christmasDay()
		);
		$detail = $this->holiday->getChristmasDayDetail();
		$this->assertFalse( $detail['observed'], 'Christmas Day Is Not Observed' );

		$this->assertEquals(
			'2021/12/25',
			$this->holiday->year( 2021 )->christmasDay()
		);

		$this->assertEquals(
			'2022/12/26',
			$this->holiday->year( 2022 )->christmasDay()
		);
	}
	//------------------------------------------------------------------------
	public function testGetAsArray()
	{
		$this->holiday = $this->holiday->year( 2021 );
		$ar = $this->holiday->getAsArray();

		$this->assertEquals(
			11,
			count( $ar ),
			'Detail array has 11 entries'
		);
	}
	//------------------------------------------------------------------------
	public function testGetObservedAsArray()
	{
		$this->holiday = $this->holiday->year( 2021 );
		$ar = $this->holiday->getObservedAsArray();

		$this->assertEquals(
			9,
			count( $ar ),
			'Detail array has 11 entries'
		);

		$this->holiday = $this->holiday->year( 2022 );
		$ar = $this->holiday->getObservedAsArray();

		$this->assertEquals(
			10,
			count( $ar ),
			'Detail array has 11 entries'
		);
	}
	//------------------------------------------------------------------------
	public function testAllArrayStruct()
	{
		$this->holiday = $this->holiday->year( 2021 );
		$ar = $this->holiday->getAsArray();

		foreach( $ar as $item )
		{
			$this->assertArrayHasKey( 'desc', 		$item, 'has desc' );
			$this->assertArrayHasKey( 'date', 		$item, 'has date' );
			$this->assertArrayHasKey( 'observed',	$item, 'has observed' );
			$this->assertArrayHasKey( 'country',	$item, 'has country' );

			$this->assertEquals( 4, count( $item ), ($item['date'] ?? 'unknown') . ' has only 4 entries' );
			$this->assertNotEmpty( $item['desc'], $item['date'] . ' must have a description' );
			$this->assertNotEmpty( $item['date'], $item['desc'] . ' must have a date' );
			$this->assertEquals( $item['country'], 'US', $item['date'] . ' must be for USA [US]' );
		}
	}
}



if (version_compare(PHP_VERSION, '8.0.0', '>=')) {
	final class usaTest extends usaTests {
		public function __construct(string $name=null)
		{
			parent::__construct($name);
			$this->holiday = new \treehousetim\bankHolidays\usa();
		}
	}
} else {
	final class usaTest extends usaTests {
		public function __construct(string $name)
		{
			parent::__construct($name);
			$this->holiday = new \treehousetim\bankHolidays\usa();
		}

	}
}