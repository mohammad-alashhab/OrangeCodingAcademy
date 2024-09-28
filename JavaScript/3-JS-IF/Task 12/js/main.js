//- Check if a variable named "password" is at least 8 characters long and display a message "Your password is strong" if it is. 

    var password = "password123";

    if (password.length >= 8) {
        console.log("Your password is strong");
    } else {
        console.log("Your password is weak");
    }