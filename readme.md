# SecureShuffle

A PHP library for reordering array elements using cryptographically-secure randomization.

## Installation

With [Composer](http://getcomposer.org) installed on your computer and initialized for your project, run this command in your project’s root directory:

```bash
composer require lamansky/secure-shuffle
```

Requires PHP 7.1 or above.

## Examples

The library makes 4 functions available for import. Here is an example with all four functions in use:

```php
<?php
use function Lamansky\SecureShuffle\shuffle;
use function Lamansky\SecureShuffle\shuffle_assoc;
use function Lamansky\SecureShuffle\shuffled;
use function Lamansky\SecureShuffle\shuffled_assoc;

// Shuffles an indexed array in-place.
// Note that we are using the imported shuffle() function,
// not the built-in \shuffle() function.
$arr = [1, 2, 3, 4, 5];
shuffle($arr);
print_r($arr); // Array ( [0] => 4 [1] => 5 [2] => 2 [3] => 1 [4] => 3 )

// Shuffles an associative array in-place.
$arr = ['a' => 1, 'b' => 2, 'c' => 3];
shuffle_assoc($arr);
print_r($arr); // Array ( [b] => 2 [a] => 1 [c] => 3 )

// Creates a shuffled copy of an indexed array.
$orig = [1, 2, 3, 4, 5];
$copy = shuffled($orig);
print_r($orig); // Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )
print_r($copy); // Array ( [0] => 5 [1] => 2 [2] => 4 [3] => 3 [4] => 1 )

// Creates a shuffled copy of an associative array.
$orig = ['a' => 1, 'b' => 2, 'c' => 3];
$copy = shuffled_assoc($orig);
print_r($orig); // Array ( [a] => 1 [b] => 2 [c] => 3 )
print_r($copy); // Array ( [c] => 3 [a] => 1 [b] => 2 )
```
