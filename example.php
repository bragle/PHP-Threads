<?php

require(__DIR__ . '/threads.php');

$thread = new Thread;

$thread->set(function($number){

	echo $number . "\n";

});

$thread->spawn([0, 1, 2, 3, 4, 5, 6, 7, 8, 9]);

$thread->spawn(10);

$thread->spawn([11, 12]);

$thread->wait();

$thread->clear();

echo 'done';
