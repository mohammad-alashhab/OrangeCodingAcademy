/*
12. Create a function that will check if str1 ends with the characters in str2 
Rules: 
● Take two strings as argument 
● Determine if second string matches ending of the first string 
● Return Boolean value 
 */

function checkEnding(str1, str2) {
    return str1.endsWith(str2);
}

console.log(checkEnding('hello world', 'world'));
console.log(checkEnding('hello world', 'hello')); 