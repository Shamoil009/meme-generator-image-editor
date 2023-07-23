// $(document).ready(function () {
//   $(function () {
//     $("#dynamic").draggable({
//       containment: "#imageDIV", // set draggable area. Ref: https://www.encodedna.com/jquery/limit-the-draggable-area-using-jquery-ui.htm
//     });
//   });
// });

// function validateFileType(){
//   var fileName = document.getElementById("fileName").value;
//   var idxDot = fileName.lastIndexOf(".") + 1;
//   var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
//   if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
//       //TO DO
//   }else{
//       alert("Only jpg/jpeg and png files are allowed!");
//   }   
// }




window.onload = function () {
  localStorage.setItem("imageurl", null)
}

var imageurl = localStorage.getItem("imageurl");
galleryImage(imageurl);
// document.getElementById("profilePic").src = (imageurl);
function galleryImage(e) {

  var img = new Image();
  img.onload = function () {
    for (let index = 0; index < 1; index++) {
      var height = img.height;
      var width = img.width;
      while (true) {
        if (width > 690) {
          width = width - 1;
        }
        if (height > 590) {
          height = height - 1;
        }
        if (height <= 590 && width <= 690) {
          static.width = width;
          static.height = height;
          dynamic.width = width;
          dynamic.height = height;
          break;
        }
      }

    }
    staticctx.drawImage(img, 0, 0, width, height);

    var dynamiccan = document.getElementById("dynamic");
    var dynctx = dynamiccan.getContext("2d");
    dynamicctx.shadowBlur = 5;
    dynamicctx.shadowOffsetY = 1;
    dynamicctx.shadowColor = shadowColorText;
    dynctx.fillStyle = "white";
    dynctx.font = "22px verdana";
  };
  img.src = e;
  image = img;
};


function deleteText() {
  console.log(texts.length);
  if (texts.length == 0) {
    alert("Please enter some text first");
    console.log(texts.length);
  }
  else {
    texts.pop(texts.length - 1);
    draw();
  }
};

function uploadfile() {
  // var x = document.getElementById("imageLoader");
  // if (static.width !== 302 || static.height !== 152) {
  //   x.style.display = "block";
  // } else {
  //   x.style.display = "none";
  // }
}

let stroke = false;
var fontSize = "16";
var fontFace = "verdana";
var textFillColor = "#ff0000";
var shadowColorText = "#000000";
var textAlign = "center";
var fontWeight = "normal";
var fontStyle = "normal";
var fillType = "colorFill";
var textFillColor2 = "#000000";

formElement = document.getElementById("fillOrStroke");
formElement.addEventListener("change", fillOrStrokeChanged, false);

formElement = document.getElementById("shadowOrNot");
formElement.addEventListener("change", shadowOrNot, false);


formElement = document.getElementById("textSize");
formElement.addEventListener("change", textSizeChanged, false);

formElement = document.getElementById("textFillColor");
formElement.addEventListener("change", textFillColorChanged, false);

formElement = document.getElementById("textFont");
formElement.addEventListener("change", textFontChanged, false);

formElement = document.getElementById("fontWeight");
formElement.addEventListener("change", fontWeightChanged, false);

formElement = document.getElementById("fontStyle");
formElement.addEventListener("change", fontStyleChanged, false);

formElement = document.getElementById("strokeTextColor");
formElement.addEventListener("change", strokeTextColor, false);

formElement = document.getElementById("textShadowColor");
formElement.addEventListener("change", textShadowColor, false);

function drawScreen() {

  dynamicctx.font = fontWeight + " " + fontStyle + " " + fontSize + "px " + fontFace;
  redefineTextArray();
  draw();
}

function redefineTextArray() {

  for (var i = 0; i < texts.length; i++) {
    var text = texts[i];
    text.width = dynamicctx.measureText(text.text).width;
    text.height = fontSize;
  }
};



function textFill() {
  dynamicctx.fillStyle = textFillColor;
  draw();
};

function strokeColor() {
  dynamicctx.strokeStyle = textFillColor2;
  draw();
};

function shadowColor() {
  dynamicctx.shadowBlur = 5;
  dynamicctx.shadowOffsetY = 1;
  dynamicctx.shadowColor = shadowColorText;
  draw();
};

function shadowText(option) {
  if (option == "shadow") {
    dynamicctx.shadowBlur = 5;
    dynamicctx.shadowOffsetY = 1;
    dynamicctx.shadowColor = shadowColorText;
    draw();
  }
  if (option == "noShadow") {
    dynamicctx.shadowOffsetY = 0;
    dynamicctx.shadowBlur = 0;
    draw();
  }
};


