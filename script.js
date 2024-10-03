const loginChoiceButtons = document.querySelectorAll("#login_choice button")
const choiceInputValue = document.querySelector("#choice_input")


loginChoiceButtons[0].addEventListener("click", function(){
    loginChoiceButtons[0].style.backgroundColor ='#45cfc1';
    loginChoiceButtons[1].style.backgroundColor ='#ffffffc1'
    choiceInputValue.value = "teacher"
   
})

loginChoiceButtons[1].addEventListener("click", function(){
    loginChoiceButtons[1].style.backgroundColor ='#45cfc1';
    loginChoiceButtons[0].style.backgroundColor ='#ffffffc1'
      choiceInputValue.value = "student"
  
})






    // loginChoiceButtons.forEach(button => {

    //     button.addEventListener("click", function(){
    //         button.style.backgroundColor ='#45cfc1';
    //     })
       
    // });





