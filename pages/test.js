trigger_submit.addEventListener("click", () => {
  

    if(firstName.value == "") {
       firstName.classList.add("is-invalid");
    }
    if(lastName.value == "") {
      lastName.classList.add("is-invalid");
    }
  
    if (user_email.value == "") {
      user_email.classList.add("is-invalid");
    }
  
    if (contactNo.value == "") {
      contactNo.classList.add("is-invalid");
    }
      
    btnSubmit.click();
  
   
  })