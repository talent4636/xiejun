/**div隐藏、显示效果--滑动 by谢俊*/
var oheight = 100;//原始的高度，根据css调整
//var px = 10;//每次移动的像素数
var time = 0;//每次移动等待时间
function change_fun(_this,o){
    var hdiv = document.getElementById('comment-'+o);
    var h = document.getElementById('inside-div-'+o).offsetHeight;//展开的高度
    /** 考虑复杂了
     * var inside = document.getElementById('inside-div-'+o);
     * var h = inside.offsetHeight;
     * */
    var s = hdiv.getAttribute('status');//现在的展开状态
    if(h>oheight){
        if(s!='open'){
            //展开
//            _this.innerHTML = "收起";
            hdiv.setAttribute("status", "open");
            changeHeight(hdiv,oheight,h);
        }else{
            //收起
//            _this.innerHTML = "展开";
            hdiv.setAttribute("status", "close");
            changeHeight(hdiv,h,oheight);
        }
    }else {
        return true;
    }
}
//改变div的高度
function changeHeight(o,n,t){
    //n是现在高度，t是目标高度
    var p = o;
    if(n<t){
        process_up(p,n,t);
    }else{
        process_down(p,n,t);
    }
}
var process_up = function(p,n,t){
	px = (t-n)>5000?1000:((t-n)>500?100:((t-n)>100?50:10));
    if(t>n){
        p.style.height = n+px+"px";
        n = n+px;
        setTimeout(function(){process_up(p,n,t)},time);
    }else{
    	p.style.height = t+'px';
        return ;
    }
}
var process_down = function(p,n,t){
	px = (n-t)>5000?1000:((n-t)>500?100:((n-t)>100?50:10));
    if(t<n){
        p.style.height = n-px+"px";
        n = n-px;
        setTimeout(function(){process_down(p,n,t)},time);
    }else{
    	p.style.height = t+'px';
        return ;
    }
}