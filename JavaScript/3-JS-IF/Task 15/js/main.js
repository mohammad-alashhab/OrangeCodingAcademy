//-using Function `isNumber()` checks if input variable is a number by using isNaN() in-built JavaScript function.

let n = '21f';

function isNumber(n) {
    return!isNaN(parseFloat(n)) && isFinite(n);
}

if(isNumber(n)){
    console.log(n +' is a valid number.');
}else{
    console.log(n +' is not a valid number.');
}

