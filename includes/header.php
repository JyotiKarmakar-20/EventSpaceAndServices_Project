<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- use isset to start session-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EventSpace | Event Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
  body{
    font-family:'Poppins',sans-serif;
    margin:0;
    padding:0;
}

/* ================= NAVBAR ================= */

.navbar{

    background:
    linear-gradient(
    135deg,
    rgba(255,240,246,0.95),
    rgba(236,220,255,0.92));

    backdrop-filter:blur(18px);

    -webkit-backdrop-filter:blur(18px);

    padding:18px 0;

    border-bottom:
    1px solid rgba(255,255,255,0.5);

    box-shadow:
    0 10px 30px rgba(181,126,220,0.12);
}

/* ================= LOGO ================= */

.navbar-brand{

    font-size:26px;

    font-weight:700;

    color:#9d4edd !important;

    display:flex;

    align-items:center;

    gap:12px;

    transition:0.3s;
}

.navbar-brand:hover{
    transform:scale(1.02);
}

.navbar-brand i{

    width:48px;
    height:48px;

    border-radius:16px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    font-size:22px;

    box-shadow:
    0 10px 25px rgba(181,126,220,0.25);
}

/* ================= NAV LINKS ================= */

.nav-link{

    color:#4b4453 !important;

    font-weight:600;

    margin-left:22px;

    position:relative;

    transition:0.3s;

    padding:8px 0 !important;
}

.nav-link:hover{

    color:#b85fc6 !important;
}

/* underline effect */

.nav-link::after{

    content:"";

    position:absolute;

    width:0;

    height:3px;

    left:0;

    bottom:-3px;

    border-radius:20px;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    transition:0.35s;
}

.nav-link:hover::after{
    width:100%;
}

/* ================= REGISTER BUTTON ================= */

 .btn-register{

    /* background:
    linear-gradient(135deg,#ff8fab,#b185db); */

    color:black !important;

    padding:11px 24px;

    border-radius:50px;

    border:none;

    font-weight:600;

    margin-left:24px;

    transition:0.35s;

    box-shadow:
    0 12px 25px rgba(181,126,220,0.22);
} 

