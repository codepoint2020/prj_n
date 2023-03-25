const passwordEye = document.querySelector("#passwordEye");
const gen_password = document.querySelector("#gen_password");




passwordEye.addEventListener("click", () => {
    if (gen_password.type == "text") {
        gen_password.type = "password";
       
        passwordEye.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        gen_password.type = "text";
      
        passwordEye.innerHTML = '<i class="fas fa-eye"></i>';
    }
})






