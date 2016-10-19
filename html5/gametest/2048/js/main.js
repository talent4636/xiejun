/**
 * Created by Administrator on 2016/8/26.
 */

//config
var _body = $("#_body");
var arrNumInput = $("#data-box").children('input');
var arrNum;
var arrColor = [];
//重新开始
var restart = function(){
    for(var i=0;i<2;i++){
        var m = Math.floor(Math.random()*4);
        var n = Math.floor(Math.random()*4);
        idx = m*4+n;
        if(arrNumInput[idx].value == 0){
            --i;
            continue;
        }
        console.log(idx);
        arrNumInput[idx].value(2);
        // arrNum[m][n] = 2;
    }
}

//初始化
var initBox = function(){
    getNumArr();
    restart();
    var boxHtml = "";
    arrNum.each(function(item,index){
        index.each(function(i,j){
            boxHtml += "<li class='one'>"+j+"</li>";
        });
    });
    _body.html(boxHtml);
}

var getNumArr = function(){
    arrNumInput.each(function(item,index){
        var m = item / 4;
        var n = item % 4;
        var v = index.value;
        // alert(v);
    });
}

initBox();

