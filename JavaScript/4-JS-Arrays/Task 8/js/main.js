/*Use the slice() method to extract a portion of an array.
Example:
Input: [1, 2, 3, 4, 5, 6], 2, 4; 
Output: [1, 2, 5, 6]
  */

function extractArray(arr, start, end) {
    const partBefore = arr.slice(0, start);
    const partAfter = arr.slice(end);
    return partBefore.concat(partAfter);
}

const arr = [1, 2, 3, 4, 5, 6];
const result = extractArray(arr, 2, 4);
console.log(result);



