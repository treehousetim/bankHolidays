<?php namespace treehousetim\bankHolidays;

class canada extends holiday
{
	public function getObservedAsArray() : array
	{
		return $this->getAsArray();
	}
	//------------------------------------------------------------------------
	public function getAsArray() : array
	{
		$this->mustHaveYear();
		$dates = [];
		$dates[] = $this->getNewYearsDayDetail();
		$dates[] = $this->getFamilyDayDetail();
		$dates[] = $this->getGoodFridayDetail();
		$dates[] = $this->getEasterMondayDetail();
		$dates[] = $this->getVictoriaDayDetail();
		$dates[] = $this->getCanadaDayDetail();
		$dates[] = $this->getCivicHolidayDetail();
		$dates[] = $this->getLaborDayDetail();
		$dates[] = $this->getThanksgivingDayDetail();
		$dates[] = $this->getRemembranceDayDetail();
		$dates[] = $this->getChristmasDayDetail();
		$dates[] = $this->getBoxingDayDetail();
		

		return $dates;
	}
	//------------------------------------------------------------------------
	public function getNewYearsDayDetail()
	{
		return [
			'country'	=> 'CA',
			'observed'	=> true,
			'date'		=> $this->newYearsDay(),
			'desc'		=> 'New Year\'s Day'
		];
	}
	//------------------------------------------------------------------------
	public function getNewYearsDetail(): array
	{
		return $this->getNewYearsDayDetail();
	}
	//------------------------------------------------------------------------
	public function newYearsDay() : string
	{
		return $this->satFriSunMon( $this->year . '/01/01' );
	}
	//------------------------------------------------------------------------
	public function getGoodFridayDetail()
	{
		return [
			'country'	=> 'CA',
			'observed'	=> true,
			'date'		=> $this->goodFriday(),
			'desc'		=> 'Good Friday'
		];
	}
	//------------------------------------------------------------------------
	public function goodFriday() : string
	{
		return parent::goodFriday();
	}
	//------------------------------------------------------------------------
	public function getEasterMondayDetail()
	{
		return [
			'country'	=> 'CA',
			'observed'	=> true,
			'date'		=> $this->easterMonday(),
			'desc'		=> 'Easter Monday'
		];
	}
	//------------------------------------------------------------------------
	public function easterMonday() : string
	{
		return $this->sunMon( date( 'Y/m/d', easter_date( $this->year ) ) );
	}
	//------------------------------------------------------------------------
	public function getCivicHolidayDetail()
	{
		return [
			'country'	=> 'CA',
			'observed'	=> true,
			'date'		=> $this->civicHoliday(),
			'desc'		=> 'Civic Holiday'
		];
		
	}
	//------------------------------------------------------------------------
	public function civicHoliday() : string
	{
		return $this->dayOfWeekMonthYear( '1', 'monday', '08/01' );
	}
	//------------------------------------------------------------------------
	public function getLaborDayDetail()
	{
		return [
			'country'	=> 'CA',
			'observed'	=> true,
			'date'		=> $this->laborDay(),
			'desc'		=> 'Labor Day'
		];
	}
	//------------------------------------------------------------------------
	public function laborDay() : string
	{
		return $this->dayOfWeekMonthYear( '1', 'monday', '09/01' );
	}
	//------------------------------------------------------------------------
	public function getFamilyDayDetail()
	{
		return [
			'country'	=> 'CA',
			'observed'	=> true,
			'date'		=> $this->familyDay(),
			'desc'		=> 'Family Day'
		];
	}
	//------------------------------------------------------------------------
	public function familyDay() : string
	{
		return $this->dayOfWeekMonthYear( '3', 'mondays', '02/01' );
	}
	//------------------------------------------------------------------------
	public function getRemembranceDayDetail()
	{
		return [
			'country'	=> 'CA',
			'observed'	=> true,
			'date'		=> $this->remembranceDay(),
			'desc'		=> 'Remembrance Day'
		];
	}
	//------------------------------------------------------------------------
	public function remembranceDay() : string
	{
		return $this->satFriSunMon( $this->year . '/11/11' );
	}
	//------------------------------------------------------------------------
	public function getThanksgivingDayDetail()
	{
		return [
			'country'	=> 'CA',
			'observed'	=> true,
			'date'		=> $this->thanksgivingDay(),
			'desc'		=> 'Thanksgiving Day'
		];
	}
	//------------------------------------------------------------------------
	public function thanksgivingDay() : string
	{
		return $this->dayOfWeekMonthYear( '2', 'mondays', '10/01' );
	}
	//------------------------------------------------------------------------
	public function getChristmasDayDetail()
	{
		return [
			'country'	=> 'CA',
			'observed'	=> true,
			'date'		=> $this->christmasDay(),
			'desc'		=> 'Christmas Day'
		];
	}
	//------------------------------------------------------------------------
	public function christmasDay() : string
	{
		return $this->satFriSunMon( $this->year . '/12/25' );
	}
	//------------------------------------------------------------------------
	public function getCanadaDayDetail() : array
	{
		return [
			'country'	=> 'CA',
			'observed'	=> true,
			'date'		=> $this->canadaDay(),
			'desc'		=> 'Candada Day'
		];
	}
	//------------------------------------------------------------------------
	public function canadaDay() : string
	{
		return $this->satFriSunMon( $this->year . '/07/01' );
	}
	//------------------------------------------------------------------------
	public function getBoxingDayDetail()
	{
		return [
			'country'	=> 'CA',
			'observed'	=> true,
			'date'		=> $this->boxingDay(),
			'desc'		=> 'Boxing Day'
		];
	}
	//------------------------------------------------------------------------
	public function boxingDay() : string
	{
		$date = $this->year . '/12/26';

		$dow = date( 'w', strtotime( $date ) );

		if( $dow == 6 )
		{
			
			// or on a saturday, christmas was on a friday, but boxing day is on monday (+2 days)
			return $this->year . '/12/28';
		}

		if( $dow == 0 || $dow == 1 )
		{
			// on a sunday, christmas was on saturday - christmas observed observed on Friday, Boxing day on Monday (+1 day)
			// on a monday, christmas was on a sunday, return (+ 1 days)
			return $this->year . '/12/27';
		}

		return $date;
	}
	//------------------------------------------------------------------------
	public function getVictoriaDayDetail()
	{
		return [
			'country'	=> 'CA',
			'observed'	=> true,
			'date'		=> $this->victoriaDay(),
			'desc'		=> 'Victoria Day'
		];
	}
	//------------------------------------------------------------------------
	public function victoriaDay() : string
	{
		$ts = strtotime( 'last monday of may ' . $this->year );
		$day = date( 'd', $ts );
		if( $day < 25 )
		{
			return date( 'Y/m/d', $ts );
		}

		return $this->year . '/05/' . ($day-7);
	}
}