/*. Create a function that takes in an array as an argument, checks the data type of each 
element, and removes any elements that are strings. The function should return the modified 
array.*/

function removeStrings(arr) {
    return arr.filter(element => typeof element !== 'string');
}

// Example usage:

const arr = [1, 'ali', 2, 'ahmad', 3, 'belal'];
const modifiedArr = removeStrings(arr);
console.log(modifiedArr);
