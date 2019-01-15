<?php namespace treehousetim\bankHolidays;

class canada extends holiday
{
	public function getAsArray() : array
	{
		if( $this->year === null )
		{
			throw new \Exception( 'You must set year before getting an array' );
		}

		$dates[] = [
			'country'	=> 'CA',
			'date'		=> $this->newYearDay(),
			'desc'		=> 'New Year\'s Day' ];

		$dates[] = [
			'country'	=> 'CA',
			'date'		=> $this->familyDay(),
			'desc'		=> 'Family Day' ];

		$dates[] = [
			'country'	=> 'CA',
			'date'		=> $this->goodFriday(),
			'desc'		=> 'Good Friday' ];

		$dates[] = [
			'country'	=> 'CA',
			'date'		=> $this->victoriaDay(),
			'desc'		=> 'Victoria Day' ];

		$dates[] = [
			'country'	=> 'CA',
			'date'		=> $this->canadaDay(),
			'desc'		=> 'Candada Day' ];

		$dates[] = [
			'country'	=> 'CA',
			'date'		=> $this->civicHoliday(),
			'desc'		=> 'Civic Holiday' ];

		$dates[] = [
			'country'	=> 'CA',
			'date'		=> $this->laborDay(),
			'desc'		=> 'Labor Day' ];

		$dates[] = [
			'country'	=> 'CA',
			'date'		=> $this->thanksgivingDay(),
			'desc'		=> 'Thanksgiving Day' ];

		$dates[] = [
			'country'	=> 'CA',
			'date'		=> $this->remembranceDay(),
			'desc'		=> 'Remembrance Day' ];

		$dates[] = [
			'country'	=> 'CA',
			'date'		=> $this->christmasDay(),
			'desc'		=> 'Christmas Day' ];

		$dates[] = [
			'country'	=> 'CA',
			'date'		=> $this->boxingDay(),
			'desc'		=> 'Boxing Day' ];

		return $dates;
	}
	//------------------------------------------------------------------------
	public function memorialDay() : string
	{
		return date( 'Y/m/d', strtotime( 'last monday of may ' . $this->year ) );
	}
	//------------------------------------------------------------------------
	public function civicHoliday() : string
	{
		return $this->dayOfWeekMonthYear( '1', 'monday', '08/01' );
	}
	//------------------------------------------------------------------------
	public function laborDay() : string
	{
		return $this->dayOfWeekMonthYear( '1', 'monday', '09/01' );
	}
	//------------------------------------------------------------------------
	public function familyDay() : string
	{
		return $this->dayOfWeekMonthYear( '3', 'mondays', '02/01' );
	}
	//------------------------------------------------------------------------
	public function remembranceDay() : string
	{
		return $this->satFriSunMon( $this->year . '/11/11' );
	}
	//------------------------------------------------------------------------
	public function thanksgivingDay() : string
	{
		return $this->dayOfWeekMonthYear( '2', 'mondays', '10/01' );
	}
	//------------------------------------------------------------------------
	public function christmasDay() : string
	{
		return $this->satFriSunMon( $this->year . '/12/25' );
	}

	//------------------------------------------------------------------------
	public function canadaDay() : string
	{
		return $this->satFriSunMon( $this->year . '/07/01' );
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
	//------------------------------------------------------------------------
	public function satFriSunMon( $date ) : string
	{
		$dow = date( 'w', strtotime( $date ) );

		if( $dow == 0 )
		{
			// on a sunday, observe on monday after
			$date = date( 'Y/m/d', strtotime( $date . ' +1 day' ) );
			
		}
		elseif( $dow == 6 )
		{
			// on a saturday, observe on friday before
			$date = date( 'Y/m/d', strtotime( $date . ' -1 day' ) );
			
		}

		return $date;
	}
	//------------------------------------------------------------------------
	public function dayOfWeekMonthYear( $day, $weekday, $month ) : string
	{
		$time = $day . ' ' . $weekday . ' ' . $this->year . '/' . $month;
		//echo $time . PHP_EOL;
		$ret = date( 'Y/m/d', strtotime( $time ) );
		//echo $ret . PHP_EOL . PHP_EOL;
		return $ret;
	}
}