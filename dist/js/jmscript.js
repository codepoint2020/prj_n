const passwordEye = document.querySelector("#passwordEye");
const gen_password = document.querySelector("#gen_password");
const btnSubmit = document.querySelector("#btnSubmit");
const trigger_submit = document.querySelector("#trigger_submit");
const myAlert = document.querySelector(".alert");
const btnClose = document.querySelector(".btn-close");

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







