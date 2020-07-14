<?php

require_once __DIR__ . '/functions.php';

$true = true;
$false = false;
$int = 5;
$float = 3.7;
$null = null;

$string = 'Hallo\n'; // Simple quotes
$name = 'John';
$interpolatedString = "\n"; // Double quotes
$greeting = "Hallo $name";
$greeting2 = 'Hallo $name';

$array = [1, 2, 3];

var_dump($array);

$associativeArray = [
    'name' => 'John',
    'age' => 18
];

var_dump($associativeArray);

$users = [
    0 => [
        'username' => 'jdoe',
        'age'  => 17
    ],
    1 => [
        'username' => 'rroe',
        'age'  => 23
    ]
];

var_dump($users);

$age = 17;

if ($age >= 18) {
    echo "Das ist wahr!\n";
} else {
    echo "Da ist falsch!\n";
}

// Math

$a = 5;
$b = 7;

$sum = $a + $b;
$sub = $a - $b;
$mul = $a * $b;
$div = $a / $b;

// Comparisons

$isLower = $a < 10;
$isBigger = $a > 10;
$isLowerEquals = $a <= 5;
$isBiggerEquals = $b >= 10;

$looseEquals = $a == 5;
$looseEquals = $a == '5';
$strictEquals = $a === '5';

// Loops

for ($i = 0; $i < 10; $i++) {

}

$i = 0;

do {
    $i++;
} while ($i < 10);

$i = 0;

while ($i < 10) {
    $i++;
}
// Functions

$users = [
    [
        'username' => 'jdoe',
        'age'  => 17
    ],
    [
        'username' => 'rroe',
        'age'  => 23
    ]
];

$age = getAge($users, 'rroe');

var_dump($age);
