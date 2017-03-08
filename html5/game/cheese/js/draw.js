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
            ctx.strokeStyle = TABLE_LINE_COLOR;
            ctx.fill();
            ctx.stroke();
        });
        //楚河汉界 TODO
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