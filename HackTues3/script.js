
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
context.lineWidth = 5;
var down = false;

canvas.addEventListener('mousemove', draw);
//Start drawing
canvas.addEventListener('mousedown', function()
{
	down = true;
	context.beginPath();
	context.moveTo(xPos, yPos);
	canvas.addEventListener('mousemove', draw);
});

//Stop Drawing
canvas.addEventListener('mouseup', function() { down = false; });
function draw(e)
{
	xPos = e.clientX - canvas.offsetLeft;
	yPos = e.clientY - canvas.offsetTop;
	
	if(down == true)
	{
		context.lineTo(xPos, yPos);
		context.stroke();
	}
}
//Color
function changeColor(color) { context.strokeStyle = color; context.fillStyle = color; }
//Clear
function clearCanvas() { context.clearRect(0, 0, canvas.width, canvas.height); }
//Brush size
function changeBrushSize(size) { context.lineWidth = size; }
//The whole canvas with one color
function fillCanvas() { context.fillRect(0, 0, canvas.width, canvas.height); }
//Change brush style
function changeBrushStyle(brushStyle) { context.lineCap = brushStyle; }

function triggerClick() { document.getElementById('file').click(); }
// Import file
document.getElementById('file').addEventListener('change', function(e)
{
	clearCanvas();
	URl = URL || webkitURL;
	var temp = URL.createObjectURL(e.target.files[0]);
	var image = new Image();
	image.src = temp;
	image.addEventListener('load', function()
	{
		imageWidth = image.naturalWidth;
		imageHeight = image.naturalHeight;
		newImageWidth = imageWidth;
		newImageHeight = imageHeight;
		originalImageRatio = imageWidth / imageHeight;
		//If the image is not with those parameters
		if(newImageWidth > newImageHeight && newImageWidth > 800)
		{
			newImageWidth = 800;
			newImageHeight = 800 / originalImageRatio;
		}
		if((newImageWidth >= newImageHeight || newImageHeight > newImageWidth) && newImageHeight > 500)
		{
			newImageHeight = 500;
			newImageWidth = 500 * originalImageRatio;
		}
		
		context.drawImage(image, 0, 0, newImageWidth, newImageHeight);
		URL.revokeObjectURL(temp);
	});
	
});
//Placing the text on the canvas
$(function(){

			var canvas=document.getElementById("canvas");
			var ctx=canvas.getContext("2d");
			var lastX;
			var lastY;
			var strokeColor="red";
			var strokeWidth=2;
			var canMouseX;
			var canMouseY;
			var canvasOffset=$("#canvas").offset();
			var offsetX=canvasOffset.left;
			var offsetY=canvasOffset.top;

			
			function handleMouseDown(e){
			  canMouseX=parseInt(e.clientX-offsetX);
			  canMouseY=parseInt(e.clientY-offsetY);
			  $("#downlog").html("Down: "+ canMouseX + " / " + canMouseY);

			  var text=document.getElementById("text").value;
			  ctx.font = changeStyle();
			  ctx.fillText(text,canMouseX,canMouseY);
			}

			$("#canvas").dblclick(function(e){handleMouseDown(e);});
			
		});
//Downloading the image	
function download(){
        var download = document.getElementById("download");
        var image = document.getElementById("canvas").toDataURL("image/png")
                    .replace("image/png", "image/octet-stream");
        download.setAttribute("href", image);

    }
function changeStyle(font){context.fillStyle=font; }



