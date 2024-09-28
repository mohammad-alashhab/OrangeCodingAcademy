//Use the Object.entries() method to get an array of key-value pairs for an object.

const person = {
    name: 'John Doe',
    age: 30,
    address: {
    street: '123 Main St',
    city: 'New York',
    state: 'NY'
    }
};

const entries = Object.entries(person);

console.log(entries);
