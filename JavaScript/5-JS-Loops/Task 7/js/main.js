// Use a for loop to find the smallest number in an array

const numbers = [2, 5, 9, 1, 6];
let smallestNumber = numbers[0];

for (let i = 1; i < numbers.length; i++) {
    if (numbers[i] < smallestNumber) {
      smallestNumber = numbers[i];
    }
}

console.log("Output:", smallestNumber);