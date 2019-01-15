<?php declare(strict_types=1);

use \treehousetim\bankHolidays;
use PHPUnit\Framework\TestCase;

final class usaTest extends TestCase
{
	public $holiday;
	protected function setUp()
	{
		$this->holiday = new \treehousetim\bankHolidays\usa();
	}
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
		$this->assertEquals(
			'2021/12/31',
			$this->holiday->year( 2022 )->newYear()
		);

		$this->assertEquals(
			'2019/01/01',
			$this->holiday->year( 2019 )->newYear()
		);

		$this->assertEquals(
			'2023/01/02',
			$this->holiday->year( 2023 )->newYear()
		);
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
	public function testIndependenceDay()
	{
		$this->assertEquals(
			'2019/07/04',
			$this->holiday->year( 2019 )->independenceDay()
		);

		$this->assertEquals(
			'2020/07/03',
			$this->holiday->year( 2020 )->independenceDay()
		);

		$this->assertEquals(
			'2021/07/05',
			$this->holiday->year( 2021 )->independenceDay()
		);

		$this->assertEquals(
			'2033/07/04',
			$this->holiday->year( 2033 )->independenceDay()
		);

		$this->assertEquals(
			'2031/07/04',
			$this->holiday->year( 2031 )->independenceDay()
		);

		$this->assertEquals(
			'2032/07/05',
			$this->holiday->year( 2032 )->independenceDay()
		);
	}
	//------------------------------------------------------------------------
	public function testLaborDay()
	{
		$this->assertEquals(
			'2019/09/02',
			$this->holiday->year( 2019 )->laborDay()
		);

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
		$this->assertEquals(
			'2019/10/14',
			$this->holiday->year( 2019 )->columbusDay()
		);

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
		$this->assertEquals(
			'2019/11/11',
			$this->holiday->year( 2019 )->veteransDay()
		);

		$this->assertEquals(
			'2018/11/12',
			$this->holiday->year( 2018 )->veteransDay()
		);

		$this->assertEquals(
			'2023/11/10',
			$this->holiday->year( 2023 )->veteransDay()
		);
	}
	//------------------------------------------------------------------------
	public function testThanksgivingDay()
	{
		$this->assertEquals(
			'2019/11/28',
			$this->holiday->year( 2019 )->thanksgivingDay()
		);

		$this->assertEquals(
			'2018/11/22',
			$this->holiday->year( 2018 )->thanksgivingDay()
		);

		$this->assertEquals(
			'2026/11/26',
			$this->holiday->year( 2026 )->thanksgivingDay()
		);

		$this->assertEquals(
			'2036/11/27',
			$this->holiday->year( 2036 )->thanksgivingDay()
		);
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

		$this->assertEquals(
			'2021/12/24',
			$this->holiday->year( 2021 )->christmasDay()
		);

		$this->assertEquals(
			'2022/12/26',
			$this->holiday->year( 2022 )->christmasDay()
		);
	}
}

