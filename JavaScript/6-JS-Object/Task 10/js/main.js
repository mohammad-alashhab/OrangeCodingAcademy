// Use the Object.assign() method to merge two objects

const person1 = {
    name: 'John',
    age: 30,
    city: 'New York'
};

const person2 = {
    job: 'Engineer',
    hobbies: ['reading', 'painting']
};

const mergedPerson = Object.assign({}, person1, person2);

console.log(mergedPerson);