<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $portfolio->full_name }} — Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    @php
        $accent = match ($portfolio->accent_color) {
            'blue' => '#3d6fa8',
            'plum' => '#6b3f68',
            default => '#18382a',
        };

        $accentLight = match ($portfolio->accent_color) {
            'blue' => '#dce5ed',
            'plum' => '#eadde8',
            default => '#d8ddd3',
        };

        $accentMuted = match ($portfolio->accent_color) {
            'blue' => '#627d9b',
            'plum' => '#80657d',
            default => '#526b5d',
        };

        $layout = $portfolio->layout_style ?? 'standard';
    @endphp

    <style>

        :root {
            --accent: {{ $accent }};
            --accent-muted: {{ $accentMuted }};
            --accent-light: {{ $accentLight }};
            --background: #f3efe3;
            --paper: #faf8f2;
            --text: #202722;
            --body-text: #3f4942;
            --muted: #626b64;
            --border: #d9d6ca;
            --soft-border: #e0ddd2;
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
            width: 90%;
            max-width: 1100px;
            margin: 60px auto;
            background: var(--paper);
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
            border-bottom: 1px solid var(--border);
        }

        .profile-picture {
            width: 180px;
            height: 180px;
            background: var(--accent-light);
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
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
            color: var(--accent-muted);
            margin-bottom: 12px;
        }

        .profile-name {
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            line-height: 1;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 15px;
        }

        .profile-title {
            font-size: 1rem;
            font-weight: 500;
            color: var(--accent-muted);
            margin-bottom: 25px;
        }

        .contact {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 25px;
            font-size: 0.8rem;
            color: var(--muted);
        }

        /* GENERAL SECTIONS */

        .section {
            padding: 50px 0;
            border-bottom: 1px solid var(--border);
        }

        .section-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: var(--accent-muted);
            margin-bottom: 18px;
        }

        /* ABOUT */

        .about-text {
            max-width: 800px;
            font-size: 1.05rem;
            line-height: 1.9;
            color: var(--body-text);
        }

        /* EDUCATION + SKILLS */

        .two-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 70px;
        }

        .content-text {
            font-size: 0.9rem;
            line-height: 1.9;
            color: var(--body-text);
            white-space: pre-line;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 12px 25px;
        }

        .skill {
            font-size: 0.9rem;
            color: var(--body-text);
            padding-bottom: 7px;
            border-bottom: 1px solid var(--accent-muted);
        }

        /* WORK EXPERIENCE */

        .experience-content {
            font-size: 0.9rem;
            line-height: 1.9;
            color: var(--body-text);
            white-space: pre-line;
        }

        /* PROJECTS */

        .project-content {
            font-size: 0.9rem;
            line-height: 1.9;
            color: var(--body-text);
            white-space: pre-line;
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
            color: var(--accent);
            font-size: 0.88rem;
            font-weight: 600;
            text-decoration: none;
            padding-bottom: 6px;
            border-bottom: 1px solid var(--accent-muted);
            transition: 0.2s ease;
        }

        .social-link:hover {
            color: var(--accent-muted);
        }

        /* FOOTER */

        .footer {
            padding-top: 35px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            font-size: 0.7rem;
            color: #7a817b;
        }

        .footer-name {
            font-weight: 600;
            color: var(--accent-muted);
        }

        /* CARDS LAYOUT */

        .layout-cards .section {
            border-bottom: none;
            background: #ffffff;
            padding: 35px;
            margin-top: 25px;
            border-radius: 10px;
        }

        .layout-cards .profile {
            background: #ffffff;
            padding: 40px;
            border: none;
            border-radius: 10px;
        }

        .layout-cards .social-section {
            background: #ffffff;
            padding: 35px;
            margin-top: 25px;
            border-radius: 10px;
        }

        .layout-cards .footer {
            margin-top: 25px;
        }

        /* EDITORIAL LAYOUT */

        .layout-editorial {
            max-width: 1000px;
        }

        .layout-editorial .profile {
            grid-template-columns: 1fr 220px;
            gap: 60px;
        }

        .layout-editorial .profile-picture {
            width: 220px;
            height: 220px;
            border-radius: 12px;
            order: 2;
        }

        .layout-editorial .profile-content {
            order: 1;
        }

        .layout-editorial .section-label {
            color: var(--accent);
        }

        .layout-editorial .section {
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 45px;
        }

        .layout-editorial .section-label {
            margin-bottom: 0;
        }

        .layout-editorial .social-section {
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 45px;
        }

        /* RESPONSIVE */

        @media (max-width: 700px) {

            .portfolio {
                width: 94%;
                margin: 25px auto;
                padding: 40px 25px;
            }

            .profile,
            .layout-editorial .profile {
                grid-template-columns: 1fr;
                text-align: center;
                justify-items: center;
            }

            .layout-editorial .profile-picture {
                order: 1;
                width: 180px;
                height: 180px;
            }

            .layout-editorial .profile-content {
                order: 2;
            }

            .contact {
                justify-content: center;
            }

            .two-column {
                grid-template-columns: 1fr;
                gap: 45px;
            }

            .layout-editorial .section,
            .layout-editorial .social-section {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .layout-cards .section,
            .layout-cards .profile,
            .layout-cards .social-section {
                padding: 25px;
            }

            .footer {
                flex-direction: column;
                align-items: flex-start;
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
                @else
                    <span></span>
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
                        <span>
                            {{ $portfolio->email }}
                        </span>
                    @endif

                    @if ($portfolio->contact_number)
                        <span>
                            {{ $portfolio->contact_number }}
                        </span>
                    @endif

                    @if ($portfolio->address)
                        <span>
                            {{ $portfolio->address }}
                        </span>
                    @endif

                </div>

            </div>

        </section>


        <!-- ABOUT ME -->

        @if ($portfolio->about_me)

            <section class="section">

                <div class="section-label">
                    ABOUT ME
                </div>

                <p class="about-text">
                    {{ $portfolio->about_me }}
                </p>

            </section>

        @endif


        <!-- EDUCATION AND SKILLS -->

        <section class="section">

            <div class="two-column">

                <!-- EDUCATION -->

                @if ($portfolio->educational_background)

                    <div>

                        <div class="section-label">
                            EDUCATION
                        </div>

                        <div class="content-text">
                            {{ $portfolio->educational_background }}
                        </div>

                    </div>

                @endif


                <!-- SKILLS -->

                @if ($portfolio->skills)

                    <div>

                        <div class="section-label">
                            SKILLS
                        </div>

                        <div class="content-text">
                            {{ $portfolio->skills }}
                        </div>

                    </div>

                @endif

            </div>

        </section>


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