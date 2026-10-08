<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $portfolio->full_name }} — Modern Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    @php
        $accent = match ($portfolio->accent_color) {
            'green' => '#18382a',
            'plum' => '#6b3f68',
            default => '#172033',
        };

        $accentLight = match ($portfolio->accent_color) {
            'green' => '#dce5d8',
            'plum' => '#eadde8',
            default => '#dce5ed',
        };

        $accentMuted = match ($portfolio->accent_color) {
            'green' => '#526b5d',
            'plum' => '#80657d',
            default => '#3d6fa8',
        };

        $layout = $portfolio->layout_style ?? 'standard';
    @endphp

    <style>

        :root {
            --accent: {{ $accent }};
            --accent-light: {{ $accentLight }};
            --accent-muted: {{ $accentMuted }};
            --background: #eef1f3;
            --paper: #ffffff;
            --text: #20252d;
            --body-text: #4f5863;
            --muted: #727b85;
            --border: #dce2e7;
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
            margin: 45px auto;
            background: var(--paper);
            min-height: 100vh;
            padding: 55px;
        }

        /* HEADER */

        .profile {
            display: grid;
            grid-template-columns: 1fr 180px;
            gap: 50px;
            align-items: center;
            background: var(--accent);
            color: #ffffff;
            padding: 55px;
            border-radius: 12px;
            margin-bottom: 35px;
        }

        .profile-picture {
            width: 180px;
            height: 180px;
            border-radius: 12px;
            background: var(--accent-light);
            overflow: hidden;
            order: 2;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-content {
            order: 1;
        }

        .profile-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            opacity: 0.75;
            margin-bottom: 12px;
        }

        .profile-name {
            font-size: clamp(2.3rem, 5vw, 4.5rem);
            line-height: 1;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .profile-title {
            font-size: 0.95rem;
            line-height: 1.7;
            opacity: 0.8;
            margin-bottom: 25px;
        }

        .contact {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 20px;
            font-size: 0.78rem;
            opacity: 0.85;
        }

        /* SECTIONS */

        .section {
            margin-bottom: 35px;
            padding: 35px;
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .section-label {
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 2px;
            color: var(--accent-muted);
            margin-bottom: 18px;
        }

        .about-text,
        .content-text,
        .experience-content,
        .project-content {
            font-size: 0.92rem;
            line-height: 1.9;
            color: var(--body-text);
            white-space: pre-line;
        }

        /* GRID */

        .two-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 35px;
        }

        .two-column .section {
            margin-bottom: 0;
        }

        /* SKILLS */

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill {
            padding: 9px 15px;
            background: var(--accent-light);
            color: var(--accent);
            border-radius: 7px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        /* PROJECTS */

        .project-content {
            padding: 20px;
            border-left: 4px solid var(--accent-muted);
            background: #f7f8f9;
        }

        /* SOCIAL */

        .social-section {
            margin-top: 35px;
            padding: 35px;
            background: var(--accent-light);
            border-radius: 12px;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .social-link {
            color: var(--accent);
            font-size: 0.85rem;
            font-weight: 700;
            text-decoration: none;
            padding: 10px 16px;
            background: #ffffff;
            border-radius: 7px;
        }

        .social-link:hover {
            background: var(--accent);
            color: #ffffff;
        }

        /* FOOTER */

        .footer {
            margin-top: 35px;
            padding-top: 25px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            gap: 20px;
            font-size: 0.72rem;
            color: var(--muted);
        }

        .footer-name {
            color: var(--accent);
            font-weight: 700;
        }

        /* STANDARD */

        .layout-standard .section {
            box-shadow: 0 5px 20px rgba(20, 30, 40, 0.04);
        }

        /* CARDS */

        .layout-cards .section {
            box-shadow: 0 10px 30px rgba(20, 30, 40, 0.08);
            border: none;
        }

        .layout-cards .profile {
            box-shadow: 0 12px 35px rgba(20, 30, 40, 0.15);
        }

        .layout-cards .social-section {
            box-shadow: 0 10px 30px rgba(20, 30, 40, 0.08);
        }

        /* EDITORIAL */

        .layout-editorial {
            max-width: 1050px;
        }

        .layout-editorial .profile {
            grid-template-columns: 180px 1fr;
        }

        .layout-editorial .profile-picture {
            order: 1;
        }

        .layout-editorial .profile-content {
            order: 2;
        }

        .layout-editorial .two-column {
            grid-template-columns: 1.2fr 0.8fr;
        }

        .layout-editorial .section {
            border-radius: 0;
            border-left: 5px solid var(--accent);
        }

        /* RESPONSIVE */

        @media (max-width: 750px) {

            .portfolio {
                width: 94%;
                margin: 25px auto;
                padding: 25px;
            }

            .profile,
            .layout-editorial .profile {
                grid-template-columns: 1fr;
                text-align: center;
                justify-items: center;
                padding: 35px 25px;
            }

            .profile-picture,
            .layout-editorial .profile-picture {
                order: 1;
                width: 150px;
                height: 150px;
            }

            .profile-content,
            .layout-editorial .profile-content {
                order: 2;
            }

            .contact {
                justify-content: center;
            }

            .two-column,
            .layout-editorial .two-column {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 28px;
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

            <section class="section">

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