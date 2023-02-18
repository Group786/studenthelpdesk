function check(id){
    let get = Document.getElementById(id).value;
    if(get){
        document.getElementById("Enrolment").style.display="block";
    }
    else{
        document.getElementById("Enrolment").style.display="hide";
    }
}