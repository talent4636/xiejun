/**
 * Created by xiejun on 2016/8/9.
 */

//config
var oneRadius = 12;
var oneMargin = 1;
var R = oneRadius+oneMargin;
var numMaggTop = 10;
var winWidth = (oneRadius+oneMargin)*2*(7*6+4*2);
var winHeight = 1000;
var colorRand = ['#FF8040','#B7FF4A','#4A4AFF','#79FF79','#00FFFF','#AD5A5A','#FF8040','#B766AD','#5A5AAD','#FF2D2D','#BE77FF','#ADADAD'];

var arrNow = [];//现在的时间数组
var arrNext = [];//上一次显示的时间数组
var arrColor = [];
var movingBall = [];

//init time array
var initTimeArr = function(){
    for(var i=0;i<6;i++){
        arrNow[i] = {num:0,index:i};
        arrNext[i] = {num:0,index:i};
    }
}

//更新时间数组  index:0~5  number   {x:1,y:1}
var updateTimeArr = function(array6){
    for(var i=0;i<6;i++){
        arrNext[i] = {num:array6[i],index:i};
    }
}

var checkArr = function(){
    for(var i=0;i<6;i++){
        if(arrNow[i]!=arrNext[i]){
            arrColor.unshift({num:arrNext[i].num,index:i});
            pushNumToM(i,getInitLoc(arrNow[i].num));
            if(arrColor.length>30) arrColor.pop();
            //if(movingBall.length>)
        }
    }
}

//根据index获取小球的初始位置数组，插入movingBall数组
var pushNumToM = function(index,num){
    //
    movingBall.unshift();
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
    checkArr();
    console.log(arrColor[0].num);
}

var drowNum = function(locate,numArr2){
    var c = Math.round(Math.random() * colorRand.length);
    var color = colorRand[c];
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
    //var locReal = locate_trans(loc);
    var locReal = loc;
    locReal.x += origin_loc.x;
    locReal.y += origin_loc.y;
    //console.log(origin_loc);
    //ctx.save();
    ctx.beginPath();
    ctx.fillStyle = color;
    ctx.arc(locReal.x,locReal.y,oneRadius,0,Math.PI*2,false);
    ctx.closePath();
    ctx.fill();
}

var locate_trans = function(loc){
    var cliRect = canvas.getBoundingClientRect();
    return {x:loc.x+cliRect.left,y:loc.y+cliRect.top};
}

//drowMain(0,{x:100,y:100});



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
}

setInterval(main,300);
//main();