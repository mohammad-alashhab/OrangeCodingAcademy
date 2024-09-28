// Use the Array.prototype.copyWithin() method to copy a sequence of elements within an 
// array. 
// Example:
//  Input: [1, 2, 3, 4, 5], 1, 3; 
//  Output: [1, 1, 1, 4, 5] 

const arr = [1, 2, 3, 4, 5];

arr.copyWithin(1, 0, 1); // Output: [ 1, 1, 3, 4, 5 ]
arr.copyWithin(2, 0, 1); // Output: [ 1, 1, 1, 4, 5 ]

console.log(arr);
