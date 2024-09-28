/* Create function to Multiply all elements in an array by it's length */

let arr = [4,2,5]

function multiplyByLength(arr) {
    return arr.map(num => num * arr.length);
}
console.log(multiplyByLength(arr));
