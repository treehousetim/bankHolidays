<?php namespace treehousetim\bankHolidays;

class usa extends holiday
{
	public function getAsArray() : array
	{
		if( $this->year === null )
		{
			throw new \Exception( 'You must set year before getting an array' );
		}

		$dates[] = [
			'country'	=> 'US',
			'date'		=> $this->newYearsDay(),
			'desc'		=> 'New Year\'s Day' ];

		$dates[] = [
			'country'	=> 'US',
			'date'		=> $this->martinLutherKingJrDay(),
			'desc'		=> 'Martin Luther King Jr Day' ];

		$dates[] = [
			'country'	=> 'US',
			'date'		=> $this->presidentsDay(),
			'desc'		=> 'Presidents Day' ];

		$dates[] = [
			'country'	=> 'US',
			'date'		=> $this->memorialDay(),
			'desc'		=> 'Memorial Day' ];

		$dates[] = [
			'country'	=> 'US',
			'date'		=> $this->independenceDay(),
			'desc'		=> 'Independence Day' ];

		$dates[] = [
			'country'	=> 'US',
			'date'		=> $this->laborDay(),
			'desc'		=> 'Labor Day' ];

		$dates[] = [
			'country'	=> 'US',
			'date'		=> $this->columbusDay(),
			'desc'		=> 'Columbus Day' ];

		$dates[] = [
			'country'	=> 'US',
			'date'		=> $this->veteransDay(),
			'desc'		=> 'Veterans Day' ];

		$dates[] = [
			'country'	=> 'US',
			'date'		=> $this->thanksgivingDay(),
			'desc'		=> 'Thanksgiving Day' ];

		$dates[] = [
			'country'	=> 'US',
			'date'		=> $this->christmasDay(),
			'desc'		=> 'Christmas Day' ];

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
	public function presidentsDay() : string
	{
		return $this->dayOfWeekMonthYear( '3', 'mondays', '02/01' );
	}
	//------------------------------------------------------------------------
	public function memorialDay() : string
	{
		return date( 'Y/m/d', strtotime( 'last monday of may ' . $this->year ) );
	}
	//------------------------------------------------------------------------
	public function independenceDay() : string
	{
		return $this->satFriSunMon( $this->year . '/07/04' );
	}
	//------------------------------------------------------------------------
	public function laborDay() : string
	{
		return $this->dayOfWeekMonthYear( '1', 'monday', '09/01' );
	}
	//------------------------------------------------------------------------
	public function columbusDay() : string
	{
		return $this->dayOfWeekMonthYear( '2', 'mondays', '10/01' );
	}
	//------------------------------------------------------------------------
	public function veteransDay() : string
	{
		return $this->satFriSunMon( $this->year . '/11/11' );
	}
	//------------------------------------------------------------------------
	public function thanksgivingDay() : string
	{
		return $this->dayOfWeekMonthYear( '4', 'thursdays', '11/01' );
	}
}