/*
Return the index location of an element from a given array. First argument is the array 
you'd like to search and the second one is the element (either string/number) to look for. 
 */

function findIndex(arr, element) {
    return arr.indexOf(element);
}

let arr = [1, 2, 3, 'apple', 4, 'banana', 'Apple', 5];
let element = 5;

console.log(findIndex(arr, element));