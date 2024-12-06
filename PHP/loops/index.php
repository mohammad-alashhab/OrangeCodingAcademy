<?php
echo "<br>######### Question 1 #########";
echo "
<pre>
1. Create a script that displays 1-2-3-4-5-6-7-8-9-10 on one line. There will be no dash (-) at the 
start and end position.
Expected Output: 1-2-3-4-5-6-7-8-9-10
</pre>
";


for ($i=1; $i <= 10; $i++) { 
  if($i == 10){
    echo $i;
    break;
  }

  echo $i . "-";
}




echo "<br>######### Question 2 #########";
echo "
<pre>
2. Create a script using a for loop to add all the integers between 0 and 30 and display the total.  

Expected Output:  total as a number
</pre>
";

$sum = 0;
for ($i=0; $i < 30; $i++) { 
  echo "$i ";
  $sum += $i;
}

echo "<br>The sum = $sum<br>";




echo "<br>######### Question 3 #########";
echo "
<pre>
3. Create a script to generate the following pattern, using the nested for loop.  

Expected Output: 

A A A A A
A A A B B
A A C C C
A D D D D
E E E E E
</pre>
";



$letters = ["A", "B", "C", "D", "E"];

for ($i=0; $i < count($letters); $i++) { 
  for ($k=1; $k <= 5; $k++) { 
    if(count($letters) - $i <= $k)
      echo $letters[$i] ." ";
    else
      echo $letters[0] ." ";
  }

  echo "<br>";
}





echo "<br>######### Question 4 #########";
echo "
<pre>
4. Create a script to generate the following pattern, using the nested for loop.  

Expected Output:

1 1 1 1 1
1 1 1 2 2
1 1 3 3 3
1 4 4 4 4
5 5 5 5 5
</pre>
";



$nums = [1, 2, 3, 4, 5];

for ($i=0; $i < count($nums); $i++) { 
  for ($k=1; $k <= 5; $k++) { 
    if(count($nums) - $i <= $k)
      echo $nums[$i] ." ";
    else
      echo $nums[0] ." ";
  }

  echo "<br>";
}






echo "<br>######### Question 5 #########";
echo "
<pre>
5. Create a script to generate the following pattern, using the nested for loop.  

Expected Output: 

1 0 0 0 0
0 2 0 0 0
0 0 3 0 0
0 0 0 4 0
0 0 0 0 5
</pre>
";



for ($i=1; $i <= count($nums); $i++) { 
  for ($k=1; $k <= 5; $k++) { 
    if($i == $k)
      echo $i ." ";
    else
      echo 0 ." ";
  }

  echo "<br>";
}





echo "<br>######### Question 6 #########";
echo "
<pre>
6. Write a program to calculate and print the factorial of a number using a for loop. The factorial of 
a number is the product of all integers up to and including that number. 

Sample Input: 5 
Expected Output: 120

</pre>
";
$fact = 5;
$result = 1;
for ($i=2; $i <= $fact; $i++) { 
  $result *= $i;
}

echo "The factorial of $fact = $result.<br>";






echo "<br>######### Question 7 #########";
echo "
<pre>
7. Write a program to calculate and print the Fibonacci sequence using a for loop. 
Fibonacci is a series of numbers where a number is the sum of previous two numbers. Starting 
with 0 and 1, the sequence goes 0, 1, 1, 2, 3, 5, 8, 13, 21, and so on.  

Expected Output: 0, 1, 1, 2, 3, 5, 8, 13, 21, ..
</pre>
";

$limit = 20;
$first = 0;
$second = 1;
for ($i=0; $i < $limit; $i++) { 
  if($i <= 1)
    echo $i .", ";
  else {
    echo $first + $second.", ";

    if ($i % 2 == 0){
      $second = $first + $second;
    }
    else {
      $first = $first + $second;
    }
  }
}







echo "<br>######### Question 8 #########";
echo '
<pre>
8. Write a program which will count the "c" characters in the text "Orange Coding Academy".  

Sample Input: Orange Coding Academy 
Expected Output: 2
</pre>
';


$name = "Orange Coding Academy";

$sum = 0;
for ($i=0; $i < strlen($name); $i++) { 
  if(strtolower($name[$i]) == "c")
    $sum++;
}

echo $sum."<br>";







echo "<br>######### Question 9 #########";
echo '
<pre>
9. Write a PHP script that creates the following table using for loops. Add cellpadding="3px" and 
cell spacing="0px" to the table tag.  
1 * 1 = 1 | 1 * 2 = 2 | 1 * 3 = 3 | 1 * 4 = 4 | 1 * 5 = 5 
2 * 1 = 2 | 2 * 2 = 4 | 2 * 3 = 6 | 2 * 4 = 8 | 2 * 5 = 10 
3 * 1 = 3 | 3 * 2 = 6 | 3 * 3 = 9 | 3 * 4 = 12 | 3 * 5 = 15 
4 * 1 = 4 | 4 * 2 = 8 | 4 * 3 = 12 | 4 * 4 = 16 | 4 * 5 = 20 
5 * 1 = 5 | 5 * 2 = 10 | 5 * 3 = 15 | 5 * 4 = 20 | 5 * 5 = 25 
6 * 1 = 6 | 6 * 2 = 12 | 6 * 3 = 18 | 6 * 4 = 24 | 6 * 5 = 30 
</pre>
';
?>


<table border="1" cellspacing="0">
  <tbody>
    <?php for ($i=1; $i <= 6; $i++):?>

      <tr>
        <?php for ($k=1; $k <= 5; $k++):?>

          <td>
            <?php echo "$i * $k = " . $i*$k;?>
          </td>

        <?php endfor ?>
      </tr>

    <?php endfor ?>
  </tbody>
</table>



<?php






echo "<br>######### Question 10 #########";
echo '
<pre>
10. Write a PHP program that repeats integers from 1 to 50. For multiples of three, print "Fizz" 
instead of the number, and for multiples of five print "Buzz". For numbers that are multiples of 
both three and five, print "FizzBuzz".
</pre>
';

for ($i=1; $i <= 50; $i++) { 
  if ($i % 5 == 0 && $i % 3 == 0)
    echo "FizzBuzz<br>";
  else if ($i % 5 == 0)
    echo "Buzz<br>";
  else if ($i % 3 == 0)
    echo "Fizz<br>";
  else
    echo $i."<br>";
}






echo "<br>######### Question 11 #########";
echo "
<pre>
11. Write a PHP program to generate and display the first n lines of a Floyd triangle 

According to Wikipedia Floyd's triangle is a right-angled triangular array of natural numbers, used in computer 
science education. It is named after Robert Floyd. It is defined by filling the rows of the triangle with consecutive 
numbers, starting with a 1 in the top left corner: 

Sample output: 
1 
2 3 
4 5 6 
7 8 9 10 
11 12 13 14 15
</pre>
";

$n = 5;
$num = 0;
for ($i=1; $i <= $n; $i++) {
  $num += $i;
  for ($k=$num-$i +1; $k <= $num; $k++) {
    echo $k . " ";
  }

  echo "<br>";
}







echo "<br>######### Question 12 #########";
echo "
<pre>
12. Write a PHP program to print the following pattern.
    
Expected Output:
 
     A
    A B
   A B C
  A B C D
 A B C D E
  A B C D
   A B C
    A B
     A
</pre>
";

$letters = ["A", "B", "C", "D", "E"];

for ($i=0; $i < count($letters); $i++) {
  $line = "";
  for ($k=0; $k <= $i; $k++) { 
    $line .= $letters[$k];
  }

  echo str_pad($line, count($letters), "-", STR_PAD_BOTH)."<br>";
}