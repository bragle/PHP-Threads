# PHP-Threads
A simple class for creating threads in PHP

How it works:
```php
// create a new thread class
$threads = new Threads;

// create a new function that these threads should run
$threads->set(function($number){echo $number . "\n";});

// create 10 threads with param 0 to 9
$threads->spawn([0, 1, 2, 3, 4, 5, 6, 7, 8, 9]);

// create another thread with param 10
$threads->spawn(10);

// wait for threads to finish running. code below this function will not run till all threads are finished
$threads->wait();

// clear function set in set function. will call wait first so this is also a blocking function
$threads->clear();

// sample code (will be executed after all threads have exited)
echo 'done';
```
