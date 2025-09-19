$ ./vendor/bin/phpunit --testdox tests
PHPUnit 12.3.11 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.4.0

...                                                                 3 / 3 (100%)

Time: 00:00.007, Memory: 6.00 MB

Sorted Linked List
✔ Insert and order with integers
✔ Insert and order with strings
✔ Throws on mixed types

OK (3 tests, 4 assertions)

$ ./vendor/bin/phpstan analyse src tests --level=max
3/3 [============================] 100%



[OK] No errors

$ ./vendor/bin/phpcs src tests
Time: 219ms; Memory: 6MB


