/**
 * Created by xiejun on 2016/8/9.
 */

//config
var oneRadius = 10;//小球的半径
var oneMargin = 1;//边距
var R = oneRadius+oneMargin;//半径加球形距离边框的距离
var numMaggTop = oneRadius;//每个数字距离上边缘的高度
var winWidth = R*2*(7*6+4*2);//canvas画布的宽度
var winHeight = window.innerHeight - 2*numMaggTop;//canvas画布的高度
var G = 2;//重力加速度
var moveBallNumMax = 300;//最多几个球运动
var JUMPTIMES = 0.8;//碰撞后速度损失
var colorRand = ['#FF8040','#B7FF4A','#4A4AFF','#79FF79','#00FFFF','#AD5A5A','#FF8040','#B766AD','#5A5AAD','#FF2D2D','#BE77FF','#ADADAD'];
var WHITEPADDING = {x:3,y:3};//中间的白块偏移

var arrNow = [];//现在的时间数组
var arrNext = [];//上一次显示的时间数组
//var arrColor = [];//弃用
var movingBall = [];//彩色球的数组
var test=false;//调试参数，没用

//init time array
var initTimeArr = function(){
    var time = new Date();
    var hours = time.getHours();
    var minutes = time.getMinutes();
    var seconds = time.getSeconds();
    var timeA = [
        Math.floor(hours/10),
        Math.round(hours%10),
        Math.floor(minutes/10),
        Math.round(minutes%10),
        Math.floor(seconds/10),
        Math.round(seconds%10),
    ];
    for(var i=0;i<6;i++){
        arrNow[i] = timeA[i];//{num:timeA[i],index:i};
        arrNext[i] = timeA[i];//{num:timeA[i],index:i};
    }
}

//更新时间数组
var updateTimeArr = function(array6){
    for(var i=0;i<6;i++){
        arrNext[i] = array6[i];//{num:array6[i],index:i};
        //console.log(arrNow[i].num+', '+arrNext[i].num);
        if(arrNow[i]!=arrNext[i]){
            pushNumToM(i,arrNow[i]);
        }
        arrNow[i] = arrNext[i];
    }
}

/*var checkArr = function(i){
    for(var i=0;i<6;i++){
        if(arrNow[i].num!=arrNext[i].num){
            //arrColor.push({num:arrNext[i].num,index:i});
            pushNumToM(i,arrNow[i].num);
            //if(arrColor.length>30) arrColor.pop();
        }else{
            //
        }
    }
}*/

//根据index获取小球的初始位置数组，插入movingBall数组
var pushNumToM = function(index,num){
    if(movingBall.length>moveBallNumMax)return;
    var num2Arr = NUMBER_CODE[num];
    var h = Math.round(num2Arr[0].length);//列数
    var l = Math.round(num2Arr.length);//行数
    var allPadding = {x:(R*2*index*h)+(R*2*2*4),y:numMaggTop};
    for(var i = 0; i < h; i++){
        for(var j = 0; j < l; j++){
            if(num2Arr[j][i]){
                movingBall.push({
                    l:{
                        x:allPadding.x+(oneRadius+oneMargin)*((i+1)*2),
                        y:allPadding.y+(j+1)*R*2-1
                    },
                    v:{x:Math.random()*4*(Math.random()*10>5?1:-1),y:(Math.random()*10>5?1:-1)*(Math.random()*3),g:G},
                    c:getRandomColor()
                });
                if(movingBall.length>moveBallNumMax){
                    movingBall.splice(0,1);
                }
            }
        }
    }
}

