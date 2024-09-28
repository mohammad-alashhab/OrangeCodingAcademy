//A Write a function that lets you know if a number is Even or Odd .

let number = 111;

function checkEvenOdd(number) {
    if (number % 2 === 0) {
        return `${number} is Even`;
    } else {
        return `${number} is Odd`;
    }
}
console.log(checkEvenOdd(number));