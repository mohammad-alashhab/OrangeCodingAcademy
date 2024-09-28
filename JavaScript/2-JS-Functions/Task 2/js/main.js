//Function that will return your string in Alphabetical order

let str = 'hello';

function sortString(str) {
    let charArray = str.split('');
    charArray.sort();
    return charArray.join('');
}

console.log(sortString(str));