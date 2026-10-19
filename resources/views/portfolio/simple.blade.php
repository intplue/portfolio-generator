<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $portfolio->full_name }} — Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @php
   
$accent = match ($portfolio->accent_color) {
    'green' => '#526b5d',
    'blue' => '#3d6fa8',
    'plum' => '#432a46',
    default => preg_match('/^#[0-9a-fA-F]{6}$/', (string) $portfolio->accent_color)
        ? $portfolio->accent_color
        : '#a46bd1',
};

$accentLight = match ($portfolio->accent_color) {
    'green' => '#e0e9e2',
    'blue' => '#e1e8ff',
    'plum' => '#f0e1fa',
    default => '#eee1ff',
};

$accentMuted = match ($portfolio->accent_color) {
    'green' => '#405849',
    'blue' => '#5265c4',
    'plum' => '#81509f',
    default => '#8752b2',
};

        $layout = $portfolio->layout_style ?? 'standard';

        $skillItems = preg_split(
            '/[,;\n]+/',
            (string) $portfolio->skills,
            -1,
            PREG_SPLIT_NO_EMPTY
        );
    @endphp

    <style>
        :root {
            --accent: {{ $accent }};
            --accent-light: {{ $accentLight }};
            --accent-muted: {{ $accentMuted }};

            --pink: #ffdce9;
            --pink-dark: #f8bfd6;
            --lavender: #eee5ff;
            --yellow: #fff0b8;
            --mint: #dcf5e9;
            --blue: #dceeff;

            --background: #fff4f8;
            --paper: #ffffff;
            --text: #30283b;
            --body-text: #625a6d;
            --muted: #8c8197;
            --border: #eee5f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background:
                radial-gradient(ellipse at 5% 10%, #f1e5ff 0, transparent 28%),
                radial-gradient(ellipse at 95% 40%, #ffe1ec 0, transparent 25%),
                var(--background);
            color: var(--text);
            padding: 35px 20px;
            line-height: 1.7;
        }

        a {
            color: inherit;
        }
        
        

/* Preview navigation buttons */
.preview-navigation {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    max-width: 1120px;
    margin: 20px auto;
    padding: 0 24px;
}

.preview-navigation a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 44px;
    padding: 11px 18px;
    border: 1px solid var(--accent, var(--burgundy, #526b5d));
    border-radius: 10px;
    background: var(--accent, var(--burgundy, #526b5d));
    color: #fff;
    font-family: inherit;
    font-size: 13px;
    font-weight: 700;
    line-height: 1.4;
    text-decoration: none;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
    transition: transform .2s ease, box-shadow .2s ease, opacity .2s ease;
}

.preview-navigation a:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.12);
    opacity: .9;
}

.preview-navigation a:focus-visible {
    outline: 3px solid var(--accent, var(--burgundy, #526b5d));
    outline-offset: 3px;
}

@media (max-width: 600px) {
    .preview-navigation {
        justify-content: stretch;
        padding: 0 16px;
        gap: 10px;
    }

    .preview-navigation a {
        flex: 1;
        padding: 11px 12px;
        font-size: 12px;
    }
}

@media print {
    .preview-navigation {
        display: none !important;
    }
}

 
        .portfolio {
            position: relative;
            isolation: isolate;
            width: 100%;
            max-width: 1120px;
            margin: 0 auto;
            padding: 25px;
            background: rgba(255, 255, 255, 0.82);
            border: 1px solid rgba(255, 255, 255, 0.95);
            border-radius: 30px;
            box-shadow: 0 24px 80px rgba(119, 76, 143, 0.12);
            overflow: hidden;
        }

        /* DECORATIVE DETAILS */

        .sparkle {
            position: absolute;
            z-index: -1;
            color: var(--accent);
            line-height: 1;
            user-select: none;
            pointer-events: none;
        }

        .sparkle-one {
            top: 36px;
            right: 34px;
            font-size: 35px;
            transform: rotate(12deg);
        }

        .sparkle-two {
            top: 245px;
            left: 12px;
            font-size: 24px;
            color: #f1a1c4;
        }

        .sparkle-three {
            bottom: 145px;
            right: 18px;
            font-size: 30px;
            color: #edb7d0;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            width: fit-content;
            padding: 7px 13px;
            border: 1px solid rgba(164, 107, 209, 0.16);
            border-radius: 100px;
            background: white;
            color: var(--accent-muted);
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 1.3px;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #ee8eb8;
        }

        /* PROFILE HERO */

        .profile {
            position: relative;
            display: grid;
            grid-template-columns: 210px minmax(0, 1fr);
            align-items: center;
            gap: 40px;
            padding: 48px;
            background:
                radial-gradient(circle at 88% 12%, rgba(255,255,255,.7) 0 5px, transparent 6px),
                radial-gradient(circle at 95% 78%, rgba(255,255,255,.45) 0 7px, transparent 8px),
                linear-gradient(135deg, #eee2ff, #f9e5f4 70%, #ffeaf1);
            border: 1px solid #f2e4fa;
            border-radius: 25px;
            overflow: hidden;
        }

        .profile::after {
            content: "";
            position: absolute;
            width: 200px;
            height: 200px;
            right: -75px;
            top: -95px;
            border: 30px solid rgba(255, 255, 255, 0.25);
            border-radius: 50%;
            pointer-events: none;
        }

        .profile-picture {
            position: relative;
            width: 190px;
            height: 220px;
            padding: 9px;
            background: white;
            border: 1px solid rgba(255,255,255,.9);
            border-radius: 20px;
            box-shadow: 0 12px 28px rgba(104, 71, 134, 0.15);
            transform: rotate(-3deg);
            transition: transform .25s ease;
        }

        .profile-picture:hover {
            transform: rotate(0deg) translateY(-4px);
        }

        .profile-picture img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 13px;
        }

        .photo-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            border-radius: 13px;
            background: linear-gradient(135deg, #e8dcff, #ffdeeb);
            color: var(--accent-muted);
            font-size: 3.2rem;
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
        }

        .profile-content {
            position: relative;
            z-index: 1;
            min-width: 0;
        }

        .profile-label {
            margin: 17px 0 7px;
            color: var(--accent-muted);
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .profile-name {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.4rem, 5vw, 4.5rem);
            font-weight: 800;
            letter-spacing: -2px;
            line-height: 1.08;
            overflow-wrap: anywhere;
            color: #342444;
        }

        .profile-title {
            display: inline-block;
            margin-top: 15px;
            padding: 7px 14px;
            border-radius: 10px;
            background: white;
            color: var(--accent-muted);
            font-size: 0.9rem;
            font-weight: 700;
            box-shadow: 0 3px 10px rgba(96, 65, 120, .06);
        }

        .profile-intro {
            max-width: 520px;
            margin-top: 14px;
            color: #6f607c;
            font-size: 0.92rem;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .contact {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
            margin-top: 20px;
        }

        .contact-item {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            max-width: 100%;
            padding: 8px 11px;
            border: 1px solid rgba(164, 107, 209, .12);
            border-radius: 10px;
            background: rgba(255,255,255,.78);
            color: #645670;
            font-size: 0.77rem;
            overflow-wrap: anywhere;
        }

        .contact-icon {
            color: var(--accent-muted);
            font-weight: 800;
        }

        /* SECTION GRID */

        .sections-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            align-items: start;
            gap: 20px;
            margin-top: 22px;
        }

        .section {
            min-width: 0;
            padding: 27px;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: white;
            box-shadow: 0 6px 20px rgba(89, 62, 105, 0.035);
            transition: transform .2s ease, box-shadow .2s ease;
            overflow-wrap: anywhere;
        }

        .section:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 27px rgba(89, 62, 105, 0.08);
        }

        .section-label {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 17px;
            font-family: 'Outfit', sans-serif;
            font-size: 1.03rem;
            font-weight: 800;
            color: var(--text);
        }

        .section-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 36px;
            width: 36px;
            height: 36px;
            border-radius: 12px;
            font-size: 1rem;
        }

        .icon-pink {
            background: #ffe2ed;
            color: #b95884;
        }

        .icon-purple {
            background: #eee3ff;
            color: #8054b0;
        }

        .icon-yellow {
            background: #fff2c9;
            color: #9e7a24;
        }

        .icon-mint {
            background: #ddf6e8;
            color: #3c8762;
        }

        .icon-blue {
            background: #e1efff;
            color: #507db7;
        }

        .icon-peach {
            background: #ffe8dc;
            color: #b56d4b;
        }

        .content-text,
        .about-text,
        .experience-content,
        .project-content {
            color: var(--body-text);
            font-size: 0.9rem;
            line-height: 1.95;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .about-card {
            grid-column: 1 / -1;
            background: linear-gradient(135deg, #fff, #fff5fa);
        }

        .about-text {
            font-size: 0.96rem;
        }

        .education-card {
            background: linear-gradient(145deg, #fff, #faf5ff);
        }

        .skills-card {
            background: linear-gradient(145deg, #fff, #fff6fa);
        }

        .experience-card {
            background: linear-gradient(145deg, #fff, #f4fbf7);
        }

        .projects-card {
            background: linear-gradient(145deg, #fff, #fff9e9);
        }

        /* SKILL PILLS */

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .skill {
            display: inline-flex;
            align-items: center;
            max-width: 100%;
            padding: 8px 12px;
            border: 1px solid #e9defa;
            border-radius: 10px;
            background: #f1e9ff;
            color: #74509a;
            font-size: 0.8rem;
            font-weight: 700;
            overflow-wrap: anywhere;
            transition: transform .2s ease, background .2s ease;
        }

        .skill:nth-child(4n + 2) {
            background: #ffe7ef;
            border-color: #f8d5e3;
            color: #a95178;
        }

        .skill:nth-child(4n + 3) {
            background: #e4f6eb;
            border-color: #d0ecdb;
            color: #397954;
        }

        .skill:nth-child(4n + 4) {
            background: #fff2ce;
            border-color: #f4e5b7;
            color: #8b6b24;
        }

        .skill:hover {
            transform: translateY(-2px) rotate(-1deg);
        }

        /* SOCIAL LINKS */

        .social-section {
            margin-top: 22px;
            padding: 27px;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: linear-gradient(120deg, #f4edff, #fff0f6);
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 15px;
            border: 1px solid rgba(164, 107, 209, .17);
            border-radius: 12px;
            background: white;
            color: var(--accent-muted);
            font-size: 0.84rem;
            font-weight: 800;
            text-decoration: none;
            overflow-wrap: anywhere;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .social-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(100, 70, 125, .12);
        }

        .social-note {
            color: var(--body-text);
            font-size: 0.84rem;
        }

        /* ADDITIONAL INFORMATION */

        .additional-card {
            margin-top: 20px;
            background: linear-gradient(135deg, #fff9e9, #fff);
        }

        /* FOOTER */

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 24px;
            padding: 20px 8px 5px;
            color: var(--muted);
            font-size: 0.75rem;
        }

        .footer-name {
            color: var(--accent-muted);
            font-weight: 800;
        }

        .footer-message {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .footer-heart {
            color: #e887b1;
        }

        /* OPTIONAL EXISTING LAYOUT SETTINGS */

        .layout-cards .section,
        .layout-cards .social-section {
            border-radius: 22px;
        }

        .layout-editorial .profile {
            grid-template-columns: minmax(0, 1fr) 210px;
        }

        .layout-editorial .profile-picture {
            order: 2;
        }

        .layout-editorial .profile-content {
            order: 1;
        }

        .layout-editorial .about-card {
            grid-column: auto;
        }

        /* RESPONSIVE */

        @media (max-width: 760px) {
            body {
                padding: 14px 10px;
            }

            .portfolio {
                padding: 12px;
                border-radius: 23px;
            }

            .profile,
            .layout-editorial .profile {
                grid-template-columns: 1fr;
                justify-items: center;
                gap: 22px;
                padding: 32px 20px;
                text-align: center;
            }

            .profile-picture,
            .layout-editorial .profile-picture {
                order: 1;
                width: 155px;
                height: 180px;
            }

            .profile-content,
            .layout-editorial .profile-content {
                order: 2;
                width: 100%;
            }

            .profile-label {
                margin-top: 8px;
            }

            .profile-name {
                font-size: clamp(2.3rem, 10vw, 3.4rem);
                letter-spacing: -1.5px;
            }

            .profile-intro {
                margin-left: auto;
                margin-right: auto;
            }

            .contact {
                justify-content: center;
            }

            .contact-item {
                justify-content: center;
                text-align: left;
            }

            .sections-grid {
                grid-template-columns: 1fr;
                gap: 14px;
                margin-top: 14px;
            }

            .about-card {
                grid-column: auto;
            }

            .section,
            .social-section {
                padding: 22px;
                border-radius: 17px;
            }

            .social-section {
                margin-top: 14px;
            }

            .footer {
                flex-direction: column;
                text-align: center;
            }

            .sparkle-one {
                top: 15px;
                right: 16px;
                font-size: 27px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition: none !important;
            }
        }

        /* PRINT */

        @media print {
            body {
                padding: 0;
                background: white;
            }

            .portfolio {
                max-width: none;
                padding: 0;
                border: none;
                border-radius: 0;
                box-shadow: none;
            }

            .section,
            .social-section,
            .profile {
                break-inside: avoid;
                box-shadow: none;
            }

            .section:hover,
            .social-link:hover {
                transform: none;
            }

            .sparkle {
                display: none;
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

    <main class="portfolio layout-{{ $layout }}">

        <span class="sparkle sparkle-one" aria-hidden="true">✳</span>
        <span class="sparkle sparkle-two" aria-hidden="true">✦</span>
        <span class="sparkle sparkle-three" aria-hidden="true">✿</span>

        <!-- PROFILE HERO -->

        <section class="profile">
            <div class="profile-picture">
                @if ($portfolio->profile_picture)
                    <img
                        src="{{ asset('storage/' . $portfolio->profile_picture) }}"
                        alt="Profile photo of {{ $portfolio->full_name }}"
                    >
                @else
                    <div class="photo-placeholder" aria-label="Profile photo placeholder">
                        {{ strtoupper(substr($portfolio->full_name ?? 'P', 0, 1)) }}
                    </div>
                @endif
            </div>

            <div class="profile-content">
                <span class="eyebrow">
                    <span class="eyebrow-dot"></span>
                    A LITTLE INTRODUCTION
                </span>

                <p class="profile-label">HELLO, I'M</p>

                <h1 class="profile-name">
                    {{ $portfolio->full_name }}
                </h1>

                @if ($portfolio->additional_info)
                    <p class="profile-title">
                        {{ $portfolio->additional_info }}
                    </p>
                @else
                    <p class="profile-title">
                        Student · Creator · Dreamer
                    </p>
                @endif

                @if ($portfolio->about_me)
                    <p class="profile-intro">
                        {{ \Illuminate\Support\Str::limit($portfolio->about_me, 180) }}
                    </p>
                @endif

                <div class="contact">
                    @if ($portfolio->email)
                        <span class="contact-item">
                            <span class="contact-icon">@</span>
                            {{ $portfolio->email }}
                        </span>
                    @endif

                    @if ($portfolio->contact_number)
                        <span class="contact-item">
                            <span class="contact-icon">☎</span>
                            {{ $portfolio->contact_number }}
                        </span>
                    @endif

                    @if ($portfolio->address)
                        <span class="contact-item">
                            <span class="contact-icon">⌖</span>
                            {{ $portfolio->address }}
                        </span>
                    @endif
                </div>
            </div>
        </section>

        <!-- MAIN CONTENT -->

        <div class="sections-grid">

            @if ($portfolio->about_me)
                <section class="section about-card">
                    <h2 class="section-label">
                        <span class="section-icon icon-pink">♡</span>
                        A little about me
                    </h2>

                    <p class="about-text">{{ $portfolio->about_me }}</p>
                </section>
            @endif

            @if ($portfolio->educational_background)
                <section class="section education-card">
                    <h2 class="section-label">
                        <span class="section-icon icon-purple">✿</span>
                        Education
                    </h2>

                    <div class="content-text">{{ $portfolio->educational_background }}</div>
                </section>
            @endif

            @if ($portfolio->skills)
                <section class="section skills-card">
                    <h2 class="section-label">
                        <span class="section-icon icon-pink">✦</span>
                        Things I can do
                    </h2>

                    <div class="skills-list">
                        @foreach ($skillItems as $skill)
                            <span class="skill">{{ trim($skill) }}</span>
                        @endforeach
                    </div>
                </section>
            @endif

            @if ($portfolio->work_experience)
                <section class="section experience-card">
                    <h2 class="section-label">
                        <span class="section-icon icon-mint">↗</span>
                        Experience
                    </h2>

                    <div class="experience-content">{{ $portfolio->work_experience }}</div>
                </section>
            @endif

            @if ($portfolio->projects)
                <section class="section projects-card">
                    <h2 class="section-label">
                        <span class="section-icon icon-yellow">✧</span>
                        Little things I've made
                    </h2>

                    <div class="project-content">{{ $portfolio->projects }}</div>
                </section>
            @endif

        </div>

        <!-- SOCIAL LINKS -->

        @if (
            $portfolio->website ||
            $portfolio->linkedin ||
            $portfolio->github ||
            $portfolio->social_links
        )
            <section class="social-section">
                <h2 class="section-label">
                    <span class="section-icon icon-blue">♡</span>
                    Find me around the internet
                </h2>

                <div class="social-links">
                    @if ($portfolio->website)
                        <a
                            href="{{ $portfolio->website }}"
                            class="social-link"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            ↗ Website
                        </a>
                    @endif

                    @if ($portfolio->linkedin)
                        <a
                            href="{{ $portfolio->linkedin }}"
                            class="social-link"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            ↗ LinkedIn
                        </a>
                    @endif

                    @if ($portfolio->github)
                        <a
                            href="{{ $portfolio->github }}"
                            class="social-link"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            ↗ GitHub
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
            <section class="section additional-card">
                <h2 class="section-label">
                    <span class="section-icon icon-peach">✧</span>
                    More about me
                </h2>

                <div class="content-text">{{ $portfolio->additional_info }}</div>
            </section>
        @endif

        <!-- FOOTER -->

        <footer class="footer">
            <span class="footer-name">{{ $portfolio->full_name }}</span>

            <span class="footer-message">
                Made with <span class="footer-heart">♥</span> and a little creativity
                · © {{ date('Y') }}
            </span>
        </footer>

    </main>
</body>
</html>