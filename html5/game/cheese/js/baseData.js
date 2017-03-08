/**
 * Created by Administrator on 2017/3/8.
 */

var baseData = {
    'test': function(){
        console.log('123');
    },
    'cheeses': function(){
        return [
            {name:"车",color:"red",locate:{w:1,h:1},type:"che"},
        ];
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
                lineArr.push({begin:{w:i,h:1},end:{w:i,h:10}});
            }else{
                lineArr.push({begin:{w:i,h:1},end:{w:i,h:5}});
                lineArr.push({begin:{w:i,h:6},end:{w:i,h:10}});
            }
        }
        for(var j=1; j<=10; j++){//横线
            lineArr.push({begin:{w:1,h:j},end:{w:9,h:j}});
        }
        // lineArr = [
        //     {begin:{w:1,h:1},end:{w:1,h:9}},
        //     {begin:{x:1,y:1},end:{x:1,y:1}},
        //     {begin:{x:1,y:1},end:{x:1,y:1}},
        //     {begin:{x:1,y:1},end:{x:1,y:1}},
        //     {begin:{x:1,y:1},end:{x:1,y:1}},
        //     {begin:{x:1,y:1},end:{x:1,y:1}},
        //     {begin:{x:1,y:1},end:{x:1,y:1}},
        //     {begin:{x:1,y:1},end:{x:1,y:1}},
        //     {begin:{x:1,y:1},end:{x:1,y:1}},
        // ];
        // return lineArr;
        // for(var i=1; i<=9; i++){
        //     for(var j=1; j<=10; j++){
        //         // lineArr
        //     }
        // }
    },
    'getRealPosition': function(a,b){
        return {
            x:(TABLE_LOCATION_MARGIN_X+(a-1)*EVERY_BOX_WIDTH),
            y:(TABLE_LOCATION_MARGIN_Y+(b-1)*EVERY_BOX_HEIGHT)
        };
    }
}

// var getPointArr = function(){
//     for(var i=1; i<=9; i++){
//         for(var j=1; j<=10; j++){
//             pointLocArr[i][j] = {
//                 x:(TABLE_LOCATION_MARGIN_X+(i-1)*EVERY_BOX_WIDTH),
//                 y:(TABLE_LOCATION_MARGIN_Y+(j-1)*EVERY_BOX_HEIGHT)
//             };
//         }
//     }
//     return pointLocArr;
// }