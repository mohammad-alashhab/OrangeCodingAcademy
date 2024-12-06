<?php
echo "<br>######### Question 1 #########";
echo '
<pre>
1. Write a PHP script to check if the inserted number is a prime number

Sample Input:  3
Expected Output: 3 is a prime number
</pre>
';

function is_prime($num){

  if ($num < 1)
    echo "The number must be positive."."<br>";
  else if ($num == 1 || $num == 2)
    return true;


  $mid = ceil($num / 2);

  for ($i=2; $num%$i != 0; $i++) { 
    
    if ($i == $mid)
      return true;
  }


  return false;
}


$num = 13;
if (is_prime($num)){
  echo "$num is a prime number."."<br>";
}
else
  echo "$num isn't a prime number."."<br>";





echo "<br>######### Question 2 #########";
echo '
<pre>
2. Write a PHP script to reverse a string

Sample Input:  remove 
Expected Output: evomer
</pre>
';


function revers($str){
  for ($i=strlen($str)-1; $i >= 0; $i--) { 
    echo $str[$i];
  }
}

revers("Belal");





echo "<br>######### Question 3 #########";
echo '
<pre>
3.  Write a PHP script to check if the all string characters are lower cases 

Sample Input:  remove 
Expected Output: Your String is Ok
</pre>
';




function islower($str){
  for ($i=0; $i < strlen($str); $i++) { 
    if($str[$i] != strtolower($str[$i])){
      return false;
    }
  }
  return true;
}

if (islower("belal"))
  echo "Your string is OK.";
else
  echo "Your string isn't OK.";





echo "<br>######### Question 4 #########";
echo '
<pre>
4. Write a PHP function to swap to variables? 

Sample Input:  x = 12     y= 10 
Expected Output: y=12   x=10
</pre>
';

function swap(&$num1, &$num2){
  $temp = $num1;
  $num1 = $num2;
  $num2 = $temp;
}

$num1 = 3;
$num2 = 5;

echo "$num1 $num2<br>";
swap($num1, $num2);
echo "$num1 $num2<br>";






echo "<br>######### Question 5 #########";
echo '
<pre>
5. Write a PHP function to swap to variables? 

Sample Input:  x = 12     y= 10 
Expected Output: y=12   x=10
</pre>
';



$num1 = 3;
$num2 = 5;

echo "$num1 $num2<br>";
swap($num1, $num2);
echo "$num1 $num2<br>";







echo "<br>######### Question 6 #########";
echo '
<pre>
6. Write a PHP function to check if a number is an Armstrong number or not ?
**Armstrong number is a number that is equal to the sum of cubes of its digits.

Sample Input:  407
Expected Output: 407 is Armstrong Number
</pre>
';


function is_armstrong($num){
  $sum = 0;
  

  while($num != 0){
    $sum += pow($num%10, 3);
    $num = $num / 10;
  }

  echo $sum ;
}


// is_armstrong(407);





echo "<br>######### Question 7 #########";
echo '
<pre>
7. Write a PHP function that checks whether a passed string is a palindrome or not? 
Sample Input:  Eva, can I see bees in a cave? 
Expected Output: Yes it is a palindrome
</pre>
';





echo "<br>######### Question 8 #########";
echo '
<pre>
8. Write a PHP function to remove duplicates from an array ? 

Sample Input:
$array1 = array(2, 4, 7, 4, 8, 4);

Expected Output: 
$array1 = array(2, 4, 7, 8);
</pre>
';

function remove_duplicates($numbers){
  $cleaned_array = [];

  foreach ($numbers as $num) {
    if(!in_array($num, $cleaned_array))
      array_push($cleaned_array, $num);
  }

  return $cleaned_array;
}


$numbers = array(2, 4, 7, 4, 8, 4);
var_dump(remove_duplicates($numbers));