//Use a for loop to find the factorial of a number.

let number = parseInt(prompt("Enter a number:"));

if (isNaN(number) || number <= 0 || !Number.isInteger(number)) {
    alert("Invalid input. Please enter a positive integer.");
} else {

let factorial = 1;

for (let i = 2; i <= number; i++) {
    factorial *= i;
}

alert(`The factorial of ${number} is ${factorial}.`);
}

