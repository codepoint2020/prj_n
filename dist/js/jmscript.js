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
trigger_submit.addEventListener("click", () => {
  

  // if(firstName.value == "") {
  //    firstName.classList.add("is-invalid");
  // }
  // if(lastName.value == "") {
  //   lastName.classList.add("is-invalid");
  // }

  // if (user_email.value == "") {
  //   user_email.classList.add("is-invalid");
  // }

  // if (contactNo.value == "") {
  //   contactNo.classList.add("is-invalid");
  // }
    
  btnSubmit.click();

 
})

const letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
    'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
    'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G',
    'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
    'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

  const numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
  
  const symbols = ['!', '#', '$', '%', '&', '(', ')', '*',('_')];

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



  











