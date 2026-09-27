<?php include 'includes/header.php'; ?>

<style>

/*                                                   BODY                                                   */

body{
    background:
    linear-gradient(135deg,#ffd6e0,#d8c4ff);

    font-family:'Poppins',sans-serif;
    overflow-x:hidden;
    color:#2d2d2d;
}

/*                                                   HERO                                                   */

.hero-wrapper{
    padding:80px 0;
}

.hero-box{

    background:
    linear-gradient(135deg,
    rgba(255,255,255,0.45),
    rgba(255,255,255,0.2));

    backdrop-filter:blur(18px);

    border-radius:40px;

    padding:70px;

    position:relative;

    overflow:hidden;

    box-shadow:
    0 20px 60px rgba(181,126,220,0.18);
}

.hero-box::before{

    content:"";

    position:absolute;

    width:350px;
    height:350px;

    background:#ffb3d1;

    border-radius:50%;

    top:-120px;
    right:-100px;

    opacity:0.25;
}

.hero-box::after{

    content:"";

    position:absolute;

    width:280px;
    height:280px;

    background:#cdb4db;

    border-radius:50%;

    bottom:-120px;
    left:-80px;

    opacity:0.25;
}

.hero-content{
    position:relative;
    z-index:2;
}

.hero-tag{

    display:inline-block;

    padding:10px 22px;

    background:white;

    border-radius:50px;

    color:#b85fc6;

    font-size:14px;
    font-weight:600;

    box-shadow:
    0 8px 20px rgba(0,0,0,0.08);

    margin-bottom:25px;
}

.hero-content h1{

    font-size:68px;
    font-weight:700;

    line-height:1.15;

    color:#2b2d42;
}

.hero-content p{

    font-size:19px;

    line-height:1.8;

    color:#555;

    margin-top:25px;

    max-width:600px;
}

.hero-buttons{

    margin-top:35px;

    display:flex;

    gap:18px;

    flex-wrap:wrap;
}

.btn-theme{

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    border:none;

    padding:15px 35px;

    border-radius:16px;

    font-weight:600;

    text-decoration:none;

    transition:0.35s;
}

.btn-theme:hover{

    transform:translateY(-4px);

    color:white;

    box-shadow:
    0 15px 30px rgba(181,126,220,0.3);
}

.btn-light-theme{

    background:white;

    color:#333;

    padding:15px 35px;

    border-radius:16px;

    font-weight:600;

    text-decoration:none;

    transition:0.35s;
}

.btn-light-theme:hover{

    transform:translateY(-4px);

    color:#333;
}

.hero-image{

    position:relative;

    z-index:2;
}

.hero-image img{

    width:100%;

    border-radius:35px;

    object-fit:cover;

    height:500px;

    box-shadow:
    0 20px 40px rgba(0,0,0,0.15);
}

/*                                                   SECTION TITLE                                                   */

.section-title{

    font-size:44px;

    font-weight:700;

    color:#2b2d42;
}

/*                                                   CATEGORY                                                   */

.category-section{
    padding:90px 0 40px;
}

.category-card{

    background:rgba(255,255,255,0.75);

    backdrop-filter:blur(14px);

    border-radius:32px;

    overflow:hidden;

    transition:0.4s;

    box-shadow:
    0 15px 35px rgba(0,0,0,0.08);

    height:100%;
}

.category-card:hover{

    transform:
    translateY(-12px)
    scale(1.03);

    box-shadow:
    0 25px 50px rgba(181,126,220,0.2);
}

.category-img{

    width:100%;

    height:240px;

    object-fit:cover;

    transition:0.5s;
}

.category-card:hover .category-img{
    transform:scale(1.08);
}

.category-body{

    padding:25px;

    text-align:center;
}

.category-body h5{

    font-size:25px;

    font-weight:700;

    color:#2b2d42;
}

/*                                                   FEATURES                                                   */

.feature-section{
    padding:90px 0;
}

.feature-card{

    background:rgba(255,255,255,0.72);

    backdrop-filter:blur(16px);

    border-radius:35px;

    padding:45px 30px;

    text-align:center;

    transition:0.4s;

    box-shadow:
    0 15px 40px rgba(0,0,0,0.08);

    height:100%;
}

.feature-card:hover{
    transform:translateY(-10px);
}

.feature-icon{

    width:95px;
    height:95px;

    border-radius:50%;

    margin:auto;

    margin-bottom:25px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:40px;

    color:white;
}

.icon-pink{
    background:
    linear-gradient(135deg,#ff8fab,#ffb3c6);
}

.icon-green{
    background:
    linear-gradient(135deg,#06d6a0,#1b9aaa);
}

.icon-purple{
    background:
    linear-gradient(135deg,#b185db,#7b2cbf);
}

.feature-card h5{

    font-size:25px;

    font-weight:700;

    color:#2b2d42;

    margin-bottom:18px;
}

.feature-card p{

    color:#666;

    line-height:1.8;
}

/*                                                   STATS                                                   */

.stats-section{

    margin-top:50px;

    padding:80px 50px;

    border-radius:40px;

    background:
    linear-gradient(135deg,#ffe0ea,#dccbff);

    box-shadow:
    0 15px 40px rgba(0,0,0,0.08);
}

.stat-box{
    text-align:center;
}

.stat-box h2{

    font-size:58px;

    font-weight:700;

    color:#2b2d42;
}

.stat-box p{

    margin-top:10px;

    color:#555;

    font-size:18px;
}

/*                                                   GALLERY                                                   */

.gallery-section{
    padding:90px 0;
}

.gallery-img{

    width:100%;

    height:280px;

    object-fit:cover;

    border-radius:30px;

    transition:0.4s;

    box-shadow:
    0 15px 35px rgba(0,0,0,0.1);
}

.gallery-img:hover{
    transform:scale(1.04);
}

/*                                                   CTA                                                   */

.cta-section{

    margin:50px 0 90px;

    padding:100px 30px;

    text-align:center;

    border-radius:45px;

    background:
    linear-gradient(135deg,#2b2d42,#b185db);

    color:white;

    overflow:hidden;

    position:relative;
}

.cta-section::before{

    content:"";

    position:absolute;

    width:300px;
    height:300px;

    border-radius:50%;

    background:rgba(255,255,255,0.08);

    top:-100px;
    right:-100px;
}

.cta-section h2{

    font-size:50px;

    font-weight:700;

    position:relative;
}

.cta-section p{

    font-size:19px;

    color:#eee;

    margin-top:20px;

    position:relative;
}

/*                                                   MOBILE                                                   */

@media(max-width:992px){

.hero-box{
    padding:40px;
}

.hero-content{
    text-align:center;
}

.hero-content p{
    margin:auto;
    margin-top:20px;
}

.hero-buttons{
    justify-content:center;
}

.hero-content h1{
    font-size:48px;
}

.hero-image{
    margin-top:40px;
}

}

@media(max-width:768px){

.hero-content h1{
    font-size:38px;
}

.section-title{
    font-size:34px;
}

.hero-image img{
    height:320px;
}

.stats-section{
    padding:50px 20px;
}

.cta-section h2{
    font-size:34px;
}

.gallery-img{
    height:220px;
}

}
/*                                                   WHY CHOOSE SECTION                                                   */

.why-choose-section{

    background:
    linear-gradient(135deg,#ffe5ec,#e9d5ff);

    position:relative;

    overflow:hidden;

    padding:90px 0;
}

/* Soft Background Glow */

.why-choose-section::before{

    content:"";

    position:absolute;

    width:350px;
    height:350px;

    background:#ffb3d1;

    border-radius:50%;

    top:-120px;
    left:-120px;

    opacity:0.18;

    filter:blur(40px);
}

.why-choose-section::after{

    content:"";

    position:absolute;

    width:300px;
    height:300px;

    background:#cdb4db;

    border-radius:50%;

    bottom:-100px;
    right:-100px;

    opacity:0.18;

    filter:blur(40px);
}

/*                                                   TITLES                                                   */

.mini-title{

    color:#b85fc6;

    font-size:14px;

    font-weight:600;

    letter-spacing:2px;

    text-transform:uppercase;
}

.main-title{

    color:#2b2d42;

    font-size:42px;

    font-weight:700;

    margin-top:10px;
}

.main-subtitle{

    color:#5f5f5f;

    max-width:700px;

    margin:auto;

    margin-top:15px;

    line-height:1.8;

    font-size:16px;
}

/*                                                   CARDS                                                   */

.modern-feature-card{

    background:rgba(255,255,255,0.62);

    backdrop-filter:blur(16px);

    border:1px solid rgba(255,255,255,0.4);

    border-radius:30px;

    padding:40px 28px;

    text-align:center;

    position:relative;

    overflow:hidden;

    transition:0.4s ease;

    height:100%;

    box-shadow:
    0 15px 35px rgba(181,126,220,0.12);
}

.modern-feature-card:hover{

    transform:translateY(-10px);

    box-shadow:
    0 25px 45px rgba(181,126,220,0.2);
}

/* Decorative Shape */

.feature-top-shape{

    position:absolute;

    top:-50px;
    right:-50px;

    width:130px;
    height:130px;

    background:rgba(255,255,255,0.25);

    border-radius:50%;
}

/*                                                   ICONS                                                   */

.feature-icon{

    width:85px;
    height:85px;

    margin:auto;

    border-radius:24px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:34px;

    color:white;

    margin-bottom:25px;

    box-shadow:
    0 12px 25px rgba(0,0,0,0.12);
}

.icon-pink{

    background:
    linear-gradient(135deg,#ff8fab,#ffb3c6);
}

.icon-green{

    background:
    linear-gradient(135deg,#06d6a0,#1b9aaa);
}

.icon-purple{

    background:
    linear-gradient(135deg,#b185db,#7b2cbf);
}

.icon-blue{

    background:
    linear-gradient(135deg,#7b8cff,#5f6fff);
}

/*                                                   TEXT                                                   */

.modern-feature-card h5{

    color:#2b2d42;

    font-size:23px;

    font-weight:700;

    margin-bottom:15px;
}

.modern-feature-card p{

    color:#666;

    font-size:15px;

    line-height:1.8;
}

/*                                                   RESPONSIVE                                                   */

@media(max-width:768px){

    .main-title{
        font-size:32px;
    }

    .modern-feature-card{
        padding:30px 22px;
    }

}
/*                                                   HERO                                                   */

.hero-wrapper{

    padding:100px 0;

    position:relative;

    overflow:hidden;
}

/* Decorative Background */

.hero-wrapper::before{

    content:"";

    position:absolute;

    width:450px;
    height:450px;

    background:#ffb3d1;

    border-radius:50%;

    top:-180px;
    right:-120px;

    opacity:0.18;

    filter:blur(40px);
}

.hero-wrapper::after{

    content:"";

    position:absolute;

    width:350px;
    height:350px;

    background:#cdb4db;

    border-radius:50%;

    bottom:-150px;
    left:-100px;

    opacity:0.18;

    filter:blur(40px);
}

/*                                                   CONTENT                                                   */

.hero-content{

    position:relative;

    z-index:2;
}

.hero-tag{

    display:inline-block;

    padding:10px 22px;

    background:rgba(255,255,255,0.7);

    backdrop-filter:blur(10px);

    border-radius:50px;

    color:#b85fc6;

    font-size:14px;

    font-weight:600;

    margin-bottom:28px;

    box-shadow:
    0 8px 20px rgba(0,0,0,0.08);
}

.hero-content h1{

    font-size:72px;

    font-weight:700;

    line-height:1.1;

    color:#2b2d42;
}

.hero-content p{

    font-size:18px;

    line-height:1.9;

    color:#555;

    margin-top:25px;

    max-width:620px;
}

/*                                                   BUTTONS                                                   */

.hero-buttons{

    margin-top:35px;

    display:flex;

    gap:18px;

    flex-wrap:wrap;
}

.btn-theme{

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    border:none;

    padding:15px 34px;

    border-radius:16px;

    font-weight:600;

    text-decoration:none;

    transition:0.35s;
}

.btn-theme:hover{

    transform:translateY(-4px);

    color:white;

    box-shadow:
    0 15px 30px rgba(181,126,220,0.3);
}

.btn-light-theme{

    background:white;

    color:#333;

    padding:15px 34px;

    border-radius:16px;

    font-weight:600;

    text-decoration:none;

    transition:0.35s;

    box-shadow:
    0 10px 25px rgba(0,0,0,0.08);
}

.btn-light-theme:hover{

    transform:translateY(-4px);

    color:#333;
}

/*                                                   IMAGE                                                   */

.hero-image{

    position:relative;

    z-index:2;
}

.hero-image img{

    width:100%;

    height:620px;

    object-fit:cover;

    border-radius:40px;

    box-shadow:
    0 25px 50px rgba(0,0,0,0.15);
}

/*                                                   MOBILE                                                   */

@media(max-width:992px){

    .hero-wrapper{
        padding:70px 0;
    }

    .hero-content{
        text-align:center;
    }

    .hero-content p{
        margin:auto;
        margin-top:20px;
    }

    .hero-buttons{
        justify-content:center;
    }

    .hero-content h1{
        font-size:52px;
    }

    .hero-image{
        margin-top:40px;
    }

    .hero-image img{
        height:450px;
    }

}

@media(max-width:768px){

    .hero-content h1{
        font-size:40px;
    }

    .hero-content p{
        font-size:16px;
    }

    .hero-image img{
        height:320px;
    }

}
.hero-image{

    display:flex;

    justify-content:center;
}

.hero-image img{

    width:95%;

    height:600px;

    object-fit:cover;

    border-radius:40px;

    box-shadow:
    0 25px 50px rgba(0,0,0,0.15);
}
</style>

<!--                                                   HERO                                                   -->



<section class="hero-wrapper">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- LEFT CONTENT -->

            <div class="col-lg-6">

                <div class="hero-content">

                    <h1>
                        Make Every <br>
                        Celebration Magical
                    </h1>

                    <p>
                        Discover decorators, photographers,
                        caterers, venues and vendors
                        to create unforgettable memories.
                        Empowering talented local vendors to deliver
                        premium experiences with creativity,
                        trust and personalized services.
                    </p>

                    <div class="hero-buttons">

                        <a href="auth/register.php"
                           class="btn-theme">

                            Get Started

                        </a>

                        <a href="about.php"
                           class="btn-light-theme">

                            Learn More

                        </a>

                    </div>

                </div>

            </div>

            <!-- RIGHT IMAGE -->

            <div class="col-lg-6">

                <div class="hero-image">

                    <img src="./assets/images/hero2.jpeg">

                </div>

            </div>

        </div>

    </div>

</section>

<!--                                                   CATEGORY                                                   -->

<section class="category-section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Explore Event Categories
            </h2>

        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">

                <div class="category-card">

                    <img src="./assets/images/index_page/wedding.webp"
                         class="category-img">

                    <div class="category-body">
                        <h5>Weddings</h5>
                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="category-card">

                    <img src="./assets/images/index_page/birthday1.webp"
                         class="category-img">

                    <div class="category-body">
                        <h5>Birthdays</h5>
                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="category-card">

                    <img src="./assets/images/index_page/corporate.jpg"
                         class="category-img">

                    <div class="category-body">
                        <h5>Corporate</h5>
                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="category-card">

                    <img src="./assets/images/index_page/privateParty.jpg"
                         class="category-img">

                    <div class="category-body">
                        <h5>Private Parties</h5>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!--                                                   FEATURES                                                   -->

<!--                                                   WHY CHOOSE + FEATURES                                                   -->

<section class="why-choose-section py-5">

    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-5">

            <span class="mini-title">
                EVENTSPACE FEATURES
            </span>

            <h2 class="main-title">
                Why Choose EventSpace?
            </h2>

            <p class="main-subtitle">
                Experience seamless event planning with trusted vendors,
                secure bookings and real-time notifications.
            </p>

        </div>

        <!-- Cards -->
        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-lg-3 col-md-6">

                <div class="modern-feature-card">

                    <div class="feature-top-shape"></div>

                    <div class="feature-icon icon-pink">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>

                    <h5>Verified Vendors</h5>

                    <p>
                        Connect with trusted and experienced professionals
                        for weddings, parties and corporate events.
                    </p>

                </div>

            </div>

            <!-- Card 2 -->
            <div class="col-lg-3 col-md-6">

                <div class="modern-feature-card">

                    <div class="feature-top-shape"></div>

                    <div class="feature-icon icon-green">
                        <i class="bi bi-credit-card-fill"></i>
                    </div>

                    <h5> Payments</h5>

                    <p>
                        Enjoy smooth and protected transactions
                        with safe booking payment systems.
                    </p>

                </div>

            </div>

            <!-- Card 3 -->
            <div class="col-lg-3 col-md-6">

                <div class="modern-feature-card">

                    <div class="feature-top-shape"></div>

                    <div class="feature-icon icon-purple">
                        <i class="bi bi-bell-fill"></i>
                    </div>

                    <h5>Instant Notifications</h5>

                    <p>
                        Receive instant updates for approvals,
                        reminders and payment confirmations.
                    </p>

                </div>

            </div>

            <!-- Card 4 -->
            <div class="col-lg-3 col-md-6">

                <div class="modern-feature-card">

                    <div class="feature-top-shape"></div>

                    <div class="feature-icon icon-blue">
                        <i class="bi bi-stars"></i>
                    </div>

                    <h5>Premium Experience</h5>

                    <p>
                        Plan memorable events with elegant services,
                        modern features and smart management.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!--                                                   GALLERY                                                   -->

<section class="gallery-section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Memorable Moments
            </h2>

        </div>

        <div class="row g-4">

            <div class="col-md-3">

                <img src="./assets/images/index_page/beach.avif"
                     class="gallery-img">

            </div>

            <div class="col-md-3">

                <img src="./assets/images/index_page/gallery7.jpg"
                     class="gallery-img">

            </div>

            <div class="col-md-3">

                <img src="./assets/images/index_page/beach1.jpg"
                     class="gallery-img">

            </div>

            <div class="col-md-3">

                <img src="./assets/images/index_page/stage.jpg"
                     class="gallery-img">

            </div>

        </div>

    </div>

</section>

<!--                                                   CTA                                                   -->

<div class="container">

    <section class="cta-section">

        <h2>
            Let’s Create Beautiful Memories Together
        </h2>

        <p>
            Plan weddings, birthdays, corporate events
            and special celebrations with EventSpace.
        </p>

        <div class="mt-4">

            <a href="auth/register.php"
               class="btn-theme">

                Start Planning

            </a>

        </div>

    </section>

</div>

<?php include 'includes/footer.php'; ?>