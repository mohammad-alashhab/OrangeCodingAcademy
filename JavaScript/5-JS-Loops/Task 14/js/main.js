//Use a for loop to print the prime numbers up to a given number.

let n = 20;

const printPrimes = (n) => {
    for (let i = 2; i <= n; i++) {
        let isPrime = true;
        for (let j = 2; j < i; j++) {
            if (i % j === 0) {
                isPrime = false;
                break;
            }
        }
        if (isPrime) {
            console.log(i);
        }
    }
};

printPrimes(n);

