<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Decorator Registration | EventSpace</title>
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

<?php
include("../../config/db.php");

if(isset($_POST['submit'])){

    $business_name = $_POST['business_name'];
    $owner_name = $_POST['owner_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $street = $_POST['street'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];

    $decoration_types = isset($_POST['decoration_types'])
                        ? implode(",", $_POST['decoration_types'])
                        : "";

    $flowers = $_POST['flowers'];
    $packages = $_POST['packages'];
    $starting_price = $_POST['starting_price'];
    $experience = $_POST['experience'];
    $about_business = $_POST['about_business'];

    $vendor_type = "decorator";

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

        $vendor_id = $vendor_stmt->insert_id;

        $uploaded_images = [];

        if(!empty($_FILES['portfolio_images']['name'][0])){

            foreach($_FILES['portfolio_images']['name'] as $key => $image_name){

                $tmp_name = $_FILES['portfolio_images']['tmp_name'][$key];

                $new_name = time() . "_" . basename($image_name);

                $upload_dir = "../../uploads/decorators/";

                if(!is_dir($upload_dir)){
                    mkdir($upload_dir,0777,true);
                }

                $upload_path = $upload_dir . $new_name;

                move_uploaded_file($tmp_name,$upload_path);

                $uploaded_images[] = $new_name;
            }
        }

        $portfolio_images = implode(",",$uploaded_images);

        $decorator_stmt = $conn->prepare("INSERT INTO decorators
        (vendor_id, street, city, pincode, decoration_types, flowers, packages, starting_price, experience, portfolio_images, about_business)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $decorator_stmt->bind_param("issssssdiss",
            $vendor_id,
            $street,
            $city,
            $pincode,
            $decoration_types,
            $flowers,
            $packages,
            $starting_price,
            $experience,
            $portfolio_images,
            $about_business
        );

        if($decorator_stmt->execute()){

            echo "<script>
            alert('Registration Successful! Waiting for Admin Approval');
            window.location='../login.php';
            </script>";

        }else{
            echo 'Decorator Error: '.$decorator_stmt->error;
        }

        $decorator_stmt->close();

    }else{
        echo 'Vendor Error: '.$vendor_stmt->error;
    }

    $vendor_stmt->close();
    $conn->close();
}
?>

<div class="page-wrapper">

    <div class="register-card">

        <!-- BACK BUTTON -->

        <a href="../../index.php" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Home
        </a>

        <!-- TITLE -->

        <div class="register-title">

           

            <h2>
                Decorator Registration
            </h2>

            <p>
                Join EventSpace and showcase your decoration services.
            </p>

        </div>

        <!-- FORM -->

        <form method="POST" enctype="multipart/form-data">

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
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Owner Name
                    </label>

                    <input type="text"
                           name="owner_name"
                           class="form-control"
                           required>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Email Address
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Phone Number
                    </label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           required>

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
                           class="form-control"
                           required>

                </div>

                <div class="col-md-4 mb-4">

                    <label class="form-label">
                        City
                    </label>

                    <input type="text"
                           name="city"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-4 mb-4">

                    <label class="form-label">
                        Pincode
                    </label>

                    <input type="text"
                           name="pincode"
                           class="form-control"
                           required>

                </div>

            </div>

            <!-- SERVICES -->

            <div class="section-title">
                Decoration Services
            </div>

            <label class="form-label mb-3">
                Decoration Types Offered
            </label>

            <div class="row">

                <?php

                $types = [

                "Wedding Stage Decoration",
                "Floral Decoration",
                "Theme Decoration",
                "Birthday Decoration",
                "Corporate Event Decoration",
                "Engagement Decoration",
                "Reception Decoration"

                ];

                foreach($types as $type){

                echo "

                <div class='col-md-6'>

                    <div class='form-check'>

                        <input class='form-check-input'
                               type='checkbox'
                               name='decoration_types[]'
                               value='$type'>

                        <label class='form-check-label'>
                            $type
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
                        Flowers Used
                    </label>

                    <input type="text"
                           name="flowers"
                           class="form-control">

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Starting Price
                    </label>

                    <input type="number"
                           name="starting_price"
                           class="form-control"
                           required>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Experience (Years)
                    </label>

                    <input type="number"
                           name="experience"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Upload Portfolio Images
                    </label>

                    <input type="file"
                           name="portfolio_images[]"
                           class="form-control"
                           multiple
                           required>

                </div>

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

                <textarea name="about_business"
                          class="form-control"
                          required></textarea>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Password
                </label>

                <input type="password"
                       name="password"
                       class="form-control"
                       required>

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

</body>
</html>