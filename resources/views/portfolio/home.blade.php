<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>portfolio generator</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Gochi+Hand&family=Raleway:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        /* =========================
           GENERAL
        ========================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: #f3efe3;
            color: #18382a;
        }

        a {
            text-decoration: none;
            color: inherit;
        }


        /* =========================
           NAVBAR
        ========================= */

        nav {
            height: 78px;
            padding: 0 7%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: #f3efe3;
        }

        .logo {
            font-family: 'Raleway', sans-serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: #18382a;
        }

        .nav-links {
            display: flex;
            gap: 35px;

            font-size: 0.9rem;
            font-weight: 600;
        }

        .nav-links a {
            transition: 0.2s ease;
        }

        .nav-links a:hover {
            color: #526b5d;
        }


        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: calc(100vh - 78px);

            padding: 70px 7%;

            display: grid;
            grid-template-columns: 1fr 1fr;

            align-items: center;
            gap: 60px;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero-label {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 2px;

            color: #526b5d;

            margin-bottom: 20px;
        }

        .hero h1 {
            font-family: 'Gochi Hand', cursive;

            font-size: clamp(4rem, 7vw, 6.5rem);

            line-height: 0.9;
            letter-spacing: 1px;
            font-weight: 400;

            color: #18382a;

            margin-bottom: 30px;
        }

        .hero h1 span {
            color: #526b5d;
        }

        .hero-description {
            max-width: 500px;

            font-size: 1rem;
            line-height: 1.8;

            color: #526052;

            margin-bottom: 35px;
        }

        .hero-button {
            display: inline-block;

            padding: 15px 30px;

            background: #18382a;
            color: #f3efe3;

            border-radius: 10px;

            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.5px;

            transition: 0.25s ease;
        }

        .hero-button:hover {
            background: #526b5d;
            transform: translateY(-2px);
        }


        /* =========================
           PORTFOLIO PREVIEW
        ========================= */

        .portfolio-area {
            display: flex;
            justify-content: center;
            align-items: center;

            min-height: 520px;
        }

        .portfolio-stack {
            position: relative;

            width: 390px;
            height: 480px;
        }

        .portfolio-paper {
            position: absolute;

            inset: 0;

            background: #faf7ee;

            border-radius: 14px;

            box-shadow:
                0 20px 45px rgba(24, 56, 42, 0.14);
        }


        /* Back paper 1 */

        .paper-back-one {
            transform:
                rotate(-8deg)
                translate(-20px, 15px);

            background: #dddccf;
        }


        /* Back paper 2 */

        .paper-back-two {
            transform:
                rotate(7deg)
                translate(20px, 10px);

            background: #e8e4d7;
        }


        /* Front paper */

        .paper-front {
            z-index: 3;

            padding: 35px;
        }


        /* Preview top */

        .preview-top {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 35px;
        }

        .preview-logo {
            font-size: 0.8rem;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .preview-menu {
            width: 55px;
            height: 7px;

            background: #c5cbbf;

            border-radius: 20px;
        }


        /* Preview profile */

        .preview-profile {
            display: flex;
            align-items: center;

            gap: 20px;

            margin-bottom: 30px;
        }

        .profile-circle {
            width: 70px;
            height: 70px;

            border-radius: 50%;

            background: #82937a;
        }

        .preview-name {
            width: 150px;
            height: 15px;

            background: #18382a;

            border-radius: 10px;

            margin-bottom: 10px;
        }

        .preview-subtitle {
            width: 100px;
            height: 8px;

            background: #b5bdaf;

            border-radius: 10px;
        }


        /* Preview sections */

        .preview-section {
            margin-top: 30px;
        }

        .preview-heading {
            width: 120px;
            height: 10px;

            background: #526b5d;

            border-radius: 10px;

            margin-bottom: 15px;
        }

        .preview-line {
            height: 7px;

            background: #d3d5c9;

            border-radius: 10px;

            margin-bottom: 9px;
        }

        .preview-line.short {
            width: 65%;
        }


        /* Preview project cards */

        .preview-projects {
            display: grid;
            grid-template-columns: repeat(2, 1fr);

            gap: 12px;

            margin-top: 15px;
        }

        .preview-card {
            height: 75px;

            border-radius: 8px;

            background: #e3e6dc;
        }


        /* =========================
           ABOUT
        ========================= */

        .about {
            background: #18382a;

            color: #f3efe3;

            padding: 90px 7%;
        }

        .about-container {
            max-width: 1250px;

            margin: 0 auto;
        }

        .about-label {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 2px;

            color: #b9c5b4;

            margin-bottom: 18px;
        }

        .about h2 {
            font-size: clamp(2.5rem, 4vw, 4.2rem);

            line-height: 1;

            max-width: 800px;

            margin-bottom: 22px;
        }

        .about-text {
            max-width: 750px;

            line-height: 1.8;

            color: #d9dfd5;

            margin-bottom: 55px;
        }


        /* =========================
           HOW IT WORKS
        ========================= */

        .how-it-works-title {
            font-size: 1.1rem;
            font-weight: 700;

            letter-spacing: 0.5px;

            margin-bottom: 20px;
        }

        .steps {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 18px;

            margin-bottom: 50px;
        }

        .step {
            background: #244a39;

            padding: 28px;

            border-radius: 12px;

            min-height: 170px;
        }

        .step-number {
            font-size: 0.75rem;
            font-weight: 700;

            letter-spacing: 1px;

            color: #aebdaa;

            margin-bottom: 35px;
        }

        .step h3 {
            font-size: 1rem;

            margin-bottom: 10px;
        }

        .step p {
            color: #cbd5c8;

            font-size: 0.85rem;

            line-height: 1.6;
        }


        /* =========================
           GET STARTED
        ========================= */

        .get-started {
            display: inline-block;

            width: 190px;

            text-align: center;

            padding: 15px 25px;

            background: #f3efe3;
            color: #18382a;

            border-radius: 10px;

            font-size: 0.85rem;
            font-weight: 800;

            transition: 0.2s ease;
        }

        .get-started:hover {
            background: #ffffff;

            transform: translateY(-2px);
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            padding: 25px 7%;

            background: #10291f;

            color: #aeb9aa;

            text-align: center;

            font-size: 0.75rem;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 850px) {

            .hero {
                grid-template-columns: 1fr;

                padding-top: 60px;
            }

            .hero-content {
                max-width: 100%;
            }

            .portfolio-area {
                min-height: 500px;
            }

            .steps {
                grid-template-columns: 1fr;
            }

            .portfolio-stack {
                width: 340px;
                height: 430px;
            }
        }


        @media (max-width: 500px) {

            nav {
                padding: 0 5%;
            }

            .nav-links {
                gap: 15px;

                font-size: 0.75rem;
            }

            .logo {
                font-size: 1.2rem;
            }

            .hero {
                padding: 50px 5%;
            }

            .hero h1 {
                font-size: 4rem;
            }

            .portfolio-stack {
                width: 290px;
                height: 380px;
            }

            .paper-front {
                padding: 25px;
            }

            .about {
                padding: 75px 5%;
            }
        }

    </style>
</head>


<body>


    <!-- =========================
         NAVBAR
    ========================= -->

    <nav>

        <a href="{{ url('/') }}" class="logo">
            p o r t f o l i o ‎    ‎  ‎ g e n e r a t o r
        </a>

        <div class="nav-links">

            <a href="{{ url('/') }}">
                HOME
            </a>

            <a href="#about">
                ABOUT
            </a>

            <a href="#about">
                HELP
            </a>

        </div>

    </nav>



    <!-- =========================
         HERO
    ========================= -->

    <section class="hero">


        <!-- Hero Text -->

        <div class="hero-content">

            <div class="hero-label">
                PORTFOLIO TEMPLATE GENERATOR
            </div>

            <h1>
                Make your<br>
                <span>work stand out.</span>
            </h1>

            <p class="hero-description">
                Create a personalized portfolio, choose a template,
                and showcase your work with ease.
            </p>

            <a
                href="{{ route('portfolio.create') }}"
                class="hero-button"
            >
                CREATE PORTFOLIO
            </a>

        </div>



        <!-- Portfolio Preview -->

        <div class="portfolio-area">

            <div class="portfolio-stack">


                <!-- Back Portfolio -->

                <div class="portfolio-paper paper-back-one">
                </div>


                <!-- Second Back Portfolio -->

                <div class="portfolio-paper paper-back-two">
                </div>


                <!-- Main Portfolio -->

                <div class="portfolio-paper paper-front">


                    <!-- Top -->

                    <div class="preview-top">

                        <div class="preview-logo">
                            PORTFOLIO
                        </div>

                        <div class="preview-menu">
                        </div>

                    </div>


                    <!-- Profile -->

                    <div class="preview-profile">

                        <div class="profile-circle">
                        </div>

                        <div>

                            <div class="preview-name">
                            </div>

                            <div class="preview-subtitle">
                            </div>

                        </div>

                    </div>


                    <!-- About Preview -->

                    <div class="preview-section">

                        <div class="preview-heading">
                        </div>

                        <div class="preview-line">
                        </div>

                        <div class="preview-line">
                        </div>

                        <div class="preview-line short">
                        </div>

                    </div>


                    <!-- Projects Preview -->

                    <div class="preview-section">

                        <div class="preview-heading">
                        </div>

                        <div class="preview-projects">

                            <div class="preview-card">
                            </div>

                            <div class="preview-card">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- =========================
         ABOUT
    ========================= -->

    <section class="about" id="about">

        <div class="about-container">


            <div class="about-label">
                ABOUT
            </div>


            <h2>
                A simpler way to build your portfolio.
            </h2>


            <p class="about-text">
                Portfolio Generator helps you create a personalized
                portfolio without having to build everything from scratch.
                Enter your information, choose a template, and generate
                a portfolio that presents your work in a clean and
                organized way.
            </p>



            <!-- How It Works -->

            <h3 class="how-it-works-title">
                How It Works
            </h3>


            <div class="steps">


                <!-- Step 1 -->

                <div class="step">

                    <div class="step-number">
                        01
                    </div>

                    <h3>
                        Enter your information
                    </h3>

                    <p>
                        Add your personal details, education,
                        skills, projects, experience, and links.
                    </p>

                </div>



                <!-- Step 2 -->

                <div class="step">

                    <div class="step-number">
                        02
                    </div>

                    <h3>
                        Choose your template
                    </h3>

                    <p>
                        Select one of three portfolio designs
                        that best represents your style.
                    </p>

                </div>



                <!-- Step 3 -->

                <div class="step">

                    <div class="step-number">
                        03
                    </div>

                    <h3>
                        Generate your portfolio
                    </h3>

                    <p>
                        Preview your finished portfolio and
                        make changes whenever you need to.
                    </p>

                </div>


            </div>



            <!-- Get Started -->

            <a
                href="{{ route('portfolio.create') }}"
                class="get-started"
            >
                GET STARTED
            </a>


        </div>

    </section>



    <!-- =========================
         FOOTER
    ========================= -->

    <footer>

        © {{ date('Y') }} Portfolio Generator.
        All rights reserved.

    </footer>


</body>
</html>