<?php declare(strict_types=1);

use \treehousetim\bankHolidays;
use PHPUnit\Framework\TestCase;

final class canadaTest extends TestCase
{
	public $holiday;
	protected function setUp()
	{
		$this->holiday = new \treehousetim\bankHolidays\canada();
	}
	//------------------------------------------------------------------------
	public function testInstance()
	{
		$this->assertInstanceOf(
			\treehousetim\bankHolidays\canada::class,
			$this->holiday
		);
	}
	//------------------------------------------------------------------------
	public function testNewYear()
	{
		$this->assertEquals(
			'2021/12/31',
			$this->holiday->year( 2022 )->newYearsDay()
		);

		$this->assertEquals(
			'2019/01/01',
			$this->holiday->year( 2019 )->newYearsDay()
		);

		$this->assertEquals(
			'2023/01/02',
			$this->holiday->year( 2023 )->newYearsDay()
		);
	}
	//------------------------------------------------------------------------
	public function testFamilyDay()
	{
		$this->assertEquals(
			'2019/02/18',
			$this->holiday->year( 2019 )->familyDay()
		);

		$this->assertEquals(
			'2021/02/15',
			$this->holiday->year( 2021 )->familyDay()
		);

		$this->assertEquals(
			'2037/02/16',
			$this->holiday->year( 2037 )->familyDay()
		);
	}
	//------------------------------------------------------------------------
	public function testVictoriaDay()
	{
		$this->assertEquals(
			'2019/05/20',
			$this->holiday->year( 2019 )->victoriaDay()
		);

		$this->assertEquals(
			'2021/05/24',
			$this->holiday->year( 2021 )->victoriaDay()
		);

		$this->assertEquals(
			'2031/05/19',
			$this->holiday->year( 2031 )->victoriaDay()
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
	public function testThanksgivingDay()
	{
		$this->assertEquals(
			'2019/10/14',
			$this->holiday->year( 2019 )->thanksgivingDay()
		);

		$this->assertEquals(
			'2018/10/08',
			$this->holiday->year( 2018 )->thanksgivingDay()
		);

		$this->assertEquals(
			'2023/10/09',
			$this->holiday->year( 2023 )->thanksgivingDay()
		);

		$this->assertEquals(
			'2036/10/13',
			$this->holiday->year( 2036 )->thanksgivingDay()
		);
	}
	//------------------------------------------------------------------------
	public function testRemembranceDay()
	{
		$this->assertEquals(
			'2019/11/11',
			$this->holiday->year( 2019 )->remembranceDay()
		);

		$this->assertEquals(
			'2018/11/12',
			$this->holiday->year( 2018 )->remembranceDay()
		);

		$this->assertEquals(
			'2023/11/10',
			$this->holiday->year( 2023 )->remembranceDay()
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
	//------------------------------------------------------------------------
	public function testBoxingDay()
	{
		$this->assertEquals(
			'2019/12/26',
			$this->holiday->year( 2019 )->boxingDay()
		);

		$this->assertEquals(
			'2020/12/28',
			$this->holiday->year( 2020 )->boxingDay()
		);

		$this->assertEquals(
			'2021/12/27',
			$this->holiday->year( 2021 )->boxingDay()
		);

		$this->assertEquals(
			'2022/12/27',
			$this->holiday->year( 2022 )->boxingDay()
		);
	}
	//------------------------------------------------------------------------
	public function testCanadaDay()
	{
		$this->assertEquals(
			'2018/07/02',
			$this->holiday->year( 2018 )->canadaDay()
		);

		$this->assertEquals(
			'2020/07/01',
			$this->holiday->year( 2020 )->canadaDay()
		);

		$this->assertEquals(
			'2022/07/01',
			$this->holiday->year( 2022 )->canadaDay()
		);

		$this->assertEquals(
			'2023/06/30',
			$this->holiday->year( 2023 )->canadaDay()
		);
	}
	//------------------------------------------------------------------------
	public function testGoodFriday()
	{
		$this->assertEquals(
			'2019/04/19',
			$this->holiday->year( 2019 )->goodFriday()
		);

		$this->assertEquals(
			'2008/03/21',
			$this->holiday->year( 2008 )->goodFriday()
		);

		$this->assertEquals(
			'2009/04/10',
			$this->holiday->year( 2009 )->goodFriday()
		);
	}
	//------------------------------------------------------------------------
	public function testEaster()
	{
		$this->assertEquals(
			'2019/04/21',
			$this->holiday->year( 2019 )->easterDay()
		);

		$this->assertEquals(
			'2008/03/23',
			$this->holiday->year( 2008 )->easterDay()
		);

		$this->assertEquals(
			'2009/04/12',
			$this->holiday->year( 2009 )->easterDay()
		);
	}
}

