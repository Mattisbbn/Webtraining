const loginChoiceButtons = document.querySelectorAll(".login_buttons")
const choiceInput = document.querySelector("#choice_input")
const submitLogin = document.querySelector("#submit_login")

function resetColor(){
    loginChoiceButtons.forEach((button) =>  button.style.backgroundColor ='#ffffffc1')
}

loginChoiceButtons[0].addEventListener("click", function(){
    resetColor()
    loginChoiceButtons[0].style.backgroundColor ='#45cfc1';
    
    choiceInput.value = "teacher"
   
})

loginChoiceButtons[1].addEventListener("click", function(){
    resetColor();
    loginChoiceButtons[1].style.backgroundColor ='#45cfc1';
      choiceInput.value = "admin"
  
})


loginChoiceButtons[2].addEventListener("click", function(){
    resetColor();
    loginChoiceButtons[2].style.backgroundColor ='#45cfc1';
    choiceInput.value = "student"
  
})

submitLogin.addEventListener("submit", function(event){

    event.preventDefault();
})