<?php include 'includes/header.php'; ?>

<style>

/*                                                     SERVICES PAGE                                                     */

.services-section{

    min-height:100vh;

    padding:25px 0 50px;

    background:
    linear-gradient(135deg,#fff1f5,#f3e8ff);

    position:relative;

    overflow:hidden;
}

/*                                                     BACKGROUND EFFECTS                                                     */

.services-section::before{

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

.services-section::after{

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

/*                                                     HERO                                                     */

.services-top{

    text-align:center;

    margin-bottom:35px;

    position:relative;

    z-index:2;
}

.services-top h1{

    font-size:48px;

    font-weight:700;

    color:#2b2d42;

    margin-bottom:10px;
}

.services-top p{

    color:#555;

    font-size:17px;
}

/*                                                     SERVICE CARD                                                     */

.service-card{

    background:rgba(255,255,255,0.72);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,0.4);

    border-radius:30px;

    overflow:hidden;

    transition:0.4s;

    height:100%;

    position:relative;

    z-index:2;

    box-shadow:
    0 18px 40px rgba(181,126,220,0.12);
}

.service-card:hover{

    transform:translateY(-10px);

    box-shadow:
    0 25px 50px rgba(181,126,220,0.18);
}

/*                                                     IMAGE                                                     */

.service-card img{

    width:100%;

    height:220px;

    object-fit:cover;
}

/*                                                     CARD BODY                                                     */

.service-card-body{

    padding:24px;
}

.service-card-body h5{

    font-size:24px;

    font-weight:700;

    color:#2b2d42;

    margin-bottom:12px;
}

.service-card-body p{

    color:#666;

    line-height:1.7;

    font-size:15px;

    margin-bottom:20px;
}

/*                                                     BUTTON                                                     */

.book-btn{

    display:inline-block;

    padding:12px 26px;

    border-radius:50px;

    text-decoration:none;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    font-weight:600;

    transition:0.35s;

    box-shadow:
    0 12px 25px rgba(181,126,220,0.18);
}

.book-btn:hover{

    transform:translateY(-3px);

    background:
    linear-gradient(135deg,#ff74a6,#a855f7);

    color:white;
}

/*                                                     RESPONSIVE                                                     */

@media(max-width:768px){

    .services-top h1{

        font-size:38px;
    }

    .service-card img{

        height:200px;
    }

}

</style>

<section class="services-section">

    <div class="container">

        <!-- HEADING -->

        <div class="services-top">

            <h1>
                Our Services
            </h1>

            <p>
                Explore premium event management services
                crafted for unforgettable celebrations.
            </p>

        </div>

        <!-- SERVICES -->

        <div class="row g-4">

            <!-- Wedding -->

            <div class="col-lg-4 col-md-6">

                <div class="service-card">

                    <img src="./assets/images/index_page/wedding2.webp">

                    <div class="service-card-body">

                        <h5>
                            Wedding Planning
                        </h5>

                        <p>
                            Complete wedding arrangements including venue,
                            decoration, catering and photography services.
                        </p>

                        <a href="/EventProject/auth/login.php"
                           class="book-btn">

                            Book Now

                        </a>

                    </div>

                </div>

            </div>

            <!-- Birthday -->

            <div class="col-lg-4 col-md-6">

                <div class="service-card">

                    <img src="./assets/images/index_page/bday_service.jpeg">

                    <div class="service-card-body">

                        <h5>
                            Birthday Parties
                        </h5>

                        <p>
                            Creative and memorable birthday party setups
                            for kids, adults and family celebrations.
                        </p>

                        <a href="/EventProject/auth/login.php"
                           class="book-btn">

                            Book Now

                        </a>

                    </div>

                </div>

            </div>

            <!-- Corporate -->

            <div class="col-lg-4 col-md-6">

                <div class="service-card">

                    <img src="./assets/images/index_page/corporate2.jpg">

                    <div class="service-card-body">

                        <h5>
                            Corporate Events
                        </h5>

                        <p>
                            Professional management for conferences,
                            meetings, seminars and business events.
                        </p>

                        <a href="/EventProject/auth/login.php"
                           class="book-btn">

                            Book Now

                        </a>

                    </div>

                </div>

            </div>

            <!-- Concert -->

            <div class="col-lg-4 col-md-6">

                <div class="service-card">

                    <img src="https://images.unsplash.com/photo-1506157786151-b8491531f063">

                    <div class="service-card-body">

                        <h5>
                            Concert & Shows
                        </h5>

                        <p>
                            Live shows, entertainment programs and
                            music concerts with complete arrangements.
                        </p>

                        <a href="/EventProject/auth/login.php"
                           class="book-btn">

                            Book Now

                        </a>

                    </div>

                </div>

            </div>

            <!-- Decoration -->

            <div class="col-lg-4 col-md-6">

                <div class="service-card">

                    <img src="./assets/images/index_page/deco_services2.webp">

                    <div class="service-card-body">

                        <h5>
                            Decoration Services
                        </h5>

                        <p>
                            Elegant and customized decorations
                            designed perfectly for your event theme.
                        </p>

                        <a href="/EventProject/auth/login.php"
                           class="book-btn">

                            Book Now

                        </a>

                    </div>

                </div>

            </div>

            <!-- Catering -->

            <div class="col-lg-4 col-md-6">

                <div class="service-card">

                    <img src="https://images.unsplash.com/photo-1555244162-803834f70033">

                    <div class="service-card-body">

                        <h5>
                            Catering Services
                        </h5>

                        <p>
                            Delicious menu options and professional
                            catering for all kinds of celebrations.
                        </p>

                        <a href="/EventProject/auth/login.php"
                           class="book-btn">

                            Book Now

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
