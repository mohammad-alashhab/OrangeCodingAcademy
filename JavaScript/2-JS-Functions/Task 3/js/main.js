/* In mathematics, the factorial of a non-negative integer n, denoted by n! is the product of all 
positive integers less than or equal to n. In simple terms, the Factorial of 8 is solved like this: */

const factorial = (n) => {
    // Error handling for negative numbers
    if (n >= 0) {
    if (n === 0 || n === 1) {
        return 1;
    }
    return n * factorial(n - 1);
    } else {
        console.log('Factorial is not defined for negative numbers.');
    }
};

// Testing the function

console.log(factorial(5));
console.log(factorial(0));
console.log(factorial(1));
console.log(factorial(-1));