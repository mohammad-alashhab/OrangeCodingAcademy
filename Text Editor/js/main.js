//<button type="button" class="btn btn-primary" onclick="Blod()">Blod</button> when you click it again remove the style

document.getElementById("myText").innerHTML = "This is a sample text.";

function Bold() {
    var element = document.getElementById("myText");
    element.style.fontWeight = element.style.fontWeight === "bold"? "normal" : "bold";
}

function Italic() {
    var element = document.getElementById("myText");
    element.style.fontStyle = element.style.fontStyle === "italic"? "normal" : "italic";
}

function Underline() {
    var element = document.getElementById("myText");
    element.style.textDecoration = element.style.textDecoration === "underline"? "none" : "underline";
}

function Textleft() {
    var element = document.getElementById("myText");
    element.style.textAlign = "left";
}

function Textcenter() {
    var element = document.getElementById("myText");
    element.style.textAlign = "center";
}

function Textright() {
    var element = document.getElementById("myText");
    element.style.textAlign = "right";
}

function Upper() {
    var element = document.getElementById("myText");
    element.style.textTransform = element.style.textTransform === "uppercase" ? "none" : "uppercase";
}

function Lower() {
    var element = document.getElementById("myText");
    element.style.textTransform = element.style.textTransform === "lowercase"? "none" : "lowercase";
}

function Capitaliz() {
    var element = document.getElementById("myText");
    element.style.textTransform = element.style.textTransform === "capitalize"? "none" : "capitalize";
}

// handle function clearText professional

function ClearText() {
    document.getElementById("myText").value = "";
}

// handle fontColor input

function ChangeColor() {
    var element = document.getElementById("myText");
    var color = document.getElementById("fontColor").value;
    element.style.color = color;
}

// handle backgroundColor input

function ChangeBackgroundColor() {
    var element = document.getElementById("myText");
    var color = document.getElementById("backgroundColor").value;
    element.style.backgroundColor = color;
}

// handle fontSize input

function ChangeFontSize() {
    var element = document.getElementById("myText");
    var fontSize = document.getElementById("fontSize").value;
    element.style.fontSize = fontSize + "px";
}

// handle font family input

function ChangeFontFamily() {
    var element = document.getElementById("myText");
    var fontFamily = document.getElementById("fontFamily").value;
    element.style.fontFamily = fontFamily;
}

// function ChangeColor() {
//     var element = document.getElementById("myText");
//     var colors = ["red", "green", "blue", "yellow", "orange", "purple", "pink", "brown", "gray", "black"];
//     var randomColor = colors[Math.floor(Math.random() * colors.length)];
//     element.style.color = randomColor;
// }

// function ChangeBackgroundColor() {
//     var element = document.getElementById("myText");
//     var colors = ["red", "green", "blue", "yellow", "orange", "purple", "pink", "brown", "gray", "black"];
//     var randomColor = colors[Math.floor(Math.random() * colors.length)];
//     element.style.backgroundColor = randomColor;
// }

// function IncreaseFontSize() {
//     var element = document.getElementById("myText");
//     element.style.fontSize = parseInt(window.getComputedStyle(element).fontSize) + 2 + "px";
// }

// function DecreaseFontSize() {
//     var element = document.getElementById("myText");
//     element.style.fontSize = parseInt(window.getComputedStyle(element).fontSize) - 2 + "px";
// }

// function ChangeFontFamily() {
//     var element = document.getElementById("myText");
//     var fonts = ["Arial", "Verdana", "Helvetica", "Times New Roman", "Georgia", "Impact", "Lucida Console", "Comic Sans MS", "Courier New", "Trebuchet MS", "Palatino Linotype", "Garamond", "Bookman Old Style", "Andale Mono", "Helvetica Neue", "Arial Black", "Impact", "Symbol", "Webdings", "Wingdings", "MS Sans Serif"];
//     var randomFont = fonts[Math.floor(Math.random() * fonts.length)];
//     element.style.fontFamily = randomFont;
// }

function Print() {
    var element = document.getElementById("myText");
    var printContent = element.innerHTML;
    var printWindow = window.open('', '', 'height=400,width=800');
    printWindow.document.write('<html><head><title>Print Text</title>');
    printWindow.document.write('<style>body { font-size: ' + window.getComputedStyle(element).fontSize + 'px; color: ' + window.getComputedStyle(element).color + '; background-color: ' + window.getComputedStyle(element).backgroundColor + '; text-align: ' + window.getComputedStyle(element).textAlign + '; text-transform: ' + window.getComputedStyle(element).textTransform + '; font-weight: ' + window.getComputedStyle(element).fontWeight + '; font-style: ' + window.getComputedStyle(element).fontStyle
    + '; text-decoration: ' + window.getComputedStyle(element).textDecoration + '; } </style>');
    printWindow.document.write('</head><body>');
    printWindow.document.write(printContent);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
}
