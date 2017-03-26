var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
context.lineWidth = 5;
var down = false;

canvas.addEventListener('mousemove', draw);

canvas.addEventListener('mousedown', function()
{
	down = true;
	context.beginPath();
	context.moveTo(xPos, yPos);
	canvas.addEventListener('mousemove', draw);
});


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

function changeColor(color) { context.strokeStyle = color; context.fillStyle = color; }
function clearCanvas() { context.clearRect(0, 0, canvas.width, canvas.height); }
function changeBrushSize(size) { context.lineWidth = size; }
function fillCanvas() { context.fillRect(0, 0, canvas.width, canvas.height); }
function changeBrushStyle(brushStyle) { context.lineCap = brushStyle; }

function triggerClick() { document.getElementById('file').click(); }

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
			var txisze;
			var txfont;
			

			function handleMouseDown(e){
			  canMouseX=parseInt(e.clientX-offsetX);
			  canMouseY=parseInt(e.clientY-offsetY);
			  $("#downlog").html("Down: "+ canMouseX + " / " + canMouseY);

			  var text=document.getElementById("text").value;
			  ctx.font = ctx.font = txsize+" "+txfont; ;
			  ctx.fillText(text,canMouseX,canMouseY);
			}
						
			$("#canvas").dblclick(function(e){handleMouseDown(e);});
	


		
function download(){
        var download = document.getElementById("download");
        var image = document.getElementById("canvas").toDataURL("image/png")
                    .replace("image/png", "image/octet-stream");
        download.setAttribute("href", image);

    }

function changefont(font){
	txfont = font
}
function changesize(tsize){
	txsize = tsize
}

	