# bankHolidays
![Unit Tests](https://github.com/treehousetim/bankHolidays/workflows/Unit%20Tests/badge.svg)

## Current Version

1.0.4

Bank Holiday Date calculations in PHP for United States of America and Canada.

## Installing

`composer require treehousetim/bank-holidays`

## Canada
Canadian bank holidays are difficult to find authoritative information for.  I've done the best I can with current information.  Open an issue if you find authoritative sources of the rules to follow (not just a list of dates). 

### List of Canadian Bank Holidays
* New Year's Day;
* Family Day;
* Good Friday;
* Easter Monday;
* Victoria Day;
* Canada Day;
* Civic Holiday;
* Labor Day;
* Thanksgiving Day;
* Remembrance Day;
* Christmas Day;
* Boxing Day;

## United States
Not all holidays are observed as bank holidays in the United States.
If a holiday falls on a Saturday, it is not observed. If it falls on a Sunday it is observed on Monday.

### List of US Bank Holidays

* New Year's Day
* Martin Luther King Jr. Day
* Presidents' Day
* Memorial Day
* Juneteenth
* Independence Day
* Labor Day
* Columbus Day
* Veterans Day
* Thanksgiving Day
* Christmas Day


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



## Library - How to use

### Countries

Instantiate the country class as you need.

```php
$usa = new \treehousetim\bankHolidays\usa();
$ca =  new \treehousetim\bankHolidays\canada();
```

## Detail Array

There are two ways to get data out of the class.

Detail Arrays

```php
[
	'country'	=> 'US|CA',
	'observed'	=> true|false,
	'date'		=> String Value,
	'desc'		=> String Description
];
```

Date Strings


## Useful Functions

Get all dates as an array

`->getAsArray()`

Gets only observed bank holidays

`->getObservedAsArray()`


### US functions

```php
->getNewYearsDetail() : array
->newYearsDay() : string
->getMLKDayDetail() : array
->martinLutherKingJrDay() : string
->getPresidentsDayDetail() : array
->presidentsDay() : string
->getMemorialDayDetail() : array
->memorialDay() : string
->getJuneteenthDetail() : array
->juneteenth() : string
->getIndependenceDayDetail() : array
->independenceDay() : string
->getLaborDayDetail() : array
->laborDay() : string
->getColumbusDayDetail() : array
->columbusDay() : string
->getVeteransDayDetail() : array
->veteransDay() : string
->getThanksgivingDayDetail() : array
->thanksgivingDay() : string
->getChristmasDayDetail() : array
->christmasDay() : string
```

## CA Functions

```php
->getNewYearsDetail()
->newYearsDay() : string
->getGoodFridayDetail()
->goodFriday() : string
->getEasterMondayDetail()
->easterMonday() : string
->getCivicHolidayDetail()
->civicHoliday() : string
->getLaborDayDetail()
->laborDay() : string
->getFamilyDayDetail()
->familyDay() : string
->getRemembranceDayDetail()
->remembranceDay() : string
->getThanksgivingDayDetail()
->thanksgivingDay() : string
->getChristmasDayDetail()
->christmasDay() : string
->getCanadaDayDetail() : array
->canadaDay() : string
->getBoxingDayDetail()
->boxingDay() : string
->getVictoriaDayDetail()
->victoriaDay() : string
```
