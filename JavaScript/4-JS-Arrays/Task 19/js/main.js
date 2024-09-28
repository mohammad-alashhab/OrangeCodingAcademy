// .Use the Array.prototype.fill() method to fill an array with a specific value. 
// Example:
//  Input: [1, 2, 3, 4, 5], 0, 3; 
//  Output: [0, 0, 0, 4, 5] 

const fillArray = (array, value, start = 0, end = array.length) => {
    array.fill(value, start, end);
    return array;
};

console.log(fillArray([1, 2, 3, 4, 5], 0, 0, 3)); 