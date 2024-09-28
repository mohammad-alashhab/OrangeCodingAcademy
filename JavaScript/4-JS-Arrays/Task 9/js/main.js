/*
Use the splice() method to add and remove elements from an array. 
Example:
Input: [1, 2, 3, 4, 5], 3; 
Output: 2
*/

function removeElement(arr, index) {
    return arr.splice(index, 1)[0];
}

let arr = [1, 2, 3, 4, 5];
let index = 1;

let removedElement = removeElement(arr, index);
console.log(removedElement);