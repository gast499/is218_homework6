<html>
<head>
<title>PHP Tips and Tricks</title>
</head>
<body>
<?php
//trick1
echo '<h3>Functions with Arbitrary Numbers of Arguments:</h3><br>Normal function with 2 optional arguments:<br>';
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
?>
</body>
</html>