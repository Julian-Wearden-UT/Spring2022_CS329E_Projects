var top_img = "img11";
var img_src = ["img1", "img2", "img3", "img4", "img5", "img6", "img7", "img8", "img9", "img10", "img11"];
var nxt_idx = 10;
var myInterval;

function changeImg () {
    if (nxt_idx < 10) {nxt_idx = nxt_idx + 1;}
    else {nxt_idx = 0}
    console.log(nxt_idx)

    var new_img = img_src[nxt_idx];

    let styleTop = document.getElementById(top_img).style;
    let styleNew = document.getElementById(new_img).style;

    styleTop.zIndex = "0";
    styleNew.zIndex = "10";

    top_img = new_img;
}


function start_show(){
     myInterval = setInterval(changeImg, 3000);
}

function stop_show(){
    clearInterval(myInterval);
}