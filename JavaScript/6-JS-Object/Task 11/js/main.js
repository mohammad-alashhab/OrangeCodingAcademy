//Use the Object.freeze() method to prevent changes to an object

const person = {
    name: 'John Doe',
    age: 30,
    address: {
    street: '123 Main St',
    city: 'New York',
    state: 'NY'
    }
};

Object.freeze(person);


person.name = 'Mohammad';

console.log(person.name);