function stroketext(fillOrStroke) {
  if (fillOrStroke == "stroke") {
    dynamicctx.clearRect(0, 0, dynamic.width, dynamic.height);
    for (var i = 0; i < texts.length; i++) {
      var text = texts[i];
      console.log(text.text, text.x, text.y);
      dynamicctx.strokeText(text.text, text.x, text.y);
    }
    stroke = true;
    redefineTextArray();
  }
  if (fillOrStroke == "fill") {
    stroke = false;
    draw();
  }
};

function textShadowColor(e) {
  var target = e.target;
  shadowColorText = target.value;
  shadowColor();
}

function textFontChanged(e) {
  var target = e.target;
  fontFace = target.value;
  drawScreen();
}

function shadowOrNot(e) {
  var target = e.target;
  addShadow = target.value;
  shadowText(addShadow);
}

function fillOrStrokeChanged(e) {
  var target = e.target;
  fillOrStroke = target.value;
  stroketext(fillOrStroke);
}

function textSizeChanged(e) {
  var target = e.target;
  fontSize = target.value;
  drawScreen();
}

function textFillColorChanged(e) {
  var target = e.target;
  textFillColor = target.value;
  textFill();
}

function strokeTextColor(e) {
  var target = e.target;
  textFillColor2 = target.value;
  strokeColor();
}

function fontWeightChanged(e) {
  var target = e.target;
  fontWeight = target.value;
  drawScreen();
}

function fontStyleChanged(e) {
  var target = e.target;
  fontStyle = target.value;
  drawScreen();
}


// Image Rotation
var angleInDegrees = 0;
var image;
console.log(image);
$("#clockwise").click(function () {
  angleInDegrees += 30;
  drawRotated(angleInDegrees);
});

$("#counterclockwise").click(function () {
  angleInDegrees -= 30;
  drawRotated(angleInDegrees);
});

function drawRotated(degrees) {
  staticctx.clearRect(0, 0, static.width, static.height);
  staticctx.save();
  staticctx.translate(static.width / 2, static.height / 2);
  staticctx.rotate(degrees * Math.PI / 180);
  staticctx.drawImage(image, -dynamic.width / 2, -dynamic.height / 2, dynamic.width, dynamic.height);
  staticctx.restore();
}


// function rotate() {
//   const staticCanvas = document.getElementById("static");
//   var staticctx = staticCanvas.getContext("2d");
//   staticctx.translate(image.width-1, image.height-1);
//   staticctx.rotate(Math.PI);
//   staticctx.drawImage(image, 0, 0, image.width, image.height);
// };



function downloadPNGImage() {
  const canvas1 = document.getElementById("static");
  const canvas2 = document.getElementById("dynamic");
  var preview = document.getElementById("preview");

  var staticContext = canvas1.getContext("2d");
  var dynamicContext = canvas2.getContext("2d");
  var previewContext = preview.getContext("2d");
  preview.height = dynamic.height;
  preview.width = dynamic.width;
  previewContext.drawImage(canvas1, 0, 0, dynamic.width, dynamic.height);
  previewContext.drawImage(canvas2, 0, 0, dynamic.width, dynamic.height);

  var dataURL = preview.toDataURL("image/png");

  var link = document.createElement("a");
  link.download = "Meme.png";
  link.href = preview.toDataURL("image/png", 1);
  link.click();
  console.log(link);
  // staticContext.clearRect(0, 0, dynamic.width, dynamic.height);
  // dynamicContext.clearRect(0, 0, dynamic.width, dynamic.height);
  previewContext.clearRect(0, 0, dynamic.width, dynamic.height);

}


function saveImage() {
  const canvas1 = document.getElementById("static");
  const canvas2 = document.getElementById("dynamic");
  var preview = document.getElementById("preview");

  var staticContext = canvas1.getContext("2d");
  var dynamicContext = canvas2.getContext("2d");
  var previewContext = preview.getContext("2d");
  preview.height = dynamic.height;
  preview.width = dynamic.width;
  previewContext.drawImage(canvas1, 0, 0, dynamic.width, dynamic.height);
  previewContext.drawImage(canvas2, 0, 0, dynamic.width, dynamic.height);

  var dataURL = preview.toDataURL("image/png");
  var link = document.createElement("a");
  link.download = "Meme.png";
  link.href = preview.toDataURL("image/png", 1);
  console.log(link);
  var b64Image = link.href;
  // var b64Image = c.toDataURL("image/png");

  fetch("./save_image_b64.php", {
    method: "POST",
    mode: "no-cors",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: b64Image
  }).then(response => response.text())
    .then(success => console.log(success))
    .catch(error => console.log(error));
  alert('Image saved successfully.');


  previewContext.clearRect(0, 0, dynamic.width, dynamic.height);

}



