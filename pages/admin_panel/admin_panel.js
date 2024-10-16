const addClassButton = document.querySelector("#addClassButton")
const classPopupDiv = document.querySelector("#classPopup")
const closeClassButton = document.querySelector("#closeClass")
addClassButton.addEventListener("click", function() {
    classPopup("open");
  })
closeClassButton.addEventListener("click",function(){
    classPopup("close")
})

function classPopup($action){

if($action === "open"){
classPopupDiv.style.display="block"
}else{
    classPopupDiv.style.display="none"
}

    
}