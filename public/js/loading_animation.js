function loading_animation(mark)
{
    if(mark){
        var bodyWidth = document.documentElement.clientWidth;
        var bodyHeight = Math.max(document.documentElement.clientHeight, document.body.scrollHeight);
        var bgObj = document.createElement("div" );
        bgObj.setAttribute( 'id', 'bgDiv' );
        bgObj.style.position = "absolute";
        bgObj.style.top = "0";
        bgObj.style.background = "#000000";
        bgObj.style.filter = "progid:DXImageTransform.Microsoft.Alpha(style=3,opacity=25,finishOpacity=75" ;
        bgObj.style.opacity = "0.5";
        bgObj.style.left = "0";
        bgObj.style.width = bodyWidth + "px";
        bgObj.style.height = bodyHeight + "px";
        bgObj.style.zIndex = "10000"; //设置它的zindex属性，让这个div在z轴最大，用户点击页面任何东西都不会有反应|
        document.body.appendChild(bgObj); //添加遮罩
        var loadingObj = document.createElement("div");
        loadingObj.setAttribute("id","preloader5");
        loadingObj.setAttribute("class","preloader5");
        loadingObj.style.position = "absolute";
        loadingObj.style.top = bodyHeight / 2 - 120 + "px";
        loadingObj.style.left = bodyWidth / 2 - 32 + "px";
        loadingObj.style.width = "32px";
        loadingObj.style.height = "32px";
        loadingObj.style.zIndex = "10001";
        document.body.appendChild(loadingObj);//添加动画主体
        var loadingObjChild_1 = document.createElement("div");
        loadingObjChild_1.setAttribute("class","cube1");
        document.getElementById("preloader5").appendChild(loadingObjChild_1);
        var loadingObjChild_2 = document.createElement("div");
        loadingObjChild_2.setAttribute("class","cube2");
        document.getElementById("preloader5").appendChild(loadingObjChild_2);
    }
    else {
        $('#bgDiv').remove();
        $('#preloader5').remove();
    }
}
