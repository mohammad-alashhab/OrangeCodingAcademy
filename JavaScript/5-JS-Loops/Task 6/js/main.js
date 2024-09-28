// Use a for loop to find the largest number in an array.

const numbers = [2, 5, 9, 1, 6];
let largestNumber = numbers[0];

for (let i = 1; i < numbers.length; i++) {
    if (numbers[i] > largestNumber) {
        largestNumber = numbers[i];
    }
}

console.log("Output:", largestNumber);