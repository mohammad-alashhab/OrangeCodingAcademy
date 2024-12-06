<?php
echo "<br>######### Question 1 #########";
echo '
<pre>
1. Write a PHP script to see if the specified year is a leap year or not. 
Sample Input: 2013 
Sample Output: ‘This year is not a leap year’
</pre>
';



echo "<br>######### Question 2 #########";
echo '
<pre>
2. Write a PHP script to check the season depending on the inserted temperature if the 
temperature is below 20, we are in winter otherwise the season is summer. 
Sample Input: 27 
Sample Output: ‘It is summertime!’ 
</pre>
';

$temp = 27;
if ($temp > 20) {
  echo "Summer"."<br>";
}
else
  echo "Winter"."<br>";






echo "<br>######### Question 3 #########";
echo '
<pre>
3. Write a PHP script to calculate the sum of the two integers. If the two values are the same, then 
calculate the triple of their sum. 
Sample Input: [ firstInteger  =>  2 , secondInteger => 2] 
Sample Output: ( 2 + 2 ) * 3 = 12 
Sample Output: ‘It is summertime!’
</pre>
';

$num1 = 2;
$num2 = 2;

if($num1 == $num2)
  echo ($num1*3)."<br>";
else
  echo $num1 + $num2."<br>";






echo "<br>######### Question 4 #########";
echo '
<pre>
4. Write PHP to check if the sum of the two given numbers equals 30, if the condition is true the 
return their sum otherwise return false 
Sample Input: [ firstInteger  =>  10 , secondInteger => 10] 
Sample Output: ‘false
</pre>
';

function is30($num1, $num2){
  if($num1 + $num2 == 30)
    return $num1 + $num2;
  else
    return false;
}

echo is30(10,10)."<br>";






echo "<br>######### Question 5 #########";
echo '
<pre>
5. Write in PHP script to check if the given positive number is a multiple of 3. 
Sample Input: number = 20 
Sample Output: ‘false’
</pre>
';

function isMultipleOf3($num){
  if($num % 3 == 0)
    return true;

  return false;
}

echo isMultipleOf3(20)."<br>";





echo "<br>######### Question 6 #########";
echo '
<pre>
6. Write a PHP script to check if the integer value is in the range of [20-50] inclusive.
</pre>
';


$num = 50;
if($num >= 20 && $num <= 50)
  echo true."<br>";
else
  echo false."<br>";






echo "<br>######### Question 7 #########";
echo '
<pre>
7. Write PHP script to find the largest number between the three integers 
Sample Input: [ 1, 5, 9 ] 
Sample Output: 9
</pre>
';

$num1 = 1;
$num2 = 5;
$num3 = 9;
$max = $num1;

if ($num2 >= $max && $num2 >= $num3){
  $max = $num2;
}
else if ($num3 > $max){
  $max = $num3;
}

echo "The max num = $max"."<br>";






echo "<br>######### Question 8 #########";
echo '
<pre>
8. Write PHP script to calculate the monthly electricity bill according to these rules

a. For first 50 units – 2.50 JOD/Unit 
b. For next 100 units – 5.00 JOD/Unit 
c. For next 100 units – 6.20 JOD/Unit 
d. For units above 250 – 7.50 JOD/Unit
</pre>
';

// $units = 200;

// if($units - 50 && $units > 0){
//   $num = $units - ($units - 50);
//   $units -= 50;

// }




echo "<br>######### Question 9 #########";
echo '
<pre>
9.  Write php script to make a calculator, the calculator should contain the four main operations  

e. Addition 
f. Subtraction 
g. Multiplication 
h. Division 
</pre>
';


$num1 = 5;
$num3 = 3;
$op = '+';

switch ($op) {
  case '+':
    echo $num1 + $num2."<br>";
    break;
  
  case '-':
    echo $num1 - $num2."<br>";
    break;
  
  case '*':
    echo $num1 * $num2."<br>";
    break;
  
  case '/':
    echo $num1 / $num2."<br>";
    break;
  
  default:
    echo "Undefined Operation."."<br>";
    break;
}






echo "<br>######### Question 10 #########";
echo '
<pre>
10. Write php script to check if a person is eligible to vote, minimum age required for voting is 18. 
 
Sample Input: 15 
Sample Output: ‘is no eligible to vote’ 
</pre>
';

$age = 15;
if($age >= 18)
  echo "is eligible to vote"."<br>";
else
  echo "is no eligible to vote"."<br>";





echo "<br>######### Question 11 #########";
echo '
<pre>
11. Write php script  to check whether a number is positive, negative or zero 
 
Sample Input: -60 
Sample Output: ‘Negative’
</pre>
';

$num = 15;
if($num > 0)
  echo "positive"."<br>";
else if ($num < 0)
  echo "negative"."<br>";
else
  echo "ZERO"."<br>";




echo "<br>######### Question 12 #########";
echo '
<pre>
12. Write a PHP to find the grade for the student, after calculating the average of his score in all the 
subject
</pre>
';


$mark = 99;

switch ($mark) {
  case $mark>=90 && $mark <=100:
    echo "A"."<br>";
    break;
  
  case $mark>=80 && $mark <90:
    echo "B"."<br>";
    break;
  
  case $mark>=70 && $mark <80:
    echo "C"."<br>";
    break;
  
  case $mark>=60 && $mark <70:
    echo "D"."<br>";
    break;
  
  default:
    echo "F"."<br>";
    break;
}