# bankHolidays
Bank Holiday Date calculations in PHP for United States of America and Canada.

## Note
Canadian bank holidays are difficult to find authoritative information for.  I've done the best I can with current information.  Contact me if you find authoritative sources of the rules to follow (not just a list of dates). 


## Usage

`composer require treehousetim/bank-holidays`

```
<?php

$bankHolidayCalc = new \treehousetim\bankHolidays\canada( 2019 );
$date = $bankHolidayCalc->familyDay();

echo $date;

?>
```

## Testing
If you have cloned this repo, you can run the tests.
There are no dependencies, but PHPUnit is installed with composer.

1. `composer install`
2. `./vendor/bin/phpunit --bootstrap vendor/autoload.php test`
