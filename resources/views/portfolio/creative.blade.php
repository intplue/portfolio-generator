<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Creative Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: #f7f0e2;
            color: #2d2524;
        }

        .portfolio {
            width: 92%;
            max-width: 1150px;
            margin: 45px auto;
        }

        /* HERO */

        .hero {
            min-height: 620px;
            background: #432a46;
            color: #f7f0e2;
            padding: 65px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: #b85c45;
            top: -120px;
            right: -80px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            background: #d6a63a;
            bottom: -80px;
            left: -60px;
            transform: rotate(25deg);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
        }

        .hero-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 3px;
            color: #d6a63a;
            margin-bottom: 30px;
        }

        .hero-name {
            font-size: clamp(3.5rem, 9vw, 8rem);
            line-height: 0.88;
            font-weight: 800;
            letter-spacing: -4px;
            margin-bottom: 35px;
        }

        .hero-description {
            max-width: 600px;
            font-size: 1rem;
            line-height: 1.8;
            color: #eadfd3;
        }

        .hero-contact {
            margin-top: 35px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px 25px;
            font-size: 0.75rem;
            color: #eadfd3;
        }

        /* ABOUT */

        .about {
            display: grid;
            grid-template-columns: 0.8fr 1.5fr;
            gap: 60px;
            margin-top: 30px;
        }

        .about-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #b85c45;
        }

        .about-text {
            font-size: 1.15rem;
            line-height: 1.8;
            color: #432a46;
        }

        /* HIGHLIGHTS */

        .highlights {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .highlight {
            min-height: 180px;
            padding: 30px;
            background: #ffffff;
            border: 1px solid #e4d9c8;
            position: relative;
        }

        .highlight:nth-child(2) {
            background: #b85c45;
            color: #ffffff;
        }

        .highlight:nth-child(3) {
            background: #d6a63a;
            color: #2d2524;
        }

        .highlight-number {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 35px;
        }

        .highlight-title {
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* EXPERIENCE */

        .experience {
            margin-top: 30px;
            background: #ffffff;
            padding: 55px;
        }

        .section-title {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #b85c45;
            margin-bottom: 30px;
        }

        .experience-item {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 35px;
            padding: 25px 0;
            border-top: 1px solid #e7ddd0;
        }

        .experience-item:first-child {
            border-top: none;
            padding-top: 0;
        }

        .experience-date {
            font-size: 0.7rem;
            font-weight: 700;
            color: #b85c45;
            line-height: 1.5;
        }

        .experience-position {
            font-size: 1.15rem;
            font-weight: 800;
            color: #432a46;
            margin-bottom: 5px;
        }

        .experience-company {
            font-size: 0.8rem;
            font-weight: 600;
            color: #8a726c;
            margin-bottom: 12px;
        }

        .experience-description {
            max-width: 650px;
            font-size: 0.85rem;
            line-height: 1.8;
            color: #5e514e;
        }

        /* EDUCATION + SKILLS */

        .details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-top: 30px;
        }

        .details-box {
            padding: 45px;
            background: #432a46;
            color: #f7f0e2;
        }

        .details-box:nth-child(2) {
            background: #d6a63a;
            color: #2d2524;
        }

        .details-title {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 25px;
        }

        .education-item {
            margin-bottom: 20px;
        }

        .education-year {
            font-size: 0.65rem;
            font-weight: 700;
            opacity: 0.75;
            margin-bottom: 6px;
        }

        .education-school {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .education-degree {
            font-size: 0.75rem;
            line-height: 1.6;
            opacity: 0.8;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill {
            padding: 9px 13px;
            border: 1px solid currentColor;
            font-size: 0.72rem;
            font-weight: 600;
        }

        /* PROJECTS */

        .projects {
            margin-top: 30px;
            background: #b85c45;
            color: #ffffff;
            padding: 55px;
        }

        .projects .section-title {
            color: #f7f0e2;
        }

        .project-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .project {
            background: #432a46;
            padding: 30px;
            min-height: 220px;
        }

        .project-number {
            font-size: 0.7rem;
            font-weight: 700;
            color: #d6a63a;
            margin-bottom: 30px;
        }

        .project-title {
            font-size: 1.2rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .project-description {
            font-size: 0.8rem;
            line-height: 1.8;
            color: #eadfd3;
            margin-bottom: 20px;
        }

        .project-tech {
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #d6a63a;
        }

        /* SOCIAL */

        .social {
            margin-top: 30px;
            background: #ffffff;
            padding: 45px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
        }

        .social-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: #432a46;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 25px;
        }

        .social-link {
            color: #b85c45;
            font-size: 0.8rem;
            font-weight: 700;
            text-decoration: none;
            border-bottom: 1px solid #d6a63a;
            padding-bottom: 4px;
        }

        .social-link:hover {
            color: #432a46;
        }

        /* FOOTER */

        .footer {
            margin-top: 30px;
            padding: 30px;
            background: #432a46;
            color: #eadfd3;
            display: flex;
            justify-content: space-between;
            gap: 20px;
            font-size: 0.7rem;
        }

        .footer-name {
            color: #d6a63a;
            font-weight: 700;
        }

        /* RESPONSIVE */

        @media (max-width: 750px) {

            .portfolio {
                width: 94%;
                margin: 25px auto;
            }

            .hero {
                padding: 45px 30px;
                min-height: 550px;
            }

            .hero-name {
                letter-spacing: -2px;
            }

            .about {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 10px;
            }

            .highlights {
                grid-template-columns: 1fr;
            }

            .experience {
                padding: 35px 25px;
            }

            .experience-item {
                grid-template-columns: 1fr;
                gap: 8px;
            }

            .details {
                grid-template-columns: 1fr;
            }

            .details-box {
                padding: 35px 25px;
            }

            .projects {
                padding: 35px 25px;
            }

            .project-grid {
                grid-template-columns: 1fr;
            }

            .social {
                flex-direction: column;
                align-items: flex-start;
                padding: 35px 25px;
            }

            .footer {
                flex-direction: column;
            }

        }

    </style>
</head>

<body>

    <main class="portfolio">

        <!-- HERO -->

        <section class="hero">

            <div class="hero-content">

                <div class="hero-label">
                    CREATIVE PORTFOLIO
                </div>

                <h1 class="hero-name">
                    Your<br>
                    Name.
                </h1>

                <p class="hero-description">
                    Student, developer, designer, and creative thinker
                    interested in building meaningful digital experiences
                    and exploring new ideas through technology.
                </p>

                <div class="hero-contact">

                    <span>
                        email@example.com
                    </span>

                    <span>
                        +63 900 000 0000
                    </span>

                    <span>
                        Your City, Philippines
                    </span>

                </div>

            </div>

        </section>


        <!-- ABOUT -->

        <section class="about">

            <div>

                <div class="about-label">
                    01 / ABOUT
                </div>

            </div>

            <p class="about-text">
                I am a passionate learner who enjoys combining creativity
                and technology to create useful and thoughtful projects.
                I continuously explore new skills, ideas, and opportunities
                that allow me to grow both personally and professionally.
            </p>

        </section>


        <!-- HIGHLIGHTS -->

        <section class="highlights">

            <div class="highlight">

                <div class="highlight-number">
                    01
                </div>

                <div class="highlight-title">
                    DEVELOPER
                </div>

            </div>


            <div class="highlight">

                <div class="highlight-number">
                    02
                </div>

                <div class="highlight-title">
                    DESIGNER
                </div>

            </div>


            <div class="highlight">

                <div class="highlight-number">
                    03
                </div>

                <div class="highlight-title">
                    CREATIVE THINKER
                </div>

            </div>

        </section>


        <!-- EXPERIENCE -->

        <section class="experience">

            <div class="section-title">
                02 / EXPERIENCE
            </div>


            <div class="experience-item">

                <div class="experience-date">
                    2025 — PRESENT
                </div>

                <div>

                    <div class="experience-position">
                        Position Title
                    </div>

                    <div class="experience-company">
                        Company or Organization
                    </div>

                    <p class="experience-description">
                        Describe your responsibilities, contributions,
                        projects, and achievements in this role.
                    </p>

                </div>

            </div>


            <div class="experience-item">

                <div class="experience-date">
                    2024 — 2025
                </div>

                <div>

                    <div class="experience-position">
                        Intern / Assistant
                    </div>

                    <div class="experience-company">
                        Company or Organization
                    </div>

                    <p class="experience-description">
                        Add another relevant experience and describe
                        the skills or knowledge you gained from it.
                    </p>

                </div>

            </div>

        </section>


        <!-- EDUCATION + SKILLS -->

        <section class="details">

            <div class="details-box">

                <div class="details-title">
                    03 / EDUCATION
                </div>


                <div class="education-item">

                    <div class="education-year">
                        2024 — PRESENT
                    </div>

                    <div class="education-school">
                        University Name
                    </div>

                    <div class="education-degree">
                        Bachelor of Science in Information Technology
                    </div>

                </div>


                <div class="education-item">

                    <div class="education-year">
                        2022 — 2024
                    </div>

                    <div class="education-school">
                        Senior High School
                    </div>

                    <div class="education-degree">
                        Accountancy, Business and Management
                    </div>

                </div>

            </div>


            <div class="details-box">

                <div class="details-title">
                    04 / SKILLS
                </div>

                <div class="skills">

                    <span class="skill">
                        Java
                    </span>

                    <span class="skill">
                        PHP
                    </span>

                    <span class="skill">
                        Laravel
                    </span>

                    <span class="skill">
                        MySQL
                    </span>

                    <span class="skill">
                        HTML
                    </span>

                    <span class="skill">
                        CSS
                    </span>

                    <span class="skill">
                        Git
                    </span>

                    <span class="skill">
                        UI Design
                    </span>

                </div>

            </div>

        </section>


        <!-- PROJECTS -->

        <section class="projects">

            <div class="section-title">
                05 / PROJECTS
            </div>


            <div class="project-grid">

                <article class="project">

                    <div class="project-number">
                        PROJECT 01
                    </div>

                    <div class="project-title">
                        Project Name
                    </div>

                    <p class="project-description">
                        Describe the purpose of the project,
                        the problem it solves, and your contribution.
                    </p>

                    <div class="project-tech">
                        HTML • CSS • LARAVEL
                    </div>

                </article>


                <article class="project">

                    <div class="project-number">
                        PROJECT 02
                    </div>

                    <div class="project-title">
                        Another Project
                    </div>

                    <p class="project-description">
                        Add a project that demonstrates your
                        technical skills, creativity, or experience.
                    </p>

                    <div class="project-tech">
                        JAVA • MYSQL
                    </div>

                </article>


                <article class="project">

                    <div class="project-number">
                        PROJECT 03
                    </div>

                    <div class="project-title">
                        Third Project
                    </div>

                    <p class="project-description">
                        Include another school, personal, or
                        professional project.
                    </p>

                    <div class="project-tech">
                        PHP • MYSQL
                    </div>

                </article>


                <article class="project">

                    <div class="project-number">
                        PROJECT 04
                    </div>

                    <div class="project-title">
                        Creative Project
                    </div>

                    <p class="project-description">
                        Showcase another piece of work that
                        represents your interests and abilities.
                    </p>

                    <div class="project-tech">
                        DESIGN • DEVELOPMENT
                    </div>

                </article>

            </div>

        </section>


        <!-- SOCIAL LINKS -->

        <section class="social">

            <div class="social-title">
                Let's connect.
            </div>

            <div class="social-links">

                <a href="#" class="social-link">
                    LinkedIn
                </a>

                <a href="#" class="social-link">
                    GitHub
                </a>

                <a href="#" class="social-link">
                    Website
                </a>

                <a href="#" class="social-link">
                    Instagram
                </a>

            </div>

        </section>


        <!-- FOOTER -->

        <footer class="footer">

            <span class="footer-name">
                Your Name
            </span>

            <span>
                © 2026 • Creative Portfolio
            </span>

        </footer>

    </main>

</body>
</html>