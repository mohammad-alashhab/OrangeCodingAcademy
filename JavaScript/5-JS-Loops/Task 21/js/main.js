//Use a for loop to find the frequency of a number in an array

let numbers = [1, 2, 3, 4, 5, 5, 6, 7, 7, 8, 9, 9, 10];
let targetNumber = 5;

let frequency = 0;

for (let i = 0; i < numbers.length; i++) {
    if (numbers[i] === targetNumber) {
        frequency++;
    }
}

console.log(`The number ${targetNumber} appears ${frequency} times in the array.`);


