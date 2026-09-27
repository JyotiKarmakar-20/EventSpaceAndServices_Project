<?php include 'includes/header.php'; ?>

<style>

/*                                           ABOUT PAGE                                           */

.about-hero{

    padding:120px 0 90px;

    position:relative;

    overflow:hidden;

    background:
    linear-gradient(135deg,#ffe4ee,#eadcff);
}

/*                                           BACKGROUND EFFECTS                                           */

.about-hero::before{

    content:"";

    position:absolute;

    width:420px;
    height:420px;

    background:#ffb3d1;

    border-radius:50%;

    top:-150px;
    left:-120px;

    opacity:0.25;

    filter:blur(50px);
}

.about-hero::after{

    content:"";

    position:absolute;

    width:350px;
    height:350px;

    background:#cdb4db;

    border-radius:50%;

    bottom:-140px;
    right:-120px;

    opacity:0.25;

    filter:blur(50px);
}

/*                                           HERO CONTENT                                           */

.about-content{

    position:relative;

    z-index:2;
}

.about-tag{

    display:inline-block;

    padding:10px 22px;

    border-radius:50px;

    background:white;

    color:#9d4edd;

    font-size:14px;

    font-weight:600;

    box-shadow:
    0 10px 20px rgba(0,0,0,0.08);

    margin-bottom:25px;
}

.about-content h1{

    font-size:68px;

    font-weight:700;

    line-height:1.15;

    color:#2b2d42;

    margin-bottom:25px;
}

.about-content p{

    font-size:18px;

    line-height:1.9;

    color:#555;

    margin-bottom:22px;
}

/*                                           IMAGE                                           */

.about-image{

    position:relative;

    z-index:2;

    text-align:center;
}

.about-image img{

    width:90%;

    border-radius:40px;

    object-fit:cover;

    box-shadow:
    0 25px 50px rgba(0,0,0,0.15);
}

/*                                           INFO SECTION                                           */

.info-section{

    padding:90px 0;

    background:white;
}

/*                                           INFO CARDS                                           */

.info-card{

    background:rgba(255,255,255,0.7);

    backdrop-filter:blur(12px);

    border-radius:30px;

    padding:40px 35px;

    height:100%;

    transition:0.4s;

    box-shadow:
    0 15px 40px rgba(0,0,0,0.08);
}

.info-card:hover{

    transform:translateY(-8px);

    box-shadow:
    0 20px 45px rgba(181,126,220,0.18);
}

/*                                           ICON                                           */

.info-icon{

    width:80px;
    height:80px;

    border-radius:22px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:32px;

    color:white;

    margin-bottom:25px;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    box-shadow:
    0 12px 30px rgba(181,126,220,0.2);
}

/*                                           TEXT                                           */

.info-card h3{

    font-size:28px;

    font-weight:700;

    color:#2b2d42;

    margin-bottom:18px;
}

.info-card p{

    color:#666;

    line-height:1.9;

    font-size:16px;
}

/*                                           CTA                                           */

.about-cta{

    padding:90px 30px;

    text-align:center;

    border-radius:45px;

    background:
    linear-gradient(135deg,#2b2d42,#9d4edd);

    color:white;

    position:relative;

    overflow:hidden;
}

.about-cta::before{

    content:"";

    position:absolute;

    width:300px;
    height:300px;

    background:rgba(255,255,255,0.06);

    border-radius:50%;

    top:-100px;
    right:-100px;
}

.about-cta h2{

    font-size:52px;

    font-weight:700;

    position:relative;

    z-index:2;
}

.about-cta p{

    font-size:18px;

    color:#eee;

    margin-top:20px;

    position:relative;

    z-index:2;
}

/*                                           BUTTON                                           */

.btn-about{

    display:inline-block;

    margin-top:30px;

    padding:15px 36px;

    border-radius:18px;

    background:white;

    color:#9d4edd;

    font-weight:700;

    text-decoration:none;

    transition:0.35s;

    position:relative;

    z-index:2;
}

.btn-about:hover{

    transform:translateY(-4px);

    color:#9d4edd;

    box-shadow:
    0 15px 30px rgba(0,0,0,0.18);
}

/*                                           MOBILE                                           */

@media(max-width:991px){

    .about-content{
        text-align:center;
    }

    .about-content h1{
        font-size:48px;
    }

    .about-image{
        margin-top:40px;
    }
}

@media(max-width:768px){

    .about-content h1{
        font-size:38px;
    }

    .about-cta h2{
        font-size:36px;
    }

    .about-image img{
        width:100%;
    }
}

</style>

<!--                                           HERO SECTION                                           -->

<section class="about-hero">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- LEFT -->

            <div class="col-lg-6">

                <div class="about-content">

                    <span class="about-tag">
                        ABOUT EVENTSPACE
                    </span>

                    <h1>
                        Creating Beautiful Events
                        With Smart Planning
                    </h1>

                    <p>
                        EventSpace is a modern event management platform
                        designed to connect customers with trusted vendors,
                        venues and premium event services.
                    </p>

                    <p>
                        From weddings and birthdays to corporate events and
                        private celebrations, we help you organize every
                        moment smoothly with creativity, technology and trust.
                    </p>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="col-lg-6">

                <div class="about-image">

                    <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=1200&auto=format&fit=crop"
                         alt="About EventSpace">

                </div>

            </div>

        </div>

    </div>

</section>

<!--                                           INFO SECTION                                           -->

<section class="info-section">

    <div class="container">

        <div class="row g-4">

            <!-- MISSION -->

            <div class="col-lg-6">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>

                    <h3>Our Mission</h3>

                    <p>
                        To simplify event planning through innovative technology
                        and provide reliable, affordable and high-quality
                        event services for everyone.
                    </p>

                </div>

            </div>

            <!-- VISION -->

            <div class="col-lg-6">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="fas fa-eye"></i>
                    </div>

                    <h3>Our Vision</h3>

                    <p>
                        To become the most trusted and premium online event
                        management platform by empowering vendors and creating
                        unforgettable experiences for customers.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!--                                           CTA                                           -->

<div class="container mb-5">

    <section class="about-cta">

        <h2>
            Let’s Plan Something Amazing Together
        </h2>

        <p>
            Discover trusted vendors, elegant venues and premium
            event services with EventSpace.
        </p>

        <a href="services.php" class="btn-about">
            Explore Services
        </a>

    </section>

</div>
