<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Simple Portfolio</title>

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
            background: #f3efe3;
            color: #18382a;
        }

        .portfolio {
            width: 90%;
            max-width: 1100px;
            margin: 60px auto;
            background: #faf8f2;
            min-height: 100vh;
            padding: 70px;
        }

        /* PROFILE */

        .profile {
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 45px;
            align-items: center;
            padding-bottom: 55px;
            border-bottom: 1px solid #d9d6ca;
        }

        .profile-picture {
            width: 180px;
            height: 180px;
            background: #d8ddd3;
            border-radius: 50%;
        }

        .profile-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #526b5d;
            margin-bottom: 12px;
        }

        .profile-name {
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            line-height: 1;
            font-weight: 700;
            color: #18382a;
            margin-bottom: 15px;
        }

        .profile-title {
            font-size: 1rem;
            font-weight: 500;
            color: #526b5d;
            margin-bottom: 25px;
        }

        .contact {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 25px;
            font-size: 0.8rem;
            color: #626b64;
        }

        /* GENERAL SECTIONS */

        .section {
            padding: 50px 0;
            border-bottom: 1px solid #d9d6ca;
        }

        .section-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #526b5d;
            margin-bottom: 18px;
        }

        /* ABOUT */

        .about-text {
            max-width: 800px;
            font-size: 1.05rem;
            line-height: 1.9;
            color: #3f4942;
        }

        /* EDUCATION + SKILLS */

        .two-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 70px;
        }

        .education-item {
            margin-bottom: 25px;
        }

        .education-year {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #526b5d;
            margin-bottom: 7px;
        }

        .education-school {
            font-size: 1rem;
            font-weight: 700;
            color: #18382a;
            margin-bottom: 5px;
        }

        .education-degree {
            font-size: 0.82rem;
            line-height: 1.6;
            color: #626b64;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 12px 25px;
        }

        .skill {
            font-size: 0.9rem;
            color: #3f4942;
            padding-bottom: 7px;
            border-bottom: 1px solid #b8c1b7;
        }

        /* WORK EXPERIENCE */

        .experience-item {
            display: grid;
            grid-template-columns: 170px 1fr;
            gap: 35px;
            padding: 25px 0;
            border-top: 1px solid #e0ddd2;
        }

        .experience-item:first-child {
            border-top: none;
            padding-top: 0;
        }

        .experience-date {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #526b5d;
            line-height: 1.6;
        }

        .experience-position {
            font-size: 1.05rem;
            font-weight: 700;
            color: #18382a;
            margin-bottom: 5px;
        }

        .experience-company {
            font-size: 0.85rem;
            font-weight: 600;
            color: #626b64;
            margin-bottom: 12px;
        }

        .experience-description {
            max-width: 650px;
            font-size: 0.88rem;
            line-height: 1.8;
            color: #3f4942;
        }

        /* PROJECTS */

        .project-item {
            display: grid;
            grid-template-columns: 70px 1fr;
            gap: 25px;
            padding: 28px 0;
            border-top: 1px solid #e0ddd2;
        }

        .project-item:first-child {
            border-top: none;
            padding-top: 0;
        }

        .project-number {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #526b5d;
            padding-top: 4px;
        }

        .project-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #18382a;
            margin-bottom: 8px;
        }

        .project-description {
            max-width: 700px;
            font-size: 0.88rem;
            line-height: 1.8;
            color: #3f4942;
            margin-bottom: 12px;
        }

        .project-details {
            display: flex;
            flex-wrap: wrap;
            gap: 8px 20px;
            font-size: 0.75rem;
            color: #626b64;
        }

        .project-tech {
            font-weight: 600;
            color: #526b5d;
        }

        .project-link {
            color: #18382a;
            font-weight: 600;
            text-decoration: none;
            border-bottom: 1px solid #9aa89c;
        }

        .project-link:hover {
            border-bottom-color: #18382a;
        }

        /* SOCIAL LINKS */

        .social-section {
            padding: 50px 0 40px;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 12px 30px;
        }

        .social-link {
            color: #18382a;
            font-size: 0.88rem;
            font-weight: 600;
            text-decoration: none;
            padding-bottom: 6px;
            border-bottom: 1px solid #9aa89c;
            transition: 0.2s ease;
        }

        .social-link:hover {
            color: #526b5d;
            border-bottom-color: #526b5d;
        }

        /* FOOTER */

        .footer {
            padding-top: 35px;
            border-top: 1px solid #d9d6ca;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            font-size: 0.7rem;
            color: #7a817b;
        }

        .footer-name {
            font-weight: 600;
            color: #526b5d;
        }

        /* RESPONSIVE */

        @media (max-width: 700px) {

            .portfolio {
                width: 94%;
                margin: 25px auto;
                padding: 40px 25px;
            }

            .profile {
                grid-template-columns: 1fr;
                text-align: center;
                justify-items: center;
            }

            .contact {
                justify-content: center;
            }

            .two-column {
                grid-template-columns: 1fr;
                gap: 45px;
            }

            .experience-item {
                grid-template-columns: 1fr;
                gap: 8px;
            }

            .project-item {
                grid-template-columns: 1fr;
                gap: 8px;
            }

            .footer {
                flex-direction: column;
                align-items: flex-start;
            }

        }

    </style>
