<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("../../config/db.php");

if(isset($_POST['submit'])){

    // ===== BASIC DETAILS =====
    $business_name = $_POST['business_name'];
    $owner_name = $_POST['owner_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // ===== ADDRESS =====
    $street = $_POST['street'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];

    // ===== SERVICES =====
    $services = isset($_POST['services']) ? implode(",", $_POST['services']) : "";
    $bridal_price = $_POST['bridal_price'];
    $packages = $_POST['packages'];
    $experience = $_POST['experience'];
    $home_service = $_POST['home_service'];
    $products_used = $_POST['products_used'];
    $about = $_POST['about'];

    // ===== VENDOR INSERT =====
    $vendor_type = "beauty_parlour";

    $vendor_stmt = $conn->prepare("INSERT INTO vendors 
        (vendor_type, business_name, owner_name, email, phone, password) 
        VALUES (?, ?, ?, ?, ?, ?)");

    $vendor_stmt->bind_param("ssssss",
        $vendor_type,
        $business_name,
        $owner_name,
        $email,
        $phone,
        $password
    );

    if($vendor_stmt->execute()){

        $vendor_id = $conn->insert_id;

        // ===== IMAGE UPLOAD =====
        $uploaded_image = "";

        if(!empty($_FILES['portfolio']['name'])){

            $upload_dir = "../../uploads/portfolio/";

            if(!is_dir($upload_dir)){
                mkdir($upload_dir,0777,true);
            }

            $image_name = $_FILES['portfolio']['name'];
            $tmp_name = $_FILES['portfolio']['tmp_name'];

            $new_name = time()."_".basename($image_name);
            $upload_path = $upload_dir.$new_name;

            if(move_uploaded_file($tmp_name,$upload_path)){
                $uploaded_image = $new_name;
            }
        }

        // ===== PORTFOLIO TABLE =====
        if(!empty($uploaded_image)){

            $portfolio_stmt = $conn->prepare("INSERT INTO vendor_portfolio 
                (vendor_id,image_path) VALUES (?,?)");

            $portfolio_stmt->bind_param("is",$vendor_id,$uploaded_image);

            $portfolio_stmt->execute();

            $portfolio_stmt->close();
        }

        // ===== BEAUTY PARLOUR INSERT =====
        $portfolio_images = $uploaded_image;

        $parlour_stmt = $conn->prepare("INSERT INTO beauty_parlours
            (vendor_id,street,city,pincode,services,bridal_price,packages,experience,home_service,products_used,portfolio_images,about)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");

        $parlour_stmt->bind_param("issssdsissss",
            $vendor_id,
            $street,
            $city,
            $pincode,
            $services,
            $bridal_price,
            $packages,
            $experience,
            $home_service,
            $products_used,
            $portfolio_images,
            $about
        );

        if($parlour_stmt->execute()){

            echo "<script>
            alert('Registration Successful! Waiting for Admin Approval');
            window.location='../login.php';
            </script>";

        } else {

            echo 'Beauty Parlour Error: '.$parlour_stmt->error;
        }

        $parlour_stmt->close();

    } else {

        echo 'Vendor Error: '.$vendor_stmt->error;
    }

    $vendor_stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>Beauty Parlour Registration | EventSpace</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>

/* ================= BODY ================= */

body{

    margin:0;

    padding:0;

    font-family:'Poppins',sans-serif;

    background:
    linear-gradient(135deg,#fff1f5,#f3e8ff);

    min-height:100vh;

    overflow-x:hidden;

    position:relative;
}

/* ================= BACKGROUND EFFECTS ================= */

body::before{

    content:"";

    position:absolute;

    width:420px;
    height:420px;

    background:#ffb3d1;

    border-radius:50%;

    top:-140px;
    left:-120px;

    opacity:0.22;

    filter:blur(50px);
}

body::after{

    content:"";

    position:absolute;

    width:350px;
    height:350px;

    background:#cdb4db;

    border-radius:50%;

    bottom:-120px;
    right:-120px;

    opacity:0.22;

    filter:blur(50px);
}

/* ================= PAGE WRAPPER ================= */

.page-wrapper{

    padding:40px 15px;

    position:relative;

    z-index:2;
}

/* ================= REGISTER CARD ================= */

.register-card{

    background:rgba(255,255,255,0.72);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,0.45);

    border-radius:35px;

    padding:40px;

    max-width:950px;

    margin:auto;

    box-shadow:
    0 25px 50px rgba(181,126,220,0.15);
}

/* ================= BACK BUTTON ================= */

.back-btn{

    display:inline-flex;

    align-items:center;

    gap:8px;

    padding:12px 24px;

    border-radius:50px;

    text-decoration:none;

    background:white;

    color:#9d4edd;

    font-weight:600;

    box-shadow:
    0 10px 25px rgba(181,126,220,0.12);

    transition:0.3s;
}

.back-btn:hover{

    transform:translateY(-2px);

    color:#7b2cbf;
}

/* ================= TITLE ================= */

.register-title{

    text-align:center;

    margin-top:20px;

    margin-bottom:35px;
}

.register-icon{

    width:90px;
    height:90px;

    margin:auto;

    border-radius:25px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    font-size:38px;

    margin-bottom:20px;

    box-shadow:
    0 15px 35px rgba(181,126,220,0.22);
}

.register-title h2{

    font-size:42px;

    font-weight:700;

    color:#2b2d42;

    margin-bottom:10px;
}

.register-title p{

    color:#666;

    font-size:15px;
}

/* ================= SECTION TITLE ================= */

.section-title{

    font-size:22px;

    font-weight:700;

    color:#9d4edd;

    margin-top:35px;

    margin-bottom:18px;

    padding-left:14px;

    border-left:5px solid #b185db;
}

/* ================= FORM LABEL ================= */

.form-label{

    font-weight:600;

    color:#4b4453;

    margin-bottom:10px;
}

/* ================= INPUTS ================= */

.form-control{

    height:58px;

    border:none;

    border-radius:18px;

    padding:0 18px;

    background:rgba(255,255,255,0.9);

    box-shadow:
    inset 0 2px 8px rgba(0,0,0,0.04);

    transition:0.3s;
}

textarea.form-control{

    height:120px;

    padding-top:16px;

    resize:none;
}

.form-control:focus{

    background:white;

    box-shadow:
    0 0 0 4px rgba(177,133,219,0.18);

    border:none;
}

/* ================= CHECKBOXES ================= */

.form-check{

    background:rgba(255,255,255,0.7);

    border-radius:16px;

    padding:14px 16px;

    margin-bottom:14px;

    transition:0.3s;
}

.form-check:hover{

    background:white;

    transform:translateY(-2px);
}

.form-check-input{

    margin-top:5px;
}

.form-check-label{

    font-weight:500;

    color:#444;

    margin-left:5px;
}

/* ================= BUTTON ================= */

.btn-register{

    height:60px;

    border:none;

    border-radius:20px;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    font-size:17px;

    font-weight:600;

    margin-top:10px;

    transition:0.35s;

    box-shadow:
    0 15px 30px rgba(181,126,220,0.2);
}

.btn-register:hover{

    transform:translateY(-3px);

    background:
    linear-gradient(135deg,#ff74a6,#a855f7);

    color:white;
}

/* ================= FOOTER TEXT ================= */

.small-text{

    color:#666;

    margin-top:18px;

    font-size:14px;
}

/* ================= ERROR ================= */

.text-danger{

    font-size:13px;
}

/* ================= RESPONSIVE ================= */

@media(max-width:768px){

    .register-card{

        padding:30px 22px;
    }

    .register-title h2{

        font-size:34px;
    }

}

</style>
</head>

<body>

<div class="page-wrapper">

    <div class="register-card">

        <!-- BACK BUTTON -->

        <a href="../../index.php" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Home
        </a>

        <!-- TITLE -->

        <div class="register-title">

            <div class="register-icon">
                <i class="fa-solid fa-spa"></i>
            </div>

            <h2>
                Beauty Parlour Registration
            </h2>

            <p>
                Join EventSpace and showcase your beauty services.
            </p>

        </div>

        <!-- FORM -->

        <form method="POST" enctype="multipart/form-data" id="regForm" onsubmit="validate(event)">

            <!-- BASIC INFO -->

            <div class="section-title">
                Basic Information
            </div>

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Business Name
                    </label>

                    <input type="text"
                           name="business_name"
                           class="form-control">

                    <label id="businessNameError" class="text-danger"></label>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Owner Name
                    </label>

                    <input type="text"
                           name="owner_name"
                           class="form-control">

                    <label id="ownerNameError" class="text-danger"></label>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Email Address
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control">

                    <label id="emailError" class="text-danger"></label>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Phone Number
                    </label>

                    <input type="text"
                           name="phone"
                           class="form-control">

                    <label id="phoneError" class="text-danger"></label>

                </div>

            </div>

            <!-- ADDRESS -->

            <div class="section-title">
                Address Information
            </div>

            <div class="row">

                <div class="col-md-4 mb-4">

                    <label class="form-label">
                        Street
                    </label>

                    <input type="text"
                           name="street"
                           class="form-control">

                    <label id="streetError" class="text-danger"></label>

                </div>

                <div class="col-md-4 mb-4">

                    <label class="form-label">
                        City
                    </label>

                    <input type="text"
                           name="city"
                           class="form-control">

                    <label id="cityError" class="text-danger"></label>

                </div>

                <div class="col-md-4 mb-4">

                    <label class="form-label">
                        Pincode
                    </label>

                    <input type="text"
                           name="pincode"
                           class="form-control">

                    <label id="pincodeError" class="text-danger"></label>

                </div>

            </div>

            <!-- SERVICES -->

            <div class="section-title">
                Beauty Services
            </div>

            <label class="form-label mb-3">
                Services Offered
            </label>

            <div class="row">

                <?php

                $beauty_services = [

                "Bridal Makeup",
                "Party Makeup",
                "Hair Styling",
                "Facial Treatment",
                "Mehendi Service",
                "Nail Art",
                "Skin Care"

                ];

                foreach($beauty_services as $service){

                echo "

                <div class='col-md-6'>

                    <div class='form-check'>

                        <input class='form-check-input'
                               type='checkbox'
                               name='services[]'
                               value='$service'>

                        <label class='form-check-label'>
                            $service
                        </label>

                    </div>

                </div>

                ";
                }

                ?>

            </div>

            <div class="row mt-2">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Bridal Package Starting Price
                    </label>

                    <input type="number"
                           name="bridal_price"
                           class="form-control">

                    <label id="bridalPriceError" class="text-danger"></label>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Experience (Years)
                    </label>

                    <input type="number"
                           name="experience"
                           class="form-control">

                    <label id="experienceError" class="text-danger"></label>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Home Service Available
                    </label>

                    <select name="home_service" class="form-control">

                        <option value="">
                            Select Option
                        </option>

                        <option value="Yes">
                            Yes
                        </option>

                        <option value="No">
                            No
                        </option>

                    </select>

                    <label id="homeServiceError" class="text-danger"></label>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Products Used
                    </label>

                    <input type="text"
                           name="products_used"
                           class="form-control">

                </div>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Upload Portfolio Image
                </label>

                <input type="file"
                       name="portfolio"
                       class="form-control">

                <label id="portfolioError" class="text-danger"></label>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Package Details
                </label>

                <textarea name="packages"
                          class="form-control"></textarea>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    About Business
                </label>

                <textarea name="about"
                          class="form-control"></textarea>

                <label id="aboutError" class="text-danger"></label>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Password
                </label>

                <input type="password"
                       name="password"
                       class="form-control">

                <label id="passwordError" class="text-danger"></label>

            </div>

            <!-- BUTTON -->

            <button type="submit"
                    name="submit"
                    class="btn btn-register w-100">

                Submit for Approval

            </button>

            <div class="text-center small-text">

                After submission, admin will review
                and approve your account.

            </div>

        </form>

    </div>

</div>

<script>

function validate(e){

    let error = false;

    let form = document.getElementById("regForm");

    let business = form.elements['business_name'].value;
    let owner = form.elements['owner_name'].value;
    let email = form.elements['email'].value;
    let phone = form.elements['phone'].value;
    let street = form.elements['street'].value;
    let city = form.elements['city'].value;
    let pincode = form.elements['pincode'].value;
    let bridal_price = form.elements['bridal_price'].value;
    let experience = form.elements['experience'].value;
    let home_service = form.elements['home_service'].value;
    let portfolio = form.elements['portfolio'].files;
    let about = form.elements['about'].value;
    let password = form.elements['password'].value;

    // ERROR ELEMENTS

    let businessNameError = document.getElementById("businessNameError");
    let ownerNameError = document.getElementById("ownerNameError");
    let emailError = document.getElementById("emailError");
    let phoneError = document.getElementById("phoneError");
    let streetError = document.getElementById("streetError");
    let cityError = document.getElementById("cityError");
    let pincodeError = document.getElementById("pincodeError");
    let bridalPriceError = document.getElementById("bridalPriceError");
    let experienceError = document.getElementById("experienceError");
    let homeServiceError = document.getElementById("homeServiceError");
    let portfolioError = document.getElementById("portfolioError");
    let aboutError = document.getElementById("aboutError");
    let passwordError = document.getElementById("passwordError");

    // CLEAR OLD ERRORS

    businessNameError.innerHTML = "";
    ownerNameError.innerHTML = "";
    emailError.innerHTML = "";
    phoneError.innerHTML = "";
    streetError.innerHTML = "";
    cityError.innerHTML = "";
    pincodeError.innerHTML = "";
    bridalPriceError.innerHTML = "";
    experienceError.innerHTML = "";
    homeServiceError.innerHTML = "";
    portfolioError.innerHTML = "";
    aboutError.innerHTML = "";
    passwordError.innerHTML = "";

    // PATTERNS

    let namePattern = /^[A-Za-z ]+$/;
    let phonePattern = /^[6-9][0-9]{9}$/;
    let pincodePattern = /^[0-9]{6}$/;
    let emailPattern = /^[a-z0-9_\.]{3,}@[a-z0-9\.]{3,15}\.[a-z]{2,5}$/;

    // BUSINESS NAME

    if(business === "" || !namePattern.test(business)){

        businessNameError.innerHTML = "Enter valid business name";

        error = true;
    }

    // OWNER NAME

    if(owner === "" || !namePattern.test(owner)){

        ownerNameError.innerHTML = "Enter valid owner name";

        error = true;
    }

    // EMAIL

    if(email === ""){

        emailError.innerHTML = "Email is required";

        error = true;

    } else if(!emailPattern.test(email)){

        emailError.innerHTML = "Enter valid email";

        error = true;
    }

    // PHONE

    if(phone === ""){

        phoneError.innerHTML = "Phone is required";

        error = true;

    } else if(!phonePattern.test(phone)){

        phoneError.innerHTML = "Enter valid 10 digit number";

        error = true;
    }

    // STREET

    if(street === ""){

        streetError.innerHTML = "Street is required";

        error = true;
    }

    // CITY

    if(city === "" || !namePattern.test(city)){

        cityError.innerHTML = "Enter valid city";

        error = true;
    }

    // PINCODE

    if(!pincodePattern.test(pincode)){

        pincodeError.innerHTML = "Enter valid 6 digit pincode";

        error = true;
    }

    // BRIDAL PRICE

    if(bridal_price === "" || bridal_price < 0){

        bridalPriceError.innerHTML = "Enter valid price";

        error = true;
    }

    // EXPERIENCE

    if(experience === "" || experience < 0){

        experienceError.innerHTML = "Enter valid experience";

        error = true;
    }

    // HOME SERVICE

    if(home_service === ""){

        homeServiceError.innerHTML = "Select option";

        error = true;
    }

    // PORTFOLIO

    if(portfolio.length === 0){

        portfolioError.innerHTML = "Upload image";

        error = true;
    }

    // ABOUT

    if(about === ""){

        aboutError.innerHTML = "About is required";

        error = true;
    }

    // PASSWORD

    let passErrMsg = "";

    if(password === ""){

        passErrMsg += "Password is required<br>";

        error = true;
    }

    if(!/[a-z]/.test(password)){

        passErrMsg += "1 lowercase required<br>";

        error = true;
    }

    if(!/[A-Z]/.test(password)){

        passErrMsg += "1 uppercase required<br>";

        error = true;
    }

    if(!/[0-9]/.test(password)){

        passErrMsg += "1 number required<br>";

        error = true;
    }

    if(!/[@#$%^&]/.test(password)){

        passErrMsg += "1 special character required<br>";

        error = true;
    }

    if(password.length < 8 || password.length > 15){

        passErrMsg += "8–15 characters required<br>";

        error = true;
    }

    passwordError.innerHTML = passErrMsg;

    // FINAL

    if(error){

        e.preventDefault();
    }
}

</script>

</body>
</html>