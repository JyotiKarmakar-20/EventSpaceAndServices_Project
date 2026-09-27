<?php include 'includes/header.php'; ?>

<style>

/*                                              CONTACT PAGE                                              */

.contact-section{

    height:100vh;

    display:flex;

    align-items:center;

    padding:20px 0;

    background:
    linear-gradient(135deg,#fff1f5,#f3e8ff);

    position:relative;

    overflow:hidden;
}

/*                                              BACKGROUND EFFECTS                                              */

.contact-section::before{

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

.contact-section::after{

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

/*                                              HERO                                              */

.contact-hero{

    text-align:center;

    margin-bottom:35px;

    position:relative;

    z-index:2;
}

.contact-hero h1{

    font-size:44px;

    font-weight:700;

    color:#2b2d42;

    margin-bottom:12px;
}

/*                                              CONTACT CARD                                              */

.contact-card{

    background:rgba(255,255,255,0.68);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,0.45);

    border-radius:30px;

    padding:28px 30px;

    height:100%;

    position:relative;

    z-index:2;

    box-shadow:
    0 20px 45px rgba(181,126,220,0.14);
}

.contact-card h3{

    font-size:26px;

    font-weight:700;

    color:#2b2d42;

    margin-bottom:20px;
}

/*                                              FORM                                              */

.form-label{

    font-weight:600;

    color:#4b4453;

    margin-bottom:8px;

    font-size:14px;
}

.form-control{

    border:none;

    height:50px;

    border-radius:16px;

    padding:0 16px;

    background:rgba(255,255,255,0.88);

    box-shadow:
    inset 0 2px 8px rgba(0,0,0,0.04);

    transition:0.3s;
}

textarea.form-control{

    height:100px;

    padding-top:15px;

    resize:none;
}

.form-control:focus{

    background:white;

    box-shadow:
    0 0 0 4px rgba(177,133,219,0.18);

    border:none;
}

/*                                              BUTTON                                              */

.btn-contact{

    border:none;

    height:50px;

    border-radius:16px;

    padding:0 28px;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    font-weight:600;

    font-size:15px;

    transition:0.35s;

    box-shadow:
    0 15px 30px rgba(181,126,220,0.2);
}

.btn-contact:hover{

    transform:translateY(-3px);

    background:
    linear-gradient(135deg,#ff74a6,#a855f7);

    color:white;
}

/*                                              CONTACT INFO                                              */

.info-box{

    display:flex;

    align-items:flex-start;

    gap:14px;

    margin-bottom:18px;
}

.info-icon{

    min-width:52px;
    height:52px;

    border-radius:16px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    font-size:18px;

    box-shadow:
    0 10px 25px rgba(181,126,220,0.18);
}

.info-content h5{

    font-size:18px;

    font-weight:700;

    color:#2b2d42;

    margin-bottom:6px;
}

.info-content p{

    color:#555;

    line-height:1.6;

    margin-bottom:0;

    font-size:14px;
}

/*                                              MAP                                              */

.contact-map{

    margin-top:18px;

    border-radius:24px;

    overflow:hidden;

    box-shadow:
    0 15px 35px rgba(0,0,0,0.08);
}

.contact-map iframe{

    width:100%;

    height:180px;

    border:none;
}

/*                                              RESPONSIVE                                              */

@media(max-width:991px){

    .contact-section{

        height:auto;

        padding:70px 0;
    }

}

@media(max-width:768px){

    .contact-hero h1{

        font-size:34px;
    }

    .contact-card{

        padding:24px 20px;
    }

    .contact-map iframe{

        height:220px;
    }

}
.contact-section{

    min-height:100vh;

    display:flex;

    align-items:flex-start;

    padding:8px 0 20px;
}
.contact-hero h1{

    font-size:44px;

    font-weight:700;

    color:#2b2d42;

    margin-bottom:6px;

    margin-top:26px;
}
.contact-hero{

    text-align:center;

    margin-bottom:20px;

    margin-top:0;
}
</style>

<section class="contact-section">

    <div class="container">

        <!-- HERO -->

        <div class="contact-hero">

            <h1>
                Contact Us
            </h1>

            <!-- <<p>
                Have questions, ideas or event requirements?
                Our team is here to help you create unforgettable experiences.
            </p> -->

        </div>

        <!-- CONTACT CONTENT -->

        <div class="row g-4 align-items-stretch">

            <!-- CONTACT FORM -->

            <div class="col-lg-6 d-flex">

                <div class="contact-card w-100">

                    <h3>
                        Send Us a Message
                    </h3>

                    <form>

                        <div class="mb-4">

                            <label class="form-label">
                                Full Name
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter your full name">

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Email Address
                            </label>

                            <input type="email"
                                   class="form-control"
                                   placeholder="Enter your email address">

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Your Message
                            </label>

                            <textarea class="form-control"
                                      placeholder="Write your message here"></textarea>

                        </div>

                        <button type="submit"
                                class="btn btn-contact">

                            Send Message

                        </button>

                    </form>

                </div>

            </div>

            <!-- CONTACT INFO -->

            <div class="col-lg-6 d-flex">

                <div class="contact-card w-100">

                    <h3>
                        Get In Touch
                    </h3>

                    <!-- ADDRESS -->

                    <div class="info-box">

                        <div class="info-icon">
                            <i class="fas fa-location-dot"></i>
                        </div>

                        <div class="info-content">

                            <h5>
                                Address
                            </h5>

                            <p>
                                Near Silicon University, Patia,
                                Bhubaneswar, Odisha 751024, India
                            </p>

                        </div>

                    </div>

                    <!-- EMAIL -->

                    <div class="info-box">

                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div class="info-content">

                            <h5>
                                Email Address
                            </h5>

                            <p>
                                eventspace@gmail.com
                            </p>

                        </div>

                    </div>

                    <!-- PHONE -->

                    <div class="info-box">

                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>

                        <div class="info-content">

                            <h5>
                                Phone Number
                            </h5>

                            <p>
                                +91 674 2725446
                            </p>

                        </div>

                    </div>

                    <!-- MAP -->

                    <div class="contact-map">

                        <iframe
                            src="https://www.google.com/maps?q=Silicon+University+Bhubaneswar&output=embed"
                            loading="lazy">
                        </iframe>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>