</head>

<body>

    <main class="portfolio">

        <!-- PROFILE -->

        <section class="profile">

            <div class="profile-picture"></div>

            <div class="profile-content">

                <div class="profile-label">
                    PORTFOLIO
                </div>

                <h1 class="profile-name">
                    Your Name
                </h1>

                <p class="profile-title">
                    Student • Developer • Designer
                </p>

                <div class="contact">

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


        <!-- ABOUT ME -->

        <section class="section">

            <div class="section-label">
                ABOUT ME
            </div>

            <p class="about-text">
                I am a passionate student and aspiring professional
                who enjoys learning new skills, working on meaningful
                projects, and continuously improving my craft. I am
                interested in creating practical and thoughtful
                solutions through technology and creativity.
            </p>

        </section>


        <!-- EDUCATION AND SKILLS -->

        <section class="section">

            <div class="two-column">

                <!-- EDUCATION -->

                <div>

                    <div class="section-label">
                        EDUCATION
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


                <!-- SKILLS -->

                <div>

                    <div class="section-label">
                        SKILLS
                    </div>

                    <div class="skills-list">

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

            </div>

        </section>


        <!-- WORK EXPERIENCE -->

        <section class="section">

            <div class="section-label">
                WORK EXPERIENCE
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
                        and the experience you gained in this role.
                        Keep the description concise and focused on
                        meaningful work.
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
                        Add a short description of your responsibilities,
                        tasks, projects, or achievements during this
                        experience.
                    </p>

                </div>

            </div>

        </section>


        <!-- PROJECTS -->

        <section class="section">

            <div class="section-label">
                PROJECTS
            </div>


            <div class="project-item">

                <div class="project-number">
                    01
                </div>

                <div>

                    <div class="project-title">
                        Project Name
                    </div>

                    <p class="project-description">
                        A short description of the project, its purpose,
                        the problem it addresses, and your contribution
                        to the project.
                    </p>

                    <div class="project-details">

                        <span class="project-tech">
                            HTML • CSS • Laravel
                        </span>

                        <a href="#" class="project-link">
                            View Project
                        </a>

                    </div>

                </div>

            </div>


            <div class="project-item">

                <div class="project-number">
                    02
                </div>

                <div>

                    <div class="project-title">
                        Another Project
                    </div>

                    <p class="project-description">
                        Add another project that demonstrates your skills,
                        experience, creativity, or knowledge in your field.
                    </p>

                    <div class="project-details">

                        <span class="project-tech">
                            Java • MySQL
                        </span>

                        <a href="#" class="project-link">
                            View Project
                        </a>

                    </div>

                </div>

            </div>


            <div class="project-item">

                <div class="project-number">
                    03
                </div>

                <div>

                    <div class="project-title">
                        Third Project
                    </div>

                    <p class="project-description">
                        Include another relevant project, school project,
                        personal project, or professional work.
                    </p>

                    <div class="project-details">

                        <span class="project-tech">
                            PHP • MySQL
                        </span>

                        <a href="#" class="project-link">
                            View Project
                        </a>

                    </div>

                </div>

            </div>

        </section>


        <!-- SOCIAL LINKS -->

        <section class="social-section">

            <div class="section-label">
                FIND ME ONLINE
            </div>

            <div class="social-links">

                <a href="#" class="social-link">
                    LinkedIn
                </a>

                <a href="#" class="social-link">
                    GitHub
                </a>

                <a href="#" class="social-link">
                    Personal Website
                </a>

                <a href="#" class="social-link">
                    Other Social Link
                </a>

            </div>

        </section>


        <!-- FOOTER -->

        <footer class="footer">

            <span class="footer-name">
                Your Name
            </span>

            <span>
                © 2026 • Portfolio
            </span>

        </footer>

    </main>

</body>
</html>