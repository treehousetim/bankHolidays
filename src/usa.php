<?php namespace treehousetim\bankHolidays;

class usa extends holiday
{
	public function getAsArray() : array
	{
		$this->mustHaveYear();
		$dates = [];

		$dates[] = $this->getNewYearsDetail();
		$dates[] = $this->getMLKDayDetail();
		$dates[] = $this->getPresidentsDayDetail();
		$dates[] = $this->getMemorialDayDetail();
		$dates[] = $this->getJuneteenthDetail();
		$dates[] = $this->getIndependenceDayDetail();
		$dates[] = $this->getLaborDayDetail();
		$dates[] = $this->getColumbusDayDetail();
		$dates[] = $this->getVeteransDayDetail();
		$dates[] = $this->getThanksgivingDayDetail();
		$dates[] = $this->getChristmasDayDetail();

		return $dates;
	}
	//------------------------------------------------------------------------
	public function getObservedAsArray() : array
	{
		$this->mustHaveYear();

		$ar = $this->getAsArray();
		$dates = [];

		foreach( $ar as $item )
		{
			if( $item['observed'] )
			{
				$dates[] = $item;
			}
		}

		return $dates;
	}
	//------------------------------------------------------------------------
	public function getNewYearsDetail() : array
	{
		$this->mustHaveYear();

		return [
			'country'	=> 'US',
			'observed'	=> $this->isSat( $this->newYearsDay() ) == false,
			'date'		=> $this->newYearsDay(),
			'desc'		=> 'New Year\'s Day'
		];
	}
	//------------------------------------------------------------------------
	public function newYearsDay() : string
	{
		return $this->sunMon( $this->year . '/01/01' );
	}
	//------------------------------------------------------------------------
	public function getMLKDayDetail() : array
	{
		$this->mustHaveYear();

		return [
			'country'	=> 'US',
			'observed'	=> true,
			'date'		=> $this->martinLutherKingJrDay(),
			'desc'		=> 'Martin Luther King Jr Day'
		];
	}
	//------------------------------------------------------------------------
	public function martinLutherKingJrDay() : string
	{
		// wikipedia: "It was officially observed in all 50 states for the first time in 2000."
		// google doesn't return dates < 2000 for MLK Jr day.

		if( $this->year < 2000 )
		{
			throw new \Exception( 'Invalid Year, must be >= 2000' );
		}

		return $this->dayOfWeekMonthYear( '3', 'mondays', '01/01' );
	}
	//------------------------------------------------------------------------
	public function getPresidentsDayDetail() : array
	{
		if( $this->year === null )
		{
			throw new \Exception( 'You must set year before getting an array' );
		}

		return [
			'country'	=> 'US',
			'observed'	=> true,
			'date'		=> $this->presidentsDay(),
			'desc'		=> 'Presidents Day'
		];
	}
	//------------------------------------------------------------------------
	public function presidentsDay() : string
	{
		return $this->dayOfWeekMonthYear( '3', 'mondays', '02/01' );
	}
	//------------------------------------------------------------------------
	public function getMemorialDayDetail() : array
	{
		$this->mustHaveYear();

		return [
			'country'	=> 'US',
			'observed'	=> true,
			'date'		=> $this->memorialDay(),
			'desc'		=> 'Memorial Day'
		];
	}
	//------------------------------------------------------------------------
	public function memorialDay() : string
	{
		return date( 'Y/m/d', strtotime( 'last monday of may ' . $this->year ) );
	}
	//------------------------------------------------------------------------
	public function getJuneteenthDetail() : array
	{
		$this->mustHaveYear();

		return [
			'country'	=> 'US',
			'observed'	=> $this->isSat( $this->juneteenth() ) == false,
			'date'		=> $this->juneteenth(),
			'desc'		=> 'Juneteenth'
		];
	}
	//------------------------------------------------------------------------
	public function juneteenth() : string
	{
		// https://en.wikipedia.org/wiki/Juneteenth
		// wikipedia: "The day was recognized as a federal holiday on June 17, 2021"

		if( $this->year < 2021 )
		{
			throw new \Exception( 'Invalid Year, must be >= 2021' );
		}

		// we use sunMon because Saturday dates are not observed and we will just return 06/19 for Saturday
		return $this->sunMon( $this->year . '/06/19' );
	}
	//------------------------------------------------------------------------
	public function getIndependenceDayDetail() : array
	{
		$this->mustHaveYear();

		return [
			'country'	=> 'US',
			'observed'	=> $this->isSat( $this->independenceDay() ) == false,
			'date'		=> $this->independenceDay(),
			'desc'		=> 'Independence Day'
		];
	}
	//------------------------------------------------------------------------
	public function independenceDay() : string
	{
		return $this->sunMon( $this->year . '/07/04' );
	}
	//------------------------------------------------------------------------
	public function getLaborDayDetail() : array
	{
		$this->mustHaveYear();

		return [
			'country'	=> 'US',
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
	public function getColumbusDayDetail() : array
	{
		$this->mustHaveYear();

		return [
			'country'	=> 'US',
			'observed'	=> true,
			'date'		=> $this->columbusDay(),
			'desc'		=> 'Columbus Day'
		];
	}
	//------------------------------------------------------------------------
	public function columbusDay() : string
	{
		return $this->dayOfWeekMonthYear( '2', 'mondays', '10/01' );
	}
	//------------------------------------------------------------------------
	public function getVeteransDayDetail() : array
	{
		$this->mustHaveYear();

		return [
			'country'	=> 'US',
			'observed'	=> $this->isSat( $this->veteransDay() ) == false,
			'date'		=> $this->veteransDay(),
			'desc'		=> 'Veterans Day'
		];
	}
	//------------------------------------------------------------------------
	public function veteransDay() : string
	{
		return $this->sunMon( $this->year . '/11/11' );
	}
	//------------------------------------------------------------------------
	public function getThanksgivingDayDetail() : array
	{
		$this->mustHaveYear();

		return [
			'country'	=> 'US',
			'observed'	=> true,
			'date'		=> $this->thanksgivingDay(),
			'desc'		=> 'Thanksgiving Day'
		];
	}
	//------------------------------------------------------------------------
	public function thanksgivingDay() : string
	{
		return $this->dayOfWeekMonthYear( '4', 'thursdays', '11/01' );
	}
	//------------------------------------------------------------------------
	public function getChristmasDayDetail() : array
	{
		$this->mustHaveYear();

		return [
			'country'	=> 'US',
			'observed'	=> $this->isSat( $this->christmasDay() ) == false,
			'date'		=> $this->christmasDay(),
			'desc'		=> 'Christmas Day'
		];
	}
	//------------------------------------------------------------------------
	public function christmasDay() : string
	{
		// we use sunMon because Saturday dates are not observed and we will just return 12/25 for Saturday
		return $this->sunMon( $this->year . '/12/25' );
	}
}