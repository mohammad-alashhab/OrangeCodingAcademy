/*
Create a function that will accept an array and do the following: 
Get the lowest element 
Get the highest element 
Get the length of array 
Get the Average of all element; 
Store these criteria in a new array 
*/

function analyzeArray(arr) {
    let min = Math.min(...arr);

    let max = Math.max(...arr);

    let length = arr.length;

    let sum = arr.reduce((acc, current) => acc + current, 0);
    let average = sum / length;

    let result = [min, max, length, average];
    return result;
}

let arr = [10, 5, 8, 2, 15];
let analysisResult = analyzeArray(arr);
console.log(analysisResult);