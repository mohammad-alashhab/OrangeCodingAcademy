//Use a for loop to print the Fibonacci sequence up to a given number.

let n = parseInt(prompt("Enter a number:"));

let fibonacciSequence = [0, 1];

for (let i = 2; i < n; i++) {
    fibonacciSequence[i] = fibonacciSequence[i - 1] + fibonacciSequence[i - 2];
}

console.log(fibonacciSequence.join(" "));