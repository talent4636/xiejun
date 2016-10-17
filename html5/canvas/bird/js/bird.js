
//config
var JUMP_IMAGE_URL = "images/mogu.jpg";//小蘑菇图片
var JUMP_IMAGE_WIDTH = 40;
var JUMP_IMAGE_HEIGHT = 30;
var STATIC_G = -1;//重力加速度 G
var JUMP_IMAGE_CURRENT_HEIGHT = 100;
var CANVAS_WIDTH = 1000;
var CANVAS_HEIGHT = 400;
var FPS = 30;
var JUMP_ONCE_HEIGHT = 20;//每一次跳跃的高度

var JUMP_ALWAYS_LEFT = CANVAS_WIDTH/2-JUMP_IMAGE_WIDTH/2;
var mogu_posi_y = JUMP_IMAGE_CURRENT_HEIGHT;
var speed = 0;//positive:up   negative:down
var canvas = document.getElementById("canvas");
canvas.width = CANVAS_WIDTH;
canvas.height = CANVAS_HEIGHT;
var ctx = canvas.getContext('2d');

//init func
var init = function(){
    mogu.onload = function(){
        drawJump(JUMP_IMAGE_CURRENT_HEIGHT);
    };
}

var mogu = new Image();
mogu.src = JUMP_IMAGE_URL;

init();

var main = function(){
    speed += STATIC_G;
    mogu_posi_y -= speed*0.5;
    console.log("now speed:"+speed);
    if(mogu_posi_y>(CANVAS_HEIGHT-JUMP_IMAGE_HEIGHT)){
        mogu_posi_y = CANVAS_HEIGHT-JUMP_IMAGE_HEIGHT;
        speed = 0;
        return;
    }
    if(mogu_posi_y<0){
        mogu_posi_y = 0;
        speed = 0;
        return;
    }
    drawJump(mogu_posi_y);
}

var drawJump = function(positionY){
    ctx.clearRect(0,0,CANVAS_WIDTH,CANVAS_HEIGHT);
    drawInfo();
    ctx.drawImage(
        mogu,
        JUMP_ALWAYS_LEFT,
        positionY,
        JUMP_IMAGE_WIDTH,
        JUMP_IMAGE_HEIGHT
    );
    ctx.save();
}

//tick tock
setInterval(main, 1000/FPS);

//listen keyboard event [space button]
var keyUp = function(e) {
    var currKey=0,e=e||event;
    currKey=e.keyCode||e.which||e.charCode;
    if(currKey == 32){
        speed += (speed>0)?JUMP_ONCE_HEIGHT/2:JUMP_ONCE_HEIGHT;
        //alert("e.keyCode:"+e.keyCode+";e.which:"+e.which+";e.charCode:"+e.charCode);
    }
    //var keyName = String.fromCharCode(currKey);
    //alert("按键码: " + currKey + " 字符: "+ keyName);
}
document.onkeyup = keyUp;

var drawInfo = function(){
    ctx.font = "10px consolas";
    ctx.fillStyle = "red";
    var right_posi = CANVAS_WIDTH-100;
    ctx.fillText("速度:"+speed, right_posi, CANVAS_HEIGHT-50);
    ctx.fillText("位置:"+mogu_posi_y, right_posi, CANVAS_HEIGHT-35);
    ctx.fillText("Author: xiejun@shopex.cn", right_posi-80, CANVAS_HEIGHT-20);
}
