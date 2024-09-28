//Use the filter() method to create a new array containing only even numbers from an original array.

const numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
const evenNumbers = numbers.filter(number => number % 2 === 0);

console.log(evenNumbers);