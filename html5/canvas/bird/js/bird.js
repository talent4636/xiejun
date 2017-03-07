
//config
var JUMP_IMAGE_URL = "images/mogu.jpg";//小蘑菇图片
var JUMP_IMAGE_WIDTH = 40;
var JUMP_IMAGE_HEIGHT = 30;
var STATIC_G = -1;//重力加速度 G
var JUMP_IMAGE_CURRENT_HEIGHT = 100;
var CANVAS_WIDTH = 1000;
var CANVAS_HEIGHT = 400;
var FPS = 30;//刷新率，本js的计算方式有点问题，不准确，取决于浏览器性能~
var JUMP_ONCE_HEIGHT = 20;//每一次跳跃的高度
var BACKGROUND_MOVE_SPEED = 1;//背景移动初始速度(可能关联难度？)
var BACKGROUND_PER_WIDTH = 30;//每一个障碍物的宽度（是否可以做成变化的？提高难度？）
var CANVAS_TOTAL_BACKGROUD_NUM = 4;//一个场景最多几个障碍物
var BACKGROUND_DEFAULT_COLOR = "#467500";
var SCORE_NUMBER_PER = 100;//分数每次增加多少

//游戏运行中的变量数据
var JUMP_ALWAYS_LEFT = CANVAS_WIDTH/2-JUMP_IMAGE_WIDTH/2;
var mogu_posi_y = JUMP_IMAGE_CURRENT_HEIGHT;
var speed = 0;//positive:up   negative:down
var background_up_arr = [];//上面障碍物数组
var background_down_arr = [];//下面障碍物数组
var gameStatus = 0;// 0正在游戏中；1游戏结束；    2暂停（p）
var currentScore = 0;//目前分数

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
    console.log("当前游戏状态："+gameStatus);
    if(gameStatus == 2){
        return ;
    }
    //计算出mogu的速度和位置
    speed += STATIC_G;
    mogu_posi_y -= speed*0.5;
    if(mogu_posi_y>=(CANVAS_HEIGHT-JUMP_IMAGE_HEIGHT)){
        mogu_posi_y = CANVAS_HEIGHT-JUMP_IMAGE_HEIGHT;
        speed = 0;
    }
    if(mogu_posi_y<=0){
        mogu_posi_y = 0;
        speed = 0;
    }
    //计算出背景的位置、如果需要生成新的背景   TODO：随机背景？
    var need_up_num = CANVAS_TOTAL_BACKGROUD_NUM - background_up_arr.length;
    var need_down_num = CANVAS_TOTAL_BACKGROUD_NUM - background_down_arr.length;
    var bg_padding_x = 0.25*CANVAS_WIDTH;//障碍物之间的间隔，其实是可以算出来的
    if(need_up_num>0){//如果有缺失的上障碍物，就生成
        for(var i=0;i<need_up_num;i++){
            //background_up_arr.push({h:50,x:CANVAS_WIDTH-(i+1)*(BACKGROUND_PER_WIDTH+20)});
            background_up_arr.push({h:100,x:CANVAS_WIDTH-bg_padding_x*i});
        }
    }
    if(need_down_num>0){//如果有缺失的上障碍物，就生成
        for(var j=0;j<need_down_num;j++){
            background_down_arr.push({h:120,x:CANVAS_WIDTH-bg_padding_x*j});
        }
    }
    //
    for(var m = 0; m < CANVAS_TOTAL_BACKGROUD_NUM; m++){
        //移动的过程，是改变障碍物的x坐标
        background_up_arr[m].x -= BACKGROUND_MOVE_SPEED;
        background_down_arr[m].x -= BACKGROUND_MOVE_SPEED;
        if(background_up_arr[m].x<=(0-BACKGROUND_PER_WIDTH)){//左边超出了，但是还是能看到一点边
            background_up_arr.splice(m,1);
        }
        if(background_down_arr[m].x<=(0-BACKGROUND_PER_WIDTH)){
            background_down_arr.splice(m,1);
            //有障碍物消失加分；从这里加分，是不是不太科学？
            currentScore += SCORE_NUMBER_PER;
        }
    }
    gameMain();
    drawJump(mogu_posi_y);
}

//游戏的主逻辑，判断输赢，加分
var gameMain = function(){
    for(var i=0; i<CANVAS_TOTAL_BACKGROUD_NUM; i++){
        //如果鸟碰到了障碍物，就输
        //mogu的  x:Middle  y:mogu_posi_y
        if(background_down_arr[i].x < CANVAS_WIDTH/2+JUMP_IMAGE_WIDTH/2
            && background_down_arr[i].x > (CANVAS_WIDTH/2-JUMP_IMAGE_WIDTH/2-BACKGROUND_PER_WIDTH)){
        //if(background_down_arr[i].x < (CANVAS_WIDTH/2-JUMP_IMAGE_WIDTH/2) && background_down_arr[i].x+BACKGROUND_PER_WIDTH > (CANVAS_WIDTH/2+JUMP_IMAGE_WIDTH/2)){
            if(mogu_posi_y<=background_up_arr[i].h
            || mogu_posi_y+JUMP_IMAGE_HEIGHT>=(CANVAS_HEIGHT-background_down_arr[i].h)){
                gameStatus = 1;
                //console.log("游戏结束了！");
            }
        }
    }
}

