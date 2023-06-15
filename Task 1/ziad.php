<?php
$var = 'ziad';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>echo vs print</h1>
   <p>In PHP, `echo` and `print` are both language constructs that can be used to output strings and variables to the browser or to a file. Here's a comparison between `echo` and `print`:
<br>
1. Syntax:
`echo` is a language construct, which means that it does not require parentheses when used to output a string. Its syntax is simply `echo "string";`. In contrast, `print` is a function and requires parentheses when used to output a string. Its syntax is `print("string");`.
<br>
2. Return Value:
`echo` does not return a value, whereas `print` returns a value of 1. This means that `print` can be used as part of an expression, whereas `echo` cannot.
<br>
3. Speed:
In general, `echo` is faster than `print` because it is a language construct and does not require a function call. However, the difference in speed is usually negligible and is not a major factor in choosing between the two.
<br>
4. Usage:
Both `echo` and `print` can be used to output strings and variables, but `print` is typically used less frequently because it returns a value and has a slower performance than `echo`. `echo` is more commonly used because it is faster and does not return a value.
<br>
In summary, `echo` and `print` are both useful constructs for outputting strings and variables in PHP. `echo` is faster, simpler to use, and more commonly used, whereas `print` returns a value and is more suitable for use as part of an expression.</p>

<?php
echo $var;
echo '<br>';
print($var);
?>

</body>
</html>