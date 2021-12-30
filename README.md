# bankHolidays
![Unit Tests](https://github.com/treehousetim/bankHolidays/workflows/Unit%20Tests/badge.svg)

Bank Holiday Date calculations in PHP for United States of America and Canada.

## Installing

`composer require treehousetim/bank-holidays`

## Canada
Canadian bank holidays are difficult to find authoritative information for.  I've done the best I can with current information.  Contact me if you find authoritative sources of the rules to follow (not just a list of dates). 

## United States
Not all holidays are observed as bank holidays in the United States.
If a holiday falls on a Saturday, it is not observed. If it falls on a Sunday it is observed on Monday.

## Getting Detail
Both `usa` and `canada` classes implement the following abstract methods.

```php
abstract public function getAsArray() : array;
abstract public function getObservedAsArray() : array;
```

The arrays returned by these methods are guaranteed (and enforced by unit tests) to contain the following array keys
`country`, `observed`, `date`, `desc`


### `getAsArray()`
This will return an array of all holiday date details regardless of whether or not they are observed by that country's banks.

### `getObservedAsArray()`
This will return all observed bank holidays for the year supplied to the library.

### `get[HolidayName]Detail()`
This will return a single holiday's detail array described above.


```php
<?php

$year = 2021;
$bankHolidayCalc = new \treehousetim\bankHolidays\usa( $year );
$info = $bankHolidayCalc->getChristmasDayDetail();

if( $info['observed'] )
{
	echo 'In ' . $year . ', Christmas Day is not a bank holiday';
}
else
{
	echo 'In ' . $year . ', Christmas Day is a bank holiday and is observed on ' . $info['date'];
}
?>
```

**Output for `$year = 2021;`**

`In 2021, Christmas Day is not a bank holiday`

**Output for `$year = 2022;`**

`In 2022, Christmas Day is a bank holiday and is observed on 2022/12/26`

## General Usage
```php
<?php

$bankHolidayCA = new \treehousetim\bankHolidays\canada( 2019 );
$date = $bankHolidayCA->familyDay();
echo $date;

$bankHolidayUS = new \treehousetim\bankHolidays\usa( 2019 );
$date = $bankHolidayUS->christmasDay();
echo $date;

?>
```

## Testing
If you have cloned this repo, you can run the tests.
There are no dependencies, but PHPUnit is installed with composer.

1. `composer install`
2. `composer test`

