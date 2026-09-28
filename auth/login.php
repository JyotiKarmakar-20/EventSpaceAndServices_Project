<?php 
session_start();
include("../config/db.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $admin = $result->fetch_assoc();
        if($password === $admin['password']){
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['username'];
            header("Location: ../admin/dashboard.php");
            exit();
        }else{
            $error = "Invalid Admin Password!";
        }
    } 
    /* CHECKING USER LOGIN */
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if($password === $user['password']){
            $_SESSION['user_id'] = $user['id'];   
            $_SESSION['user_name'] = $user['name'];
            header("Location: ../user/dashboard.php");
            exit();
        }else{
            $error = "Invalid Password!";
        }
    }else{
        /* CHECKING VENDOR LOGIN */
        $stmt = $conn->prepare("SELECT * FROM vendors WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $vendor = $result->fetch_assoc();
            if($password === $vendor['password']){
                if($vendor['status'] === 'approved'){
                    $_SESSION['vendor_id'] = $vendor['vendor_id'];
                    $_SESSION['vendor_type'] = $vendor['vendor_type'];
                    $_SESSION['business_name'] = $vendor['business_name'];
                   header("Location: ../vendor/dashboard.php");
                }else{
                    $error = "Your account is not approved yet!";
                }

            }else{
                $error = "Invalid Password!";
            }

        }else{
            $error = "Email not registered!";
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<?php include '../includes/header.php'; ?>



<style>

/* ================= LOGIN PAGE ================= */

.login-section{

    min-height:100vh;

    display:flex;

    align-items:center;

    justify-content:center;

    padding:80px 15px;

    background:
    linear-gradient(135deg,#ffe4ee,#eadcff);

    position:relative;

    overflow:hidden;
}

/* ================= BACKGROUND EFFECTS ================= */

.login-section::before{

    content:"";

    position:absolute;

    width:420px;
    height:420px;

    background:#ffb3d1;

    border-radius:50%;

    top:-140px;
    left:-120px;

    opacity:0.25;

    filter:blur(50px);
}

.login-section::after{

    content:"";

    position:absolute;

    width:350px;
    height:350px;

    background:#cdb4db;

    border-radius:50%;

    bottom:-120px;
    right:-100px;

    opacity:0.25;

    filter:blur(50px);
}

/* ================= LOGIN CARD ================= */

.login-card{

    width:100%;
    max-width:520px;

    background:rgba(255,255,255,0.65);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,0.4);

    border-radius:35px;

    padding:50px 40px;

    position:relative;

    z-index:2;

    box-shadow:
    0 20px 50px rgba(181,126,220,0.18);
}

/* ================= BRAND ================= */

.login-brand{

    text-align:center;

    margin-bottom:35px;
}

.brand-icon{

    width:90px;
    height:90px;

    margin:auto;

    border-radius:24px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    font-size:38px;

    margin-bottom:20px;

    box-shadow:
    0 15px 35px rgba(181,126,220,0.25);
}

.login-brand h2{

    font-size:42px;

    font-weight:700;

    color:#9d4edd;

    margin-bottom:10px;
}

.login-brand p{

    color:#666;

    font-size:15px;

    line-height:1.8;

    margin-bottom:0;
}

/* ================= ALERTS ================= */

.alert{

    border:none;

    border-radius:18px;

    padding:14px 18px;

    font-size:15px;
}

/* ================= LABELS ================= */

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

.form-control:focus{

    background:white;

    border:none;

    box-shadow:
    0 0 0 4px rgba(177,133,219,0.18);
}

/* ================= BUTTON ================= */

.btn-login{

    height:58px;

    border:none;

    border-radius:18px;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    font-size:17px;

    font-weight:600;

    transition:0.35s;

    box-shadow:
    0 15px 30px rgba(181,126,220,0.22);
}

.btn-login:hover{

    transform:translateY(-3px);

    background:
    linear-gradient(135deg,#ff74a6,#a855f7);

    color:white;
}

/* ================= FOOTER ================= */

.login-footer{

    text-align:center;

    margin-top:24px;

    color:#555;

    font-size:15px;
}

.login-footer a{

    color:#9d4edd;

    text-decoration:none;

    font-weight:700;
}

.login-footer a:hover{

    color:#7b2cbf;
}

/* ================= RESPONSIVE ================= */

@media(max-width:576px){

    .login-card{

        padding:40px 25px;

        border-radius:28px;
    }

    .login-brand h2{

        font-size:34px;
    }

}
.login-section{

    min-height:85vh;

    display:flex;

    align-items:center;

    justify-content:center;

    padding:30px 15px;

    background:
    linear-gradient(135deg,#ffe4ee,#eadcff);

    position:relative;

    overflow:hidden;
}

/* ================= LOGIN CARD ================= */

.login-card{

    width:100%;
    max-width:650px;

    background:rgba(255,255,255,0.65);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,0.4);

    border-radius:35px;

    padding:40px 50px;

    position:relative;

    z-index:2;

    box-shadow:
    0 20px 50px rgba(181,126,220,0.18);
}
</style>

<section class="login-section">

    <div class="login-card">

        <!-- BRAND -->

        <div class="login-brand">

            <div class="brand-icon">
                <i class="fas fa-calendar-check"></i>
            </div>

            <h2>EventSpace</h2>

            <p>
                Welcome back! Login and continue planning
                your unforgettable celebrations.
            </p>

        </div>

        <!-- SUCCESS MESSAGE -->

        <?php if(isset($_GET['register']) && $_GET['register']=="success"){ ?>

        <div class="alert alert-success text-center">
            Registration successful! Please login.
        </div>

        <?php } ?>

        <!-- ERROR MESSAGE -->

        <?php if(!empty($error)){ ?>

        <div class="alert alert-danger text-center">
            <?php echo $error; ?>
        </div>

        <?php } ?>

        <!-- LOGIN FORM -->

        <form method="POST">

            <div class="mb-4">

                <label class="form-label">
                    Email Address
                </label>

                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Enter your email"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Password
                </label>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Enter your password"
                       required>

            </div>

            <div class="d-grid">

                <button type="submit"
                        name="login"
                        class="btn btn-login">

                    Login to Account

                </button>

            </div>

            <div class="login-footer">

                Don’t have an account?

                <a href="register.php">
                    Register
                </a>

            </div>

        </form>

    </div>

</section>

