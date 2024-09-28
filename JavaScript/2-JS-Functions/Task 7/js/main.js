/* Return the sum of a number going back to it's root. In other words, the function will work 
like this: 
Add Up(6); 
6 + 5 + 4 + 3 + 2 + 1 + 0 = 21 
*/

function addUp(n) {
    if (n < 0){
        throw new Error("Input must be a non-negative integer");
    }
    if (n === 0) {
        return 0;
    }
    else {
        return n + addUp(n - 1);
    }
}

console.log(addUp(6));