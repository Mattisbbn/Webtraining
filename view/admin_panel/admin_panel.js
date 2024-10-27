

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
    button.addEventListener("click", (event) => {
    let index = addAccountButtonArray.indexOf(button)
      Popup("open", pannelDiv[index]);  
  });
});





