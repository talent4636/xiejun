
//===============CONFIG==============
var EVERY_BOX_WIDTH = 80;
var EVERY_BOX_HEIGHT = 80;
var TABLE_LINE_COLOR = "#C85A17";
var TABLE_LINE_DASH_COLOR = "#D96B28";
var CHEESE_BACKGROUND_COLOR = "#999999";
var CHEESE_COLOR_RED = "#FF0000";
var CHEESE_COLOR_BLACK = "#272727";
var TABLE_LOCATION_MARGIN_X = 50;//棋盘的偏移x
var TABLE_LOCATION_MARGIN_Y = 50;//棋盘的偏移y
var CHEESE_R = EVERY_BOX_WIDTH/2-5;//棋子的半径
var CHEESE_WORD_SIZE = CHEESE_R*1.5;//棋子上的字的size
var CANVAS_TOTAL_WIDTH = 900;
var CANVAS_TOTAL_HEIGHT = 800;
//=============END CONFIG============

//运行存储
var pointLocArr = [];
var lineArr = [];
var cheeseArr = [];
//END


/**
 * 主逻辑
 * @type {any}
 */
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

//初始化
main_logi.init();




