//Use a for loop to check if a number is in an array

const numbers = [1, 2, 3, 4, 5];
const targetNumber = 9;

for (let i = 0; i < numbers.length; i++) {
    if (numbers[i] === targetNumber) {
        console.log(`${targetNumber} is found in the array.`);
        break;
    }
    else if (numbers[i] === numbers.length) {
        console.log(`${targetNumber} is not found in the array.`);
    }
}