var gameReset = function(){
    currentScore = 0;
    gameStatus = 0;
}

var gamePause = function(){
    gameStatus = 2;
}

//画背景障碍物
var drawBackground = function(){
    for(var i=0; i<CANVAS_TOTAL_BACKGROUD_NUM; i++){
        //修复代码报错：打印的时候，可能第一个还没有值
        if(typeof background_down_arr[i] == undefined || background_up_arr[i] == undefined){
            continue;
        }
        //画上面的障碍物
        ctx.fillStyle = BACKGROUND_DEFAULT_COLOR;
        ctx.strokeStyle = BACKGROUND_DEFAULT_COLOR;
        ctx.lineWidth = 2;
        ctx.fillRect(background_up_arr[i].x,0,BACKGROUND_PER_WIDTH,background_up_arr[i].h);
        ctx.strokeRect(background_up_arr[i].x,0,BACKGROUND_PER_WIDTH,background_up_arr[i].h);
        //画下面的障碍物
        ctx.fillRect(background_down_arr[i].x,(CANVAS_HEIGHT-background_down_arr[i].h),BACKGROUND_PER_WIDTH,background_down_arr[i].h);
        ctx.strokeRect(background_down_arr[i].x,(CANVAS_HEIGHT-background_down_arr[i].h),BACKGROUND_PER_WIDTH,background_down_arr[i].h);
        //console.log(background_up_arr[i].x+"|"+0+"|"+BACKGROUND_PER_WIDTH+"|"+background_up_arr[i].h);
    }
}

//游戏结束时的场景
var drawGameOver = function(){
    var fontSize = 40;
    ctx.clearRect(0,0,CANVAS_WIDTH,CANVAS_HEIGHT);
    ctx.font = fontSize+"px consolas";
    ctx.fillStyle = "red";
    ctx.fillText("Game Over", CANVAS_WIDTH/2-fontSize*4, CANVAS_HEIGHT/2-fontSize);
    ctx.fillStyle = "blue";
    ctx.font = (fontSize*0.5)+"px consolas";
    ctx.fillText("点击[R]键重新开始", CANVAS_WIDTH/2-fontSize*4, CANVAS_HEIGHT/2);
}

//方法命名有点问题，应该是渲染整个canvas，而不是jump
var drawJump = function(positionY){
    //如果游戏已经结束了
    if(gameStatus==1){
        drawGameOver();
        return;
    }
    ctx.clearRect(0,0,CANVAS_WIDTH,CANVAS_HEIGHT);
    drawBackground();
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

//listen keyboard event [space button & R button]
var keyUp = function(e) {
    var currKey=0,e=e||event;
    currKey=e.keyCode||e.which||e.charCode;
    console.log("按钮点击："+currKey);
    switch (currKey){
        case 32:
            speed += (speed>0)?JUMP_ONCE_HEIGHT/2:JUMP_ONCE_HEIGHT;
            break;
        case 82:
            if(gameStatus==1){
                gameReset();
            }
            break;
        case 80:
            if(gameStatus==0){
                gameStatus = 2;
            }
            break;
        case 67:
            if(gameStatus == 2){
                gameStatus = 0;
            }
        default :
            //console.log(currKey);
            break;
    }
    //if(currKey == 32){
    //    speed += (speed>0)?JUMP_ONCE_HEIGHT/2:JUMP_ONCE_HEIGHT;
    //    //alert("e.keyCode:"+e.keyCode+";e.which:"+e.which+";e.charCode:"+e.charCode);
    //}
    //var keyName = String.fromCharCode(currKey);
    //alert("按键码: " + currKey + " 字符: "+ keyName);

    //如果现在是游戏结束状态，点R键盘reset
    //if(gameStatus==1){
    //    if(currKey == 82){
    //        gameReset();
    //    }
    //}

    //如果是游戏状态，点P按键，游戏暂停
    //if(currKey == 80){
    //    if(gameStatus==0){
    //        gameStatus = 2;
    //    }
    //    if(gameStatus == 2){
    //        gameStatus = 0;
    //    }
    //}

}
document.onkeyup = keyUp;

//写出分数和信息
var drawInfo = function(){
    ctx.font = "10px consolas";
    ctx.fillStyle = "red";
    var right_posi = CANVAS_WIDTH-100;
    ctx.fillText("速度:"+speed, right_posi, CANVAS_HEIGHT-50);
    ctx.fillText("位置:"+mogu_posi_y, right_posi, CANVAS_HEIGHT-35);
    ctx.fillText("Author: xiejun@shopex.cn", right_posi-80, CANVAS_HEIGHT-20);
    //分数写到右上角
    ctx.font = "20px cosolas";
    ctx.fillStyle = '#E1E100';
    ctx.fillText("分数："+currentScore, right_posi, 50);
}
