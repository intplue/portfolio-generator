
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $portfolio->full_name }} | Modern Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
       
:root {
    --bg: color-mix(in srgb, {{ $portfolio->accent_color ?: '#91b9e8' }} 35%, #090e17);
    --surface: #101927;
    --surface-light: #152338;
    --border: rgba(177, 201, 230, 0.14);
    --text: #edf3fb;
    --muted: #9baabe;
    --accent: {{ $portfolio->accent_color ?: '#91b9e8' }};
    --accent-soft: color-mix(in srgb, var(--accent) 10%, transparent);
    --radius: 16px;
}


        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 85px;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        


.preview-navigation {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex-wrap: wrap;
    gap: 10px;
    max-width: 1120px;
    margin: 20px auto;
    padding: 0 24px;
}

.preview-navigation a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 42px;
    padding: 10px 16px;
    border: 1px solid #d7dce3;
    border-radius: 6px;
    background: transparent;
    color: #e7edf5;
    font-family: inherit;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: .2px;
    text-decoration: none;
    transition: background .2s ease,
                color .2s ease,
                border-color .2s ease;
}

.preview-navigation a:last-child {
    background: var(--accent, var(--burgundy, #504458));
    border-color: var(--accent, var(--burgundy, #504458));
    color: #fff;
}

.preview-navigation a:hover {
    background: rgba(127, 127, 127, .12);
    border-color: var(--accent, var(--burgundy, #504458));
    color: var(--accent, var(--burgundy, #504458));
}

.preview-navigation a:last-child:hover {
    opacity: .88;
    color: #fff;
}

@media (max-width: 600px) {
    .preview-navigation {
        padding: 0 16px;
        gap: 8px;
    }

    .preview-navigation a {
        flex: 1;
        padding: 10px;
        font-size: 11px;
    }
}

@media print {
    .preview-navigation {
        display: none !important;
    }
}




        img {
            display: block;
            max-width: 100%;
        }

        ::selection {
            background: var(--accent);
            color: var(--bg);
        }

        .container {
            width: min(1120px, calc(100% - 48px));
            margin: 0 auto;
        }

        .mono {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 11px;
            color: var(--accent);
        }

        .eyebrow::before {
            content: '';
            width: 23px;
            height: 1px;
            background: var(--accent);
        }

        .header {
            position: sticky;
            top: 0;
            z-index: 10;
            background: rgba(9, 14, 23, 0.92);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(16px);
        }

        .nav {
            min-height: 74px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            font-family: 'Manrope', sans-serif;
            font-weight: 800;
            font-size: 17px;
            letter-spacing: -0.6px;
        }

        .brand span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 26px;
        }

        .nav-links a {
            color: var(--muted);
            font-size: 12px;
            transition: color .2s ease;
        }

        .nav-links a:hover {
            color: var(--text);
        }

        .nav-links .nav-button {
            border: 1px solid var(--border);
            border-radius: 7px;
            padding: 8px 14px;
        }

        .hero {
            display: grid;
            grid-template-columns: minmax(0, 1.2fr) minmax(260px, .8fr);
            gap: 70px;
            align-items: center;
            min-height: 610px;
            padding-top: 85px;
            padding-bottom: 85px;
            border-bottom: 1px solid var(--border);
        }

        .hero-copy {
            min-width: 0;
        }

        .hero h1 {
            margin: 26px 0;
            font-family: 'Manrope', sans-serif;
            font-size: clamp(45px, 6.5vw, 78px);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -3.8px;
            overflow-wrap: anywhere;
        }

        .hero h1 span {
            display: block;
            color: var(--accent);
        }

        .hero-description {
            max-width: 510px;
            color: var(--muted);
            font-size: 14px;
            line-height: 2;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 18px;
            border: 1px solid var(--border);
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            transition: transform .2s ease, background .2s ease;
        }

        .button:hover {
            transform: translateY(-2px);
        }

        .button-primary {
            background: var(--accent);
            border-color: var(--accent);
            color: #0a1422;
        }

        .button-secondary {
            color: var(--text);
        }

        .hero-image-wrap {
            position: relative;
            width: 100%;
            max-width: 360px;
            justify-self: end;
        }

        .hero-image {
            aspect-ratio: 4 / 5;
            padding: 11px;
            background: linear-gradient(145deg, #223751, #101927);
            border: 1px solid rgba(145, 185, 232, .35);
            border-radius: 180px 180px 12px 12px;
        }

        .hero-image img,
        .image-placeholder {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 170px 170px 6px 6px;
        }

        .image-placeholder {
            display: grid;
            place-items: center;
            background: var(--surface-light);
            color: var(--accent);
            font-family: 'Manrope', sans-serif;
            font-size: 82px;
            font-weight: 800;
        }

        .image-label {
            position: absolute;
            right: -18px;
            bottom: 26px;
            padding: 13px 17px;
            background: var(--surface-light);
            border: 1px solid var(--border);
            border-radius: 8px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .25);
        }

        .image-label .mono {
            color: var(--accent);
        }

        .image-label p:last-child {
            margin-top: 3px;
            font-size: 12px;
        }

        .section {
            padding: 90px 0;
            border-bottom: 1px solid var(--border);
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 24px;
            margin-bottom: 35px;
        }

        .section-heading h2 {
            margin-top: 12px;
            font-family: 'Manrope', sans-serif;
            font-size: clamp(29px, 4vw, 43px);
            line-height: 1.2;
            letter-spacing: -1.8px;
        }

        .section-number {
            flex-shrink: 0;
            color: #64758c;
        }

        .about-grid {
            display: grid;
            grid-template-columns: .75fr 1.25fr;
            gap: 18px;
        }

        .about-card,
        .about-copy {
            padding: 28px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
        }

        .about-card {
            background: var(--surface-light);
        }

        .about-card .number {
            display: block;
            margin: 20px 0 12px;
            color: var(--accent);
            font-family: 'Manrope', sans-serif;
            font-size: 68px;
            font-weight: 800;
            letter-spacing: -4px;
            line-height: 1;
        }

        .about-card p:last-child {
            color: var(--muted);
            font-size: 13px;
        }

        .about-copy {
            display: flex;
            align-items: center;
            background: var(--surface);
            color: #bac6d6;
            font-size: 14px;
            line-height: 2;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 13px;
        }

        .skill-card {
            display: flex;
            gap: 14px;
            align-items: flex-start;
            min-height: 95px;
            padding: 21px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 11px;
            transition: border-color .2s ease, transform .2s ease;
        }

        .skill-card:hover {
            border-color: rgba(145, 185, 232, .5);
            transform: translateY(-3px);
        }

        .skill-index {
            color: var(--accent);
            font-family: 'DM Mono', monospace;
            font-size: 11px;
        }

        .skill-card p {
            font-size: 13px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .timeline {
            display: grid;
            gap: 13px;
        }

        .timeline-item {
            display: grid;
            grid-template-columns: 180px minmax(0, 1fr);
            gap: 25px;
            padding: 27px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .timeline-label {
            color: var(--accent);
        }

        .timeline-content h3 {
            margin-bottom: 7px;
            font-family: 'Manrope', sans-serif;
            font-size: 17px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .timeline-content p {
            color: var(--muted);
            font-size: 13px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 17px;
        }

        .project-card {
            position: relative;
            min-height: 220px;
            padding: 27px;
            overflow: hidden;
            background: linear-gradient(145deg, #17273b, #101927);
            border: 1px solid var(--border);
            border-radius: var(--radius);
        }

        .project-card::after {
            content: '';
            position: absolute;
            right: -75px;
            bottom: -100px;
            width: 220px;
            height: 220px;
            border: 1px solid rgba(145, 185, 232, .12);
            border-radius: 50%;
            box-shadow: 0 0 0 22px rgba(145, 185, 232, .025),
                        0 0 0 44px rgba(145, 185, 232, .02);
            pointer-events: none;
        }

        .project-index {
            display: block;
            margin-bottom: 30px;
            color: var(--accent);
        }

        .project-card h3 {
            position: relative;
            z-index: 1;
            font-family: 'Manrope', sans-serif;
            font-size: 20px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .project-card p {
            position: relative;
            z-index: 1;
            margin-top: 10px;
            color: var(--muted);
            font-size: 13px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .additional-card {
            padding: 28px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            color: #bac6d6;
            font-size: 14px;
            line-height: 2;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .contact-section {
            padding: 80px 0;
            background: linear-gradient(180deg, var(--bg), #0d1725);
        }

        .contact-panel {
            padding: clamp(27px, 5vw, 54px);
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 19px;
        }

        .contact-panel h2 {
            max-width: 650px;
            margin: 17px 0;
            font-family: 'Manrope', sans-serif;
            font-size: clamp(35px, 5vw, 58px);
            line-height: 1.12;
            letter-spacing: -2.4px;
        }

        .contact-panel h2 span {
            color: var(--accent);
        }

        .contact-description {
            max-width: 510px;
            margin-bottom: 26px;
            color: var(--muted);
            font-size: 14px;
        }

        .contact-links,
        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .social-links {
            margin-top: 22px;
        }

        .social-links a,
        .social-links .social-label {
            padding: 8px 12px;
            border: 1px solid var(--border);
            border-radius: 7px;
            color: var(--muted);
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .social-links a:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .footer {
            padding: 24px 0;
            border-top: 1px solid var(--border);
        }

        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
        }

        .footer p,
        .footer a {
            color: #7e8da1;
            font-size: 11px;
        }

        .footer a:hover {
            color: var(--accent);
        }

        @media (max-width: 820px) {
            .hero {
                grid-template-columns: minmax(0, 1fr) minmax(220px, .75fr);
                gap: 30px;
            }

            .hero h1 {
                letter-spacing: -2.5px;
            }

            .skills-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .timeline-item {
                grid-template-columns: 140px minmax(0, 1fr);
                gap: 18px;
            }
        }

        @media (max-width: 600px) {
            .container {
                width: calc(100% - 32px);
            }

            .nav {
                min-height: 66px;
            }

            .nav-links {
                gap: 13px;
            }

            .nav-links a {
                font-size: 10px;
            }

            .nav-links .nav-button {
                display: none;
            }

            .hero {
                grid-template-columns: 1fr;
                gap: 38px;
                padding-top: 65px;
                padding-bottom: 65px;
            }

            .hero h1 {
                font-size: clamp(42px, 12vw, 65px);
                letter-spacing: -2px;
            }

            .hero-image-wrap {
                max-width: 290px;
                justify-self: center;
                margin-right: 9px;
            }

            .section {
                padding: 68px 0;
            }

            .about-grid,
            .projects-grid {
                grid-template-columns: 1fr;
            }

            .about-card,
            .about-copy {
                padding: 23px;
            }

            .skills-grid {
                gap: 9px;
            }

            .skill-card {
                min-height: 82px;
                padding: 14px;
                gap: 9px;
            }

            .timeline-item {
                grid-template-columns: 1fr;
                gap: 10px;
                padding: 22px;
            }

            .project-card {
                min-height: 195px;
                padding: 23px;
            }

            .contact-panel {
                padding: 25px 21px;
            }

            .contact-panel h2 {
                letter-spacing: -1.5px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                transition: none !important;
            }
        }
    </style>
</head>

<body>
     
@if (!empty($showNavigation))
    <nav class="preview-navigation" aria-label="Preview navigation">
        <a href="{{ route('portfolio.customize', $portfolio->id) }}">
            <span aria-hidden="true">←</span>
           Back
        </a>

        <a href="{{ route('portfolio.templates', $portfolio->id) }}">
            <span aria-hidden="true">▦</span>
            All Templates
        </a>
    </nav>
@endif


    @php
        $imageUrl = $portfolio->profile_picture
            ? (\Illuminate\Support\Str::startsWith($portfolio->profile_picture, ['http://', 'https://'])
                ? $portfolio->profile_picture
                : asset('storage/' . $portfolio->profile_picture))
            : null;

        $skills = $portfolio->skills
            ? preg_split('/[\r\n,;]+/', $portfolio->skills, -1, PREG_SPLIT_NO_EMPTY)
            : [];

        $initials = collect(preg_split('/\s+/', trim($portfolio->full_name)))
            ->filter()
            ->take(2)
            ->map(fn ($part) => mb_strtoupper(mb_substr($part, 0, 1)))
            ->implode('');

        $websiteUrl = $portfolio->website
            ? (\Illuminate\Support\Str::startsWith($portfolio->website, ['http://', 'https://'])
                ? $portfolio->website
                : 'https://' . $portfolio->website)
            : null;

        $linkedinUrl = $portfolio->linkedin
            ? (\Illuminate\Support\Str::startsWith($portfolio->linkedin, ['http://', 'https://'])
                ? $portfolio->linkedin
                : 'https://' . $portfolio->linkedin)
            : null;

        $githubUrl = $portfolio->github
            ? (\Illuminate\Support\Str::startsWith($portfolio->github, ['http://', 'https://'])
                ? $portfolio->github
                : 'https://' . $portfolio->github)
            : null;

        $socialLinks = $portfolio->social_links
            ? preg_split('/[\r\n]+/', $portfolio->social_links, -1, PREG_SPLIT_NO_EMPTY)
            : [];

        $projectItems = $portfolio->projects
            ? preg_split('/\n\s*\n/', trim($portfolio->projects), -1, PREG_SPLIT_NO_EMPTY)
            : [];

        $educationItems = $portfolio->educational_background
            ? preg_split('/\n\s*\n/', trim($portfolio->educational_background), -1, PREG_SPLIT_NO_EMPTY)
            : [];

        $experienceItems = $portfolio->work_experience
            ? preg_split('/\n\s*\n/', trim($portfolio->work_experience), -1, PREG_SPLIT_NO_EMPTY)
            : [];
    @endphp

    <header class="header" id="top">
        <div class="container nav">
            <a class="brand" href="#top">
                {{ $portfolio->full_name }}<span>.</span>
            </a>

            <nav class="nav-links mono" aria-label="Main navigation">
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#work">Work</a>
                <a href="#contact" class="nav-button">Contact ↗</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="container hero">
            <div class="hero-copy">
                <p class="eyebrow mono">Personal Portfolio</p>

                <h1>
                    {{ $portfolio->full_name }}
                    <span>Portfolio.</span>
                </h1>

                <p class="hero-description">{{ $portfolio->about_me ?: 'Welcome to my portfolio. Explore my background, skills, and work.' }}</p>

                <div class="hero-actions">
                    <a href="#work" class="button button-primary">Explore my work ↗</a>
                    <a href="#contact" class="button button-secondary">Get in touch</a>
                </div>
            </div>

            <div class="hero-image-wrap">
                <div class="hero-image">
                    @if ($imageUrl)
                        <img src="{{ $imageUrl }}" alt="Portrait of {{ $portfolio->full_name }}">
                    @else
                        <div class="image-placeholder">
                            {{ $initials ?: 'ME' }}
                        </div>
                    @endif
                </div>

                <div class="image-label">
                    <p class="mono">Profile / 01</p>
                    <p>{{ $portfolio->full_name }}</p>
                </div>
            </div>
        </section>

        <section class="container section" id="about">
            <div class="section-heading">
                <div>
                    <p class="eyebrow mono">Introduction</p>
                    <h2>A little about me.</h2>
                </div>
                <span class="section-number mono">01 / ABOUT</span>
            </div>

            <div class="about-grid">
                <div class="about-card">
                    <p class="mono">Behind the portfolio</p>
                    <span class="number">01.</span>
                    <p>My background, interests, and journey.</p>
                </div>

                <div class="about-copy">
                    {{ $portfolio->about_me ?: 'My personal introduction will appear here.' }}
                </div>
            </div>
        </section>

        @if (!empty($skills))
            <section class="container section" id="skills">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow mono">What I bring</p>
                        <h2>Skills &amp; strengths.</h2>
                    </div>
                    <span class="section-number mono">02 / SKILLS</span>
                </div>

                <div class="skills-grid">
                    @foreach ($skills as $index => $skill)
                        <article class="skill-card">
                            <span class="skill-index">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <p>{{ trim($skill) }}</p>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if (!empty($educationItems))
            <section class="container section" id="education">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow mono">Academic background</p>
                        <h2>Education.</h2>
                    </div>
                    <span class="section-number mono">03 / EDUCATION</span>
                </div>

                <div class="timeline">
                    @foreach ($educationItems as $index => $education)
                        <article class="timeline-item">
                            <div class="timeline-label mono">
                                ENTRY / {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <div class="timeline-content">
                                <h3>{{ trim($education) }}</h3>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if (!empty($experienceItems))
            <section class="container section" id="experience">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow mono">Professional background</p>
                        <h2>Experience.</h2>
                    </div>
                    <span class="section-number mono">04 / EXPERIENCE</span>
                </div>

                <div class="timeline">
                    @foreach ($experienceItems as $index => $experience)
                        <article class="timeline-item">
                            <div class="timeline-label mono">
                                EXPERIENCE / {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <div class="timeline-content">
                                <h3>{{ trim($experience) }}</h3>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if (!empty($projectItems))
            <section class="container section" id="work">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow mono">Selected work</p>
                        <h2>Projects &amp; creations.</h2>
                    </div>
                    <span class="section-number mono">05 / PROJECTS</span>
                </div>

                <div class="projects-grid">
                    @foreach ($projectItems as $index => $project)
                        <article class="project-card">
                            <span class="project-index mono">
                                PROJECT / {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <h3>{{ trim($project) }}</h3>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($portfolio->additional_info)
            <section class="container section" id="additional">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow mono">More details</p>
                        <h2>Additional information.</h2>
                    </div>
                    <span class="section-number mono">06 / DETAILS</span>
                </div>

                <div class="additional-card">
                    {{ $portfolio->additional_info }}
                </div>
            </section>
        @endif

        <section class="contact-section" id="contact">
            <div class="container">
                <div class="contact-panel">
                    <p class="eyebrow mono">Let's connect</p>

                    <h2>
                        Have something
                        <span>in mind?</span>
                    </h2>

                    <p class="contact-description">
                        Thank you for visiting my portfolio.
                        Feel free to reach out using the contact details below.
                    </p>

                    <div class="contact-links">
                        @if ($portfolio->email)
                            <a class="button button-primary" href="mailto:{{ $portfolio->email }}">
                                Email me ↗
                            </a>
                        @endif

                        @if ($websiteUrl)
                            <a class="button button-secondary" href="{{ $websiteUrl }}" target="_blank" rel="noopener noreferrer">
                                Website ↗
                            </a>
                        @endif

                        @if ($linkedinUrl)
                            <a class="button button-secondary" href="{{ $linkedinUrl }}" target="_blank" rel="noopener noreferrer">
                                LinkedIn ↗
                            </a>
                        @endif

                        @if ($githubUrl)
                            <a class="button button-secondary" href="{{ $githubUrl }}" target="_blank" rel="noopener noreferrer">
                                GitHub ↗
                            </a>
                        @endif
                    </div>

                    @if ($portfolio->address)
                        <div class="social-links">
                            <span class="social-label">Location: {{ $portfolio->address }}</span>
                        </div>
                    @endif

                    @if (!empty($socialLinks))
                        <div class="social-links">
                            @foreach ($socialLinks as $socialLink)
                                <span class="social-label">{{ trim($socialLink) }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <p>© {{ date('Y') }} {{ $portfolio->full_name }}. All rights reserved.</p>
            <a href="#top" class="mono">Back to top ↑</a>
            <a href="{{ route('home') }}" class="mono">Create your portfolio</a>
        </div>
    </footer>
</body>
</html>
