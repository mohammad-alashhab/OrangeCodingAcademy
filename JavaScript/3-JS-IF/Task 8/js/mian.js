//-Check if a variable named "x" is a positive number and display a message "x is a positive number"

let x = 5;

if (typeof x === 'number' && x > 0) {
    console.log(`${x} is a positive number`);
} else {
    console.log(`${x} is not a positive number`);
}