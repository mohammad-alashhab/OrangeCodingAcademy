<?php

echo "<br>######### Question 1 #########";
echo "
<pre>
1. Write a PHP script to:  

a. Convert the entered string to uppercase. 
b. Convert the entered string to lowercase. 
c. Make the first letter of the string uppercase. 
d. Make the first letter of each word capitalized
</pre>
";



echo "a- ". strtoupper("Belal Shakra") . "<br>";
echo "b- ". strtolower("Belal Shakra") . "<br>";
echo "c- ". ucfirst("belal shakra") . "<br>";
echo "d- ". ucwords("belal shakra") . "<br>";



echo "<br>######### Question 2 #########";
echo "
<pre>
2. Write a PHP script splitting the following numeric string to be a date format.  

Sample Output: '085119' 
Expected Output: 08:51:19
</pre>
";


echo rtrim(chunk_split("085119", 2, ":"), ":")."<br>";




echo "<br>######### Question 3 #########";
echo "
<pre>
3. Write a PHP script to check whether the sentence contains a specific word. 

Sample Output: ‘I am a full stack developer at orange coding academy’ 
Sample Word: ‘Orange’ 
Expected Output: ‘Word Found!’
</pre>
";

$str = "I am a full stack developer at orange coding academy";
if(strpos($str, "orange"))
  echo "Word Found!<br>";
else
  echo "Word Not Found!<br>";




echo "<br>######### Question 4 #########";
echo "
<pre>
4. Write a PHP script to extract the file name from the URL.

Sample Output: 'www.orange.com/index.php' 
Expected Output: 'index.php'
</pre>
";


$str = "www.orange.com/index.php";
$result = explode("/",$str);
echo $result[count($result) -1]."<br>";




echo "<br>######### Question 5 #########";
echo "
<pre>
5. Write a PHP script to extract the username from the following email address.  

Sample Output: 'info@orange.com' 
Expected Output: 'info' 
</pre>
";


$str = "info@orange.com";
$result = explode("@",$str);
echo $result[0]."<br>";



echo "<br>######### Question 6 #########";
echo "
<pre>
6. Write a PHP script to get the last three characters from the string.  

Sample Output: 'info@orange.com' 
Expected Output: 'com'
</pre>
";


$str = "info@orange.com";
$result = str_split($str, 3);
echo $result[count($result) -1]."<br>";




echo "<br>######### Question 7 #########";
echo "
<pre>
7. Write a PHP script to generate simple random passwords [do not use rand () function] from a 
given string.

Sample Output: '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz'
Expected Output: 254ABCc or h242sfeDAFEe32 -> random number
</pre>
";


echo str_split(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"),10)[0]."<br>";






echo "<br>######### Question 8 #########";
echo "
<pre>
8. Write a PHP script to replace the first word of the sentence with another word.
Sample Output: 'That new trainee is so genius.'
Sample Word: 'Our'
Expected Result: the new trainee is so genius.
</pre>
";

$input = "That new trainee is so genius.";
$arr = explode(" ", $input);
$arr[0] = "Our";
$result = implode(" ", $arr);


echo $result."<br>";




echo "<br>######### Question 9 #########";
echo "
<pre>
9. Write a PHP script to find the first character that is different between two strings.
String1 : 'dragonball'
String2 : 'dragonboll'
Expected Result : First difference between two strings at position 7: 'a' vs 'o'
</pre>
";


$str_1 = "dragonball";
$str_2 = "dragonboll";

for ($i=0; $i < strlen($str_1); $i++) { 
  if($str_1[$i] != $str_2[$i]){
    echo "First difference between two strings at position $i: $str_1[$i] vs $str_2[$i] <br>";
    break;
  }
}





echo "<br>######### Question 10 #########";
echo "
<pre>
10. Write a PHP script to put a string in an array, use the (var_dump) to view the array.
Sample Output: 'Twinkle, twinkle, little star.'
Expected Result: array (4) {[0] => string (30) 'Twinkle, ' [1] => string (26) ' twinkle,' [2] => string (27)
twinkle' [3] => string (26) ' little star.”}
</pre>
";


var_dump(explode(" ", "Twinkle, twinkle, little star."));





echo "<br>######### Question 11 #########";
echo "
<pre>
11. Write a PHP script to print the next letter of the inputted letter.
Sample Character: 'a'
Expected Output: 'b'
Sample Character: 'z'
Expected Output: 'a'
</pre>
";

$alphabet = "abcefghijklmnopqrstuvwxyz";
$needle = "z";
$position = strpos($alphabet, $needle);
if($position == strlen($alphabet)-1)
  echo $alphabet[0]."<br>";
else
  echo $alphabet[$position+1]."<br>";




echo "<br>######### Question 12 #########";
echo "
<pre>
12. Write a PHP script to insert a string at the specified position in a given string.
Original String: 'The brown fox'
Insert 'quick' between 'The' and 'brown'.
Expected Output: 'The quick brown fox'
</pre>
";

$arr = explode(" ", "The brown fox");
echo "$arr[0] quick $arr[1] $arr[2]<br>";



echo "<br>######### Question 13 #########";
echo "
<pre>
13. Write a PHP script to remove zeroes from the given number.
Original String: '0000657022.24'
Expected Output: '65722.24'
</pre>
";

echo round("0000657022.24", 2)."<br>";



echo "<br>######### Question 14 #########";
echo "
<pre>
14. Write a PHP script to remove part of a string.
Original String: 'The quick brown fox jumps over the lazy dog'
Remove 'fox' from the above string.
Expected Output: 'The quick brown jumps over the lazy dog'
</pre>
";

echo str_replace("fox", "", "The quick brown fox jumps over the lazy dog")."<br>";





echo "<br>######### Question 15 #########";
echo "
<pre>
15. Write a PHP script to remove trailing dashes from a string.  

Original String: 'The quick brown fox jumps over the lazy dog---' 
Expected Output: 'The quick brown fox jumps over the lazy dog' 
</pre>
";

echo rtrim("The quick brown fox jumps over the lazy dog", "-")."<br>";





echo "<br>######### Question 16 #########";
echo "
<pre>
16. Write a PHP script to remove Special characters from the following string.  

Sample Output: '\"\1+2/3*2:2-3/4*3' 
Expected Output: '1 2 3 2 2 3 4 3' 
</pre>
";

// echo trim("\"\1+2/3*2:2-3/4*3", "-\+-*:/")."<br>";





echo "<br>######### Question 17 #########";
echo "
<pre>
17. Write a PHP script to select first 5 words from the following string.  

Sample Output: 'The quick brown fox jumps over the lazy dog'
Expected Output: 'The quick brown fox jumps'
</pre>
";

$five = explode(" ", "The quick brown fox jumps over the lazy dog");
for ($i=0; $i < 5; $i++) { 
  echo $five[$i] ." ";
}





echo "<br>######### Question 18 #########";
echo "
<pre>
18. Write a PHP script to remove comma(s) from the following numeric string. 

Sample Output: '2,543.12' 
Expected Output: 2543.12 
</pre>
";

echo str_replace(",", "", "2,543.12")."<br>";





echo "<br>######### Question 19 #########";
echo "
<pre>
19. Write a PHP script to print letters from 'a' to 'z'.
Expected Output: a b c d e f g h I j k l m n o p q r s t u v w x y z
</pre>
";

$letters = "a b c d e f g h I j k l m n o p q r s t u v w x y z";
$arr_letters = explode(" ", $letters);

for ($i=0; $i < count($arr_letters); $i++) { 
  echo $arr_letters[$i] ." ";
}