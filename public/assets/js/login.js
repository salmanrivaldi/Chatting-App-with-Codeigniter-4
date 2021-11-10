const form = document.querySelector("form"),
  emailField = form.querySelector(".email"),
  emailInput = emailField.querySelector("input"),
  passwordField = form.querySelector(".password"),
  passwordInput = passwordField.querySelector("input");

form.onsubmit = (e) => {
  e.preventDefault(); //preventing from form submitting
  //if email and password is blank then add shake class in it else call specified function
  emailInput.value == "" ? emailField.classList.add("shake", "error") : checkEmail();
  passwordInput.value == "" ? passwordField.classList.add("shake", "error") : checkPass();

  setTimeout(() => {
    //remove shake class after 500ms
    emailField.classList.remove("shake");
    passwordField.classList.remove("shake");
  }, 500);

  emailInput.onkeyup = () => {
    checkEmail();
  }; //calling checkEmail function on email input keyup
  passwordInput.onkeyup = () => {
    checkPass();
  }; //calling checkPassword function on pass input keyup


  function checkEmail() {
    //checkEmail function
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; //pattern for validate email
    if (!emailInput.value.match(pattern)) {
      //if pattern not matched then add error and remove valid class
      emailField.classList.add("error");
      emailField.classList.remove("valid");
      let errorTxt = emailField.querySelector(".error-txt");
      //if email value is not empty then show please enter valid email else show Email can't be blank
      emailInput.value != "" ? (errorTxt.innerText = "Enter a valid email address") : (errorTxt.innerText = "Email can't be blank");
    } else {
      //if pattern matched then remove error and add valid class
      emailField.classList.remove("error");
      emailField.classList.add("valid");
    }
  }

  function checkPass() {
    //checkPass function
    if (passwordInput.value == "") {
      //if pass is empty then add error and remove valid class
      passwordField.classList.add("error");
      passwordField.classList.remove("valid");
    } else {
      //if pass is empty then remove error and add valid class
      passwordField.classList.remove("error");
      passwordField.classList.add("valid");
    }
  }


  //if emailField and passwordField doesn't contains error class that mean user filled details properly
  if (!emailField.classList.contains("error") && !passwordField.classList.contains("error")) {
    window.location.href = form.getAttribute("action"); //redirecting user to the specified url which is inside action attribute of form tag
  }
};
