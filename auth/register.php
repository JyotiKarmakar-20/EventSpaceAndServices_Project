<?php include '../includes/header.php'; ?>

<style>

/* ================= REGISTER PAGE ================= */

.register-section{

    min-height:100vh;

    display:flex;

    align-items:center;

    justify-content:center;

    padding:35px 15px;

    background:
    linear-gradient(135deg,#fff1f5,#f3e8ff);

    position:relative;

    overflow:hidden;
}

/* ================= BACKGROUND EFFECTS ================= */

.register-section::before{

    content:"";

    position:absolute;

    width:380px;
    height:380px;

    background:#ffb3d1;

    border-radius:50%;

    top:-140px;
    left:-120px;

    opacity:0.22;

    filter:blur(50px);
}

.register-section::after{

    content:"";

    position:absolute;

    width:320px;
    height:320px;

    background:#cdb4db;

    border-radius:50%;

    bottom:-120px;
    right:-100px;

    opacity:0.22;

    filter:blur(50px);
}

/* ================= CARD ================= */

.register-card{

    background:rgba(255,255,255,0.70);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,0.45);

    padding:38px 35px;

    border-radius:32px;

    width:100%;

    max-width:540px;

    position:relative;

    z-index:2;

    box-shadow:
    0 20px 45px rgba(181,126,220,0.14);
}

/* ================= TITLE ================= */

.register-card h2{

    font-weight:700;

    color:#2b2d42;

    text-align:center;

    margin-bottom:28px;

    font-size:38px;
}

/* ================= INPUTS ================= */

.form-control{

    border:none;

    height:55px;

    border-radius:16px;

    padding:0 18px;

    background:rgba(255,255,255,0.88);

    box-shadow:
    inset 0 2px 8px rgba(0,0,0,0.04);

    transition:0.3s;

    font-size:15px;
}

textarea.form-control{

    height:110px;

    padding-top:15px;

    resize:none;
}

.form-control:focus{

    background:white;

    box-shadow:
    0 0 0 4px rgba(177,133,219,0.18);

    border:none;
}

/* ================= ERROR ================= */

.error{

    color:#e63946;

    font-size:13px;

    margin-top:6px;

    padding-left:4px;
}

/* ================= BUTTON ================= */

.register-btn{

    border:none;

    height:55px;

    border-radius:16px;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    font-weight:600;

    font-size:16px;

    width:100%;

    transition:0.35s;

    box-shadow:
    0 15px 30px rgba(181,126,220,0.2);
}

.register-btn:hover{

    transform:translateY(-3px);

    background:
    linear-gradient(135deg,#ff74a6,#a855f7);

    color:white;
}

/* ================= LOGIN LINK ================= */

.login-link{

    text-align:center;

    margin-top:22px;

    color:#555;

    font-size:15px;
}

.login-link a{

    color:#9d4edd;

    text-decoration:none;

    font-weight:700;
}

.login-link a:hover{

    color:#7b2cbf;
}

/* ================= RESPONSIVE ================= */

@media(max-width:576px){

    .register-card{

        padding:32px 22px;

        border-radius:26px;
    }

    .register-card h2{

        font-size:30px;
    }

}

</style>

<section class="register-section">

<div class="register-card">

<h2>Create Account</h2>

<form method="post"
      action="user_register.php"
      onsubmit="return validateForm()">

<!-- FULL NAME -->

<div class="mb-3">

<input type="text"
       id="fullname"
       name="fullname"
       class="form-control"
       placeholder="Full Name">

<div id="nameError" class="error"></div>

</div>

<!-- EMAIL -->

<div class="mb-3">

<input type="email"
       id="email"
       name="email"
       class="form-control"
       placeholder="Email Address">

<div id="emailError" class="error"></div>

</div>

<!-- PHONE -->

<div class="mb-3">

<input type="tel"
       id="phone"
       name="phone"
       class="form-control"
       placeholder="Phone Number">

<div id="phoneError" class="error"></div>

</div>

<!-- ADDRESS -->

<div class="mb-3">

<textarea id="address"
          name="address"
          class="form-control"
          placeholder="Address"></textarea>

<div id="addressError" class="error"></div>

</div>

<!-- PASSWORD -->

<div class="mb-3">

<input type="password"
       id="password"
       name="password"
       class="form-control"
       placeholder="Password">

<div id="passwordError" class="error"></div>

</div>

<!-- CONFIRM PASSWORD -->

<div class="mb-4">

<input type="password"
       id="confirm_password"
       name="confirm_password"
       class="form-control"
       placeholder="Confirm Password">

<div id="confirmError" class="error"></div>

</div>

<!-- BUTTON -->

<button type="submit"
        class="register-btn">

    Register

</button>

</form>

<!-- LOGIN LINK -->

<div class="login-link">

Already have an account?

<a href="login.php">
    Login
</a>

</div>

</div>

</section>

<script>

function validateForm(){

let name = document.getElementById("fullname").value.trim();

let email = document.getElementById("email").value.trim();

let phone = document.getElementById("phone").value.trim();

let address = document.getElementById("address").value.trim();

let password = document.getElementById("password").value;

let confirm = document.getElementById("confirm_password").value;

let nameRegex = /^[A-Za-z ]+$/;

let emailRegex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

let phoneRegex = /^[0-9]{10}$/;

let valid = true;

/* CLEAR ERRORS */

document.getElementById("nameError").innerHTML="";

document.getElementById("emailError").innerHTML="";

document.getElementById("phoneError").innerHTML="";

document.getElementById("addressError").innerHTML="";

document.getElementById("passwordError").innerHTML="";

document.getElementById("confirmError").innerHTML="";

/* NAME */

if(name=="" || !nameRegex.test(name)){

    document.getElementById("nameError").innerHTML =
    "Enter valid name (letters only)";

    valid=false;
}

/* EMAIL */

if(!emailRegex.test(email)){

    document.getElementById("emailError").innerHTML =
    "Enter valid email address";

    valid=false;
}

/* PHONE */

if(!phoneRegex.test(phone)){

    document.getElementById("phoneError").innerHTML =
    "Enter valid 10 digit phone number";

    valid=false;
}

/* ADDRESS */

if(address==""){

    document.getElementById("addressError").innerHTML =
    "Address is required";

    valid=false;
}

/* PASSWORD */

if(password.length < 6){

    document.getElementById("passwordError").innerHTML =
    "Password must be at least 6 characters";

    valid=false;
}

/* CONFIRM PASSWORD */

if(password !== confirm){

    document.getElementById("confirmError").innerHTML =
    "Passwords do not match";

    valid=false;
}

return valid;

}

</script>

<?php include '../includes/footer.php'; ?>