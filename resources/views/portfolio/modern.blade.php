
@php
    $name = $portfolio->full_name ?: 'Your Name';
    $initial = strtoupper(substr($name, 0, 1));

    $skills = preg_split(
        '/[,;\n]+/',
        (string) ($portfolio->skills ?? ''),
        -1,
        PREG_SPLIT_NO_EMPTY
    );

    $skills = array_map('trim', $skills);

    $profileImage = !empty($portfolio->profile_picture)
        ? asset('storage/' . $portfolio->profile_picture)
        : null;

    $accent = $portfolio->accent_color ?? '#a84438';

    $about = $portfolio->about_me ?? '';
    $education = $portfolio->educational_background ?? '';
    $experience = $portfolio->work_experience ?? '';
    $projects = $portfolio->projects ?? '';
    $additional = $portfolio->additional_info ?? '';
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $name }} | Portfolio</title>

    <style>
        :root {
            --sage: #b9c8a7;
            --sage-light: #dce4cf;
            --forest: #243c30;
            --forest-light: #304b3a;
            --paper: #fff9e9;
            --paper-dark: #eee4cd;
            --ink: #40382d;
            --muted: #756b5c;
            --red: {{ $accent }};
            --olive: #71804a;
            --shadow: 5px 7px 0 rgba(35, 49, 35, 0.14);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            color: var(--ink);
            background: var(--forest);
            font-family: "Trebuchet MS", Arial, sans-serif;
            line-height: 1.65;
        }

        a {
            color: inherit;
            overflow-wrap: anywhere;
        }

        .scrapbook {
            max-width: 1440px;
            margin: 0 auto;
            overflow: hidden;
            background:
                radial-gradient(
                    circle at 15% 15%,
                    rgba(255, 255, 255, 0.23) 0 1px,
                    transparent 2px
                ),
                var(--sage);
            background-size: 17px 17px;
        }

        /* Top navigation */

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 22px 7%;
        }

        .brand {
            color: var(--forest);
            font-family: Georgia, serif;
            font-size: 1.15rem;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .navigation {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }

        .navigation a {
            color: var(--forest);
            font-size: 0.77rem;
            font-weight: bold;
            letter-spacing: 1.5px;
            text-decoration: none;
            text-transform: uppercase;
        }

        .navigation a:hover {
            color: var(--red);
        }

        /* Main introduction */

        .hero {
            position: relative;
            display: grid;
            grid-template-columns: minmax(240px, 0.8fr) minmax(0, 1.5fr);
            gap: 65px;
            align-items: center;
            padding: 65px 9% 105px;
            background: var(--paper);
            clip-path: polygon(
                0 0, 100% 0, 100% 96%,
                96% 98%, 91% 97%, 85% 99%,
                79% 97%, 72% 99%, 65% 97%,
                57% 99%, 49% 97%, 41% 99%,
                32% 97%, 23% 99%, 15% 97%,
                8% 99%, 0 97%
            );
        }

        .hero::before {
            content: "*";
            position: absolute;
            top: 35px;
            right: 8%;
            color: var(--red);
            font-family: Georgia, serif;
            font-size: 5rem;
            transform: rotate(15deg);
        }

        .hero::after {
            content: "✳";
            position: absolute;
            right: 12%;
            bottom: 45px;
            color: var(--olive);
            font-size: 2rem;
            transform: rotate(-12deg);
        }

        .profile-side {
            position: relative;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }

        .polaroid {
            position: relative;
            padding: 13px 13px 43px;
            background: #fffdf6;
            box-shadow: var(--shadow);
            transform: rotate(-5deg);
        }

        .polaroid::after {
            content: "";
            position: absolute;
            top: -12px;
            right: 28px;
            width: 22px;
            height: 54px;
            border: 3px solid #a6aaa3;
            border-radius: 5px;
            transform: rotate(12deg);
            z-index: 2;
        }

        .portrait {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            aspect-ratio: 4 / 5;
            overflow: hidden;
            background:
                radial-gradient(
                    circle at 50% 35%,
                    #d6d9bd 0 20%,
                    transparent 21%
                ),
                linear-gradient(145deg, #d9e0cb, #9cad8d);
            color: var(--forest);
            font-family: Georgia, serif;
            font-size: 5rem;
        }

        .portrait img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .polaroid-caption {
            position: absolute;
            right: 0;
            bottom: 8px;
            left: 0;
            color: var(--muted);
            font-family: Georgia, serif;
            font-size: 0.9rem;
            text-align: center;
        }

        .contact-card {
            position: relative;
            z-index: 3;
            width: 94%;
            margin: -10px auto 0;
            padding: 22px;
            background: #f2e5c9;
            box-shadow: 3px 5px 0 rgba(50, 43, 30, 0.15);
            transform: rotate(2deg);
        }

        .contact-card h2 {
            margin-bottom: 12px;
            color: var(--red);
            font-family: Georgia, serif;
            font-size: 1.35rem;
        }

        .contact-card p {
            margin: 7px 0;
            font-size: 0.84rem;
            overflow-wrap: anywhere;
        }

        .contact-label {
            color: var(--muted);
            font-size: 0.7rem;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .portfolio-link {
            display: inline-block;
            margin-top: 12px;
            padding: 7px 12px;
            border: 1px dashed var(--red);
            color: var(--red);
            font-size: 0.76rem;
            font-weight: bold;
            text-decoration: none;
        }

        .intro-copy {
            position: relative;
            z-index: 1;
        }

        .eyebrow {
            margin-bottom: 13px;
            color: var(--olive);
            font-size: 0.75rem;
            font-weight: bold;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .intro-title {
            position: relative;
            margin-bottom: 25px;
            padding-left: 30px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(2.7rem, 5.5vw, 5.1rem);
            font-weight: normal;
            line-height: 1.1;
            overflow-wrap: anywhere;
        }

        .intro-title::before {
            content: "{";
            position: absolute;
            top: -10px;
            left: -14px;
            color: var(--red);
            font-size: 1.25em;
            font-weight: bold;
        }

        .intro-title span {
            color: var(--red);
            font-style: italic;
        }

        .intro-description {
            max-width: 620px;
            color: #5d5548;
            font-size: 1rem;
            line-height: 1.95;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .intro-details {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 24px;
        }

        .detail-tag {
            padding: 7px 13px;
            border: 1px solid #d8cbb2;
            background: #fffdf6;
            font-size: 0.77rem;
            transform: rotate(-1deg);
        }

        /* Lower scrapbook area */

        .scrapbook-content {
            position: relative;
            display: grid;
            grid-template-columns: minmax(0, 0.95fr) minmax(0, 1.25fr);
            gap: 45px;
            align-items: start;
            padding: 70px 8% 90px;
            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(255, 255, 255, 0.035) 0 1px,
                    transparent 2px
                ),
                var(--forest);
            background-size: 13px 13px;
        }

        .paper {
            position: relative;
            min-width: 0;
            padding: 35px 30px;
            background:
                radial-gradient(
                    circle at 12% 17%,
                    rgba(111, 87, 48, 0.055) 0 1px,
                    transparent 2px
                ),
                var(--paper);
            background-size: 12px 12px;
            box-shadow: 6px 8px 0 rgba(0, 0, 0, 0.15);
        }

        .education-paper {
            transform: rotate(-1.5deg);
        }

        .experience-paper {
            transform: rotate(1deg);
        }

        .paper::before {
            content: "";
            position: absolute;
            top: -7px;
            left: 15%;
            width: 95px;
            height: 19px;
            background: rgba(221, 215, 178, 0.75);
            transform: rotate(-3deg);
        }

        .ribbon {
            display: inline-block;
            margin: -5px 0 27px -39px;
            padding: 9px 28px 9px 39px;
            background: var(--red);
            color: white;
            font-family: Georgia, serif;
            font-size: 1.45rem;
            box-shadow: 3px 4px 0 rgba(64, 47, 32, 0.15);
        }

        .ribbon::after {
            content: "";
            display: block;
            position: absolute;
            width: 0;
            height: 0;
            margin-top: 8px;
            margin-left: -28px;
            border-top: 9px solid #702e28;
            border-left: 9px solid transparent;
        }

        .ribbon.green {
            background: var(--olive);
        }

        .ribbon.green::after {
            border-top-color: #4d5c32;
        }

        .ribbon.brown {
            background: #65503c;
        }

        .section-heading {
            margin: 30px 0 15px;
            color: var(--forest);
            font-family: Georgia, serif;
            font-size: 1.25rem;
        }

        .section-heading:first-of-type {
            margin-top: 0;
        }

        .paper-text {
            color: #5d5548;
            font-size: 0.91rem;
            line-height: 1.85;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .underlined-detail {
            margin-top: 10px;
            color: var(--red);
            font-size: 0.88rem;
            font-style: italic;
            text-decoration: underline;
            text-decoration-thickness: 1px;
            text-underline-offset: 4px;
            white-space: pre-line;
        }

        .skill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
            margin: 22px 0 35px;
        }

        .skill-tag {
            padding: 10px 13px;
            border: 1px solid #e0d3b9;
            background: #fffdf5;
            color: var(--forest);
            font-size: 0.79rem;
            font-weight: bold;
            box-shadow: 2px 3px 0 rgba(50, 43, 30, 0.08);
        }

        .skill-tag:nth-child(3n + 1) {
            transform: rotate(-3deg);
        }

        .skill-tag:nth-child(3n + 2) {
            transform: rotate(2deg);
        }

        .skill-tag:nth-child(3n) {
            transform: rotate(-1deg);
        }

        .skill-tag:first-child::before {
            content: "* ";
            color: var(--red);
            font-size: 1.15rem;
        }

        .software-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 10px;
            margin-top: 20px;
        }

        .software-item {
            text-align: center;
        }

        .software-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            aspect-ratio: 1;
            border: 2px solid rgba(255, 255, 255, 0.22);
            color: white;
            font-size: clamp(1rem, 2vw, 1.65rem);
            font-weight: bold;
            box-shadow: 2px 3px 0 rgba(50, 43, 30, 0.13);
        }

        .photoshop {
            background: #54264e;
        }

        .illustrator {
            background: #8c4925;
        }

        .aftereffects {
            background: #594b91;
        }

        .premiere {
            background: #486b45;
        }

        .software-name {
            display: block;
            margin-top: 8px;
            color: var(--muted);
            font-size: 0.68rem;
            line-height: 1.4;
        }

        /* Experience and projects */

        .timeline {
            position: relative;
            margin-top: 10px;
            padding-left: 22px;
            border-left: 2px dashed #b8b99b;
        }

        .timeline-entry {
            position: relative;
            margin-bottom: 30px;
        }

        .timeline-entry:last-child {
            margin-bottom: 0;
        }

        .timeline-entry::before {
            content: "";
            position: absolute;
            top: 7px;
            left: -29px;
            width: 12px;
            height: 12px;
            border: 3px solid var(--paper);
            border-radius: 50%;
            background: var(--olive);
            box-shadow: 0 0 0 1px var(--olive);
        }

        .entry-title {
            color: var(--red);
            font-family: Georgia, serif;
            font-size: 1.15rem;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .entry-date {
            display: inline-block;
            margin: 4px 0 8px;
            color: var(--olive);
            font-size: 0.75rem;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .entry-description {
            color: #62594c;
            font-size: 0.88rem;
            line-height: 1.85;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .text-block {
            padding: 18px;
            border-left: 3px solid var(--olive);
            background: rgba(225, 219, 198, 0.38);
            color: #62594c;
            font-size: 0.9rem;
            line-height: 1.85;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .extra-section {
            margin-top: 35px;
        }

        .extra-section .section-heading {
            margin-top: 0;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 14px;
        }

        .social-link {
            color: var(--red);
            font-size: 0.83rem;
            font-weight: bold;
            text-decoration-thickness: 1px;
            text-underline-offset: 4px;
            overflow-wrap: anywhere;
        }

        /* Footer */

        .footer {
            padding: 25px 20px;
            background: #1b3025;
            color: #d8dfcf;
            font-size: 0.76rem;
            letter-spacing: 1px;
            text-align: center;
        }

        .footer span {
            color: #d99b86;
        }

        /* Responsive layout */

        @media (max-width: 850px) {
            .hero {
                grid-template-columns: minmax(0, 0.8fr) minmax(0, 1.2fr);
                gap: 35px;
                padding-right: 7%;
                padding-left: 7%;
            }

            .scrapbook-content {
                gap: 30px;
                padding-right: 5%;
                padding-left: 5%;
            }

            .paper {
                padding: 30px 23px;
            }

            .ribbon {
                margin-left: -30px;
                padding-left: 30px;
            }
        }

        @media (max-width: 650px) {
            .topbar {
                align-items: flex-start;
                flex-direction: column;
                padding: 22px 6%;
            }

            .navigation {
                gap: 13px 18px;
            }

            .navigation a {
                font-size: 0.69rem;
            }

            .hero {
                grid-template-columns: 1fr;
                gap: 45px;
                padding: 45px 7% 85px;
                clip-path: polygon(
                    0 0, 100% 0, 100% 98%,
                    80% 99%, 60% 98%, 40% 99%,
                    20% 98%, 0 99%
                );
            }

            .profile-side {
                max-width: 275px;
            }

            .intro-title {
                font-size: clamp(2.5rem, 12vw, 4rem);
            }

            .intro-description {
                font-size: 0.94rem;
            }

            .scrapbook-content {
                grid-template-columns: 1fr;
                gap: 40px;
                padding: 55px 7% 65px;
            }

            .education-paper,
            .experience-paper {
                transform: none;
            }

            .paper {
                padding: 30px 24px;
            }

            .software-grid {
                gap: 12px;
            }

            .software-name {
                font-size: 0.66rem;
            }
        }

        @media (prefers-reduced-motion: no-preference) {
            .navigation a,
            .portfolio-link,
            .social-link {
                transition: color 0.2s ease;
            }
        }
    </style>
</head>

<body>
<div class="scrapbook">

    <header class="topbar">
        <a class="brand" href="#home" style="text-decoration: none;">
            {{ $name }}
        </a>

        <nav class="navigation" aria-label="Main navigation">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#education">Education</a>
            <a href="#experience">Experience</a>
            <a href="#projects">Projects</a>
        </nav>
    </header>

    <main>
        <section class="hero" id="home">

            <div class="profile-side">
                <div class="polaroid">
                    <div class="portrait">
                        @if ($profileImage)
                            <img
                                src="{{ $profileImage }}"
                                alt="Portrait of {{ $name }}"
                            >
                        @else
                            <span>{{ $initial }}</span>
                        @endif
                    </div>

                    <div class="polaroid-caption">
                        a little piece of me
                    </div>
                </div>

                <div class="contact-card">
                    <h2>Contact</h2>

                    @if (!empty($portfolio->email))
                        <p>
                            <span class="contact-label">Email</span><br>
                            <a href="mailto:{{ $portfolio->email }}">
                                {{ $portfolio->email }}
                            </a>
                        </p>
                    @endif

                    @if (!empty($portfolio->contact_number))
                        <p>
                            <span class="contact-label">Phone</span><br>
                            <a href="tel:{{ $portfolio->contact_number }}">
                                {{ $portfolio->contact_number }}
                            </a>
                        </p>
                    @endif

                    @if (!empty($portfolio->address))
                        <p>
                            <span class="contact-label">Location</span><br>
                            {{ $portfolio->address }}
                        </p>
                    @endif

                    @if (!empty($portfolio->website))
                        <a
                            class="portfolio-link"
                            href="{{ $portfolio->website }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            ↗ Visit my website
                        </a>
                    @endif
                </div>
            </div>

            <div class="intro-copy" id="about">
                <p class="eyebrow">A little introduction</p>

                <h1 class="intro-title">
                    Hi, I'm <span>{{ $name }}</span>
                </h1>

                @if (!empty($portfolio->additional_info))
                    <p class="eyebrow">
                        {{ $portfolio->additional_info }}
                    </p>
                @endif

                <div class="intro-description">{{ $about ?: 'Welcome to my little corner of the internet. Explore my background, skills, and work below.' }}</div>

                <div class="intro-details">
                    @if (!empty($portfolio->email))
                        <span class="detail-tag">Creative mind</span>
                    @endif

                    @if (!empty($portfolio->website))
                        <span class="detail-tag">Portfolio & work</span>
                    @endif

                    @if (!empty($portfolio->address))
                        <span class="detail-tag">
                            {{ $portfolio->address }}
                        </span>
                    @endif
                </div>
            </div>

        </section>

        <section class="scrapbook-content">

            <!-- LEFT: EDUCATION AND SKILLS -->

            <article class="paper education-paper" id="education">

                <h2 class="ribbon">Education</h2>

                @if (!empty($education))
                    <div class="paper-text">{{ $education }}</div>
                @else
                    <p class="paper-text">
                        Add your educational background to display it here.
                    </p>
                @endif

                <h3 class="section-heading">Things I can do</h3>

                @if (count($skills))
                    <div class="skill-list">
                        @foreach ($skills as $skill)
                            @if ($skill !== '')
                                <span class="skill-tag">
                                    {{ $skill }}
                                </span>
                            @endif
                        @endforeach
                    </div>
                @else
                    <p class="paper-text">
                        Your skills will appear here once added.
                    </p>
                @endif

                <h2 class="ribbon brown">Software & Tools</h2>

                <p class="paper-text">
                    A few creative tools for bringing ideas to life.
                </p>

                <div class="software-grid">
                    <div class="software-item">
                        <div class="software-icon photoshop">Ps</div>
                        <span class="software-name">Photoshop</span>
                    </div>

                    <div class="software-item">
                        <div class="software-icon illustrator">Ai</div>
                        <span class="software-name">Illustrator</span>
                    </div>

                    <div class="software-item">
                        <div class="software-icon aftereffects">Ae</div>
                        <span class="software-name">After Effects</span>
                    </div>

                    <div class="software-item">
                        <div class="software-icon premiere">Pr</div>
                        <span class="software-name">Premiere Pro</span>
                    </div>
                </div>

                @if (!empty($portfolio->additional_info))
                    <div class="extra-section">
                        <h3 class="section-heading">A little more</h3>
                        <div class="text-block">{{ $portfolio->additional_info }}</div>
                    </div>
                @endif

            </article>

            <!-- RIGHT: EXPERIENCE AND PROJECTS -->

            <article class="paper experience-paper" id="experience">

                <h2 class="ribbon green">Experience</h2>

                @if (!empty($experience))
                    <div class="timeline">
                        <div class="timeline-entry">
                            <h3 class="entry-title">
                                Professional Experience
                            </h3>

                            <div class="entry-description">{{ $experience }}</div>
                        </div>
                    </div>
                @else
                    <p class="paper-text">
                        Your work experience will be displayed here.
                    </p>
                @endif

                <section class="extra-section" id="projects">
                    <h2 class="ribbon">Selected Projects</h2>

                    @if (!empty($projects))
                        <div class="text-block">{{ $projects }}</div>
                    @else
                        <p class="paper-text">
                            Your projects and creative work will appear here.
                        </p>
                    @endif
                </section>

                @if (!empty($portfolio->social_links) ||
                     !empty($portfolio->website) ||
                     !empty($portfolio->linkedin) ||
                     !empty($portfolio->github))

                    <section class="extra-section">
                        <h3 class="section-heading">Find me elsewhere</h3>

                        <div class="social-links">
                            @if (!empty($portfolio->website))
                                <a
                                    class="social-link"
                                    href="{{ $portfolio->website }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Website ↗
                                </a>
                            @endif

                            @if (!empty($portfolio->linkedin))
                                <a
                                    class="social-link"
                                    href="{{ $portfolio->linkedin }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    LinkedIn ↗
                                </a>
                            @endif

                            @if (!empty($portfolio->github))
                                <a
                                    class="social-link"
                                    href="{{ $portfolio->github }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    GitHub ↗
                                </a>
                            @endif

                            @if (!empty($portfolio->social_links))
                                <div class="paper-text">
                                    {{ $portfolio->social_links }}
                                </div>
                            @endif
                        </div>
                    </section>
                @endif

            </article>

        </section>
    </main>

    <footer class="footer">
        Made with care by <span>{{ $name }}</span>
    </footer>

</div>
</body>
</html>
