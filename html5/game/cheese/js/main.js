
//===============CONFIG==============
var EVERY_BOX_WIDTH = 80;
var EVERY_BOX_HEIGHT = 80;
var TABLE_LINE_COLOR = '#C85A17';
var TABLE_LOCATION_MARGIN_X = 50;//棋盘的偏移x
var TABLE_LOCATION_MARGIN_Y = 0;//棋盘的偏移y
var CHEESE_R = EVERY_BOX_WIDTH/2;
var CANVAS_TOTAL_WIDTH = 900;
var CANVAS_TOTAL_HEIGHT = 800;
//=============END CONFIG============

//运行存储
var pointLocArr = [];
var lineArr = [];
//END


/**
 * 主逻辑
 * @type {any}
 */
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

//初始化
main_logi.init();

draw.table();