var drawMovingBall = function(){
    //画出来
    for(var i=0;i<movingBall.length;i++){
        ctx.beginPath();
        ctx.arc(movingBall[i].l.x,movingBall[i].l.y,oneRadius,0,Math.PI*2,false);
        var radial = ctx.createRadialGradient(
            movingBall[i].l.x+WHITEPADDING.x,
            movingBall[i].l.y+WHITEPADDING.y,
            oneRadius*0.1,
            movingBall[i].l.x+WHITEPADDING.x,
            movingBall[i].l.y+WHITEPADDING.y,
            oneRadius*0.3
        );
        radial.addColorStop(0,"#FFFFFF");
        radial.addColorStop(1,movingBall[i].c?movingBall[i].c:"#000000");
        ctx.fillStyle = radial;
        ctx.closePath();
        ctx.fill();
        //更新里面的参数
        movingBall[i].l.x = movingBall[i].l.x + movingBall[i].v.x;
        movingBall[i].l.y = movingBall[i].l.y + movingBall[i].v.y;
        movingBall[i].v.y = movingBall[i].v.y + movingBall[i].v.g;
        if(movingBall[i].l.y>winHeight-R){
            movingBall[i].l.y = winHeight-R;
            movingBall[i].v.y = -(movingBall[i].v.y)*JUMPTIMES;
        }
    }
}
initTimeArr();

var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

//init setting
canvas.width = winWidth;
canvas.height = winHeight;


/**
 * @param num 要显示的数字
 * @param locate  坐标 {x:111, Y:222}
 */
var drowMain = function(num,locate){
    drowNum(locate,NUMBER_CODE[num]);
    //console.log(arrColor[0].num);
}

var drowNum = function(locate,numArr2){
    //var c = Math.round(Math.random() * colorRand.length);
    var h = Math.round(numArr2[0].length);//列数
    var l = Math.round(numArr2.length);//行数
    //console.log("行："+l+"，列："+h);
    for(var i = 0; i < h; i++){
        for(var j = 0; j < l; j++){
            var have = numArr2[j][i];
            have?drowOne(locate,{x:(oneRadius+oneMargin)*((i+1)*2-1),y:(oneRadius+oneMargin)*((j+1)*2-1)},"#DDDDDD"):null;
        }
    }

}

var getRandomColor = function(){
    return colorRand[Math.round(Math.random() * colorRand.length)];
}

/**
 *
 * @param x, y 相对坐标
 * @param color string
 */
var drowOne = function(origin_loc,loc, color){
    var locReal = loc;
    locReal.x += origin_loc.x;
    locReal.y += origin_loc.y;
    ctx.beginPath();
    ctx.fillStyle = color;
    ctx.arc(locReal.x,locReal.y,oneRadius,0,Math.PI*2,false);
    ctx.closePath();
    ctx.fill();
}

//鼠标点击事件的坐标系和canvas坐标系的转化
var locate_trans = function(loc){
    var cliRect = canvas.getBoundingClientRect();
    return {x:loc.x+cliRect.left,y:loc.y+cliRect.top};
}

var main = function(){
    ctx.clearRect(0,0,winWidth,winHeight);
    var time = new Date();
    var hours = time.getHours();
    var minutes = time.getMinutes();
    var seconds = time.getSeconds();
    //显示小时
    drowMain(Math.floor(hours/10), {x:R,y:numMaggTop});
    drowMain(Math.round(hours%10), {x:(R*2*7+R),y:numMaggTop});
    //显示冒号
    drowMain(10, {x:(R*2*7*2+R),y:0});
    //显示分钟
    drowMain(Math.floor(minutes/10), {x:(R*2*7*2+4*R*2+R),y:numMaggTop});
    drowMain(Math.round(minutes%10), {x:(R*2*7*3+4*R*2+R),y:numMaggTop});
    //显示冒号
    drowMain(10, {x:(R*2*7*4+4*R*2+R),y:0});
    //显示seconds
    drowMain(Math.floor(seconds/10), {x:(R*2*7*4+4*R*2+R+R*4*2),y:numMaggTop});
    drowMain(Math.round(seconds%10), {x:(R*2*7*4+4*R*2+R+R*4*2+R*7*2),y:numMaggTop});
    //console.log('当前时间'+hours+':'+minutes+':'+seconds+"\n\n 十位："+Math.floor(hours/10)+"， 个位："+Math.round(hours%10));

    updateTimeArr([
        Math.floor(hours/10),
        Math.round(hours%10),
        Math.floor(minutes/10),
        Math.round(minutes%10),
        Math.floor(seconds/10),
        Math.round(seconds%10),
        ]);
    drawMovingBall();
}

setInterval(main,30);
//main();