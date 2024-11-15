var fieldsets = document.querySelectorAll('fieldset');
var email = document.getElementById('email');
var fname = document.getElementById('fname');
var password = document.getElementById('password');
var c_password = document.getElementById('cpassword');
var mobile = document.getElementById('mobile');
var image = document.getElementById('fileInput');
var span = document.querySelectorAll(".error");
var mob_pattern = /^(?:\+977)?[9]\d{9}$/;
var username_pattern = /^[A-Z][a-zA-Z]* [A-Z][a-zA-Z]*$/;
var password_pattern = /^.{8,}$/;
var email_pattern = /^[A-Za-z0-9._%+-]+@[A-za-z0-9]+\.[A-Za-z]{2,}$/;
//regex functions
    function validateNumber(phoneNumber){
        return mob_pattern.test(phoneNumber);
    }
    function validateusername(username){
        return username_pattern.test(username);
    }
    function validatepassword(Password){
        return password_pattern.test(Password);
    }
    function validateEmail(Email){
        return email_pattern.test(Email);
    }
    
//client side error response functions
    function validatecolor(color,name){
        const fieldset = document.querySelector(` input[name = ${name}]`).parentNode;
        if(fieldset){
            fieldset.style.border = `2px solid ${color}`;
        }
}
  function updateError(Message, color, name){
    span.forEach(function(errors){
        if(errors.classList.contains("error") && (errors.classList.contains(name))){
            errors.textContent = Message;
            errors.style.color = color;
        }
    })
  }
    mobile.addEventListener("keyup",function(){
        var phone = mobile.value;
        if(!validateNumber(phone)){
            updateError("Incorrect Mobile Pattern","red","Mobile");
            validatecolor("red","mobile");
        }
        
        else{
            updateError("Correct","green","Mobile");
            validatecolor("green","mobile");
        }
    })
    
    fname.addEventListener("keyup",function(){
        var Name = fname.value;
        if(!validateusername(Name)){
            updateError("(e.g. Harry Potter)","red","Name");
            validatecolor("red","fname");
        }
        else{
            updateError("Correct","green","Name");
            validatecolor("green","fname");
        }
    })

    password.addEventListener("keyup",function(){
        var passwordvalue = password.value;
        if(!validatepassword(passwordvalue)){
            updateError("at least 8 characters","red","Password");
            validatecolor("red","password");
        }
        else{
            updateError("Correct","green","Password");
            validatecolor("green","password");
        }
    })
    c_password.addEventListener("keyup",function(){
        var cpasswordvalue = c_password.value;
        if(!validatepassword(cpasswordvalue)){
            updateError("at least 8 characters","red","Cpassword");
            validatecolor("red","cpassword");
        }
        else{
            updateError("Correct","green","Cpassword");
            validatecolor("green","cpassword");
        }
    })
    email.addEventListener("keyup",function(){
        var email_value = email.value;
        if(!validateEmail(email_value)){
            updateError("example: stephen@gmail.com","red","Email");
            validatecolor("red","email");
        }
        else{
            updateError("Correct","green","Email");
            validatecolor("green","email");
        }
    })

    