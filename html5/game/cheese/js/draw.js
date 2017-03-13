/**
 * Created by Administrator on 2017/3/8.
 */
var draw = {
    'table': function() {
        //画棋盘
        lineArr.forEach(function (item, index) {
            ctx.moveTo(
                baseData.getRealPosition(item.begin.w,item.begin.h).x,
                baseData.getRealPosition(item.begin.w,item.begin.h).y
            );
            ctx.lineTo(
                baseData.getRealPosition(item.end.w,item.end.h).x,
                baseData.getRealPosition(item.end.w,item.end.h).y
            );
            
            if(item.type == 'dash'){
                ctx.strokeStyle = TABLE_LINE_DASH_COLOR;
                ctx.setLineDash([5,5,5]);
            }else{
                ctx.strokeStyle = TABLE_LINE_COLOR;
            }
            ctx.fill();
            ctx.stroke();
        });
        //楚河汉界 TODO
        //画子
        cheeseArr.forEach(function(item, index){
            //实心圆
            // console.log(item);
            ctx.beginPath();
            ctx.fillStyle = item.select?"#000000":CHEESE_BACKGROUND_COLOR;
            ctx.arc(
                baseData.getRealPosition(item.locate.w, item.locate.h).x,
                baseData.getRealPosition(item.locate.w, item.locate.h).y,
                CHEESE_R,
                0,
                Math.PI*2,
                false
            );
            ctx.fill();
            //写字
            ctx.font = CHEESE_WORD_SIZE+"px Courier New";
            ctx.fillStyle = (item.color=="red"?CHEESE_COLOR_RED:CHEESE_COLOR_BLACK);
            ctx.fillText(
                item.name,
                baseData.getRealPosition(item.locate.w, item.locate.h).x-CHEESE_WORD_SIZE/2,
                baseData.getRealPosition(item.locate.w, item.locate.h).y+CHEESE_WORD_SIZE/2-6
            );
        });

    }
    ,
    'cheeses': function(){
        //
    },
    'timer': function(){
        //
    },
    'score': function(){
        //
    },
    'warning': function(){
        //
    },
    'tips': function(){
        //
    },
    'on_active': function(){
        //
    }
};
