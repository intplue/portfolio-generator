<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portfolio Preview | Portfolio Generator</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: #f3efe3;
            color: #18382a;
            min-height: 100vh;
        }

        nav {
            height: 76px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f3efe3;
        }

        .logo {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-links {
            display: flex;
            gap: 32px;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #18382a;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .nav-links a:hover {
            color: #526b5d;
        }

        .page-header {
            text-align: center;
            padding: 48px 20px 30px;
        }

        .page-header h1 {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .page-header p {
            color: #526b5d;
            font-size: 14px;
            line-height: 1.7;
        }

        .preview-wrapper {
            width: 88%;
            max-width: 1050px;
            margin: 15px auto 60px;
        }

        .preview-card {
            background: #faf8f2;
            border: 1px solid #ddd7c8;
            border-radius: 12px;
            overflow: hidden;
        }

        .preview-top {
            padding: 22px 28px;
            border-bottom: 1px solid #ddd7c8;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .preview-top h2 {
            font-size: 17px;
        }

        .preview-top p {
            margin-top: 5px;
            color: #526b5d;
            font-size: 12px;
        }

        .status {
            background: #e2e9df;
            color: #18382a;
            padding: 8px 13px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .portfolio-preview {
            padding: 45px;
        }

        .portfolio-header {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 35px;
            align-items: center;
            padding-bottom: 35px;
            border-bottom: 1px solid #ddd7c8;
        }

        .profile-placeholder {
            width: 150px;
            height: 150px;
            background: #d9dfd7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #526b5d;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
        }

        .portfolio-header h1 {
            font-size: 35px;
            margin-bottom: 8px;
        }

        .portfolio-header .role {
            color: #526b5d;
            font-size: 15px;
            margin-bottom: 16px;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 8px 20px;
            color: #526b5d;
            font-size: 12px;
        }

        .portfolio-section {
            padding: 32px 0;
            border-bottom: 1px solid #ddd7c8;
        }

        .portfolio-section:last-child {
            border-bottom: none;
        }

        .portfolio-section h2 {
            font-size: 18px;
            margin-bottom: 14px;
        }

        .portfolio-section p {
            color: #4e5e54;
            font-size: 13px;
            line-height: 1.8;
        }

        .two-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 45px;
        }

        .info-block h3 {
            font-size: 13px;
            margin-bottom: 8px;
        }

        .info-block p {
            white-space: pre-line;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .skill {
            background: #e6eadf;
            color: #18382a;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
        }

        .projects-text,
        .experience-text,
        .education-text {
            white-space: pre-line;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .social-link {
            text-decoration: none;
            color: #18382a;
            border: 1px solid #bfc9bf;
            padding: 9px 13px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 600;
        }

        .social-link:hover {
            background: #e6eadf;
        }

        .action-bar {
            margin-top: 25px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .action-button {
            display: inline-block;
            text-decoration: none;
            border: none;
            padding: 13px 22px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.8px;
            cursor: pointer;
        }

        .primary {
            background: #18382a;
            color: white;
        }

        .primary:hover {
            background: #526b5d;
        }

        .secondary {
            background: #e5dfd0;
            color: #18382a;
        }

        .secondary:hover {
            background: #d8d1c0;
        }

        .danger {
            background: #eadbd6;
            color: #704137;
        }

        .danger:hover {
            background: #dfc9c2;
        }

        .notice {
            width: 88%;
            max-width: 1050px;
            margin: 0 auto 20px;
            padding: 13px 18px;
            background: #e2e9df;
            color: #18382a;
            border-radius: 8px;
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 750px) {
            nav {
                padding: 0 5%;
            }

            .logo {
                font-size: 16px;
            }

            .nav-links {
                gap: 14px;
            }

            .nav-links a {
                font-size: 10px;
            }

            .portfolio-preview {
                padding: 25px;
            }

            .portfolio-header {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .profile-placeholder {
                margin: auto;
            }

            .contact-info {
                justify-content: center;
            }

            .two-column {
                grid-template-columns: 1fr;
                gap: 28px;
            }

            .preview-top {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <nav>

        <div class="logo">
            Portfolio Generator
        </div>

        <div class="nav-links">

            <a href="{{ route('home') }}">
                HOME
            </a>

            <a href="{{ route('portfolio.templates') }}">
                TEMPLATES
            </a>

            <a href="{{ route('portfolio.create') }}">
                CREATE
            </a>

        </div>

    </nav>


    @if (session('success'))

        <div class="notice">
            {{ session('success') }}
        </div>

    @endif


    <header class="page-header">

        <h1>
            Portfolio Preview
        </h1>

        <p>
            Review how your portfolio information will appear before publishing.
        </p>

    </header>


    <main class="preview-wrapper">

        <div class="preview-card">

            <div class="preview-top">

                <div>
                    <h2>
                        {{ $portfolio->full_name }}
                    </h2>

                    <p>
                        Portfolio Preview
                    </p>
                </div>

                <div class="status">
                    PREVIEW MODE
                </div>

            </div>


            <div class="portfolio-preview">

                <!-- HEADER -->

                <section class="portfolio-header">

                    <div class="profile-placeholder">

                        @if ($portfolio->profile_picture)

                            <img
                                src="{{ asset('storage/' . $portfolio->profile_picture) }}"
                                alt="Profile Picture"
                                style="
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                    border-radius: 50%;
                                "
                            >

                        @else

                            PROFILE PHOTO

                        @endif

                    </div>


                    <div>

                        <h1>
                            {{ $portfolio->full_name }}
                        </h1>

                        <div class="role">
                            Portfolio
                        </div>

                        <div class="contact-info">

                            <span>
                                {{ $portfolio->email }}
                            </span>

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


                <!-- ABOUT -->

                @if ($portfolio->about_me)

                    <section class="portfolio-section">

                        <h2>
                            About Me
                        </h2>

                        <p>
                            {{ $portfolio->about_me }}
                        </p>

                    </section>

                @endif


                <!-- EDUCATION + EXPERIENCE -->

                <section class="portfolio-section">

                    <div class="two-column">

                        <div class="info-block">

                            <h3>
                                Education
                            </h3>

                            <p class="education-text">
                                {{ $portfolio->educational_background ?: 'No educational information provided.' }}
                            </p>

                        </div>


                        <div class="info-block">

                            <h3>
                                Work Experience
                            </h3>

                            <p class="experience-text">
                                {{ $portfolio->work_experience ?: 'No work experience provided.' }}
                            </p>

                        </div>

                    </div>

                </section>


                <!-- SKILLS -->

                @if ($portfolio->skills)

                    <section class="portfolio-section">

                        <h2>
                            Skills
                        </h2>

                        <div class="skills">

                            @foreach (preg_split('/[\r\n,]+/', $portfolio->skills) as $skill)

                                @if (trim($skill))

                                    <span class="skill">
                                        {{ trim($skill) }}
                                    </span>

                                @endif

                            @endforeach

                        </div>

                    </section>

                @endif


                <!-- PROJECTS -->

                @if ($portfolio->projects)

                    <section class="portfolio-section">

                        <h2>
                            Projects
                        </h2>

                        <p class="projects-text">
                            {{ $portfolio->projects }}
                        </p>

                    </section>

                @endif


                <!-- SOCIAL LINKS -->

                @if (
                    $portfolio->website ||
                    $portfolio->linkedin ||
                    $portfolio->github ||
                    $portfolio->social_links
                )

                    <section class="portfolio-section">

                        <h2>
                            Links
                        </h2>

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

                        </div>

                        @if ($portfolio->social_links)

                            <p style="margin-top: 14px;">
                                {{ $portfolio->social_links }}
                            </p>

                        @endif

                    </section>

                @endif


                <!-- ADDITIONAL INFORMATION -->

                @if ($portfolio->additional_info)

                    <section class="portfolio-section">

                        <h2>
                            Additional Information
                        </h2>

                        <p>
                            {{ $portfolio->additional_info }}
                        </p>

                    </section>

                @endif

            </div>

        </div>


        <!-- TEMPORARY DEMO ACTIONS -->

        <div class="action-bar">

            <a
                href="{{ route('portfolio.templates') }}"
                class="action-button secondary"
            >
                CHANGE TEMPLATE
            </a>

            <a
                href="{{ route('portfolio.create') }}"
                class="action-button primary"
            >
                CREATE ANOTHER
            </a>

            <a
                href="{{ route('home') }}"
                class="action-button danger"
            >
                BACK TO HOME
            </a>

        </div>

    </main>

</body>
</html>