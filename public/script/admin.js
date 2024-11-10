const closePannelButton = document.querySelectorAll(".closePannelButton");
const closePannelButtonArray = Array.from(closePannelButton);

const addAccountButton = document.querySelectorAll(".addAccountButton")
const addAccountButtonArray = Array.from(addAccountButton);

const pannelDiv = document.querySelectorAll(".pannelDiv");

function Popup(action, div) {
    if (action === "open") {
      div.classList.remove("d-none");
      div.classList.add("d-flex");
    } else {
      div.classList.remove("d-flex");
      div.classList.add("d-none");
    }
  }


closePannelButton.forEach((button) => {
    button.addEventListener("click", (event) => {
    event.preventDefault();
    let index = closePannelButtonArray.indexOf(button)
      Popup("close", pannelDiv[index]);  
  });
});

addAccountButton.forEach((button) => {
    button.addEventListener("click", () => {
    let index = addAccountButtonArray.indexOf(button)
      Popup("open", pannelDiv[index]);  
  });
});


//Nav admin

const navbuttons = document.querySelectorAll('.navbuttons');
const adminSections = document.querySelectorAll(".admin-section")
const navbuttonsArray = Array.from(navbuttons);

navbuttons.forEach(button=>{
  button.addEventListener("click" ,()=>{
    navbuttons.forEach(button=>{
      button.classList.remove("active")
    })
  button.classList.add("active")
  let index = navbuttonsArray.indexOf(button)
  
  showSection(index)
  })
})

function showSection(sectionID){
  adminSections.forEach((section)=>{
    section.classList.add("d-none");
  })
  adminSections[sectionID].classList.remove("d-none");

}

