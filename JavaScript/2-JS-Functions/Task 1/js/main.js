//Create a function that will display the smallest value in the array. 

let arr = [5, 7, 3, 4, 5, 6,];

function findSmallest(arr) {
        var smallest = arr[0];

        for (var i = 1; i < arr.length; i++) {
            if (arr[i] < smallest) {
                smallest = arr[i];
            }
        }
        return smallest;
    }

console.log(findSmallest(arr));