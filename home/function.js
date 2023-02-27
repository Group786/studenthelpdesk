function hide(divid) {
    let x = document.getElementById(divid);
    if (x.style.display !== "none") {
        x.style.display = "none";
    }
}

function repo(id){
    let x = document.getElementById('qqid');
    console.log(id);
    x.value = id;
    document.getElementById('uid').click();

}
