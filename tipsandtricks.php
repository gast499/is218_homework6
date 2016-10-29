<html>
<head>
<title>PHP Tips and Tricks</title>
</head>
<body>
<?php
//trick1
echo '<h3>1:  Functions with Arbitrary Numbers of Arguments:</h3><br>Normal function with 2 optional arguments:<br>';
// function with 2 optional arguments
function foo($arg1 = '', $arg2 = '') {
 
    echo "arg1: $arg1" . '<br>';
    echo "arg2: $arg2" . '<br>';
 
}
 
echo 'When 2 arguments, (hello and world), are passed to the function, the function prints:<br>';
foo('hello','world');
/* prints:
arg1: hello
arg2: world
*/

echo '<br>When no arguments are passed to the function, the function prints:<br>';
foo();
/* prints:
arg1:
arg2:
*/

//function using arbitrary numbers of arguments
echo '<br><br><b>Using the func_get_args() method allows us to accept arbitrary numbers of arguments:</b><br>';
function foo2() {
 
    // returns an array of all passed arguments
    $args = func_get_args();
 
    foreach ($args as $k => $v) {
        echo "arg".($k+1).": $v" . '<br>';
    }
 
}

echo '<br>When no arguments are passed the function prints: ';
foo2();
/* prints nothing */

echo '<br><br>When one argument, (hello), is passed, the function prints: ';
foo2('hello');
/* prints
arg1: hello
*/

echo '<br>When three arguments are passed, (hello, world, again), the function prints: <br>';
foo2('hello', 'world', 'again');
/* prints
arg1: hello
arg2: world
arg3: again
*/

//trick2
echo '<h3>2:  Using GLOB to find files:</h3><br>';
// get all php files
echo 'The GLOB function allows you to find files.  For example, by passing the argument, (*.php), the function returns an array of all the php files in the directory.<br>';
$files = glob('*.php');
 
print_r($files);
/* output looks like:
Array
(
    [0] => tipsandtricks.php
)
*/

//trick3
echo '<h3>3:  Using memory_get_usage() to find out how much memory my program is using:</h3>';
echo "Initially, my program uses ".memory_get_usage()." bytes." . '<br>';
echo 'Now, I am going to use up some more memory by creating an array with 100000 values.<br>';
 
// let's use up some memory
for ($i = 0; $i < 100000; $i++) {
    $array []= md5($i);
}
echo 'The new memory usage value is: ' . memory_get_usage(). ' bytes.<br>  Now, I will remove half of the array.';
// let's remove half of the array
for ($i = 0; $i < 100000; $i++) {
    unset($array[$i]);
}
echo '<br>This final memory usage value is now ' . memory_get_usage() . ' bytes.<br>';
echo '<br>The memory_get_peak_usage() method tells you the most memory your program has used.<br>';
echo 'The peak memory usage for our program is ' . memory_get_peak_usage() . ' bytes.';

//trick4
echo '<h3>4:  Using getrusage() to determine CPU usage information:</h3>';
echo 'This program will keep calling a function (microtime) for roughly 3 seconds.<br>';
$start = microtime(true);
// keep calling microtime for about 3 seconds
while(microtime(true) - $start < 3) {
 
}
 
$data = getrusage();
echo "User time: ".
    ($data['ru_utime.tv_sec'] +
    $data['ru_utime.tv_usec'] / 1000000);
echo "<br>System time: ".
    ($data['ru_stime.tv_sec'] +
    $data['ru_stime.tv_usec'] / 1000000);

?>
</body>
</html>