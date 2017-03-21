/**
 * Created by Administrator on 2017/3/8.
 */
var draw = {
    'table': function() {
        ctx.clearRect(0,0,CANVAS_TOTAL_WIDTH,CANVAS_TOTAL_HEIGHT);
        //画棋盘
        lineArr.forEach(function (item, index) {
            ctx.beginPath();
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
                ctx.setLineDash([5]);
            }else{
                ctx.strokeStyle = TABLE_LINE_COLOR;
                ctx.setLineDash([]);
            }
            ctx.fill();
            ctx.stroke();
            ctx.closePath();
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
                baseData.getRealPosition(item.locate.w, item.locate.h).y+CHEESE_WORD_SIZE/2-3
            );
        });
    },
    'infoTable': function(){
        ctx.beginPath();
        //draw.timer();
        //draw.tips();
        //draw.score();
        //draw.player();
        draw.info();
        draw.warning();
        ctx.closePath();
    },
    'player': function(){
        //头像
        //用户名
    },
    'cheeses': function(){
        //
    },
    'timer': function(){
        //自然时间
        //局时
        //玩家步时总和
    },
    'score': function(){
        //
    },
    'warning': function(){
        var infoText = SYSTEM_WARNING?SYSTEM_WARNING:'nothing';
        ctx.font = 15+"px Courier New";
        ctx.fillStyle = "red";
        ctx.fillText(
            infoText,
            baseData.getInfoPosition(10,0).x,
            CANVAS_TOTAL_HEIGHT/2+20
        );
    },
    'tips': function(){
        //
    },
    'on_active': function(){
        //
    },
    'info': function(){
        var infoText = '';
        if(CURRENT_PLAYER_COLOR == 'red'){
            infoText = "红方走棋";
        }else{
            infoText = "黑方走棋";
        }
        ctx.font = CHEESE_WORD_SIZE+"px Courier New";
        ctx.fillStyle = "red";
        ctx.fillText(
            infoText,
            baseData.getInfoPosition(10,0).x,
            CANVAS_TOTAL_HEIGHT/2
        );
    }
};