.btn-register:hover{

    transform:translateY(-3px);

    box-shadow:
    0 18px 30px rgba(181,126,220,0.28);

    background:
    linear-gradient(135deg,#ff74a6,#a855f7);
}

/* ================= TOGGLER ================= */

.navbar-toggler{

    border:none;

    padding:8px 10px;

    border-radius:12px;

    background:
    rgba(255,255,255,0.6);
}

.navbar-toggler:focus{
    box-shadow:none;
}

/* ================= DROPDOWN ================= */

.dropdown-menu{

    border:none;

    border-radius:24px;

    padding:12px;

    min-width:240px;

    background:
    linear-gradient(
    135deg,
    rgba(255,255,255,0.92),
    rgba(245,236,255,0.9));

    backdrop-filter:blur(18px);

    box-shadow:
    0 20px 40px rgba(0,0,0,0.12);
}

/* ================= DROPDOWN ITEMS ================= */

.dropdown-item{

    padding:12px 18px;

    border-radius:14px;

    font-size:15px;

    font-weight:500;

    color:#4b4453;

    transition:0.3s;
}

.dropdown-item:hover{

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;
}

/* ================= SUBMENU ================= */

.dropdown-submenu{
    position:relative;
}

.vendor-submenu{

    display:none;

    position:absolute;

    top:0;

    left:100%;

    margin-left:12px;

    min-width:240px;
}

.dropdown-submenu:hover .vendor-submenu{
    display:block;
}

/* ================= MOBILE ================= */

@media(max-width:991px){

    .navbar{

        border-radius:0 0 28px 28px;
    }

    .navbar-collapse{

        margin-top:18px;

        padding:25px;

        border-radius:28px;

        background:
        linear-gradient(
        135deg,
        rgba(255,255,255,0.88),
        rgba(243,230,255,0.9));

        backdrop-filter:blur(18px);

        box-shadow:
        0 10px 30px rgba(0,0,0,0.08);
    }

    .nav-link{

        margin-left:0;

        margin-bottom:12px;
    }

    .btn-register{

        margin-left:0;

        margin-top:15px;

        display:inline-block;
    }

    .vendor-submenu{

        position:static;

        display:block;

        margin-left:18px;

        margin-top:10px;
    }

}
/* ================= NAVBAR ================= */

.navbar{

    background:
    linear-gradient(
    135deg,
    rgba(255,240,246,0.96),
    rgba(236,220,255,0.94));

    backdrop-filter:blur(18px);

    -webkit-backdrop-filter:blur(18px);

    padding:16px 0;

    border-bottom:
    1px solid rgba(255,255,255,0.5);

    box-shadow:
    0 8px 25px rgba(181,126,220,0.10);
}

/* ================= NAVBAR LAYOUT ================= */

.navbar .container-fluid{

    display:flex;

    align-items:center;

    justify-content:space-between;
}

/* ================= LOGO ================= */

.navbar-brand{

    font-size:40px;

    font-weight:700;

    color:#9d4edd !important;

    display:flex;

    align-items:center;

    gap:14px;

    margin-right:0;

    padding-left:0;
}

.navbar-brand i{

    width:58px;
    height:58px;

    border-radius:18px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    font-size:24px;

    box-shadow:
    0 10px 25px rgba(181,126,220,0.22);
}

/* ================= NAV LINKS ================= */

.navbar-nav{

    gap:10px;
}

.nav-link{

    color:#4b4453 !important;

    font-weight:600;

    position:relative;

    transition:0.3s;



    font-size:17px;
}

.nav-link:hover{

    color:#b85fc6 !important;
}

/* underline effect */

.nav-link::after{

    content:"";

    position:absolute;

    width:0;

    height:3px;

    left:14px;

    bottom:0;

    border-radius:20px;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    transition:0.35s;
}

.nav-link:hover::after{
    width:60%;
}


    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container-fluid px-lg-5 px-3">

        <a class="navbar-brand" href="/EventProject/index.php">
            <i class="fas fa-calendar-check p-3"></i> EventSpace
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item">
                    <a class="nav-link" href="/EventProject/index.php">Home</a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link" href="/EventProject/about.php">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./auth/login.php">Login</a>
                </li>

                <!-- Register Dropdown -->
                <li class="nav-item dropdown">
                    <a class="btn btn-register dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Register
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item" href="/EventProject/auth/user_register.php">
                                User
                            </a>
                        </li>

                        <li class="dropdown-submenu">
                            <a class="dropdown-item" href="#">
                                Vendor
                            </a>

                            <ul class="dropdown-menu vendor-submenu">
                                <li><a class="dropdown-item" href="/EventProject/auth/vendor/beauty_register.php">Beauty & Parlour</a></li>
                                <li><a class="dropdown-item" href="/EventProject/auth/vendor/venue_register.php">Venues</a></li>
                                <li><a class="dropdown-item" href="/EventProject/auth/vendor/decorator_register.php">Decorators</a></li>
                                <li><a class="dropdown-item" href="/EventProject/auth/vendor/caterer_register.php">Caterers</a></li>
                                <li><a class="dropdown-item" href="/EventProject/auth/vendor/music_register.php">Music & DJ</a></li>
                                <li><a class="dropdown-item" href="/EventProject/auth/vendor/photo_register.php">Photography</a></li>
                                <li><a class="dropdown-item" href="/EventProject/auth/vendor/card_register.php">Cards</a></li>
                            </ul>
                        </li>

                    </ul>
                
                 <li class="nav-item">
                    <a class="nav-link" href="/EventProject/contact.php">Contact</a>
</li>
                <li class="nav-item">
                    <a class="nav-link" href="/EventProject/services.php">Services</a>
                </li>
            </ul>
        </div>
    </div>
</nav>