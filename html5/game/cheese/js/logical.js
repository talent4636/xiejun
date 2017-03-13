/**
 * Created by Administrator on 2017/3/8.
 */
var main_logi = {
    'canMove': function(){
        //
    },
    'move': function(){
        //
    },
    'is_win': function(){
        //
    },
    'is_time_out': function(){
        //
    },
    'level_up': function(){
        //
    },
    'level_down': function(){
        //
    },
    'init': function(){
        baseData.line();
        baseData.cheeses();
        canvas.width = CANVAS_TOTAL_WIDTH;
        canvas.height = CANVAS_TOTAL_HEIGHT;
        var c = document.getElementById('canvas');
        c.addEventListener(
            'mousemove', function(event){
                FOCUS_CHEESE_ITEM = main_logi.getCheeseByPosition(event);
            }
        );
        c.addEventListener(
            'click', function(){
                if(FOCUS_CHEESE_ITEM == 'false' || !FOCUS_CHEESE_ITEM){
                    //你点了个寂寞
                    return ;
                }else{
                    if(CURRENT_PLAYER_COLOR != FOCUS_CHEESE_ITEM.color){
                        //当前用户只能点自己的子
                        return ;
                    }else{
                        main_logi.select(
                            FOCUS_CHEESE_ITEM.locate.w,
                            FOCUS_CHEESE_ITEM.locate.h,
                            'red'
                        );
                    }
                }
            }
        );
        //c.mousemove(function(event){
        //    main_logi.getMousePosition(event);
        //});
    },
    //a, b, user:red/black
    'select': function(a, b, user){
        cheeseArr.forEach(function(item, index){
            if(item.color!=user) return false;
            if(item.locate.w==a && item.locate.h==b){
                cheeseArr[index].select = true;
            }else{
                cheeseArr[index].select = false;
            }
        });
    },
    //获取鼠标的位置
    'getMousePosition': function(e){
        var rect = canvas.getBoundingClientRect();
        var position = {
            x: e.clientX - rect.left * (canvas.width / rect.width),
            y: e.clientY - rect.top * (canvas.height / rect.height)
        };
        return position;
    },
    //根据坐标获取棋子的对象：{item}
    'getCheeseByPosition': function(e){
        var pos = main_logi.getMousePosition(e);
        var returnItem = false;
        cheeseArr.forEach(function(item, index){
            var realP = baseData.getRealPosition(item.locate.w, item.locate.h);
            if((realP.x+CHEESE_R)>pos.x && (realP.x-CHEESE_R)<pos.x &&
                (realP.y+CHEESE_R)>pos.y && (realP.y-CHEESE_R)<pos.y){
                returnItem = item;
            }
        });
        return returnItem;
    },
    //红走了黑走，切换当前玩家
    'playerChange': function(){
        if(CURRENT_PLAYER_COLOR == 'red'){
            CURRENT_PLAYER_COLOR = 'black';
        }else{
            CURRENT_PLAYER_COLOR = 'red';
        }
    }
}