function downloadWebpImage() {
  const canvas1 = document.getElementById("static");
  const canvas2 = document.getElementById("dynamic");
  var preview = document.getElementById("preview");

  var staticContext = canvas1.getContext("2d");
  var dynamicContext = canvas2.getContext("2d");
  var previewContext = preview.getContext("2d");
  preview.height = 512;
  preview.width = 512;
  previewContext.drawImage(canvas1, 0, 0, 512, 512);
  previewContext.drawImage(canvas2, 0, 0, 512, 512);

  var dataURL = preview.toDataURL("image/webp");
  var link = document.createElement("a");
  link.download = "Meme.webp";
  link.href = preview.toDataURL("image/webp",);
  link.click();
  // staticContext.clearRect(0, 0, dynamic.width, dynamic.height);
  // dynamicContext.clearRect(0, 0, dynamic.width, dynamic.height);
  previewContext.clearRect(0, 0, 512, 512);

}

function previewImage() {
  const canvas1 = document.getElementById("static");
  const canvas2 = document.getElementById("dynamic");
  const preview = document.getElementById("preview")
  var previewContext = preview.getContext("2d");
  preview.height = static.height;
  preview.width = static.width;
  previewContext.drawImage(canvas1, 0, 0);
  previewContext.drawImage(canvas2, 0, 0);

  var dataURL = preview.toDataURL("image/png");
  console.log(dataURL);
  showDocument(dataURL);
  previewContext.clearRect(0, 0, static.width, static.height)
  // const win = window.open(dataURL, '_blank');
}
function showDocument(base64Url) {
  var win = window.open();
  win.document.write('<iframe src="' + base64Url + '" frameborder="0" style="border:0; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%;" allowfullscreen></iframe>');

}



// function base64ToArrayBuffer(_base64Str) {
//   var binaryString = window.atob(_base64Str);
//   var binaryLen = binaryString.length;
//   var bytes = new Uint8Array(binaryLen);
//   for (var i = 0; i < binaryLen; i++) {
//         var ascii = binaryString.charCodeAt(i);
//         bytes[i] = ascii;
//  }
//  return bytes;
// }

// function showDocument(_base64Str, _contentType) {
//   var byte = base64ToArrayBuffer(_base64Str);
//   var blob = new Blob([byte], { type: _contentType });
//   window.open(URL.createObjectURL(blob), "_blank");
// }
// button.addEventListener("click", function(){
//   const dataUrl = canvas.toDataURL("png");
//   console.log(dataUrl);
//   const win = window.open(dataUrl, '_blank');
// });

var staticcanvas = document.getElementById("static");

var staticctx = staticcanvas.getContext("2d");

var imageLoader = document.getElementById("imageLoader");
imageLoader.addEventListener("change", handleImage, false);



function handleImage(e) {
  var reader = new FileReader();
  reader.onload = function (event) {
    var img = new Image();
    img.onload = function () {
      console.log(img.height);
      console.log(img.width);

      for (let index = 0; index < 1; index++) {
        var height = img.height;
        var width = img.width;
        while (true) {
          if (width > 690) {  //|| height > 590
            width = width - 1;
            // height = height - 1;
          }
          if (height > 590) {
            height = height - 1;
          }
          if (height <= 590 && width <= 690) {
            static.width = width;
            static.height = height;
            dynamic.width = width;
            dynamic.height = height;
            break;
          }
        }
      }

      console.log(height);
      console.log(width);
      staticctx.drawImage(img, 0, 0, width, height);
      // static.width = img.width;
      // static.height = img.height;
      // dynamic.width = img.width;
      // dynamic.height = img.height;
      // resize the canvas so that the image fits in. But if you
      // really want to change the size of your image, then simply
      // use the third and fourth params of drawImage: ctx.drawImage(img, x, y, width, height).
      // canvas.setAttribute("width", 132);
      // canvas.setAttribute("height", 150);

      var dynamiccan = document.getElementById("dynamic");
      var dynctx = dynamiccan.getContext("2d");
      dynamicctx.shadowBlur = 5;
      dynamicctx.shadowOffsetY = 1;
      dynamicctx.shadowColor = shadowColorText;
      dynctx.fillStyle = "white";
      dynctx.font = "22px verdana";
    };
    img.src = event.target.result;
    image = img;
  };
  reader.readAsDataURL(e.target.files[0]);
}

