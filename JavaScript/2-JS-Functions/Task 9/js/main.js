//Convert the given number to a Roman Numeral using method.

const toRoman = (num) => {
    const romanNumerals = {
        1: 'I',
        4: 'IV',
        5: 'V',
        9: 'IX',
        10: 'X',
        40: 'XL',
        50: 'L',
        90: 'XC',
        100: 'C',
        400: 'CD',
        500: 'D',
        900: 'CM',
        1000: 'M'
    };

    let roman = '';

    const decimalKeys = Object.keys(romanNumerals).reverse();
    decimalKeys.forEach((key) => {
        while (num >= key) {
            roman += romanNumerals[key];
            num -= key;
        }
    });

    return roman;
};

console.log(toRoman(1989));

