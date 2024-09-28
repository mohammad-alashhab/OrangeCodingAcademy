
function getAbsSum (arr){
    return arr.reduce((sum, val ) => { return sum + Math.abs(val); }, 0);
}

// Test cases

console.log(getAbsSum([-1, -3, -5, -4, -10, 0]))