//Check if a variable named "list" is an array and display a message "It's an array" if it is.

let list = [1, 2, 3, 4, 5];

if (Array.isArray(list)) {
  console.log("It's an array");
} else {
  console.log("It's not an array");
}