// window.onload = function () {
//   function draw(event) {
//     var text = document.getElementById("textBox").value;
//     // ctx.clearRect(0, 0, canvas.width, canvas.height);
//     ctx.fillStyle = "#3e3e3e";
//     ctx.font = "16px Arial";
//     ctx.fillText(text, 50, 50);
//   }
//   window.addEventListener("keyup", draw, true);
// };



// variables used to get mouse position on the canvas
var dynamiccanvas = document.getElementById("dynamic");
var dynamicctx = dynamiccanvas.getContext("2d");
var $canvas = $("#dynamic");
var canvasOffset = $canvas.offset();
var offsetX = canvasOffset.left;
var offsetY = canvasOffset.top;
var scrollX = $canvas.scrollLeft();
var scrollY = $canvas.scrollTop();

dynamicctx.font = "22px verdana";
// variables to save last mouse position
// used to see how far the user dragged the mouse
// and then move the text by that distance
var startX;
var startY;

// an array to hold text objects
var texts = [];

// this var will hold the index of the hit-selected text
var selectedText = -1;

// clear the canvas & redraw all texts
function draw() {
  dynamicctx.clearRect(0, 0, dynamic.width, dynamic.height);
  for (var i = 0; i < texts.length; i++) {
    var text = texts[i];
    var heightText = dynamicctx.measureText(text);

    console.log(heightText.fontBoundingBoxAscent);
    wrapText(dynamicctx, text.text, text.x, text.y, static.width, heightText.fontBoundingBoxAscent);
    console.log(static.width);
  }
}

function wrapText(context, text, x, y, maxWidth, lineHeight) {

  var splitText = text.split("\n");
  for (var ii = 0; ii < splitText.length; ii++) {
    var line = "";
    var words = splitText[ii].split(" ");

    for (var n = 0; n < words.length; n++) {
      var testLine = line + words[n] + " ";
      var metrics = context.measureText(testLine);
      var testWidth = metrics.width;

      if (testWidth > maxWidth) {
        context.fillText(line, x, y);
        line = words[n] + " ";
        y += lineHeight;
      } else {
        line = testLine;
      }
    }
    if (stroke == false) {
      context.fillText(line, x, y);
      y += lineHeight;
    }
    else {
      context.strokeText(line, x, y);
      y += lineHeight;
    }
  }
}

// test if x,y is inside the bounding box of texts[textIndex]
function textHittest(x, y, textIndex) {
  var text = texts[textIndex];
  return (
    x >= text.x &&
    x <= text.x + text.width &&
    y >= text.y - text.height &&
    y <= text.y
  );
}

// handle mousedown events
// iterate through texts[] and see if the user
// mousedown'ed on one of them
// If yes, set the selectedText to the index of that text
function handleMouseDown(e) {
  e.preventDefault();
  startX = parseInt(e.clientX - offsetX);
  startY = parseInt(e.clientY - offsetY);
  // Put your mousedown stuff here
  for (var i = 0; i < texts.length; i++) {
    if (textHittest(startX, startY, i)) {
      selectedText = i;
    }
  }
}

// done dragging
function handleMouseUp(e) {
  e.preventDefault();
  selectedText = -1;
}

// also done dragging
function handleMouseOut(e) {
  e.preventDefault();
  selectedText = -1;
}

// handle mousemove events
// calc how far the mouse has been dragged since
// the last mousemove event and move the selected text
// by that distance
function handleMouseMove(e) {
  if (selectedText < 0) {
    return;
  }
  e.preventDefault();
  mouseX = parseInt(e.clientX - offsetX);
  mouseY = parseInt(e.clientY - offsetY);

  // Put your mousemove stuff here
  var dx = mouseX - startX;
  var dy = mouseY - startY;
  startX = mouseX;
  startY = mouseY;

  var text = texts[selectedText];
  text.x += dx;
  text.y += dy;
  draw();
}

// listen for mouse events
$("#dynamic").mousedown(function (e) {
  handleMouseDown(e);
});
$("#dynamic").mousemove(function (e) {
  handleMouseMove(e);
});
$("#dynamic").mouseup(function (e) {
  handleMouseUp(e);
});
$("#dynamic").mouseout(function (e) {
  handleMouseOut(e);
});

$("#submit").click(function () {
  // calc the y coordinate for this text on the canvas
  var y = texts.length * 20 + 20;

  // get the text from the input element
  var text = {
    text: $("#theText").val(),
    x: 20,
    y: y,
  };

  // calc the size of this text for hit-testing purposes
  // dynamicctx.font = "16px verdana";
  text.width = dynamicctx.measureText(text.text).width;
  text.height = fontSize;

  // put this new text in the texts array
  texts.push(text);

  // redraw everything
  draw();
});

