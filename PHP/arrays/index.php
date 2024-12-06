<?php

echo "<br>######### Question 1 #########";
echo '
<pre>
1. Write a script to generate the following paragraph

"The memory of that scene for me is like a frame of film forever frozen at that moment: the red carpet, 
the green lawn, the white house, the leaden sky. The new president and his first lady. - Richard M. 
Nixon" 
The nums "red", "green" and "white" should come from $colors array. 
</pre>
';

$colors = ["red", "green", "white"];

echo <<<EOD
  The memory of that scene for me is like a frame of film forever frozen at that moment: the $colors[0] carpet, 
  the $colors[1] lawn, the $colors[2] house, the leaden sky. The new president and his first lady. - Richard M. 
  Nixon
EOD;




echo "<br>######### Question 2 #########";
echo '
<pre>
2. $colors = array("white", "green", "red")
Write a PHP script that will display the colors as unordered list :
Expected Output:
● green 
● red 
● white
</pre>
';

$colors = array("white", "green", "red")
?>

<ul>
  <?php foreach($colors as $color): ?>
    <li><?php echo $color; ?></li>
  <?php endforeach ?>
</ul>


<?php


echo "<br>######### Question 3 #########";
echo '
<pre>
3. $cities= array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", 
"Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", 
"Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", 
"Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid" );  

Create a PHP script to displays the capital and country name from the above array $cities. Sort the list 
by the capital of the country.  
Expected Output: 
The capital of Netherlands is Amsterdam  
The capital of Greece is Athens  
The capital of Germany is Berlin 
</pre>
';

$cities= array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", 
"Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", 
"Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", 
"Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid" );  

asort($cities);

?>

<?php foreach($cities as $country => $capital): ?>
    <p>
      <?php echo "The capital of $country is $capital" ?></p>
<?php endforeach ?>



<?php

echo "<br>######### Question 4 #########";
echo "
<pre>
4. color = array (4 => 'white', 6 => 'green', 11=> 'red'); 

Write a PHP script to display the first element of the above array.  
Expected Output:  white
</pre>
";

$color = array (4 => 'white', 6 => 'green', 11=> 'red');
echo $color[4]."<br>";





echo "<br>######### Question 5 #########";
echo "
<pre>
5. Write a PHP script that inserts a specific new item in an array in any position. 

Sample Input: 
Array 1 2 3 4 5
Location: 4 
New Item: 
Expected Output: 1 2 3 $ 4 5
</pre>
";

$nums = [1, 2, 3, 4, 5];
$first =  "$";
$second = "";
$pos = 4;
$length = count($nums);


for ($i=$pos; $i <= $length; $i++) {
  if ($i == $length){
    $nums[$i-1] = $second-1;
    array_push($nums, $first);
  }



  $second = $nums[$i-1]; //1- 4  // 2- 5
  $nums[$i-1] = $first; // 1- $  // 2- 5
  $first = @$nums[@$i]; // 1- 5 // 2- null
}

var_dump($nums);





echo "<br>######### Question 6 #########";
echo "
<pre>
6. Write a PHP script to sort the following associative array depending on the key value [asc] :  
 
Sample Input:  
 
fruits = array('d' => 'lemon', 'a' => 'orange', 'b' => 'banana', 'c' => 'apple'); 
 
Expected Output: 
 
c = apple 
b = banana 
d = lemon 
a = orange
</pre>
";

$fruits = array('d' => 'lemon', 'a' => 'orange', 'b' => 'banana', 'c' => 'apple');
asort($fruits);
var_dump($fruits);




echo "<br>######### Question 7 #########";
echo "
<pre>
7. Write a PHP script to calculate and display the average temperature for the recorded reads, also the 
script should display the list of the five lowest and the five highest temperatures  

Sample Input:  78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 
65, 64, 68, 73, 75, 79, 73

Expected Output: 
Average Temperature is: 70.6  
List of seven lowest temperatures: 60, 62, 63, 63, 64,  
List of seven highest temperatures: 76, 78, 79, 81, 85,
</pre>
";

$nums = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 
65, 64, 68, 73, 75, 79, 73];

$sum = array_sum($nums);
echo "The avg = ". $sum/count($nums) . "<br>";

