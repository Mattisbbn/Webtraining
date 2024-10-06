const loginChoiceButtons = document.querySelectorAll("button")
const choiceInput = document.querySelector("#choice_input")
const submitLogin = document.querySelector("#submit_login")



loginChoiceButtons[0].addEventListener("click", function(){
    loginChoiceButtons[0].style.backgroundColor ='#45cfc1';
    loginChoiceButtons[1].style.backgroundColor ='#ffffffc1'
    choiceInput.value = "teacher"
   
})

loginChoiceButtons[1].addEventListener("click", function(){
    loginChoiceButtons[1].style.backgroundColor ='#45cfc1';
    loginChoiceButtons[0].style.backgroundColor ='#ffffffc1'
      choiceInput.value = "student"
  
})

submitLogin.addEventListener("submit", function(event){

    event.preventDefault();
})