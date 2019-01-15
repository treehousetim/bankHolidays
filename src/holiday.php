<?php namespace treehousetim\bankHolidays;

class holiday
{
	protected $year = null;

	public function __construct( $year = null )
	{
		if( intval( $year ) != $year )
		{
			throw new \Exception( 'Year must be an integer' );
		}

		$this->year = (int)$year;
	}
	//------------------------------------------------------------------------
	public function newYearsDay() : string
	{
		return $this->satFriSunMon( $this->year . '/01/01' );
	}
	//------------------------------------------------------------------------
	public function goodFriday() : string
	{
		return date( 'Y/m/d', strtotime( $this->easterDay() . ' - 2 days' ) );
	}
	//------------------------------------------------------------------------
	public function easterDay() : string
	{
		return date( 'Y/m/d', easter_date( $this->year ) );
	}
	//------------------------------------------------------------------------
	public function christmasDay() : string
	{
		return $this->satFriSunMon( $this->year . '/12/25' );
	}
	//------------------------------------------------------------------------
	public function year( $year ) : holiday
	{
		if( $this->year === null )
		{
			$this->year = $year;
			return $this;
		}

		$class = get_class( $this );
		return new $class( $year );
	}
	//------------------------------------------------------------------------
	public function getYear() : int
	{
		return $this->year;
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
		$ret = date( 'Y/m/d', strtotime( $time ) );
		return $ret;
	}
}