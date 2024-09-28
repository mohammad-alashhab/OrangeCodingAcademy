// Return how many words was given


function countWords(str) {

    if (str.length === 0) {
        return 0;
    }
    
    let words = str.trim().split(/\s+/);
    return words.length;
}

console.log(countWords('             hello                 from          CodingAcademy!           '));