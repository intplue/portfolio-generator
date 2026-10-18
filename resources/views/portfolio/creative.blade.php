
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $portfolio->full_name }} — Creative Template</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=DM+Mono:wght@400;500&family=Playfair+Display:wght@400;500;600;700;800&family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">

   @php
    $imageUrl = $portfolio->profile_picture
        ? asset('storage/' . $portfolio->profile_picture)
        : null;

    $skills = preg_split('/[,;\n]+/', $portfolio->skills ?? '');

    $skills = array_filter(array_map('trim', $skills));

    $initials = collect(explode(' ', trim($portfolio->full_name)))
        ->filter()
        ->take(2)
        ->map(fn ($word) => strtoupper(substr($word, 0, 1)))
        ->implode('');

    $websiteUrl = $portfolio->website ?? '';
    $linkedinUrl = $portfolio->linkedin ?? '';
    $githubUrl = $portfolio->github ?? '';

    $accentColor = $portfolio->accent_color ?: '#8b1e3f';
    $layoutStyle = $portfolio->layout_style ?: 'standard';
@endphp

    <style>
        :root {
            --navy: #1a2530;
            --navy-light: #263746;
            --burgundy: {{ $accentColor }};
            --burgundy-light: color-mix(in srgb, {{ $accentColor }} 12%, white);
            --white: #ffffff;
            --paper: #faf9f6;
            --cream: #f0eee8;
            --gray: #777d84;
            --light-gray: #e5e5e2;
            --line: #d9dadd;
            --serif: 'Playfair Display', Georgia, serif;
            --sans: 'DM Sans', sans-serif;
            --mono: 'DM Mono', monospace;
            --script: 'Caveat', cursive;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 24px;
        }

        body {
            background: #e7e8e9;
            color: var(--navy);
            font-family: var(--sans);
            line-height: 1.6;
            padding: 32px 18px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img {
            display: block;
            max-width: 100%;
        }

        .portfolio {
            width: 100%;
            max-width: 1180px;
            margin: 0 auto;
            background: var(--paper);
            border: 1px solid #d3d5d7;
            box-shadow: 0 20px 70px rgba(26, 37, 48, 0.10);
        }

        .panel {
            background: var(--white);
            border: 1px solid var(--line);
            padding: 32px;
            min-width: 0;
        }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--gray);
            font-family: var(--mono);
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .eyebrow::before {
            content: '';
            width: 7px;
            height: 7px;
            flex-shrink: 0;
            background: var(--burgundy);
            border-radius: 50%;
        }

        .section-heading {
            margin: 13px 0 22px;
            font-family: var(--sans);
            font-size: clamp(21px, 2.5vw, 30px);
            font-weight: 800;
            letter-spacing: -1.2px;
            line-height: 1.15;
            text-transform: uppercase;
        }

        .section-heading span {
            color: var(--burgundy);
        }

        .section-copy {
            color: #626b73;
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            padding: 20px 32px;
            background: var(--white);
            border-bottom: 1px solid var(--line);
        }

        .brand {
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .brand span {
            color: var(--burgundy);
        }

        .topbar-label {
            color: var(--gray);
            font-family: var(--mono);
            font-size: 10px;
            letter-spacing: 1px;
            text-align: right;
            text-transform: uppercase;
        }

        .navigation {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
        }

        .navigation a {
            color: var(--navy);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            transition: color 0.2s ease;
        }

        .navigation a:hover {
            color: var(--burgundy);
        }

        /* HERO */

        .hero {
            display: grid;
            grid-template-columns: 0.85fr 1.5fr 0.85fr;
            gap: 24px;
            align-items: center;
            min-height: 420px;
            padding: 44px 36px;
            background: var(--white);
            border-bottom: 1px solid var(--line);
        }

        .hero-intro {
            align-self: stretch;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 24px;
        }

        .hero-intro .small-label {
            color: var(--burgundy);
            font-family: var(--mono);
            font-size: 10px;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .hero-intro h2 {
            margin: 14px 0;
            font-family: var(--serif);
            font-size: 25px;
            font-weight: 500;
            line-height: 1.3;
        }

        .hero-intro p {
            color: var(--gray);
            font-size: 12px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .hero-url {
            color: var(--navy);
            font-family: var(--mono);
            font-size: 10px;
            letter-spacing: 1px;
            overflow-wrap: anywhere;
            text-transform: uppercase;
        }

        .hero-center {
            position: relative;
            text-align: center;
            min-width: 0;
        }

        .hero-title {
            position: relative;
            z-index: 1;
            font-family: var(--sans);
            font-size: clamp(36px, 5.5vw, 70px);
            font-weight: 800;
            letter-spacing: -4px;
            line-height: 0.95;
            overflow-wrap: anywhere;
            text-transform: uppercase;
        }

        .hero-title .title-line {
            display: block;
        }

        .hero-title .outline-text {
            color: transparent;
            -webkit-text-stroke: 1px var(--navy);
        }

        .hero-star {
            position: absolute;
            top: -25px;
            right: 8%;
            color: var(--burgundy);
            font-size: 42px;
            line-height: 1;
        }

        .portrait-wrap {
            position: relative;
            z-index: 2;
            width: 210px;
            height: 220px;
            margin: 20px auto 0;
            padding: 8px;
            background: var(--white);
            border: 1px solid var(--line);
            box-shadow: 0 8px 25px rgba(26, 37, 48, 0.12);
            transform: rotate(-3deg);
        }

        .portrait {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            background: var(--cream);
            color: var(--burgundy);
            font-family: var(--serif);
            font-size: 48px;
            overflow: hidden;
        }

        .portrait img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .hero-script {
            position: relative;
            z-index: 3;
            margin-top: -4px;
            color: var(--burgundy);
            font-family: var(--script);
            font-size: clamp(34px, 4vw, 48px);
            line-height: 1.1;
            transform: rotate(-5deg);
        }

        .hero-right {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-self: stretch;
            gap: 28px;
        }

        .hero-right .availability {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--gray);
            font-size: 11px;
        }

        .availability::before {
            content: '';
            width: 8px;
            height: 8px;
            background: #5c9272;
            border-radius: 50%;
        }

        .hero-note {
            padding: 17px;
            background: var(--burgundy-light);
            border: 1px solid #ead2da;
        }

        .hero-note .note-title {
            margin-bottom: 8px;
            color: var(--burgundy);
            font-family: var(--mono);
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .hero-note p {
            color: #65535a;
            font-size: 12px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 14px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            min-height: 34px;
            padding: 7px 10px;
            border: 1px solid var(--line);
            color: var(--navy);
            font-family: var(--mono);
            font-size: 9px;
            transition: background 0.2s, color 0.2s;
        }

        .social-links a:hover {
            background: var(--navy);
            color: var(--white);
        }

        /* MAIN GRID */

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
        }

        .content-grid > .panel {
            border-top: 0;
        }

        .content-grid > .panel:nth-child(odd) {
            border-right: 0;
        }

        .about-layout {
            display: grid;
            grid-template-columns: 1fr 0.8fr;
            gap: 20px;
        }

        .about-text {
            color: #626b73;
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .about-visual {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 150px;
            padding: 16px;
            background: var(--cream);
            border: 1px solid var(--line);
            text-align: center;
        }

        .about-visual .big-initials {
            color: var(--burgundy);
            font-family: var(--serif);
            font-size: 52px;
            line-height: 1.1;
        }

        .about-visual .visual-caption {
            margin-top: 8px;
            color: var(--gray);
            font-family: var(--mono);
            font-size: 9px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* SKILLS */

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .skill-tag {
            display: inline-flex;
            align-items: center;
            padding: 8px 12px;
            background: var(--paper);
            border: 1px solid var(--line);
            color: var(--navy);
            font-size: 11px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .skill-tag:nth-child(3n + 2) {
            background: var(--burgundy-light);
            border-color: #ead2da;
            color: var(--burgundy);
        }

        .empty-note {
            color: #92969b;
            font-size: 12px;
            font-style: italic;
        }

        /* EDUCATION AND EXPERIENCE */

        .text-card {
            padding: 19px;
            background: var(--paper);
            border: 1px solid var(--line);
        }

        .text-card + .text-card {
            margin-top: 12px;
        }

        .text-card p {
            color: #626b73;
            font-size: 12px;
            line-height: 1.9;
            overflow-wrap: anywhere;
            white-space: normal;
        }

        .text-card .card-index {
            display: block;
            margin-bottom: 10px;
            color: var(--burgundy);
            font-family: var(--mono);
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .text-card .card-title {
            margin-bottom: 9px;
            color: var(--navy);
            font-size: 14px;
            font-weight: 800;
        }

        /* PROJECTS */

        .projects-panel {
            grid-column: 1 / -1;
            border-right: 1px solid var(--line) !important;
        }

        .projects-heading-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
        }

        .projects-heading-row .section-heading {
            margin-bottom: 0;
        }

        .project-count {
            color: var(--gray);
            font-family: var(--mono);
            font-size: 10px;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        .projects-intro {
            max-width: 550px;
            margin-top: 14px;
            color: var(--gray);
            font-size: 12px;
            line-height: 1.8;
        }

        .project-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-top: 25px;
        }

        .project-card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-height: 175px;
            padding: 20px;
            background: var(--paper);
            border: 1px solid var(--line);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .project-card:hover {
            transform: translateY(-3px);
            border-color: var(--burgundy);
        }

        .project-number {
            color: var(--burgundy);
            font-family: var(--mono);
            font-size: 10px;
            letter-spacing: 1px;
        }

        .project-symbol {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            margin: 18px 0;
            background: var(--burgundy-light);
            color: var(--burgundy);
            font-family: var(--serif);
            font-size: 25px;
        }

        .project-card p {
            color: #626b73;
            font-size: 12px;
            line-height: 1.8;
            overflow-wrap: anywhere;
            white-space: normal;
        }

        /* CONTACT */

        .contact-panel {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            align-items: center;
            background: var(--navy);
            color: var(--white);
            border-top: 0;
        }

        .contact-panel .eyebrow {
            color: #c3c9ce;
        }

        .contact-panel .section-heading {
            margin-bottom: 12px;
            color: var(--white);
        }

        .contact-panel .section-heading span {
            color: #d88ca3;
        }

        .contact-panel .section-copy {
            color: #c3c9ce;
        }

        .contact-details {
            display: grid;
            gap: 12px;
        }

        .contact-item {
            padding: 13px 15px;
            border: 1px solid #44505b;
        }

        .contact-item .contact-label {
            display: block;
            margin-bottom: 4px;
            color: #d88ca3;
            font-family: var(--mono);
            font-size: 9px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .contact-item a,
        .contact-item p {
            color: var(--white);
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .contact-item a:hover {
            color: #e8a9bc;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding: 19px 32px;
            background: var(--paper);
            border-top: 1px solid var(--line);
        }

        .footer p {
            color: var(--gray);
            font-family: var(--mono);
            font-size: 9px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        .footer .footer-brand {
            color: var(--navy);
            font-weight: 500;
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {
            body {
                padding: 18px 12px;
            }

            .hero {
                grid-template-columns: 0.8fr 1.3fr;
                gap: 25px;
                padding: 32px 25px;
            }

            .hero-center {
                grid-column: 2;
                grid-row: 1 / span 2;
            }

            .hero-right {
                grid-column: 1;
                grid-row: 2;
            }

            .hero-intro {
                grid-column: 1;
                grid-row: 1;
            }

            .hero-title {
                font-size: clamp(36px, 6vw, 58px);
            }

            .portrait-wrap {
                width: min(190px, 90%);
                height: 205px;
            }

            .panel {
                padding: 25px;
            }

            .project-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 620px) {
            body {
                padding: 0;
                background: var(--paper);
            }

            .portfolio {
                border: 0;
                box-shadow: none;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                padding: 19px 20px;
                gap: 17px;
            }

            .topbar-label {
                text-align: left;
            }

            .navigation {
                gap: 13px;
            }

            .navigation a {
                font-size: 9px;
            }

            .hero {
                grid-template-columns: 1fr;
                gap: 28px;
                padding: 35px 20px;
            }

            .hero-intro,
            .hero-center,
            .hero-right {
                grid-column: 1;
                grid-row: auto;
            }

            .hero-intro {
                gap: 12px;
            }

            .hero-intro h2 {
                margin: 7px 0;
            }

            .hero-center {
                padding: 20px 0;
            }

            .hero-title {
                font-size: clamp(40px, 12vw, 62px);
                letter-spacing: -2.5px;
            }

            .hero-star {
                top: -5px;
                right: 5%;
            }

            .portrait-wrap {
                width: 195px;
                height: 205px;
                margin-top: 25px;
            }

            .hero-right {
                gap: 18px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .content-grid > .panel,
            .content-grid > .panel:nth-child(odd),
            .projects-panel {
                grid-column: auto;
                border-right: 1px solid var(--line) !important;
                border-left: 1px solid var(--line);
            }

            .panel {
                padding: 25px 20px;
            }

            .about-layout {
                grid-template-columns: 1fr;
            }

            .about-visual {
                min-height: 130px;
            }

            .project-grid {
                grid-template-columns: 1fr;
            }

            .project-card {
                min-height: 145px;
            }

            .projects-heading-row {
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
            }

            .contact-panel {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .footer {
                align-items: flex-start;
                flex-direction: column;
                padding: 19px 20px;
                gap: 8px;
            }
        }

        @media print {
            body {
                padding: 0;
                background: var(--white);
            }

            .portfolio {
                max-width: none;
                border: 0;
                box-shadow: none;
            }

            .navigation a {
                color: var(--navy);
            }

            .project-card:hover {
                transform: none;
            }
        }
    </style>
</head>

<body>
    <main class="portfolio">

        {{-- TOP NAVIGATION --}}
        <header class="topbar">
            <a href="{{ route('home') }}" class="brand">
                PORTFOLIO<span>.</span>
            </a>

            <nav class="navigation" aria-label="Main navigation">
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#education">Education</a>
                <a href="#experience">Experience</a>
                <a href="#projects">Projects</a>
                <a href="#contact">Contact</a>
            </nav>
        </header>

        {{-- HERO SECTION --}}
        <section class="hero" id="home">

            <div class="hero-intro">
                <div>
                    <span class="small-label">Personal Portfolio / 01</span>

                    <h2>
                        A little about
                        <span style="color: var(--burgundy);">me.</span>
                    </h2>

                    <p>
                        {{ \Illuminate\Support\Str::limit(strip_tags($portfolio->about_me ?? 'Welcome to my personal portfolio.'), 190) }}
                    </p>
                </div>

                <div>
                    @if(!empty($websiteUrl))
                        <a
                            href="{{ \Illuminate\Support\Str::startsWith($websiteUrl, ['http://', 'https://']) ? $websiteUrl : 'https://' . $websiteUrl }}"
                            class="hero-url"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            {{ $websiteUrl }}
                        </a>
                    @else
                        <span class="hero-url">MY CREATIVE SPACE</span>
                    @endif
                </div>
            </div>

            <div class="hero-center">
                <span class="hero-star" aria-hidden="true">*</span>

                <h1 class="hero-title">
                    <span class="title-line">MY</span>
                    <span class="title-line outline-text">PORTFOLIO</span>
                </h1>

                <div class="portrait-wrap">
                    <div class="portrait">
                        @if($imageUrl)
                            <img
                                src="{{ $imageUrl }}"
                                alt="Profile picture of {{ $portfolio->full_name }}"
                            >
                        @else
                            {{ $initials ?: 'ME' }}
                        @endif
                    </div>
                </div>

                <p class="hero-script">
                    Hello, I'm {{ $portfolio->full_name }}
                </p>
            </div>

            <div class="hero-right">
                <div>
                    <p class="eyebrow">A little introduction</p>

                    <div class="hero-note" style="margin-top: 15px;">
                        <p class="note-title">Welcome to my portfolio</p>
                        <p>
                            Discover my background, skills, education,
                            experiences, and the projects that represent
                            my learning and growth.
                        </p>
                    </div>
                </div>

                <div>
                    <p class="availability">Thanks for stopping by</p>

                    <div class="social-links">
                        @if(!empty($portfolio->email))
                            <a href="mailto:{{ $portfolio->email }}" aria-label="Email">MAIL</a>
                        @endif

                        @if(!empty($linkedinUrl))
                            <a
                                href="{{ \Illuminate\Support\Str::startsWith($linkedinUrl, ['http://', 'https://']) ? $linkedinUrl : 'https://' . $linkedinUrl }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="LinkedIn"
                            >IN</a>
                        @endif

                        @if(!empty($githubUrl))
                            <a
                                href="{{ \Illuminate\Support\Str::startsWith($githubUrl, ['http://', 'https://']) ? $githubUrl : 'https://' . $githubUrl }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="GitHub"
                            >GH</a>
                        @endif

                        @if(!empty($websiteUrl))
                            <a
                                href="{{ \Illuminate\Support\Str::startsWith($websiteUrl, ['http://', 'https://']) ? $websiteUrl : 'https://' . $websiteUrl }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Website"
                            >WEB</a>
                        @endif
                    </div>
                </div>
            </div>

        </section>

        {{-- ABOUT AND SKILLS --}}
        <div class="content-grid">

            <section class="panel" id="about">
                <p class="eyebrow">01 / Introduction</p>

                <h2 class="section-heading">
                    WHO AM <span>I?</span>
                </h2>

                <div class="about-layout">
                    <div class="about-text">
                        @if(!empty($portfolio->about_me))
                            {!! nl2br(e($portfolio->about_me)) !!}
                        @else
                            <p class="empty-note">
                                No introduction has been added yet.
                            </p>
                        @endif
                    </div>

                    <div class="about-visual">
                        @if($imageUrl)
                            <img
                                src="{{ $imageUrl }}"
                                alt="{{ $portfolio->full_name }}"
                                style="width: 100%; max-height: 190px; object-fit: cover;"
                            >
                        @else
                            <span class="big-initials">{{ $initials ?: 'ME' }}</span>
                            <span class="visual-caption">A work in progress</span>
                        @endif
                    </div>
                </div>
            </section>

            <section class="panel" id="skills">
                <p class="eyebrow">02 / What I know</p>

                <h2 class="section-heading">
                    MY <span>SKILLS</span>
                </h2>

                <p class="section-copy" style="margin-bottom: 22px;">
                    A collection of skills and abilities that I continue
                    to develop through learning and experience.
                </p>

                @if(count($skills))
                    <div class="skills-list">
                        @foreach($skills as $skill)
                            <span class="skill-tag">
                                {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <p class="empty-note">
                        No skills have been added yet.
                    </p>
                @endif

                <div style="margin-top: 27px; padding-top: 18px; border-top: 1px solid var(--line);">
                    <span class="eyebrow">Always learning</span>

                    <p class="section-copy" style="margin-top: 10px;">
                        Every new skill is another opportunity to grow,
                        explore ideas, and improve my work.
                    </p>
                </div>
            </section>

            {{-- EDUCATION --}}
            <section class="panel" id="education">
                <p class="eyebrow">03 / Learning journey</p>

                <h2 class="section-heading">
                    MY <span>EDUCATION</span>
                </h2>

                @if(!empty($portfolio->educational_background))
                    <div class="text-card">
                        <span class="card-index">Education / Background</span>

                        <p>{!! nl2br(e($portfolio->educational_background)) !!}</p>
                    </div>
                @else
                    <p class="empty-note">
                        No educational background has been added yet.
                    </p>
                @endif
            </section>

            {{-- EXPERIENCE --}}
            <section class="panel" id="experience">
                <p class="eyebrow">04 / Practical experience</p>

                <h2 class="section-heading">
                    MY <span>EXPERIENCE</span>
                </h2>

                @if(!empty($portfolio->work_experience))
                    <div class="text-card">
                        <span class="card-index">Experience / Background</span>

                        <p>{!! nl2br(e($portfolio->work_experience)) !!}</p>
                    </div>
                @else
                    <p class="empty-note">
                        No work experience has been added yet.
                    </p>
                @endif
            </section>

            {{-- PROJECTS --}}
            <section class="panel projects-panel" id="projects">
                <p class="eyebrow">05 / Selected work</p>

                <div class="projects-heading-row">
                    <h2 class="section-heading">
                        THINGS I'VE <span>CREATED.</span>
                    </h2>

                    <span class="project-count">MY PROJECTS</span>
                </div>

                <p class="projects-intro">
                    A look at my projects, ideas, and work. Each one represents
                    a chance to apply what I have learned and develop new skills.
                </p>

                @if(!empty($portfolio->projects))
                    <div class="project-grid">
                        @php
                            $projectItems = preg_split('/\n\s*\n/', trim($portfolio->projects));
                            $projectItems = array_filter(array_map('trim', $projectItems));
                        @endphp

                        @foreach($projectItems as $index => $project)
                            <article class="project-card">
                                <span class="project-number">
                                    PROJECT / {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <span class="project-symbol" aria-hidden="true">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <p>{!! nl2br(e($project)) !!}</p>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="text-card" style="margin-top: 24px;">
                        <p class="empty-note">
                            No projects have been added yet.
                        </p>
                    </div>
                @endif
            </section>

            {{-- ADDITIONAL INFORMATION --}}
            @if(!empty($portfolio->additional_info))
                <section class="panel" style="grid-column: 1 / -1;" id="additional">
                    <p class="eyebrow">06 / A few more details</p>

                    <h2 class="section-heading">
                        BEYOND THE <span>PORTFOLIO.</span>
                    </h2>

                    <div class="text-card">
                        <p>{!! nl2br(e($portfolio->additional_info)) !!}</p>
                    </div>
                </section>
            @endif

        </div>

        {{-- CONTACT --}}
        <section class="panel contact-panel" id="contact">
            <div>
                <p class="eyebrow">Let's connect</p>

                <h2 class="section-heading">
                    HAVE SOMETHING <span>IN MIND?</span>
                </h2>

                <p class="section-copy">
                    Thank you for taking the time to explore my portfolio.
                    Feel free to reach out through the contact information
                    provided here.
                </p>
            </div>

            <div class="contact-details">
                @if(!empty($portfolio->email))
                    <div class="contact-item">
                        <span class="contact-label">Email</span>
                        <a href="mailto:{{ $portfolio->email }}">
                            {{ $portfolio->email }}
                        </a>
                    </div>
                @endif

                @if(!empty($portfolio->address))
                    <div class="contact-item">
                        <span class="contact-label">Location</span>
                        <p>{{ $portfolio->address }}</p>
                    </div>
                @endif

                @if(!empty($websiteUrl))
                    <div class="contact-item">
                        <span class="contact-label">Website</span>
                        <a
                            href="{{ \Illuminate\Support\Str::startsWith($websiteUrl, ['http://', 'https://']) ? $websiteUrl : 'https://' . $websiteUrl }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            {{ $websiteUrl }}
                        </a>
                    </div>
                @endif

                @if(!empty($linkedinUrl))
                    <div class="contact-item">
                        <span class="contact-label">LinkedIn</span>
                        <a
                            href="{{ \Illuminate\Support\Str::startsWith($linkedinUrl, ['http://', 'https://']) ? $linkedinUrl : 'https://' . $linkedinUrl }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            {{ $linkedinUrl }}
                        </a>
                    </div>
                @endif

                @if(!empty($githubUrl))
                    <div class="contact-item">
                        <span class="contact-label">GitHub</span>
                        <a
                            href="{{ \Illuminate\Support\Str::startsWith($githubUrl, ['http://', 'https://']) ? $githubUrl : 'https://' . $githubUrl }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            {{ $githubUrl }}
                        </a>
                    </div>
                @endif

                @if(
                    empty($portfolio->email) &&
                    empty($portfolio->address) &&
                    empty($websiteUrl) &&
                    empty($linkedinUrl) &&
                    empty($githubUrl)
                )
                    <div class="contact-item">
                        <span class="contact-label">Contact information</span>
                        <p>Contact details have not been added yet.</p>
                    </div>
                @endif
            </div>
        </section>

        {{-- FOOTER --}}
        <footer class="footer">
            <p class="footer-brand">
                {{ $portfolio->full_name }} / Portfolio
            </p>

            <p>
                Made with purpose. Built to grow.
            </p>

            <p>
                © {{ date('Y') }}
            </p>
        </footer>

    </main>
</body>
</html>