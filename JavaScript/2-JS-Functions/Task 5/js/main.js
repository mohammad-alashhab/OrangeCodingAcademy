// Remove all Odd number(s) in an array and return a new array that contains Even numbers only.

const arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

const removeOddAndReturnEven = (arr) => {
    const filteredArray = arr.filter(num => num % 2 === 0);
    return filteredArray;
}

const result = removeOddAndReturnEven(arr);
console.log(result);