<?php namespace treehousetim\bankHolidays;

class usa extends holiday
{
	public function newYear()
	{
		return $this->satFriSunMon( $this->year . '/01/01' );
	}
	//------------------------------------------------------------------------
	public function martinLutherKingJrDay()
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
	public function presidentsDay()
	{
		return $this->dayOfWeekMonthYear( '3', 'mondays', '02/01' );
	}
	//------------------------------------------------------------------------
	public function memorialDay()
	{
		return date( 'Y/m/d', strtotime( 'last monday of may ' . $this->year ) );
	}
	//------------------------------------------------------------------------
	public function independenceDay()
	{
		return $this->satFriSunMon( $this->year . '/07/04' );
	}
	//------------------------------------------------------------------------
	public function laborDay()
	{
		return $this->dayOfWeekMonthYear( '1', 'monday', '09/01' );
	}
	//------------------------------------------------------------------------
	public function columbusDay()
	{
		return $this->dayOfWeekMonthYear( '2', 'mondays', '10/01' );
	}
	//------------------------------------------------------------------------
	public function veteransDay()
	{
		return $this->satFriSunMon( $this->year . '/11/11' );
	}
	//------------------------------------------------------------------------
	public function thanksgivingDay()
	{
		return $this->dayOfWeekMonthYear( '4', 'thursdays', '11/01' );
	}
}