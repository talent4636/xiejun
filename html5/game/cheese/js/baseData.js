/**
 * Created by Administrator on 2017/3/8.
 */

var baseData = {
    //function to test error
    'test': function(){
        console.log('123');
    },
    'cheeses': function(){
        //red
        var color_top = ARE_U_RED?"black":"red";
        cheeseArr.push({name:"车",color:color_top,locate:{w:1,h:1},type:"che",select:false});
        cheeseArr.push({name:"马",color:color_top,locate:{w:2,h:1},type:"ma",select:false});
        cheeseArr.push({name:"相",color:color_top,locate:{w:3,h:1},type:"xiang",select:false});
        cheeseArr.push({name:"士",color:color_top,locate:{w:4,h:1},type:"shi",select:false});
        cheeseArr.push({name:"帅",color:color_top,locate:{w:5,h:1},type:"jiang",select:false});
        cheeseArr.push({name:"士",color:color_top,locate:{w:6,h:1},type:"shi",select:false});
        cheeseArr.push({name:"相",color:color_top,locate:{w:7,h:1},type:"xiang",select:false});
        cheeseArr.push({name:"马",color:color_top,locate:{w:8,h:1},type:"ma",select:false});
        cheeseArr.push({name:"车",color:color_top,locate:{w:9,h:1},type:"che",select:false});
        cheeseArr.push({name:"炮",color:color_top,locate:{w:2,h:3},type:"pao",select:false});
        cheeseArr.push({name:"炮",color:color_top,locate:{w:8,h:3},type:"pao",select:false});
        cheeseArr.push({name:"兵",color:color_top,locate:{w:1,h:4},type:"bing",select:false});
        cheeseArr.push({name:"兵",color:color_top,locate:{w:3,h:4},type:"bing",select:false});
        cheeseArr.push({name:"兵",color:color_top,locate:{w:5,h:4},type:"bing",select:false});
        cheeseArr.push({name:"兵",color:color_top,locate:{w:7,h:4},type:"bing",select:false});
        cheeseArr.push({name:"兵",color:color_top,locate:{w:9,h:4},type:"bing",select:false});
        //black
        var color_bottom = color_top=="red"?"blue":"red";
        cheeseArr.push({name:"車",color:color_bottom,locate:{w:1,h:10},type:"che",select:false});
        cheeseArr.push({name:"馬",color:color_bottom,locate:{w:2,h:10},type:"ma",select:false});
        cheeseArr.push({name:"象",color:color_bottom,locate:{w:3,h:10},type:"xiang",select:false});
        cheeseArr.push({name:"仕",color:color_bottom,locate:{w:4,h:10},type:"shi",select:false});
        cheeseArr.push({name:"将",color:color_bottom,locate:{w:5,h:10},type:"jiang",select:false});
        cheeseArr.push({name:"仕",color:color_bottom,locate:{w:6,h:10},type:"shi",select:false});
        cheeseArr.push({name:"象",color:color_bottom,locate:{w:7,h:10},type:"xiang",select:false});
        cheeseArr.push({name:"馬",color:color_bottom,locate:{w:8,h:10},type:"ma",select:false});
        cheeseArr.push({name:"車",color:color_bottom,locate:{w:9,h:10},type:"che",select:false});
        cheeseArr.push({name:"炮",color:color_bottom,locate:{w:2,h:8},type:"pao",select:false});
        cheeseArr.push({name:"炮",color:color_bottom,locate:{w:8,h:8},type:"pao",select:false});
        cheeseArr.push({name:"卒",color:color_bottom,locate:{w:1,h:7},type:"bing",select:false});
        cheeseArr.push({name:"卒",color:color_bottom,locate:{w:3,h:7},type:"bing",select:false});
        cheeseArr.push({name:"卒",color:color_bottom,locate:{w:5,h:7},type:"bing",select:false});
        cheeseArr.push({name:"卒",color:color_bottom,locate:{w:7,h:7},type:"bing",select:false});
        cheeseArr.push({name:"卒",color:color_bottom,locate:{w:9,h:7},type:"bing",select:false});
    },
    'point': function(){
        for(var i=1; i<=9; i++){
            for(var j=1; j<=10; j++){
                pointLocArr[i][j] = {
                    x:(TABLE_LOCATION_MARGIN_X+(i-1)*EVERY_BOX_WIDTH),
                    y:(TABLE_LOCATION_MARGIN_Y+(j-1)*EVERY_BOX_HEIGHT)
                };
            }
        }
        return pointLocArr;
    },
    'line': function(){
        for(var i=1; i<=9; i++){//竖线
            if(i==1 || i==9){
                lineArr.push({begin:{w:i,h:1},end:{w:i,h:10},type:"normal"});
            }else{
                lineArr.push({begin:{w:i,h:1},end:{w:i,h:5},type:"normal"});
                lineArr.push({begin:{w:i,h:6},end:{w:i,h:10},type:"normal"});
            }
        }
        for(var j=1; j<=10; j++){//横线
            lineArr.push({begin:{w:1,h:j},end:{w:9,h:j},type:"normal"});
        }
        //虚线 象路
        lineArr.push({begin:{w:1,h:3},end:{w:3,h:1},type:"normal"});
        lineArr.push({begin:{w:1,h:3},end:{w:3,h:5},type:"normal"});
        lineArr.push({begin:{w:3,h:1},end:{w:7,h:5},type:"normal"});
        lineArr.push({begin:{w:3,h:5},end:{w:7,h:1},type:"normal"});
        lineArr.push({begin:{w:9,h:3},end:{w:7,h:1},type:"normal"});
        lineArr.push({begin:{w:9,h:3},end:{w:7,h:5},type:"normal"});
        lineArr.push({begin:{w:1,h:8},end:{w:3,h:6},type:"normal"});
        lineArr.push({begin:{w:1,h:8},end:{w:3,h:10},type:"normal"});
        lineArr.push({begin:{w:9,h:8},end:{w:7,h:6},type:"normal"});
        lineArr.push({begin:{w:9,h:8},end:{w:7,h:10},type:"normal"});
        lineArr.push({begin:{w:3,h:6},end:{w:7,h:10},type:"normal"});
        lineArr.push({begin:{w:3,h:10},end:{w:7,h:6},type:"normal"});
        //虚线 士路
        lineArr.push({begin:{w:4,h:1},end:{w:6,h:3},type:"dash"});
        lineArr.push({begin:{w:4,h:3},end:{w:6,h:1},type:"dash"});
        lineArr.push({begin:{w:4,h:8},end:{w:6,h:10},type:"dash"});
        lineArr.push({begin:{w:4,h:10},end:{w:6,h:8},type:"dash"});
    },
    // 'mark': function(){
    //     //
    // },
    'getRealPosition': function(a,b){
        return {
            x:(TABLE_LOCATION_MARGIN_X+(a-1)*EVERY_BOX_WIDTH),
            y:(TABLE_LOCATION_MARGIN_Y+(b-1)*EVERY_BOX_HEIGHT)
        };
    },
    //对信息面板的位置重新计算
    'getInfoPosition': function(x,y){
        var _leftTotalWitch = EVERY_BOX_WIDTH*8+TABLE_LOCATION_MARGIN_X*2;
        var _topTotalHeight = TABLE_LOCATION_MARGIN_Y;
        var location = {x: (_leftTotalWitch+x), y:(_topTotalHeight+y)};
        return location;
    }
}
