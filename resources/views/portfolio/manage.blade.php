
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $portfolio->full_name }} | Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #090e17;
            --bg-soft: #0e1623;
            --panel: #111c2b;
            --panel-light: #162438;
            --border: rgba(176, 198, 224, 0.13);
            --text: #edf3fb;
            --muted: #9aaabe;
            --accent: #8eb8e8;
            --accent-soft: rgba(142, 184, 232, 0.12);
            --white: #ffffff;
            --radius: 18px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
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

        img {
            display: block;
            max-width: 100%;
        }

        ::selection {
            background: var(--accent);
            color: var(--bg);
        }

        .site-shell {
            width: min(1160px, calc(100% - 48px));
            margin: 0 auto;
        }

        .mono {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 1.7px;
            text-transform: uppercase;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: var(--accent);
        }

        .eyebrow::before {
            content: '';
            width: 24px;
            height: 1px;
            background: var(--accent);
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 20;
            background: rgba(9, 14, 23, 0.9);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(18px);
        }

        .nav {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            font-family: 'Manrope', sans-serif;
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -0.7px;
        }

        .brand span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-links a {
            color: var(--muted);
            font-size: 12px;
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--white);
        }

        .nav-contact {
            border: 1px solid var(--border);
            border-radius: 999px;
            padding: 9px 16px;
        }

        .hero {
            position: relative;
            display: grid;
            grid-template-columns: minmax(0, 1.2fr) minmax(280px, 0.8fr);
            gap: 64px;
            align-items: center;
            min-height: 600px;
            padding: 100px 0 96px;
            border-bottom: 1px solid var(--border);
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 55px;
            left: -180px;
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(67, 112, 164, 0.12), transparent 70%);
            pointer-events: none;
        }

        .hero-copy {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            margin: 25px 0;
            font-family: 'Manrope', sans-serif;
            font-size: clamp(44px, 6.5vw, 82px);
            font-weight: 800;
            line-height: 1.04;
            letter-spacing: -4px;
            overflow-wrap: anywhere;
        }

        .hero h1 span {
            display: block;
            color: var(--accent);
        }

        .hero-description {
            max-width: 510px;
            margin-bottom: 30px;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.9;
            white-space: pre-line;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            min-height: 46px;
            padding: 12px 19px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            transition: transform 0.2s ease, background 0.2s ease;
        }

        .button:hover {
            transform: translateY(-2px);
        }

        .button-primary {
            background: var(--accent);
            color: #091321;
            border-color: var(--accent);
        }

        .button-secondary {
            color: var(--text);
        }

        .hero-visual {
            position: relative;
            justify-self: end;
            width: 100%;
            max-width: 380px;
        }

        .portrait-frame {
            position: relative;
            aspect-ratio: 4 / 5;
            padding: 12px;
            border: 1px solid rgba(142, 184, 232, 0.28);
            border-radius: 190px 190px 14px 14px;
            background: linear-gradient(145deg, #1b2c41, #0b121e);
        }

        .portrait-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 180px 180px 8px 8px;
        }

        .portrait-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 180px 180px 8px 8px;
            background: linear-gradient(145deg, #243952, #111c2b);
            color: var(--accent);
            font-family: 'Manrope', sans-serif;
            font-size: clamp(56px, 8vw, 100px);
            font-weight: 800;
        }

        .portrait-caption {
            position: absolute;
            right: -20px;
            bottom: 28px;
            max-width: 190px;
            padding: 14px 18px;
            background: var(--panel-light);
            border: 1px solid var(--border);
            border-radius: 10px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
        }

        .portrait-caption p:first-child {
            margin-bottom: 3px;
            color: var(--accent);
        }

        .portrait-caption p:last-child {
            color: var(--text);
            font-size: 12px;
        }

        .section {
            padding: 100px 0;
            border-bottom: 1px solid var(--border);
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 30px;
            margin-bottom: 40px;
        }

        .section-heading h2 {
            margin-top: 13px;
            font-family: 'Manrope', sans-serif;
            font-size: clamp(30px, 4vw, 45px);
            font-weight: 700;
            letter-spacing: -1.8px;
            line-height: 1.2;
        }

        .section-index {
            color: #63748b;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 0.75fr 1.25fr;
            gap: 24px;
        }

        .about-label {
            padding: 28px;
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: var(--radius);
        }

        .about-label .big-number {
            display: block;
            margin-top: 26px;
            color: var(--accent);
            font-family: 'Manrope', sans-serif;
            font-size: clamp(45px, 6vw, 72px);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -4px;
        }

        .about-label p:last-child {
            margin-top: 14px;
            color: var(--muted);
            font-size: 13px;
        }

        .about-content {
            padding: 30px;
            background: var(--bg-soft);
            border: 1px solid var(--border);
            border-radius: var(--radius);
        }

        .about-content p {
            color: #b7c4d5;
            font-size: 15px;
            line-height: 2;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }

        .skill-card {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            min-height: 100px;
            padding: 22px;
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 12px;
            transition: border-color 0.2s ease, transform 0.2s ease;
        }

        .skill-card:hover {
            transform: translateY(-3px);
            border-color: rgba(142, 184, 232, 0.45);
        }

        .skill-number {
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
            gap: 14px;
        }

        .timeline-card {
            display: grid;
            grid-template-columns: 190px minmax(0, 1fr);
            gap: 28px;
            padding: 28px;
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 14px;
        }

        .timeline-marker {
            color: var(--accent);
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .timeline-content h3 {
            margin-bottom: 8px;
            font-family: 'Manrope', sans-serif;
            font-size: 18px;
            font-weight: 700;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .timeline-content p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.9;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .project-card {
            position: relative;
            min-height: 235px;
            padding: 30px;
            overflow: hidden;
            background: linear-gradient(145deg, var(--panel-light), var(--panel));
            border: 1px solid var(--border);
            border-radius: var(--radius);
        }

        .project-card::after {
            content: '';
            position: absolute;
            right: -60px;
            bottom: -100px;
            width: 220px;
            height: 220px;
            border: 1px solid rgba(142, 184, 232, 0.12);
            border-radius: 50%;
            box-shadow: 0 0 0 24px rgba(142, 184, 232, 0.025),
                        0 0 0 48px rgba(142, 184, 232, 0.02);
            pointer-events: none;
        }

        .project-number {
            display: block;
            margin-bottom: 34px;
            color: var(--accent);
        }

        .project-card h3 {
            position: relative;
            z-index: 1;
            margin-bottom: 12px;
            font-family: 'Manrope', sans-serif;
            font-size: 21px;
            font-weight: 700;
            line-height: 1.45;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .project-card p {
            position: relative;
            z-index: 1;
            max-width: 460px;
            color: var(--muted);
            font-size: 13px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .additional-card {
            padding: 30px;
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            color: #b7c4d5;
            font-size: 14px;
            line-height: 2;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .contact-section {
            padding: 85px 0;
            background: linear-gradient(180deg, var(--bg), #0c1521);
        }

        .contact-panel {
            padding: clamp(28px, 5vw, 56px);
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 20px;
        }

        .contact-panel h2 {
            max-width: 650px;
            margin: 18px 0;
            font-family: 'Manrope', sans-serif;
            font-size: clamp(35px, 5vw, 60px);
            font-weight: 800;
            letter-spacing: -2.5px;
            line-height: 1.1;
        }

        .contact-panel h2 span {
            color: var(--accent);
        }

        .contact-description {
            max-width: 500px;
            margin-bottom: 28px;
            color: var(--muted);
            font-size: 14px;
        }

        .contact-links {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 25px;
        }

        .social-links a {
            padding: 9px 13px;
            color: var(--muted);
            border: 1px solid var(--border);
            border-radius: 7px;
            font-size: 12px;
            transition: color 0.2s ease, border-color 0.2s ease;
        }

        .social-links a:hover {
            color: var(--accent);
            border-color: var(--accent);
        }

        .site-footer {
            padding: 25px 0;
            border-top: 1px solid var(--border);
        }

        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }

        .footer-inner p {
            color: #78879b;
            font-size: 11px;
        }

        .back-top {
            color: var(--accent) !important;
        }

        .empty-state {
            grid-column: 1 / -1;
            padding: 25px;
            color: var(--muted);
            background: var(--panel);
            border: 1px dashed var(--border);
            border-radius: 12px;
            font-size: 13px;
        }

        @media (max-width: 850px) {
            .hero {
                grid-template-columns: 1fr 0.7fr;
                gap: 30px;
                min-height: auto;
                padding: 80px 0;
            }

            .hero h1 {
                letter-spacing: -2.5px;
            }

            .portrait-caption {
                right: -8px;
            }

            .skills-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .timeline-card {
                grid-template-columns: 140px minmax(0, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 600px) {
            .site-shell {
                width: min(100% - 32px, 1160px);
            }

            .nav {
                min-height: 68px;
            }

            .nav-links {
                gap: 14px;
            }

            .nav-links a {
                font-size: 11px;
            }

            .nav-links .nav-contact {
                display: none;
            }

            .hero {
                grid-template-columns: 1fr;
                gap: 42px;
                padding: 68px 0;
            }

            .hero h1 {
                font-size: clamp(43px, 13vw, 68px);
                letter-spacing: -2.5px;
            }

            .hero-visual {
                justify-self: center;
                max-width: 290px;
                margin-right: 10px;
            }

            .section {
                padding: 70px 0;
            }

            .section-heading {
                margin-bottom: 28px;
            }

            .about-grid,
            .projects-grid {
                grid-template-columns: 1fr;
            }

            .about-label,
            .about-content {
                padding: 23px;
            }

            .skills-grid {
                gap: 10px;
            }

            .skill-card {
                min-height: 85px;
                padding: 15px;
                gap: 10px;
            }

            .timeline-card {
                grid-template-columns: 1fr;
                gap: 12px;
                padding: 22px;
            }

            .project-card {
                min-height: 210px;
                padding: 24px;
            }

            .contact-panel {
                padding: 26px 22px;
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

    <header class="site-header" id="top">
        <div class="site-shell nav">
            <a class="brand" href="#top">
                {{ $portfolio->full_name }}<span>.</span>
            </a>

            <nav class="nav-links mono" aria-label="Main navigation">
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#work">Work</a>
                <a href="#contact" class="nav-contact">Contact ↗</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="site-shell hero">
            <div class="hero-copy">
                <p class="eyebrow mono">Personal Portfolio</p>

                <h1>
                    {{ $portfolio->full_name }}
                    <span>Portfolio.</span>
                </h1>

                <p class="hero-description">{{ $portfolio->about_me ?: 'Welcome to my personal portfolio. Explore my background, skills, and work.' }}</p>

                <div class="hero-actions">
                    <a class="button button-primary" href="#work">
                        Explore my work <span aria-hidden="true">↗</span>
                    </a>

                    <a class="button button-secondary" href="#contact">
                        Get in touch
                    </a>
                </div>
            </div>

            <div class="hero-visual">
                <div class="portrait-frame">
                    @if ($imageUrl)
                        <img src="{{ $imageUrl }}" alt="Portrait of {{ $portfolio->full_name }}">
                    @else
                        <div class="portrait-placeholder" aria-label="Profile initials">
                            {{ $initials ?: 'ME' }}
                        </div>
                    @endif
                </div>

                <div class="portrait-caption">
                    <p class="mono">Portfolio / 01</p>
                    <p>{{ $portfolio->full_name }}</p>
                </div>
            </div>
        </section>

        <section class="site-shell section" id="about">
            <div class="section-heading">
                <div>
                    <p class="eyebrow mono">A little about me</p>
                    <h2>Beyond the introduction.</h2>
                </div>

                <span class="section-index mono">01 / ABOUT</span>
            </div>

            <div class="about-grid">
                <div class="about-label">
                    <span class="mono">The person behind the work</span>

                    <span class="big-number">01<span style="color: var(--text)">.</span></span>

                    <p>Background, interests, and personal journey.</p>
                </div>

                <div class="about-content">
                    <p>{{ $portfolio->about_me ?: 'My personal and professional journey will be shared here.' }}</p>
                </div>
            </div>
        </section>

        @if (!empty($skills))
            <section class="site-shell section" id="skills">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow mono">Capabilities</p>
                        <h2>Skills &amp; strengths.</h2>
                    </div>

                    <span class="section-index mono">02 / SKILLS</span>
                </div>

                <div class="skills-grid">
                    @foreach ($skills as $index => $skill)
                        <article class="skill-card">
                            <span class="skill-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <p>{{ trim($skill) }}</p>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if (!empty($educationItems))
            <section class="site-shell section" id="education">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow mono">Academic journey</p>
                        <h2>Education.</h2>
                    </div>

                    <span class="section-index mono">03 / EDUCATION</span>
                </div>

                <div class="timeline">
                    @foreach ($educationItems as $index => $education)
                        <article class="timeline-card">
                            <div class="timeline-marker">
                                Entry {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
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
            <section class="site-shell section" id="experience">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow mono">Experience</p>
                        <h2>Where I've worked.</h2>
                    </div>

                    <span class="section-index mono">04 / EXPERIENCE</span>
                </div>

                <div class="timeline">
                    @foreach ($experienceItems as $index => $experience)
                        <article class="timeline-card">
                            <div class="timeline-marker">
                                Experience {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
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
            <section class="site-shell section" id="work">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow mono">Selected work</p>
                        <h2>Projects &amp; creations.</h2>
                    </div>

                    <span class="section-index mono">05 / PROJECTS</span>
                </div>

                <div class="projects-grid">
                    @foreach ($projectItems as $index => $project)
                        <article class="project-card">
                            <span class="project-number mono">
                                PROJECT / {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <h3>{{ trim($project) }}</h3>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($portfolio->additional_info)
            <section class="site-shell section" id="additional">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow mono">More to know</p>
                        <h2>Additional information.</h2>
                    </div>

                    <span class="section-index mono">06 / DETAILS</span>
                </div>

                <div class="additional-card">
                    {{ $portfolio->additional_info }}
                </div>
            </section>
        @endif

        <section class="contact-section" id="contact">
            <div class="site-shell">
                <div class="contact-panel">
                    <p class="eyebrow mono">Get in touch</p>

                    <h2>
                        Let's start a
                        <span>conversation.</span>
                    </h2>

                    <p class="contact-description">
                        Thank you for taking the time to explore my portfolio.
                        Feel free to reach out through the contact details below.
                    </p>

                    <div class="contact-links">
                        @if ($portfolio->email)
                            <a class="button button-primary" href="mailto:{{ $portfolio->email }}">
                                Email me ↗
                            </a>
                        @endif

                        @if ($websiteUrl)
                            <a class="button button-secondary" href="{{ $websiteUrl }}" target="_blank" rel="noopener noreferrer">
                                Personal website ↗
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
                            <span class="mono" style="color: var(--muted); padding: 9px 0;">
                                Location: {{ $portfolio->address }}
                            </span>
                        </div>
                    @endif

                    @if (!empty($socialLinks))
                        <div class="social-links">
                            @foreach ($socialLinks as $socialLink)
                                <span>{{ trim($socialLink) }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="site-shell footer-inner">
            <p>© {{ date('Y') }} {{ $portfolio->full_name }}. All rights reserved.</p>

            <a href="#top" class="mono back-top">Back to top ↑</a>

            <a href="{{ route('home') }}" class="mono" style="color: var(--muted);">
                Create your portfolio
            </a>
        </div>
    </footer>
</body>
</html>
