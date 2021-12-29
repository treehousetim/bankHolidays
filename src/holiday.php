<?php namespace treehousetim\bankHolidays;

abstract class holiday
{
	protected $year = null;

	abstract public function getAsArray() : array;
	abstract public function getObservedAsArray() : array;

	public function __construct( $year = null )
	{
		if( intval( $year ) != $year )
		{
			throw new \Exception( 'Year must be an integer' );
		}

		$this->year = (int)$year;
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
	public function mustHaveYear()
	{
		if( $this->year === null )
		{
			throw new \Exception( 'Year cannot be null' );
		}
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
		if( $this->isSun( $date ) )
		{
			// on a sunday, observe on monday after
			$date = date( 'Y/m/d', strtotime( $date . ' +1 day' ) );
			
		}
		elseif( $this->isSat( $date ) )
		{
			// on a saturday, observe on friday before
			$date = date( 'Y/m/d', strtotime( $date . ' -1 day' ) );
			
		}

		return $date;
	}
	//------------------------------------------------------------------------
	public function sunMon( $date ) : string
	{
		if( $this->isSun( $date ) )
		{
			// on a sunday, observe on monday after
			$date = date( 'Y/m/d', strtotime( $date . ' +1 day' ) );
		}

		return $date;
	}
	//------------------------------------------------------------------------
	public function isSun( $date ) : bool
	{
		return  date( 'w', strtotime( $date ) ) == 0;
	}
	//------------------------------------------------------------------------
	public function isSat( $date ) : bool
	{
		return date( 'w', strtotime( $date ) ) == 6;
	}
	//------------------------------------------------------------------------
	public function dayOfWeekMonthYear( $day, $weekday, $month ) : string
	{
		$time = $day . ' ' . $weekday . ' ' . $this->year . '/' . $month;
		$ret = date( 'Y/m/d', strtotime( $time ) );
		return $ret;
	}
}