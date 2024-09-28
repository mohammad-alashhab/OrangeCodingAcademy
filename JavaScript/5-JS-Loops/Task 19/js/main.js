//Use a for loop to print the elements of an array with a specific step

let numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let step = 2;

for (let i = 0; i < numbers.length; i += step) {
    console.log(numbers[i]);
}
