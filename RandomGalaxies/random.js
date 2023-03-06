var top_img = "cluster";
var top_cap = "cluster_c";
var img_src = ["cluster", "interacting", "m51", "m104", "ngc1300", "ngc6217"];
var cap_src = ["Galaxy Cluster", "Interacting Galaxies", "M 51", "M 104", "NGC 1300", "NGC 6217"];

function changeImg () {
    var rnd_idx = Math.trunc (Math.random() * img_src.length);
    var new_img = img_src[rnd_idx];

    let styleTop = document.getElementById(top_img).style;
    let styleNew = document.getElementById(new_img).style;

    styleTop.zIndex = "0";
    styleNew.zIndex = "10";

    top_img = new_img;
    document.getElementById("cap").innerHTML = cap_src[rnd_idx];
}
