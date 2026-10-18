
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $portfolio->full_name ?? 'My Portfolio' }} | Creative Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    @php
        /*
        |--------------------------------------------------------------------------
        | Accent color
        |--------------------------------------------------------------------------
        | Supports the green, blue, and plum presets, as well as a custom hex code.
        */
        $savedAccent = $portfolio->accent_color ?? 'plum';

        $accentPresets = [
            'green' => '#526b5d',
            'blue'  => '#3d6fa8',
            'plum'  => '#432a46',
        ];

        $accent = $accentPresets[$savedAccent] ?? (
            is_string($savedAccent) &&
            preg_match('/^#[0-9a-fA-F]{6}$/', $savedAccent)
                ? $savedAccent
                : '#432a46'
        );

        /*
        |--------------------------------------------------------------------------
        | Layout style
        |--------------------------------------------------------------------------
        */
        $savedLayout = $portfolio->layout_style ?? 'standard';

        $layout = in_array(
            $savedLayout,
            ['standard', 'cards', 'editorial'],
            true
        ) ? $savedLayout : 'standard';

        /*
        |--------------------------------------------------------------------------
        | Portfolio content
        |--------------------------------------------------------------------------
        */
        $fullName = $portfolio->full_name ?? 'Your Name';
        $aboutMe = $portfolio->about_me ?? '';
        $email = $portfolio->email ?? '';
        $website = $portfolio->website ?? '';
        $linkedin = $portfolio->linkedin ?? '';
        $github = $portfolio->github ?? '';
        $address = $portfolio->address ?? '';

        /*
        |--------------------------------------------------------------------------
        | Convert list-like database values into arrays.
        |--------------------------------------------------------------------------
        */
        $toList = function ($value) {
            if (is_array($value)) {
                return $value;
            }

            if (is_object($value)) {
                return (array) $value;
            }

            if (!is_string($value) || trim($value) === '') {
                return [];
            }

            $decoded = json_decode($value, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return $decoded;
            }

            return preg_split('/[\r\n,]+/', $value, -1, PREG_SPLIT_NO_EMPTY) ?: [];
        };

        $skills = $toList($portfolio->skills ?? []);
        $education = $toList($portfolio->educational_background ?? []);
        $experience = $toList($portfolio->work_experience ?? []);
        $projects = $toList($portfolio->projects ?? []);
        $additionalInfo = $toList($portfolio->additional_info ?? []);

        $getValue = function ($item, $keys, $fallback = '') {
            foreach ($keys as $key) {
                if (is_array($item) && isset($item[$key]) && $item[$key] !== '') {
                    return $item[$key];
                }

                if (is_object($item) && isset($item->$key) && $item->$key !== '') {
                    return $item->$key;
                }
            }

            return is_string($item) ? $item : $fallback;
        };

        $profilePicture = $portfolio->profile_picture ?? null;
    @endphp

    <style>
        :root {
            --accent: {{ $accent }};
            --accent-soft: color-mix(in srgb, var(--accent) 10%, white);
            --accent-medium: color-mix(in srgb, var(--accent) 22%, white);
            --accent-dark: color-mix(in srgb, var(--accent) 82%, black);

            --paper: #fbf8f3;
            --paper-dark: #f2ece3;
            --white: #ffffff;
            --ink: #29252a;
            --muted: #827981;
            --line: #e5dcd5;
            --dark: #29252f;

            --font-body: 'DM Sans', sans-serif;
            --font-display: 'Playfair Display', serif;
            --font-mono: 'DM Mono', monospace;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 34px 18px;
            background: #eae5df;
            color: var(--ink);
            font-family: var(--font-body);
            font-size: 14px;
            line-height: 1.7;
        }

        a {
            color: inherit;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        a:hover {
            color: var(--accent);
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
            border: 1px solid #ded5cc;
            box-shadow: 0 18px 60px rgba(48, 37, 38, 0.09);
            overflow: hidden;
        }

        .topbar {
            min-height: 68px;
            padding: 16px 38px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid var(--line);
        }

        .brand {
            font-family: var(--font-display);
            font-size: 21px;
            font-weight: 600;
            color: var(--accent);
        }

        .brand-mark {
            display: inline-block;
            margin-right: 7px;
            font-size: 13px;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 22px;
        }

        .nav a {
            font-family: var(--font-mono);
            font-size: 10px;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .hero {
            display: grid;
            grid-template-columns: 0.8fr 1.5fr 0.8fr;
            align-items: center;
            gap: 32px;
            padding: 66px 46px 58px;
            border-bottom: 1px solid var(--line);
        }

        .hero-note {
            font-family: var(--font-mono);
            font-size: 10px;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            color: var(--muted);
        }

        .hero-note strong {
            display: block;
            margin-top: 9px;
            color: var(--accent);
            font-weight: 500;
        }

        .portrait-wrap {
            width: 100%;
            max-width: 205px;
            margin: 0 auto;
            padding: 10px 10px 24px;
            background: var(--white);
            border: 1px solid #e3d9d0;
            box-shadow: 0 8px 18px rgba(45, 33, 33, 0.1);
            transform: rotate(-3deg);
            position: relative;
        }

        .portrait-wrap::before {
            content: "";
            position: absolute;
            width: 65px;
            height: 18px;
            left: 50%;
            top: -9px;
            transform: translateX(-50%) rotate(2deg);
            background: rgba(225, 198, 157, 0.7);
            z-index: 2;
        }

        .portrait {
            width: 100%;
            aspect-ratio: 4 / 5;
            object-fit: cover;
            background: var(--paper-dark);
        }

        .portrait-placeholder {
            width: 100%;
            aspect-ratio: 4 / 5;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--accent-soft);
            color: var(--accent);
            font-family: var(--font-display);
            font-size: 72px;
        }

        .portrait-caption {
            margin-top: 10px;
            text-align: center;
            font-family: var(--font-mono);
            font-size: 9px;
            color: var(--muted);
        }

        .hero-center {
            text-align: center;
        }

        .eyebrow {
            margin: 0 0 14px;
            color: var(--accent);
            font-family: var(--font-mono);
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        h1, h2, h3, p {
            margin-top: 0;
        }

        .hero h1 {
            margin-bottom: 15px;
            font-family: var(--font-display);
            font-size: clamp(34px, 5vw, 61px);
            line-height: 1.13;
            font-weight: 500;
            overflow-wrap: anywhere;
        }

        .hero-description {
            max-width: 440px;
            margin: 0 auto;
            color: var(--muted);
            font-size: 14px;
        }

        .hero-side {
            padding-left: 22px;
            border-left: 1px solid var(--line);
        }

        .side-label {
            margin-bottom: 6px;
            font-family: var(--font-mono);
            font-size: 9px;
            letter-spacing: 1px;
            color: var(--muted);
            text-transform: uppercase;
        }

        .side-value {
            margin-bottom: 20px;
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .section-label {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0 0 20px;
            color: var(--accent);
            font-family: var(--font-mono);
            font-size: 10px;
            letter-spacing: 1.6px;
            text-transform: uppercase;
        }

        .section-label::after {
            content: "";
            height: 1px;
            flex: 1;
            background: var(--line);
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            border-bottom: 1px solid var(--line);
        }

        .panel {
            min-width: 0;
            padding: 38px 40px;
        }

        .about-panel,
        .skills-panel {
            border-bottom: 1px solid var(--line);
        }

        .about-panel,
        .education-panel {
            border-right: 1px solid var(--line);
        }

        .section-heading {
            margin-bottom: 15px;
            font-family: var(--font-display);
            font-size: 27px;
            line-height: 1.3;
            font-weight: 500;
        }

        .body-copy {
            color: #625a60;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .empty-note {
            color: var(--muted);
            font-size: 12px;
            font-style: italic;
        }

        .skill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .skill-tag {
            padding: 7px 12px;
            border: 1px solid var(--accent-medium);
            background: var(--accent-soft);
            color: var(--accent-dark);
            font-size: 11px;
            border-radius: 2px;
        }

        .entry {
            padding: 0 0 20px;
            margin-bottom: 20px;
            border-bottom: 1px dashed var(--line);
        }

        .entry:last-child {
            padding-bottom: 0;
            margin-bottom: 0;
            border-bottom: 0;
        }

        .entry-title {
            margin-bottom: 4px;
            font-size: 14px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .entry-meta {
            margin-bottom: 8px;
            color: var(--accent);
            font-family: var(--font-mono);
            font-size: 10px;
            overflow-wrap: anywhere;
        }

        .entry-description {
            margin-bottom: 0;
            color: #71666d;
            font-size: 12px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .projects-panel {
            padding: 42px 40px;
            border-bottom: 1px solid var(--line);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .project-card {
            min-width: 0;
            padding: 22px;
            background: var(--white);
            border: 1px solid var(--line);
            transition: border-color 0.2s ease, transform 0.2s ease;
        }

        .project-card:hover {
            border-color: var(--accent-medium);
            transform: translateY(-3px);
        }

        .project-number {
            margin-bottom: 16px;
            color: var(--accent);
            font-family: var(--font-mono);
            font-size: 10px;
        }

        .project-title {
            margin-bottom: 10px;
            font-family: var(--font-display);
            font-size: 21px;
            font-weight: 500;
            line-height: 1.35;
            overflow-wrap: anywhere;
        }

        .project-description {
            margin-bottom: 14px;
            color: #71666d;
            font-size: 12px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .project-link {
            display: inline-block;
            color: var(--accent);
            font-family: var(--font-mono);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .additional-panel {
            padding: 38px 40px;
            border-bottom: 1px solid var(--line);
        }

        .additional-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .additional-item {
            padding: 15px;
            background: var(--accent-soft);
            border-left: 2px solid var(--accent);
            overflow-wrap: anywhere;
        }

        .contact {
            padding: 48px 40px;
            background: var(--dark);
            color: #f8f2ed;
        }

        .contact .section-label {
            color: #e2bdce;
        }

        .contact .section-label::after {
            background: rgba(255, 255, 255, 0.2);
        }

        .contact-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 35px;
            align-items: start;
        }

        .contact h2 {
            margin-bottom: 12px;
            font-family: var(--font-display);
            font-size: clamp(28px, 4vw, 42px);
            font-weight: 500;
            line-height: 1.2;
        }

        .contact-copy {
            max-width: 420px;
            color: #c7bdc6;
            font-size: 12px;
        }

        .contact-list {
            display: grid;
            gap: 12px;
        }

        .contact-item {
            padding-bottom: 11px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            overflow-wrap: anywhere;
        }

        .contact-label {
            display: block;
            margin-bottom: 4px;
            color: #c9a7ba;
            font-family: var(--font-mono);
            font-size: 9px;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .contact-item a,
        .contact-item span {
            font-size: 12px;
        }

        .contact a:hover {
            color: #e7c5d6;
        }

        .footer {
            padding: 18px 38px;
            display: flex;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            color: var(--muted);
            font-family: var(--font-mono);
            font-size: 9px;
            letter-spacing: 0.6px;
        }

        .footer strong {
            color: var(--accent);
            font-weight: 500;
        }

        /*
        |--------------------------------------------------------------------------
        | Cards layout
        |--------------------------------------------------------------------------
        */
        .layout-cards .content-grid {
            gap: 16px;
            padding: 18px;
            border-bottom: 1px solid var(--line);
        }

        .layout-cards .panel {
            padding: 28px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: var(--white);
        }

        .layout-cards .projects-panel {
            padding: 34px;
        }

        .layout-cards .project-card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(45, 33, 33, 0.035);
        }

        .layout-cards .additional-item {
            border-radius: 8px;
        }

        .layout-cards .hero {
            background: var(--white);
        }

        /*
        |--------------------------------------------------------------------------
        | Editorial layout
        |--------------------------------------------------------------------------
        */
        .layout-editorial .hero {
            grid-template-columns: 0.7fr 1.7fr 0.6fr;
            padding-top: 78px;
            padding-bottom: 78px;
        }

        .layout-editorial .hero-center {
            text-align: left;
        }

        .layout-editorial .hero-description {
            margin-left: 0;
        }

        .layout-editorial .hero h1,
        .layout-editorial .section-heading,
        .layout-editorial .project-title {
            font-family: var(--font-display);
        }

        .layout-editorial .content-grid {
            grid-template-columns: 1fr;
        }

        .layout-editorial .panel {
            border-right: 0;
            border-bottom: 1px solid var(--line);
        }

        .layout-editorial .projects-grid {
            grid-template-columns: 1fr;
        }

        .layout-editorial .project-card {
            display: grid;
            grid-template-columns: 55px 1fr;
            column-gap: 15px;
            align-items: start;
        }

        .layout-editorial .project-number {
            grid-row: 1 / span 3;
        }

        .layout-editorial .project-title {
            margin-bottom: 8px;
        }

        .layout-editorial .project-description {
            margin-bottom: 10px;
        }

        .layout-editorial .additional-list {
            grid-template-columns: 1fr;
        }

        @media (max-width: 850px) {
            body {
                padding: 16px 10px;
            }

            .topbar {
                padding: 18px 24px;
                align-items: flex-start;
                flex-direction: column;
            }

            .nav {
                justify-content: flex-start;
                gap: 15px;
            }

            .hero,
            .layout-editorial .hero {
                grid-template-columns: 1fr;
                gap: 28px;
                padding: 42px 26px;
                text-align: center;
            }

            .portrait-wrap {
                max-width: 180px;
            }

            .hero-center,
            .layout-editorial .hero-center {
                text-align: center;
            }

            .hero-description,
            .layout-editorial .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-side {
                padding: 22px 0 0;
                border-left: 0;
                border-top: 1px solid var(--line);
            }

            .side-value {
                margin-bottom: 12px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .panel,
            .layout-cards .panel {
                padding: 28px 24px;
            }

            .about-panel,
            .education-panel {
                border-right: 0;
            }

            .projects-panel,
            .additional-panel,
            .contact {
                padding: 32px 24px;
            }

            .projects-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .contact-inner {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .layout-cards .content-grid {
                padding: 12px;
                gap: 12px;
            }
        }

        @media (max-width: 520px) {
            body {
                padding: 0;
            }

            .portfolio {
                border-left: 0;
                border-right: 0;
            }

            .topbar {
                padding: 18px;
            }

            .nav {
                gap: 12px;
            }

            .nav a {
                font-size: 9px;
            }

            .hero {
                padding: 36px 20px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .projects-grid,
            .additional-list {
                grid-template-columns: 1fr;
            }

            .layout-editorial .project-card {
                grid-template-columns: 38px 1fr;
                padding: 16px;
            }

            .footer {
                padding: 18px 20px;
                flex-direction: column;
            }
        }

        @media print {
            body {
                padding: 0;
                background: white;
            }

            .portfolio {
                max-width: none;
                border: 0;
                box-shadow: none;
            }

            .project-card {
                break-inside: avoid;
            }

            a {
                text-decoration: none;
            }
        }
    </style>
</head>

<body>
    <main class="portfolio layout-{{ $layout }}">

        {{-- Navigation --}}
        <header class="topbar">
            <a href="#home" class="brand">
                <span class="brand-mark">✳</span>{{ $fullName }}
            </a>

            <nav class="nav" aria-label="Main navigation">
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#education">Education</a>
                <a href="#experience">Experience</a>
                <a href="#projects">Projects</a>
                <a href="#contact">Contact</a>
            </nav>
        </header>

        {{-- Hero --}}
        <section class="hero" id="home">
            <div class="hero-note">
                Personal portfolio
                <strong>Selected works &amp; experiences</strong>
            </div>

            <div class="hero-center">
                <div class="portrait-wrap">
                    @if ($profilePicture)
                        <img
                            class="portrait"
                            src="{{ \Illuminate\Support\Facades\Storage::url($profilePicture) }}"
                            alt="{{ $fullName }}'s profile picture"
                        >
                    @else
                        <div class="portrait-placeholder">
                            {{ strtoupper(substr($fullName, 0, 1)) }}
                        </div>
                    @endif

                    <div class="portrait-caption">a little about me</div>
                </div>

                <p class="eyebrow">Hello, and welcome</p>

                <h1>{{ $fullName }}</h1>

                <p class="hero-description">
                    {{ $aboutMe ?: 'A little space to introduce myself, share my experiences, and showcase the things I create.' }}
                </p>
            </div>

            <div class="hero-side">
                <p class="side-label">Based in</p>
                <p class="side-value">{{ $address ?: 'Location not specified' }}</p>

                <p class="side-label">Currently exploring</p>
                <p class="side-value">Ideas, creativity, and new opportunities.</p>

                @if ($email)
                    <p class="side-label">Say hello</p>
                    <p class="side-value">
                        <a href="mailto:{{ $email }}">{{ $email }}</a>
                    </p>
                @endif
            </div>
        </section>

        {{-- About and Skills --}}
        <div class="content-grid">
            <section class="panel about-panel" id="about">
                <p class="section-label">01 / About me</p>
                <h2 class="section-heading">The person behind the work.</h2>

                @if ($aboutMe)
                    <p class="body-copy">{{ $aboutMe }}</p>
                @else
                    <p class="empty-note">
                        No introduction has been added yet.
                    </p>
                @endif
            </section>

            <section class="panel skills-panel" id="skills">
                <p class="section-label">02 / Skills</p>
                <h2 class="section-heading">Things I work with.</h2>

                @if (count($skills))
                    <div class="skill-list">
                        @foreach ($skills as $skill)
                            @php
                                $skillName = $getValue(
                                    $skill,
                                    ['name', 'skill', 'title'],
                                    ''
                                );
                            @endphp

                            @if (trim((string) $skillName) !== '')
                                <span class="skill-tag">{{ $skillName }}</span>
                            @endif
                        @endforeach
                    </div>
                @else
                    <p class="empty-note">No skills have been added yet.</p>
                @endif
            </section>

            {{-- Education --}}
            <section class="panel education-panel" id="education">
                <p class="section-label">03 / Education</p>
                <h2 class="section-heading">What I've learned.</h2>

                @forelse ($education as $item)
                    @php
                        $school = $getValue(
                            $item,
                            ['school', 'institution', 'name', 'title'],
                            'Educational background'
                        );

                        $degree = $getValue(
                            $item,
                            ['degree', 'course', 'program', 'qualification'],
                            ''
                        );

                        $educationDate = $getValue(
                            $item,
                            ['year', 'date', 'duration', 'period'],
                            ''
                        );

                        $educationDescription = $getValue(
                            $item,
                            ['description', 'details'],
                            ''
                        );
                    @endphp

                    <article class="entry">
                        <h3 class="entry-title">{{ $school }}</h3>

                        @if ($degree || $educationDate)
                            <p class="entry-meta">
                                {{ $degree }}
                                @if ($degree && $educationDate) · @endif
                                {{ $educationDate }}
                            </p>
                        @endif

                        @if ($educationDescription)
                            <p class="entry-description">{{ $educationDescription }}</p>
                        @endif
                    </article>
                @empty
                    <p class="empty-note">No educational background has been added yet.</p>
                @endforelse
            </section>

            {{-- Experience --}}
            <section class="panel experience-panel" id="experience">
                <p class="section-label">04 / Experience</p>
                <h2 class="section-heading">Where I've grown.</h2>

                @forelse ($experience as $item)
                    @php
                        $jobTitle = $getValue(
                            $item,
                            ['position', 'job_title', 'title', 'role'],
                            'Experience'
                        );

                        $company = $getValue(
                            $item,
                            ['company', 'organization', 'employer'],
                            ''
                        );

                        $experienceDate = $getValue(
                            $item,
                            ['duration', 'date', 'period', 'year'],
                            ''
                        );

                        $experienceDescription = $getValue(
                            $item,
                            ['description', 'responsibilities', 'details'],
                            ''
                        );
                    @endphp

                    <article class="entry">
                        <h3 class="entry-title">{{ $jobTitle }}</h3>

                        @if ($company || $experienceDate)
                            <p class="entry-meta">
                                {{ $company }}
                                @if ($company && $experienceDate) · @endif
                                {{ $experienceDate }}
                            </p>
                        @endif

                        @if ($experienceDescription)
                            <p class="entry-description">{{ $experienceDescription }}</p>
                        @endif
                    </article>
                @empty
                    <p class="empty-note">No experience has been added yet.</p>
                @endforelse
            </section>
        </div>

        {{-- Projects --}}
        <section class="projects-panel" id="projects">
            <p class="section-label">05 / Selected projects</p>
            <h2 class="section-heading">A few things I've created.</h2>

            @if (count($projects))
                <div class="projects-grid">
                    @foreach ($projects as $index => $project)
                        @php
                            $projectTitle = $getValue(
                                $project,
                                ['title', 'name', 'project_name'],
                                'Untitled project'
                            );

                            $projectDescription = $getValue(
                                $project,
                                ['description', 'details', 'about'],
                                ''
                            );

                            $projectLink = $getValue(
                                $project,
                                ['url', 'link', 'project_url'],
                                ''
                            );
                        @endphp

                        <article class="project-card">
                            <p class="project-number">
                                PROJECT / {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </p>

                            <h3 class="project-title">{{ $projectTitle }}</h3>

                            @if ($projectDescription)
                                <p class="project-description">{{ $projectDescription }}</p>
                            @endif

                            @if (filter_var($projectLink, FILTER_VALIDATE_URL))
                                <a
                                    class="project-link"
                                    href="{{ $projectLink }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    View project ↗
                                </a>
                            @endif
                        </article>
                    @endforeach
                </div>
            @else
                <p class="empty-note">No projects have been added yet.</p>
            @endif
        </section>

        {{-- Additional information --}}
        @if (count($additionalInfo))
            <section class="additional-panel">
                <p class="section-label">06 / More about me</p>
                <h2 class="section-heading">A few more details.</h2>

                <div class="additional-list">
                    @foreach ($additionalInfo as $item)
                        @php
                            $additionalTitle = $getValue(
                                $item,
                                ['title', 'name', 'label'],
                                ''
                            );

                            $additionalDescription = $getValue(
                                $item,
                                ['description', 'details', 'value'],
                                ''
                            );
                        @endphp

                        <div class="additional-item">
                            @if ($additionalTitle)
                                <strong>{{ $additionalTitle }}</strong>
                            @endif

                            @if ($additionalDescription)
                                <p style="margin: 6px 0 0;">
                                    {{ $additionalDescription }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Contact --}}
        <section class="contact" id="contact">
            <p class="section-label">07 / Get in touch</p>

            <div class="contact-inner">
                <div>
                    <h2>Let's make something meaningful.</h2>

                    <p class="contact-copy">
                        Thank you for taking the time to explore my portfolio.
                        Feel free to reach out if you'd like to connect,
                        collaborate, or learn more about my work.
                    </p>
                </div>

                <div class="contact-list">
                    @if ($email)
                        <div class="contact-item">
                            <span class="contact-label">Email</span>
                            <a href="mailto:{{ $email }}">{{ $email }}</a>
                        </div>
                    @endif

                    @if ($website)
                        <div class="contact-item">
                            <span class="contact-label">Website</span>
                            <a
                                href="{{ \Illuminate\Support\Str::startsWith($website, ['http://', 'https://']) ? $website : 'https://' . $website }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                {{ $website }}
                            </a>
                        </div>
                    @endif

                    @if ($linkedin)
                        <div class="contact-item">
                            <span class="contact-label">LinkedIn</span>
                            <a
                                href="{{ \Illuminate\Support\Str::startsWith($linkedin, ['http://', 'https://']) ? $linkedin : 'https://' . $linkedin }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                {{ $linkedin }}
                            </a>
                        </div>
                    @endif

                    @if ($github)
                        <div class="contact-item">
                            <span class="contact-label">GitHub</span>
                            <a
                                href="{{ \Illuminate\Support\Str::startsWith($github, ['http://', 'https://']) ? $github : 'https://' . $github }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                {{ $github }}
                            </a>
                        </div>
                    @endif

                    @if ($address)
                        <div class="contact-item">
                            <span class="contact-label">Location</span>
                            <span>{{ $address }}</span>
                        </div>
                    @endif

                    @if (!$email && !$website && !$linkedin && !$github && !$address)
                        <p class="contact-copy">
                            Contact information has not been added yet.
                        </p>
                    @endif
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <footer class="footer">
            <span>© {{ date('Y') }} {{ $fullName }}</span>
            <span>Designed with <strong>creativity &amp; intention</strong>.</span>
        </footer>

    </main>
</body>
</html>
