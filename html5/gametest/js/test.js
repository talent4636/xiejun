/**
 * Created by xiejun on 16/4/1.
 */

//var c_width = 880;
//var c_height = 320;

window.onload = function(){
    clock.init();
    window.setInterval(clock.drowNow,200);
};

var clock = {
    "canvas": function(){
        var canvasEle = document.getElementById('main');
        var canvas = canvasEle.getContext('2d');
        return canvas;
    },
    //配置项
    "config": function(key){
        var config = [];
        config['on_color']  = "#000";//显示显色
        config['off_color'] = "#EEE";//不显示的颜色
        config['margin']    = 20;//间隔
        config['each_width']= 20;//每一个笔画的宽
        config['each_height']= 100;//每一个笔画的高
        config['number_margin'] = 10;//每两个数字之间的间隔
        return config[key];
    },
    "init" : function(){
        var cvs = clock.canvas();
        cvs.fillStyle = "#BBB";
    },
    'drawNum': function(h,i,s){
        itemArr.drawEve(0,h/10);
        itemArr.drawEve(1,h%10);
        itemArr.drawEve(2,i/10);
        itemArr.drawEve(3,i%10);
        itemArr.drawEve(4,s/10);
        itemArr.drawEve(5,s%10);
    },
    "clean": function(){
        //todo
    },
    "drowNow": function(){
        var oDate = new Date();
        var H = oDate.getHours(); //获取系统时，
        var i = oDate.getMinutes(); //分
        var s = oDate.getSeconds(); //秒
        clock.drawNum(H,i,s);
    }
};

//算法
var itemArr = {
    "itemW": function(){
        return [clock.config('each_height'),clock.config('margin')];
    },
    "itemH": function(){
        return [clock.config('margin'),clock.config('each_height')];
    },
    //type = 1 2 3 4 (int)
    "drawEve": function(type_int,num){
        num = parseInt(num);
        var arr = itemArr.arraySeven();
        var marg_width = clock.config('each_width')*2 + clock.config('each_height') + clock.config('number_margin');
        //alert(marg_width);
        var cvs = clock.canvas();
        var colorArr = itemArr.arrByNum(num);
        for(var i=0;i<7;i++){
            if(colorArr[i] == 1){
                cvs.fillStyle = clock.config('on_color');
            }else{
                cvs.fillStyle = clock.config('off_color');
            }
            cvs.fillRect(arr[i][0]+marg_width*type_int+parseInt(type_int/2)*50,arr[i][1],arr[i][2][0],arr[i][2][1]);
        }
    },
    //返回一个二维数组，底维是每个长条的四个值
    "arraySeven": function(){
        var marg = 20;
        var array7 = [
            [0,marg,itemArr.itemH()],//1
            [marg,0,itemArr.itemW()],//2
            [marg+100,marg,itemArr.itemH()],//3
            [marg,marg*1+100,itemArr.itemW()],//4
            [0,marg*2+100,itemArr.itemH()],//5
            [marg,marg*2+200,itemArr.itemW()],//6
            [marg+100,marg*2+100,itemArr.itemH()]//7
        ];
        return array7;
    },
    //返回各个数字，对应的七个矩形的显示情况  1显示 | 0不显示
    "arrByNum": function(num){
        var arr;
        switch (num){
            case 0: arr = [1,1,1,0,1,1,1];break;
            case 1: arr = [0,0,1,0,0,0,1];break;
            case 2: arr = [0,1,1,1,1,1,0];break;
            case 3: arr = [0,1,1,1,0,1,1];break;
            case 4: arr = [1,0,1,1,0,0,1];break;
            case 5: arr = [1,1,0,1,0,1,1];break;
            case 6: arr = [1,1,0,1,1,1,1];break;
            case 7: arr = [0,1,1,0,0,0,1];break;
            case 8: arr = [1,1,1,1,1,1,1];break;
            case 9: arr = [1,1,1,1,0,1,1];break;
        }
        return arr;
    }
};
