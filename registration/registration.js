
function check(id){
    
    let get = document.getElementById(id);
    let sel = document.getElementById("enrollment");
      if(get.checked){
        if(sel.className === "no"){
            sel.classList.remove("no");
            sel.classList.add("yes");
          }
          else{
            sel.classList.add("yes");
          }
        
      }
      else{
        if(sel.className === "yes"){
            sel.classList.remove("yes");
            sel.classList.add("no");
          }
          else{
            sel.classList.add("no");
          }
          
      }
}

function validatepass(id1,id2) {
  let pass = document.getElementById(id1).value;
  let cpass = document.getElementById(id2).value;
  if(pass !== cpass){
    alert("cofirm password not match with password");
  }
}
