//Use the Object.seal() method to prevent changes to an object's properties but allows changes to its values.

const person = {
    name: 'John',
    age: 30,
    address: {
    street: '123 Main St',
    city: 'New York',
    state: 'NY',
    zip: '10001'
    }
};

Object.seal(person);
person.name = 'Jane';
console.log(person.name);