sort($nums);


echo "<br>First 5 items"."<br>";
for ($i=0; $i < 5; $i++) { 
  echo $nums[$i] . " ";
}

echo "<br>Last 5 items"."<br>";
for ($i=count($nums)-1; $i > count($nums)-5; $i--) { 
  echo $nums[$i] . " ";
}








echo "<br>######### Question 8 #########";
echo '
<pre>
8. Write a PHP program to merge the following two arrays.

Sample Input:

$array1 = array("color" => "red", 2, 4); 
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4); 

Expected Output: 

Array 
( 
    [color] => green 
    [0] => 2 
    [1] => 4 
    [2] => a 
    [3] => b 
    [shape] => trapezoid 
    [4] => 4 

</pre>
';

$array1 = array("color" => "red", 2, 4); 
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4); 


print_r(array_merge($array1, $array2));








echo "<br>######### Question 9 #########";
echo '
<pre>
9. Write a PHP function to change the following array\'s and convert all the strings to upper case.  
 
Sample Input: 
 
$colors = array("red","blue", "white","yellow"); 
 
Expected Output : 
 
Array 
( 
    RED 
    BLUE 
    WHITE 
    YELLOW 
 
) 
</pre>
';
$colors = array("red","blue", "white","yellow"); 


var_dump(
  array_map(function($item){
    return strtoupper($item);
  }, $colors)
);








echo "<br>######### Question 10 #########";
echo '
<pre>
10. Write a PHP function to change the following array\'s and convert all the strings to lower case.  

Sample Input: 
$colors = array("RED","BLUE", "WHITE","YELLOW"); 

Expected Output :
Array 
( 
    red 
    blue 
    white 
    yellow 

)
</pre>
';

$colors = array("RED","BLUE", "WHITE","YELLOW"); 


var_dump(
  array_map(function($item){
    return strtolower($item);
  }, $colors)
);





echo "<br>######### Question 11 #########";
echo '
<pre>
1.  Write a PHP script which displays all the numbers between 200 and 250 that are divisible by 4.  

Expected Output: 200,204,208,212,216,220,224,228,232,236,240,244,248
</pre>
';
$nums = [200,204,208,212,216,220,224,228,232,236,240,244,248];


var_dump(
  array_map(function($item){
    if($item % 4 == 0)
      return $item;
  }, $nums)
);




echo "<br>######### Question 12 #########";
echo '
<pre>
12. Write a PHP script to get the shortest/longest string length from an array.  
 
Sample Input:
$words =  array("abcd","abc","de","hjjj","g","wer") 
 
Expected Output :
The shortest array length is 1. The longest array length is 4.
</pre>
';
$words =  array("abcd","abc","de","hjjj","g","wer");

$min = $words[0];
foreach ($words as $word) {
  if (strlen($word) < strlen($min))
    $min = $word;
}
echo "The min value = $min"."<br>";

$max = $word[0];
foreach ($words as $word) {
  if (strlen($word) > strlen($max))
    $max = $word;
}
echo "The max value = $max"."<br>";





echo "<br>######### Question 13 #########";
echo '
<pre>
13. Write a PHP script to generate unique random 10 numbers within a specific range.  

Sample Input: (11, 20) 
Sample Output: 17 16 13 20 14 19 18 15 11 12
</pre>
';

$rep = 10;
$nums = [];
for ($i=0; $i < $rep; $i++) {
  $num = rand(11, 20);
  $flag = true;
  
  while($flag){
    if (!in_array($num, $nums)){
      array_push($nums, $num);
      $flag = false;
    }
  }
};

var_dump($nums);




echo "<br>######### Question 14 #########";
echo '
<pre>
14. Write a PHP script that returns the lowest integer in the array  that is not 0.  

Sample Input: $array1 = array( 2, 0, 10, 12, 6)
Sample Output:  2 
</pre>
';
$nums = array( 2, 0, 10, 12, 6);
$min = ($nums[0] != 0)? $num[0]: null;
foreach ($nums as $num) {
  if (($num < $min) && $nums[$i] != 0)
    $min = $num;
}
echo "The min value = $min"."<br>";