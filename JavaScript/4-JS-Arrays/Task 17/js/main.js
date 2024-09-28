//Use the Array.from() method to convert an array-like object to an array

let arrayLikeObject = {
    0: 'apple',
    1: 'banana',
    2: 'cherry',
    length: 3
};

let array = Array.from(arrayLikeObject);

console.log(array);