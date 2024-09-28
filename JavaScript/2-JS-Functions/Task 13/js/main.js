//Create a function that will repeat each string character two times 

    function repeatChar(str) {
        return str.split('').map(char => char + char).join('');
    }
    
    console.log(repeatChar('hello world'));