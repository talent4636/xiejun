/**
 * @author  talent4636@gmail.com   Q:381114036
 * @desc    主流程 & 配置 & 内存常量定义
 * @type    {number}
 */


//===============CONFIG==============
var EVERY_BOX_WIDTH = 40;
var EVERY_BOX_HEIGHT = 40;
var TABLE_LINE_COLOR = "#C85A17";
var TABLE_LINE_DASH_COLOR = "#D96B28";
var CHEESE_BACKGROUND_COLOR = "#999999";
var CHEESE_COLOR_RED = "#FF0000";
var CHEESE_COLOR_BLACK = "#272727";
var TABLE_LOCATION_MARGIN_X = 50;//棋盘的偏移x
var TABLE_LOCATION_MARGIN_Y = 50;//棋盘的偏移y
var CHEESE_R = EVERY_BOX_WIDTH/2-5;//棋子的半径
var CHEESE_WORD_SIZE = CHEESE_R*1.5;//棋子上的字的size
var CANVAS_TOTAL_WIDTH = 550;
var CANVAS_TOTAL_HEIGHT = 500;
var DEBUG_MODE = false;//调试模式，控制台会打印很多log
//=============END CONFIG============

//运行存储
var pointLocArr = [];
var lineArr = [];
var cheeseArr = [];
var FOCUS_CHEESE_ITEM = false;
var CURRENT_PLAYER_COLOR = 'red';//红棋先走
//END


/**
 * 主逻辑
 * @type {any}
 */
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

//初始化
main_logi.init();

main_logi.select(1,1,'red');

draw.table();
var main = function(){
    draw.table();
    DEBUG_MODE?console.log(FOCUS_CHEESE_ITEM):'';
}

setInterval(main,300);



