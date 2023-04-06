const passwordEye = document.querySelector("#passwordEye");
const gen_password = document.querySelector("#gen_password");
const btnSubmit = document.querySelector("#btnSubmit");
const trigger_submit = document.querySelector("#trigger_submit");
const myAlert = document.querySelector(".alert");
const btnClose = document.querySelector(".btn-close");
const firstName = document.querySelector("#firstName");
const lastName = document.querySelector("#lastName");
const userName = document.querySelector("#userName");
const userType = document.querySelector("#userType");
const user_email = document.querySelector("#user_email");
const contactNo = document.querySelector("#contactNo");


// btnSubmit.style.display = "none";


// generate random 4 digit numbers
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

lastName.addEventListener("input", () => {
    userName.setAttribute("value", genUsername());
  
})



//Closes the message alert during CRUD operations
btnClose.addEventListener("click", () => {
    myAlert.style.display = 'none';
})


// toggle the text and password attribute for the user password in the registration form
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
//transferring to be triggered by PHP if statement
trigger_submit.addEventListener("click", () => {

  let errorArray = [];

  if(firstName.value.trim() == "") {
     errorArray.push({ 
      targetInput: "firstName",  
      appendedClass: "is-invalid" 
     });
  }
  if(lastName.value.trim() == "") {
    errorArray.push({ 
      targetInput: "lastName",  
      appendedClass: "is-invalid" 
     });
  }

  if (user_email.value.trim() == "") {
    errorArray.push({ 
      targetInput: "user_email",  
      appendedClass: "is-invalid" 
     });
  }

  if (contactNo.value.trim() == "") {
    errorArray.push({ 
      targetInput: "contactNo",  
      appendedClass: "is-invalid" 
     });
  }


  // console.log(errorArray.length);

  if (errorArray.length === 0) {
    btnSubmit.click();

  } else {

    // if (errorArray.includes(targetInput[0])) {
    //   console.log("yeah it includes firstname as error, it has an empty firstname");
    // }
    for (let i = 0; i < errorArray.length; i++) {
      if (errorArray[i].targetInput == "firstName") {
          firstName.classList.add(errorArray[i].appendedClass);
          console.log("yes firstname is empty");
      }

      if (errorArray[i].targetInput == "lastName") {
        lastName.classList.add(errorArray[i].appendedClass);
        console.log("yes lastname is empty");
      }

      if (errorArray[i].targetInput == "user_email") {
        user_email.classList.add(errorArray[i].appendedClass);
        console.log("yes user_email is empty");
      }

      if (errorArray[i].targetInput == "contactNo") {
        contactNo.classList.add(errorArray[i].appendedClass);
        console.log("yes contactNo is empty");
      }
    }
  
  }
  
})

const letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
    'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
    'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G',
    'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
    'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

  const numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
  
  const symbols = ['!', '#', '&', '*',('_')];

  let genChars = [];

//   let randPassword = "";

  function shuffleArray(array) {
    array.sort(() => Math.random() - 0.5);
    return array;
  }

//Function to generate 3 random letters, 3 random numbers, and 3 random symbols
  const generatePassword = () => {
    
    for (let i = 0; i < 3; i++) {
      const x = Math.floor(Math.random() * letters.length - 1);
      genChars.push(letters[x]);
    
    }

    for (let i = 0; i < 3; i++) {
      const x = Math.floor(Math.random() * numbers.length);
      genChars.push(numbers[x]);
    }

    for (let i = 0; i < 3; i++) {
      const x = Math.floor(Math.random() * symbols.length);
      genChars.push(symbols[x]);
    }

  
    //shuffle randomly the sequencially generated password to improve security
    const shuffledGenChars = shuffleArray(genChars);
    let randPassword = shuffledGenChars.join('').trim();
    return randPassword;

  }
  gen_password.setAttribute("value",  generatePassword());



  











