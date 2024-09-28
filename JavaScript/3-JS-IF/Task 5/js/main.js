//- Check if a variable named "num" is divisible by 2 and display a message "The number is even" if it is. 

    //- If the variable is not defined or is not a number, display an error message.

    //- If the variable is divisible by 2 and not a prime number, display a warning message.

    //- If the variable is divisible by 2 and is a prime number, display a success message.

    let num = 10;
    if (typeof num !== "number" || isNaN(num)) {
        console.error("Error: The variable 'num' must be a valid number.");
    } else {
        if (num % 2 === 0) {
            if (isPrime(num)) {
                console.log("Success: The number is even and is a prime number.");
            } else {
                console.log("Warning: The number is even and is not a prime number.");
            }
        } else {
            console.log("The number is odd.");
        }
    }
    