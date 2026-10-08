
@php
    // Accent color option from the Customize page: green | plum | (anything else = blue)
    $accentKey = match ($portfolio->accent_color) {
        'green' => 'green',
        'plum'  => 'plum',
        default => 'blue',
    };

    // Layout option from the Customize page: standard | cards | editorial
    $layout = in_array($portfolio->layout_style, ['standard', 'cards', 'editorial'], true)
        ? $portfolio->layout_style
        : 'standard';

    $initial = strtoupper(mb_substr($portfolio->full_name ?? 'P', 0, 1));
    $hasSocial = $portfolio->website || $portfolio->linkedin || $portfolio->github || $portfolio->social_links;
@endphp
<!DOCTYPE html>
<html lang="en" data-accent="{{ $accentKey }}" data-layout="{{ $layout }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>{{ $portfolio->full_name }} — Modern Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;800&family=Inter:wght@400;500&display=swap" rel="stylesheet">

    <style>
        /* ---------- Color: driven by accent_color ---------- */
        :root,:root[data-accent="plum"]{--accent:#a855f7;--accent2:#6d28d9;--soft:#e2c8ff;--bg:#0a0516;--bg2:#190c33;--glow:rgba(168,85,247,.40)}
        :root[data-accent="blue"]{--accent:#5b8def;--accent2:#2f5bc4;--soft:#c3d6ff;--bg:#050b1c;--bg2:#0c1b42;--glow:rgba(91,141,239,.40)}
        :root[data-accent="green"]{--accent:#4ea37a;--accent2:#2f6f50;--soft:#bdebd3;--bg:#04100b;--bg2:#0b2b1d;--glow:rgba(78,163,122,.40)}

        /* ---------- Shape: driven by layout_style ---------- */
        :root[data-layout="cards"]{--r-card:26px;--r-chip:99px;--r-avatar:30%;--r-orbit:22%;--orbit-rot:0deg}
        :root[data-layout="standard"]{--r-card:0px;--r-chip:99px;--r-avatar:50%;--r-orbit:50%;--orbit-rot:0deg}
        :root[data-layout="editorial"]{--r-card:0px;--r-chip:0px;--r-avatar:0px;--r-orbit:0px;--orbit-rot:45deg}

        :root{color-scheme:dark;--text:#f4effd;--muted:#a99fc6;--line:rgba(255,255,255,.1);--card:rgba(255,255,255,.04);
            --display:'Sora',system-ui,sans-serif;--body:'Inter',system-ui,sans-serif}
        *{box-sizing:border-box;margin:0;padding:0}
        html{scroll-behavior:smooth;scroll-padding-top:90px}
        body{font-family:var(--body);color:var(--text);line-height:1.65;min-height:100vh;overflow-x:hidden;padding-bottom:env(safe-area-inset-bottom,0px);
            background:radial-gradient(70rem 36rem at 80% -10%,var(--glow),transparent 60%),radial-gradient(50rem 36rem at -10% 55%,var(--glow),transparent 65%),linear-gradient(180deg,var(--bg2),var(--bg) 45%) var(--bg);background-attachment:fixed}
        main{max-width:960px;margin:0 auto;padding:0 20px 80px}

        /* Floating pill nav */
        nav{position:sticky;top:calc(12px + env(safe-area-inset-top,0px));z-index:5;display:flex;align-items:center;gap:6px;margin:12px auto 48px;padding:8px 10px 8px 20px;width:fit-content;max-width:100%;
            border:1px solid var(--line);border-radius:var(--r-chip);background:rgba(255,255,255,.06);backdrop-filter:blur(14px);font-size:.85rem}
        nav b{font-family:var(--display);margin-right:8px;max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
        nav a{color:var(--muted);text-decoration:none;padding:6px 12px;border-radius:var(--r-chip);display:none}
        nav a:hover,nav a:focus-visible{color:var(--text);background:var(--card);outline:none}
        @media(min-width:720px){nav a{display:inline}}

        /* Hero */
        .hero{position:relative;display:grid;grid-template-columns:1.2fr 1fr;gap:24px;align-items:center;min-height:420px;margin-bottom:56px}
        .hero-text{position:relative;z-index:1}
        .avatar{width:88px;height:88px;border-radius:var(--r-avatar);object-fit:cover;display:grid;place-items:center;font:800 2.2rem var(--display);color:#fff;overflow:hidden;
            background:linear-gradient(145deg,var(--accent),var(--accent2));box-shadow:0 0 0 4px var(--bg),0 0 0 5px var(--accent),0 0 50px var(--glow);margin-bottom:22px}
        .avatar img{width:100%;height:100%;object-fit:cover}
        .hello{color:var(--soft)}
        h1{font-family:var(--display);font-weight:800;font-size:clamp(2.8rem,9vw,5.4rem);line-height:1;letter-spacing:-.035em;margin:6px 0 16px;overflow-wrap:anywhere;
            background:linear-gradient(120deg,#fff 20%,var(--soft) 60%,var(--accent));-webkit-background-clip:text;background-clip:text;color:transparent}
        .tag{color:var(--muted);font-size:1.1rem;max-width:36ch}
        .chips{display:flex;flex-wrap:wrap;gap:10px;margin-top:24px}
        .chips a,.chips span{color:var(--text);text-decoration:none;font-size:.85rem;padding:8px 16px;border:1px solid var(--line);border-radius:var(--r-chip);background:var(--card)}
        .chips a:hover,.chips a:focus-visible{border-color:var(--accent);box-shadow:0 0 20px var(--glow);outline:none}

        /* Orbit graphic */
        .orbit{position:relative;z-index:0;justify-self:center;width:min(100%,340px);aspect-ratio:1}
        .orbit i{position:absolute;inset:0;margin:auto;border:1px solid var(--accent);border-radius:var(--r-orbit);transform:rotate(var(--orbit-rot));box-shadow:inset 0 0 40px var(--glow),0 0 30px -10px var(--glow)}
        .orbit i:nth-child(1){width:100%;height:100%;opacity:.3}
        .orbit i:nth-child(2){width:72%;height:72%;opacity:.55}
        .orbit i:nth-child(3){width:46%;height:46%;opacity:.9;background:radial-gradient(circle,var(--glow),transparent 70%)}
        .orbit span{position:absolute;inset:0;margin:auto;width:20%;height:20%;display:grid;place-items:center;font:800 2rem var(--display);color:#fff;border-radius:var(--r-orbit);
            background:linear-gradient(145deg,var(--accent),var(--accent2));box-shadow:0 0 60px var(--accent);transform:rotate(var(--orbit-rot))}
        .orbit span b{display:block;transform:rotate(calc(var(--orbit-rot) * -1))}
        .orbit u{position:absolute;inset:0;animation:spin 24s linear infinite}
        .orbit u::after{content:"";position:absolute;top:14%;left:50%;width:12px;height:12px;margin-left:-6px;border-radius:50%;background:var(--soft);box-shadow:0 0 18px var(--soft)}
        @keyframes spin{to{transform:rotate(360deg)}}
        @media(prefers-reduced-motion:reduce){.orbit u{animation:none}html{scroll-behavior:auto}}

        /* Sections */
        .sections{display:grid;gap:20px}
        section{padding:30px;border:1px solid var(--line);border-radius:var(--r-card);background:linear-gradient(160deg,rgba(255,255,255,.07),var(--card) 60%);backdrop-filter:blur(10px);transition:transform .25s,border-color .25s,box-shadow .25s}
        h2{font-family:var(--display);font-size:1.3rem;font-weight:600;margin-bottom:16px;letter-spacing:-.01em}
        .text{color:var(--muted);max-width:68ch;white-space:pre-line}
        .pair{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:20px}
        .skills{display:flex;flex-wrap:wrap;gap:8px}
        .skills span{padding:7px 16px;font-size:.85rem;border-radius:var(--r-chip);background:color-mix(in srgb,var(--accent) 18%,transparent);border:1px solid color-mix(in srgb,var(--accent) 50%,transparent)}
        .item{display:flex;gap:16px;align-items:flex-start;padding:16px;border:1px solid var(--line);border-radius:calc(var(--r-card) * .6);background:rgba(0,0,0,.18)}
        .item::before{content:"";flex:none;width:40px;height:40px;border-radius:var(--r-avatar);background:linear-gradient(145deg,var(--accent),var(--accent2));box-shadow:0 0 24px var(--glow)}
        footer{display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap;color:var(--muted);font-size:.8rem;margin-top:40px;padding-top:18px;border-top:1px solid var(--line)}
        footer b{color:var(--soft)}

        /* Layout: Cards */
        [data-layout="cards"] section:hover{transform:perspective(900px) rotateX(2deg) translateY(-4px);border-color:var(--accent);box-shadow:0 20px 60px -20px var(--glow)}
        /* Layout: Standard */
        [data-layout="standard"] section{background:none;border:0;border-top:1px solid var(--line);padding:32px 0;backdrop-filter:none}
        [data-layout="standard"] .sections{gap:0}
        [data-layout="standard"] .item{border:0;background:none;padding:0}
        /* Layout: Editorial */
        [data-layout="editorial"] .hero{grid-template-columns:1fr}
        [data-layout="editorial"] .orbit{position:absolute;right:-60px;top:0;width:300px;opacity:.55}
        [data-layout="editorial"] h1{font-size:clamp(3.6rem,15vw,9.5rem)}
        [data-layout="editorial"] section{display:grid;grid-template-columns:200px 1fr;gap:24px;background:none;border:0;border-top:1px solid var(--line);padding:36px 0;backdrop-filter:none}
        [data-layout="editorial"] .sections{gap:0}
        [data-layout="editorial"] .pair{display:contents}
        [data-layout="editorial"] h2{color:var(--accent);align-self:start}
        [data-layout="editorial"] .item{border:0;background:none;padding:0}
        [data-layout="editorial"] .item::before{border-radius:0}
        [data-layout="editorial"] .text{font-size:1.1rem}

        @media(max-width:760px){
            .hero{grid-template-columns:1fr;min-height:0}.orbit{width:240px;order:-1}
            [data-layout="editorial"] section{grid-template-columns:1fr;gap:10px}
            [data-layout="editorial"] .orbit{display:none}
        }
    </style>
</head>
<body>
    <main>
        <nav>
            <b>{{ $portfolio->full_name }}</b>
            @if ($portfolio->about_me)<a href="#about">About</a>@endif
            @if ($portfolio->skills)<a href="#skills">Skills</a>@endif
            @if ($portfolio->work_experience)<a href="#work">Work</a>@endif
            @if ($portfolio->projects)<a href="#projects">Projects</a>@endif
            @if ($hasSocial)<a href="#online">Contact</a>@endif
        </nav>

        <header class="hero">
            <div class="hero-text">
                <div class="avatar">
                    @if ($portfolio->profile_picture)
                        <img src="{{ asset('storage/' . $portfolio->profile_picture) }}" alt="{{ $portfolio->full_name }}">
                    @else
                        {{ $initial }}
                    @endif
                </div>
                <div class="hello">Portfolio</div>
                <h1>{{ $portfolio->full_name }}</h1>
                <p class="tag">{{ $portfolio->additional_info ?? 'Student • Developer • Designer' }}</p>
                <div class="chips">
                    @if ($portfolio->email)<a href="mailto:{{ $portfolio->email }}">{{ $portfolio->email }}</a>@endif
                    @if ($portfolio->contact_number)<span>{{ $portfolio->contact_number }}</span>@endif
                    @if ($portfolio->address)<span>{{ $portfolio->address }}</span>@endif
                </div>
            </div>
            <div class="orbit" aria-hidden="true">
                <i></i><i></i><i></i><u></u>
                <span><b>{{ $initial }}</b></span>
            </div>
        </header>

        <div class="sections">
            @if ($portfolio->about_me)
                <section id="about">
                    <h2>About me</h2>
                    <p class="text">{{ $portfolio->about_me }}</p>
                </section>
            @endif

            @if ($portfolio->educational_background || $portfolio->skills)
                <div class="pair">
                    @if ($portfolio->educational_background)
                        <section id="education">
                            <h2>Education</h2>
                            <div class="item"><p class="text">{{ $portfolio->educational_background }}</p></div>
                        </section>
                    @endif

                    @if ($portfolio->skills)
                        <section id="skills">
                            <h2>Skills</h2>
                            <div class="skills">
                                @foreach (preg_split('/[,;\n]+/', $portfolio->skills) as $skill)
                                    @if (trim($skill))
                                        <span>{{ trim($skill) }}</span>
                                    @endif
                                @endforeach
                            </div>
                        </section>
                    @endif
                </div>
            @endif

            @if ($portfolio->work_experience)
                <section id="work">
                    <h2>Work experience</h2>
                    <div class="item"><p class="text">{{ $portfolio->work_experience }}</p></div>
                </section>
            @endif

            @if ($portfolio->projects)
                <section id="projects">
                    <h2>Projects</h2>
                    <div class="item"><p class="text">{{ $portfolio->projects }}</p></div>
                </section>
            @endif

            @if ($portfolio->additional_info)
                <section id="additional">
                    <h2>Additional information</h2>
                    <p class="text">{{ $portfolio->additional_info }}</p>
                </section>
            @endif

            @if ($hasSocial)
                <section id="online">
                    <h2>Find me online</h2>
                    <div class="chips" style="margin-top:0">
                        @if ($portfolio->website)<a href="{{ $portfolio->website }}" target="_blank" rel="noopener">Website</a>@endif
                        @if ($portfolio->linkedin)<a href="{{ $portfolio->linkedin }}" target="_blank" rel="noopener">LinkedIn</a>@endif
                        @if ($portfolio->github)<a href="{{ $portfolio->github }}" target="_blank" rel="noopener">GitHub</a>@endif
                        @if ($portfolio->social_links)<span>{{ $portfolio->social_links }}</span>@endif
                    </div>
                </section>
            @endif
        </div>

        <footer>
            <b>{{ $portfolio->full_name }}</b>
            <span>© {{ date('Y') }} • Portfolio</span>
        </footer>
    </main>
</body>
</html>
