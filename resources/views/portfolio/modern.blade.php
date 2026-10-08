<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modern Portfolio</title>

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
            background: #eef1f3;
            color: #172033;
            line-height: 1.6;
        }

        .portfolio {
            width: 92%;
            max-width: 1200px;
            margin: 40px auto;
        }

        /* PROFILE */

        .profile-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 45px;
            display: grid;
            grid-template-columns: 140px 1fr auto;
            gap: 35px;
            align-items: center;
            margin-bottom: 25px;
        }

        .profile-picture {
            width: 140px;
            height: 140px;
            background: #dce5ed;
            border-radius: 14px;
            overflow: hidden;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #3d6fa8;
            margin-bottom: 10px;
        }

        .profile-name {
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            line-height: 1;
            font-weight: 700;
            color: #172033;
            margin-bottom: 12px;
        }

        .profile-title {
            font-size: 0.95rem;
            font-weight: 500;
            color: #647080;
        }

        .contact {
            display: flex;
            flex-direction: column;
            gap: 9px;
            text-align: right;
            font-size: 0.78rem;
            color: #647080;
        }

        /* INTRO */

        .intro-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 25px;
            margin-bottom: 25px;
        }

        .about-card,
        .quick-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 35px;
        }

        .card-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #3d6fa8;
            margin-bottom: 15px;
        }

        .about-text {
            font-size: 1rem;
            line-height: 1.9;
            color: #4f5a68;
        }

        .quick-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .quick-item {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e2e6ea;
            font-size: 0.82rem;
        }

        .quick-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .quick-label {
            color: #7a8491;
        }

        .quick-value {
            font-weight: 600;
            color: #172033;
            text-align: right;
        }

        /* EDUCATION + SKILLS */

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 25px;
        }

        .info-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 35px;
        }

        .education-item {
            padding: 20px 0;
            border-bottom: 1px solid #e2e6ea;
        }

        .education-item:first-of-type {
            padding-top: 5px;
        }

        .education-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .education-year {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #3d6fa8;
            margin-bottom: 6px;
        }

        .education-school {
            font-size: 1rem;
            font-weight: 700;
            color: #172033;
            margin-bottom: 4px;
        }

        .education-degree {
            font-size: 0.8rem;
            color: #687382;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .skill {
            background: #dce5ed;
            color: #172033;
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 600;
        }

        /* EXPERIENCE */

        .experience-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 35px;
            margin-bottom: 25px;
        }

        .experience-item {
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 35px;
            padding: 25px 0;
            border-bottom: 1px solid #e2e6ea;
        }

        .experience-item:first-of-type {
            padding-top: 5px;
        }

        .experience-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .experience-date {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #3d6fa8;
        }

        .experience-position {
            font-size: 1.05rem;
            font-weight: 700;
            color: #172033;
            margin-bottom: 4px;
        }

        .experience-company {
            font-size: 0.82rem;
            font-weight: 600;
            color: #687382;
            margin-bottom: 10px;
        }

        .experience-description {
            font-size: 0.85rem;
            line-height: 1.8;
            color: #4f5a68;
            max-width: 700px;
        }

        /* PROJECTS */

        .projects-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 35px;
            margin-bottom: 25px;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .project {
            border: 1px solid #dce1e6;
            border-radius: 12px;
            padding: 25px;
            transition: 0.2s ease;
        }

        .project:hover {
            border-color: #3d6fa8;
        }

        .project-number {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #3d6fa8;
            margin-bottom: 10px;
        }

        .project-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #172033;
            margin-bottom: 8px;
        }

        .project-description {
            font-size: 0.82rem;
            line-height: 1.7;
            color: #687382;
            margin-bottom: 15px;
        }

        .project-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .project-tech {
            font-size: 0.7rem;
            font-weight: 600;
            color: #3d6fa8;
        }

        .project-link {
            font-size: 0.72rem;
            font-weight: 700;
            color: #172033;
            text-decoration: none;
        }

        .project-link:hover {
            color: #3d6fa8;
        }

        /* SOCIAL LINKS */

        .social-card {
            background: #172033;
            border-radius: 16px;
            padding: 35px;
            color: #ffffff;
            margin-bottom: 25px;
        }

        .social-card .card-label {
            color: #8eb4dc;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .social-link {
            color: #ffffff;
            text-decoration: none;
            border: 1px solid #4a5669;
            border-radius: 8px;
            padding: 10px 18px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .social-link:hover {
            background: #3d6fa8;
            border-color: #3d6fa8;
        }

        /* FOOTER */

        .footer {
            background: #ffffff;
            border-radius: 16px;
            padding: 25px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            font-size: 0.72rem;
            color: #7a8491;
        }

        .footer-name {
            color: #172033;
            font-weight: 700;
        }

        /* RESPONSIVE */

        @media (max-width: 850px) {

            .profile-card {
                grid-template-columns: 120px 1fr;
            }

            .contact {
                grid-column: 1 / -1;
                flex-direction: row;
                flex-wrap: wrap;
                text-align: left;
                gap: 10px 25px;
                padding-top: 15px;
                border-top: 1px solid #e2e6ea;
            }

            .intro-grid,
            .info-grid {
                grid-template-columns: 1fr;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 600px) {

            .portfolio {
                width: 94%;
                margin: 20px auto;
            }

            .profile-card {
                grid-template-columns: 1fr;
                text-align: center;
                justify-items: center;
                padding: 30px 25px;
            }

            .contact {
                justify-content: center;
                text-align: center;
            }

            .about-card,
            .quick-card,
            .info-card,
            .experience-card,
            .projects-card,
            .social-card {
                padding: 25px;
            }

            .skills-grid {
                grid-template-columns: 1fr;
            }

            .experience-item {
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

        <section class="profile-card">

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

            </div>

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

        </section>


        <!-- ABOUT + QUICK INFORMATION -->

        <section class="intro-grid">

            <div class="about-card">

                <div class="card-label">
                    ABOUT ME
                </div>

                <p class="about-text">
                    I am a passionate student and aspiring professional
                    who enjoys learning new skills, working on meaningful
                    projects, and continuously improving my craft. I am
                    interested in creating practical and thoughtful
                    solutions through technology and creativity.
                </p>

            </div>


            <div class="quick-card">

                <div class="card-label">
                    QUICK INFO
                </div>

                <div class="quick-list">

                    <div class="quick-item">

                        <span class="quick-label">
                            Location
                        </span>

                        <span class="quick-value">
                            Your City
                        </span>

                    </div>

                    <div class="quick-item">

                        <span class="quick-label">
                            Field
                        </span>

                        <span class="quick-value">
                            Information Technology
                        </span>

                    </div>

                    <div class="quick-item">

                        <span class="quick-label">
                            Availability
                        </span>

                        <span class="quick-value">
                            Open to opportunities
                        </span>

                    </div>

                </div>

            </div>

        </section>


        <!-- EDUCATION + SKILLS -->

        <section class="info-grid">

            <div class="info-card">

                <div class="card-label">
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


            <div class="info-card">

                <div class="card-label">
                    SKILLS
                </div>

                <div class="skills-grid">

                    <div class="skill">
                        Java
                    </div>

                    <div class="skill">
                        PHP
                    </div>

                    <div class="skill">
                        Laravel
                    </div>

                    <div class="skill">
                        MySQL
                    </div>

                    <div class="skill">
                        HTML
                    </div>

                    <div class="skill">
                        CSS
                    </div>

                    <div class="skill">
                        Git
                    </div>

                    <div class="skill">
                        UI Design
                    </div>

                </div>

            </div>

        </section>


        <!-- WORK EXPERIENCE -->

        <section class="experience-card">

            <div class="card-label">
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

        <section class="projects-card">

            <div class="card-label">
                PROJECTS
            </div>


            <div class="projects-grid">

                <article class="project">

                    <div class="project-number">
                        PROJECT 01
                    </div>

                    <div class="project-title">
                        Project Name
                    </div>

                    <p class="project-description">
                        A short description of the project, its purpose,
                        and your contribution to the project.
                    </p>

                    <div class="project-bottom">

                        <span class="project-tech">
                            Laravel • MySQL
                        </span>

                        <a href="#" class="project-link">
                            View Project →
                        </a>

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
                        Add another project that demonstrates your skills,
                        creativity, or knowledge in your field.
                    </p>

                    <div class="project-bottom">

                        <span class="project-tech">
                            Java • MySQL
                        </span>

                        <a href="#" class="project-link">
                            View Project →
                        </a>

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
                        Include another relevant school, personal,
                        academic, or professional project.
                    </p>

                    <div class="project-bottom">

                        <span class="project-tech">
                            PHP • HTML • CSS
                        </span>

                        <a href="#" class="project-link">
                            View Project →
                        </a>

                    </div>

                </article>


                <article class="project">

                    <div class="project-number">
                        PROJECT 04
                    </div>

                    <div class="project-title">
                        Fourth Project
                    </div>

                    <p class="project-description">
                        Showcase another project that represents your
                        experience, interests, or technical abilities.
                    </p>

                    <div class="project-bottom">

                        <span class="project-tech">
                            Web Development
                        </span>

                        <a href="#" class="project-link">
                            View Project →
                        </a>

                    </div>

                </article>

            </div>

        </section>


        <!-- SOCIAL LINKS -->

        <section class="social-card">

            <div class="card-label">
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