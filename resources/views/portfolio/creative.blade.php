<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $portfolio->full_name }} — Creative Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    @php
        $accent = match ($portfolio->accent_color) {
            'green' => '#315c45',
            'blue' => '#3d6fa8',
            default => '#432a46',
        };

        $accentSecond = match ($portfolio->accent_color) {
            'green' => '#c77d4f',
            'blue' => '#6d91b8',
            default => '#b85c45',
        };

        $accentLight = match ($portfolio->accent_color) {
            'green' => '#e4eadf',
            'blue' => '#e1e9f1',
            default => '#f7e9df',
        };

        $layout = $portfolio->layout_style ?? 'standard';
    @endphp

    <style>

        :root {
            --accent: {{ $accent }};
            --accent-second: {{ $accentSecond }};
            --accent-light: {{ $accentLight }};
            --background: #f7f0e2;
            --paper: #fffaf0;
            --text: #2d2524;
            --body-text: #514744;
            --muted: #786d68;
            --border: #dfd2c3;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        .portfolio {
            width: 92%;
            max-width: 1150px;
            margin: 50px auto;
            background: var(--paper);
            min-height: 100vh;
            padding: 60px;
            overflow: hidden;
        }

        /* CREATIVE HEADER */

        .profile {
            position: relative;
            display: grid;
            grid-template-columns: 1fr 220px;
            gap: 60px;
            align-items: center;
            padding: 55px;
            background: var(--accent);
            color: #ffffff;
            border-radius: 14px;
            margin-bottom: 45px;
        }

        .profile::after {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: var(--accent-second);
            right: -50px;
            bottom: -55px;
            opacity: 0.8;
        }

        .profile-picture {
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: var(--accent-light);
            overflow: hidden;
            border: 8px solid rgba(255,255,255,0.25);
            position: relative;
            z-index: 2;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-content {
            position: relative;
            z-index: 2;
        }

        .profile-label {
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 3px;
            margin-bottom: 15px;
            opacity: 0.75;
        }

        .profile-name {
            font-size: clamp(2.5rem, 6vw, 5rem);
            line-height: 0.95;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .profile-title {
            max-width: 550px;
            font-size: 0.95rem;
            line-height: 1.8;
            opacity: 0.82;
            margin-bottom: 25px;
        }

        .contact {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 20px;
            font-size: 0.78rem;
            opacity: 0.85;
        }

        /* GENERAL SECTIONS */

        .section {
            padding: 45px 0;
            border-bottom: 2px solid var(--border);
        }

        .section-label {
            display: inline-block;
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 2px;
            color: var(--accent);
            margin-bottom: 20px;
            padding: 7px 12px;
            background: var(--accent-light);
            border-radius: 5px;
        }

        .about-text,
        .content-text,
        .experience-content,
        .project-content {
            font-size: 0.95rem;
            line-height: 1.9;
            color: var(--body-text);
            white-space: pre-line;
        }

        /* ABOUT */

        .about-section {
            max-width: 850px;
            margin-left: auto;
        }

        /* TWO COLUMN */

        .two-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 45px;
        }

        .two-column .section {
            border-bottom: none;
        }

        /* SKILLS */

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill {
            display: inline-block;
            padding: 10px 16px;
            background: var(--accent);
            color: #ffffff;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 700;
        }

        /* EXPERIENCE */

        .experience-content {
            padding-left: 25px;
            border-left: 5px solid var(--accent-second);
        }

        /* PROJECTS */

        .project-content {
            background: var(--accent-light);
            padding: 30px;
            border-radius: 10px;
            border-left: 8px solid var(--accent-second);
        }

        /* SOCIAL */

        .social-section {
            padding: 45px 0 30px;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .social-link {
            display: inline-block;
            color: #ffffff;
            background: var(--accent);
            font-size: 0.8rem;
            font-weight: 700;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 5px;
            transition: 0.2s ease;
        }

        .social-link:hover {
            background: var(--accent-second);
        }

        /* FOOTER */

        .footer {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 2px solid var(--border);
            display: flex;
            justify-content: space-between;
            gap: 20px;
            font-size: 0.72rem;
            color: var(--muted);
        }

        .footer-name {
            color: var(--accent);
            font-weight: 800;
        }

        /* CARDS LAYOUT */

        .layout-cards .section {
            background: #ffffff;
            padding: 35px;
            margin-bottom: 25px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(70, 45, 40, 0.07);
        }

        .layout-cards .two-column {
            gap: 25px;
        }

        .layout-cards .two-column .section {
            margin-bottom: 0;
        }

        /* EDITORIAL LAYOUT */

        .layout-editorial .profile {
            grid-template-columns: 220px 1fr;
        }

        .layout-editorial .profile-picture {
            order: 1;
        }

        .layout-editorial .profile-content {
            order: 2;
        }

        .layout-editorial .about-section {
            max-width: 100%;
            margin-left: 0;
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 40px;
        }

        .layout-editorial .two-column {
            grid-template-columns: 0.8fr 1.2fr;
        }

        .layout-editorial .section-label {
            align-self: start;
        }

        /* RESPONSIVE */

        @media (max-width: 750px) {

            .portfolio {
                width: 94%;
                margin: 25px auto;
                padding: 30px 22px;
            }

            .profile,
            .layout-editorial .profile {
                grid-template-columns: 1fr;
                text-align: center;
                justify-items: center;
                padding: 40px 25px;
            }

            .profile-picture,
            .layout-editorial .profile-picture {
                order: 1;
                width: 160px;
                height: 160px;
            }

            .profile-content,
            .layout-editorial .profile-content {
                order: 2;
            }

            .contact {
                justify-content: center;
            }

            .about-section,
            .layout-editorial .about-section {
                display: block;
            }

            .two-column,
            .layout-editorial .two-column {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .section {
                padding: 35px 0;
            }

            .layout-cards .section {
                padding: 25px;
            }

            .footer {
                flex-direction: column;
            }
        }

    </style>
</head>

<body>

    <main class="portfolio layout-{{ $layout }}">

        <!-- PROFILE -->

        <section class="profile">

            <div class="profile-picture">

                @if ($portfolio->profile_picture)
                    <img
                        src="{{ asset('storage/' . $portfolio->profile_picture) }}"
                        alt="{{ $portfolio->full_name }}"
                    >
                @endif

            </div>

            <div class="profile-content">

                <div class="profile-label">
                    PORTFOLIO
                </div>

                <h1 class="profile-name">
                    {{ $portfolio->full_name }}
                </h1>

                <p class="profile-title">
                    {{ $portfolio->additional_info ?? 'Student • Developer • Designer' }}
                </p>

                <div class="contact">

                    @if ($portfolio->email)
                        <span>{{ $portfolio->email }}</span>
                    @endif

                    @if ($portfolio->contact_number)
                        <span>{{ $portfolio->contact_number }}</span>
                    @endif

                    @if ($portfolio->address)
                        <span>{{ $portfolio->address }}</span>
                    @endif

                </div>

            </div>

        </section>


        <!-- ABOUT -->

        @if ($portfolio->about_me)

            <section class="section about-section">

                <div class="section-label">
                    ABOUT ME
                </div>

                <p class="about-text">
                    {{ $portfolio->about_me }}
                </p>

            </section>

        @endif


        <!-- EDUCATION + SKILLS -->

        <div class="two-column">

            @if ($portfolio->educational_background)

                <section class="section">

                    <div class="section-label">
                        EDUCATION
                    </div>

                    <div class="content-text">
                        {{ $portfolio->educational_background }}
                    </div>

                </section>

            @endif


            @if ($portfolio->skills)

                <section class="section">

                    <div class="section-label">
                        SKILLS
                    </div>

                    <div class="skills-list">

                        @foreach (preg_split('/[,;\n]+/', $portfolio->skills) as $skill)

                            @if (trim($skill))
                                <span class="skill">
                                    {{ trim($skill) }}
                                </span>
                            @endif

                        @endforeach

                    </div>

                </section>

            @endif

        </div>


        <!-- WORK EXPERIENCE -->

        @if ($portfolio->work_experience)

            <section class="section">

                <div class="section-label">
                    WORK EXPERIENCE
                </div>

                <div class="experience-content">
                    {{ $portfolio->work_experience }}
                </div>

            </section>

        @endif


        <!-- PROJECTS -->

        @if ($portfolio->projects)

            <section class="section">

                <div class="section-label">
                    PROJECTS
                </div>

                <div class="project-content">
                    {{ $portfolio->projects }}
                </div>

            </section>

        @endif


        <!-- ADDITIONAL INFORMATION -->

        @if ($portfolio->additional_info)

            <section class="section">

                <div class="section-label">
                    ADDITIONAL INFORMATION
                </div>

                <div class="content-text">
                    {{ $portfolio->additional_info }}
                </div>

            </section>

        @endif


        <!-- SOCIAL LINKS -->

        @if (
            $portfolio->website ||
            $portfolio->linkedin ||
            $portfolio->github ||
            $portfolio->social_links
        )

            <section class="social-section">

                <div class="section-label">
                    FIND ME ONLINE
                </div>

                <div class="social-links">

                    @if ($portfolio->website)
                        <a
                            href="{{ $portfolio->website }}"
                            class="social-link"
                            target="_blank"
                        >
                            Website
                        </a>
                    @endif

                    @if ($portfolio->linkedin)
                        <a
                            href="{{ $portfolio->linkedin }}"
                            class="social-link"
                            target="_blank"
                        >
                            LinkedIn
                        </a>
                    @endif

                    @if ($portfolio->github)
                        <a
                            href="{{ $portfolio->github }}"
                            class="social-link"
                            target="_blank"
                        >
                            GitHub
                        </a>
                    @endif

                    @if ($portfolio->social_links)
                        <span class="social-link">
                            {{ $portfolio->social_links }}
                        </span>
                    @endif

                </div>

            </section>

        @endif


        <!-- FOOTER -->

        <footer class="footer">

            <span class="footer-name">
                {{ $portfolio->full_name }}
            </span>

            <span>
                © {{ date('Y') }} • Portfolio
            </span>

        </footer>

    </main>

</body>
</html>