//Use a for loop to print the elements of an array in reverse order

let arr = [1, 2, 3, 4, 5];

console.log("Original array: ", arr);

for (let i = arr.length - 1; i >= 0; i--) {
    console.log(arr[i]);
}