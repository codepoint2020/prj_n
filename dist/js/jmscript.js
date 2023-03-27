const passwordEye = document.querySelector("#passwordEye");
const gen_password = document.querySelector("#gen_password");
const btnSubmit = document.querySelector("#btnSubmit");
const trigger_submit = document.querySelector("#trigger_submit");
const myAlert = document.querySelector(".alert");
const btnClose = document.querySelector(".btn-close");
const firstName = document.querySelector("#firstName");
const middleName = document.querySelector("#middleName");
const lastName = document.querySelector("#lastName");
const userName = document.querySelector("#userName");
userName.disabled = true;


//generate random 4 digit numbers
function rand4() {
    let myFour = Math.floor(Math.random() * 10000).toString().padStart(4, '0');
    return myFour;
}

function genUsername() {
    let firstTwoChars = firstName.value.toLowerCase().substr(0, 2);
    let firstThreeChars = lastName.value.toLowerCase().substr(0, 3);
    let uname = firstTwoChars + firstThreeChars + "_23" + rand4();
    return uname;
}

firstName.addEventListener("input", () => {
    userName.setAttribute("value", genUsername());
})

middleName.addEventListener("input", () => {
    userName.setAttribute("value", genUsername());
})

lastName.addEventListener("input", () => {
    userName.setAttribute("value", genUsername());
})



//Closes the message alert during CRUD operations
btnClose.addEventListener("click", () => {
    myAlert.style.display = 'none';
})


//toggle the text and password attribute for the user password in the registration form
passwordEye.addEventListener("click", () => {
    if (gen_password.type == "text") {
        gen_password.type = "password";
       
        passwordEye.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        gen_password.type = "text";
      
        passwordEye.innerHTML = '<i class="fas fa-eye"></i>';
    }
})

//The actual button that will submit the User Registration button
btnSubmit.style.display = 'none';
trigger_submit.addEventListener("click", () => {
    btnSubmit.click();
    
})







