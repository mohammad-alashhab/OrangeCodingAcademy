//- Check if a variable named "char" is a letter and display a message "It's a letter" if it is. 

var char = 'a';

if (/[a-zA-Z]/.test(char)) {
    console.log("It's a letter");
} else {
    console.log("It's not a letter");
}