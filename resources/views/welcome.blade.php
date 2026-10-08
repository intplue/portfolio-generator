@php
    // Pass a $portfolio array from your controller to override any of these.
    $p = array_merge([
        'name'       => 'sadas',
        'tagline'    => 'Designer and developer building clean, fast, thoughtful interfaces.',
        'contacts'   => [['sadasdas@dasdas', 'mailto:sadasdas@dasdas'], ['dsa', '#'], ['dasdasdas', '#']],
        'photo'      => null,
        'about'      => 'Write a short introduction about who you are, what you do, and what you care about building.',
        'education'  => [['title' => 'Your degree or course', 'text' => 'School name, 2020 – 2024']],
        'skills'     => ['HTML', 'CSS', 'JavaScript', 'Laravel'],
        'experience' => [['title' => 'Job title, Company', 'text' => '2023 – Present. Describe what you built and the result it had.']],
        'projects'   => [['title' => 'Project name', 'text' => 'One or two lines on what it does, what you used, and your role.']],
        'additional' => 'Languages, certifications, volunteering, or anything else worth sharing.',
        'accent'     => 'plum',    // green | blue | plum
        'layout'     => 'cards',   // standard | cards | editorial
    ], $portfolio ?? []);
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-accent="{{ $p['accent'] }}" data-layout="{{ $p['layout'] }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <title>{{ $p['name'] }} — Portfolio</title>
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;800&family=Inter:wght@400;500&display=swap" rel="stylesheet">
        <style>
            /* ---------- Color: set by the Accent option ---------- */
            :root,:root[data-accent="plum"]{--accent:#a855f7;--accent2:#6d28d9;--soft:#e2c8ff;--bg:#0a0516;--bg2:#190c33;--glow:rgba(168,85,247,.40)}
            :root[data-accent="blue"]{--accent:#5b8def;--accent2:#2f5bc4;--soft:#c3d6ff;--bg:#050b1c;--bg2:#0c1b42;--glow:rgba(91,141,239,.40)}
            :root[data-accent="green"]{--accent:#4ea37a;--accent2:#2f6f50;--soft:#bdebd3;--bg:#04100b;--bg2:#0b2b1d;--glow:rgba(78,163,122,.40)}
            /* ---------- Shape: set by the Layout option ---------- */
            :root,:root[data-layout="cards"]{--r-card:26px;--r-chip:99px;--r-avatar:30%;--r-orbit:22%;--orbit-rot:0deg}
            :root[data-layout="standard"]{--r-card:0px;--r-chip:99px;--r-avatar:50%;--r-orbit:50%;--orbit-rot:0deg}
            :root[data-layout="editorial"]{--r-card:0px;--r-chip:0px;--r-avatar:0px;--r-orbit:0px;--orbit-rot:45deg}

            :root{color-scheme:dark;--text:#f4effd;--muted:#a99fc6;--line:rgba(255,255,255,.1);--card:rgba(255,255,255,.04);
                --display:'Sora',system-ui,sans-serif;--body:'Inter',system-ui,sans-serif}
            *{box-sizing:border-box;margin:0}
            html{scroll-behavior:smooth;scroll-padding-top:90px}
            body{font-family:var(--body);color:var(--text);line-height:1.65;min-height:100vh;overflow-x:hidden;padding-bottom:env(safe-area-inset-bottom,0px);
                background:radial-gradient(70rem 36rem at 80% -10%,var(--glow),transparent 60%),radial-gradient(50rem 36rem at -10% 55%,var(--glow),transparent 65%),linear-gradient(180deg,var(--bg2),var(--bg) 45%) var(--bg);background-attachment:fixed;transition:background .4s}
            main{max-width:960px;margin:0 auto;padding:0 20px 120px}

            /* Floating pill nav */
            nav{position:sticky;top:calc(12px + env(safe-area-inset-top,0px));z-index:5;display:flex;justify-content:space-between;align-items:center;gap:12px;margin:12px auto 48px;padding:8px 10px 8px 20px;width:fit-content;max-width:100%;
                border:1px solid var(--line);border-radius:var(--r-chip);background:rgba(255,255,255,.06);backdrop-filter:blur(14px);font-size:.85rem}
            nav b{font-family:var(--display);margin-right:8px}
            nav a{color:var(--muted);text-decoration:none;padding:6px 12px;border-radius:var(--r-chip)}
            nav a:hover,nav a:focus-visible{color:var(--text);background:var(--card);outline:none}
            nav .cta{color:#fff;background:linear-gradient(135deg,var(--accent),var(--accent2))}
            nav .links{display:flex;gap:2px;flex-wrap:wrap;justify-content:flex-end}
            nav .sec{display:none}
            @media(min-width:720px){nav .sec{display:inline}}

            /* Hero with orbit */
            .hero{position:relative;display:grid;grid-template-columns:1.2fr 1fr;gap:24px;align-items:center;min-height:420px;margin-bottom:56px}
            .avatar{width:88px;height:88px;border-radius:var(--r-avatar);object-fit:cover;display:grid;place-items:center;font:800 2.2rem var(--display);color:#fff;
                background:linear-gradient(145deg,var(--accent),var(--accent2));box-shadow:0 0 0 4px var(--bg),0 0 0 5px var(--accent),0 0 50px var(--glow);margin-bottom:22px}
            .hello{color:var(--soft);font-size:1rem}
            h1{font-family:var(--display);font-weight:800;font-size:clamp(2.8rem,9vw,5.4rem);line-height:1;letter-spacing:-.035em;margin:6px 0 16px;
                background:linear-gradient(120deg,#fff 20%,var(--soft) 60%,var(--accent));-webkit-background-clip:text;background-clip:text;color:transparent;overflow-wrap:anywhere}
            .tag{color:var(--muted);font-size:1.1rem;max-width:36ch}
            .contacts{display:flex;flex-wrap:wrap;gap:10px;margin-top:24px}
            .contacts a{color:var(--text);text-decoration:none;font-size:.85rem;padding:8px 16px;border:1px solid var(--line);border-radius:var(--r-chip);background:var(--card)}
            .contacts a:hover,.contacts a:focus-visible{border-color:var(--accent);box-shadow:0 0 20px var(--glow);outline:none}
            .orbit{position:relative;justify-self:center;width:min(100%,340px);aspect-ratio:1}
            .orbit i{position:absolute;inset:0;margin:auto;border:1px solid var(--accent);border-radius:var(--r-orbit);transform:rotate(var(--orbit-rot));box-shadow:inset 0 0 40px var(--glow),0 0 30px -10px var(--glow);transition:border-radius .4s,transform .4s}
            .orbit i:nth-child(1){width:100%;height:100%;opacity:.3}
            .orbit i:nth-child(2){width:72%;height:72%;opacity:.55}
            .orbit i:nth-child(3){width:46%;height:46%;opacity:.9;background:radial-gradient(circle,var(--glow),transparent 70%)}
            .orbit span{position:absolute;inset:0;margin:auto;width:20%;height:20%;display:grid;place-items:center;font:800 2rem var(--display);color:#fff;border-radius:var(--r-orbit);
                background:linear-gradient(145deg,var(--accent),var(--accent2));box-shadow:0 0 60px var(--accent);transform:rotate(var(--orbit-rot))}
            .orbit span b{transform:rotate(calc(var(--orbit-rot) * -1));font-weight:800}
            .orbit u{position:absolute;inset:0;animation:spin 24s linear infinite}
            .orbit u::after{content:"";position:absolute;top:14%;left:50%;width:12px;height:12px;margin-left:-6px;border-radius:50%;background:var(--soft);box-shadow:0 0 18px var(--soft)}
            @keyframes spin{to{transform:rotate(360deg)}}
            @media(prefers-reduced-motion:reduce){.orbit u{animation:none}html{scroll-behavior:auto}}

            /* Sections */
            .sections{display:grid;gap:20px}
            section{padding:30px;border:1px solid var(--line);border-radius:var(--r-card);background:linear-gradient(160deg,rgba(255,255,255,.07),var(--card) 60%);backdrop-filter:blur(10px);transition:transform .25s,border-color .25s,box-shadow .25s}
            h2{font-family:var(--display);font-size:1.3rem;font-weight:600;margin-bottom:16px;letter-spacing:-.01em}
            p{color:var(--muted);max-width:68ch}
            .pair{display:grid;grid-template-columns:1fr 1fr;gap:20px}
            .skills{display:flex;flex-wrap:wrap;gap:8px;list-style:none;padding:0}
            .skills li{padding:7px 16px;font-size:.85rem;border-radius:var(--r-chip);background:color-mix(in srgb,var(--accent) 18%,transparent);border:1px solid color-mix(in srgb,var(--accent) 50%,transparent)}
            .item{display:flex;gap:16px;align-items:flex-start;padding:16px;margin-top:12px;border:1px solid var(--line);border-radius:calc(var(--r-card) * .6);background:rgba(0,0,0,.18)}
            .item:first-of-type{margin-top:0}
            .item::before{content:"";flex:none;width:40px;height:40px;border-radius:var(--r-avatar);background:linear-gradient(145deg,var(--accent),var(--accent2));box-shadow:0 0 24px var(--glow)}
            .item b{font-family:var(--display);font-weight:600;display:block;color:var(--text)}
            footer{display:flex;justify-content:space-between;color:var(--muted);font-size:.8rem;margin-top:40px;padding-top:18px;border-top:1px solid var(--line)}

            /* Layout: Cards (default) — floating glass cards that lift */
            [data-layout="cards"] section:hover{transform:perspective(900px) rotateX(2deg) translateY(-4px);border-color:var(--accent);box-shadow:0 20px 60px -20px var(--glow)}
            /* Layout: Standard — open page, circular shapes, divider lines */
            [data-layout="standard"] section{background:none;border:0;border-top:1px solid var(--line);padding:32px 0;backdrop-filter:none}
            [data-layout="standard"] .sections{gap:0}
            [data-layout="standard"] .item{border:0;background:none;padding:12px 0}
            /* Layout: Editorial — square corners, huge type, label left */
            [data-layout="editorial"] .hero{grid-template-columns:1fr}
            [data-layout="editorial"] .orbit{position:absolute;right:-60px;top:0;width:300px;opacity:.55;z-index:-1}
            [data-layout="editorial"] h1{font-size:clamp(3.6rem,15vw,9.5rem)}
            [data-layout="editorial"] section{display:grid;grid-template-columns:200px 1fr;gap:24px;background:none;border:0;border-top:1px solid var(--line);padding:36px 0;backdrop-filter:none}
            [data-layout="editorial"] .sections{gap:0}
            [data-layout="editorial"] .pair{display:contents}
            [data-layout="editorial"] h2{color:var(--accent);align-self:start}
            [data-layout="editorial"] .item{border:0;background:none;padding:0 0 16px}
            [data-layout="editorial"] .item::before{border-radius:0}
            [data-layout="editorial"] p{font-size:1.1rem}

            /* Customize panel */
            #cz{position:fixed;right:16px;bottom:calc(16px + env(safe-area-inset-bottom,0px));z-index:10;font-size:.85rem}
            #cz>button{font:600 .85rem var(--display);color:#fff;background:linear-gradient(135deg,var(--accent),var(--accent2));border:0;padding:12px 22px;border-radius:var(--r-chip);cursor:pointer;box-shadow:0 8px 30px var(--glow)}
            #panel{display:none;width:min(340px,calc(100vw - 32px));margin-bottom:12px;padding:20px;border-radius:20px;border:1px solid var(--line);background:var(--bg2);box-shadow:0 20px 60px rgba(0,0,0,.5)}
            #panel.open{display:block}
            #panel h3{font:600 .95rem var(--display);margin:14px 0 8px}#panel h3:first-child{margin-top:0}
            .opts{display:grid;gap:8px}
            .opt{display:flex;gap:10px;align-items:center;text-align:left;padding:10px 12px;border-radius:12px;border:1px solid var(--line);background:var(--card);color:var(--text);font:inherit;cursor:pointer}
            .opt small{display:block;color:var(--muted);font-size:.75rem}
            .opt[aria-pressed="true"]{border-color:var(--accent);box-shadow:0 0 0 1px var(--accent)}
            .dot{width:14px;height:14px;border-radius:50%;flex:none}
            button:focus-visible{outline:2px solid var(--accent);outline-offset:2px}

            @media(max-width:760px){
                .hero{grid-template-columns:1fr;min-height:0}.orbit{width:240px;order:-1}
                .pair{grid-template-columns:1fr}
                [data-layout="editorial"] section{grid-template-columns:1fr;gap:10px}
                [data-layout="editorial"] .orbit{display:none}
            }
        </style>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/js/app.js'])
        @endif
    </head>
    <body>
        <main>
            <nav>
                <b>{{ $p['name'] }}</b>
                <div class="links">
                    <a class="sec" href="#about">About</a>
                    <a class="sec" href="#skills">Skills</a>
                    <a class="sec" href="#work">Work</a>
                    <a class="sec" href="#projects">Projects</a>
                    @if (Route::has('login'))
                        @auth
                            <a class="cta" href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Log in</a>
                            @if (Route::has('register'))
                                <a class="cta" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>

            <header class="hero">
                <div>
                    @if ($p['photo'])
                        <img class="avatar" src="{{ $p['photo'] }}" alt="{{ $p['name'] }}">
                    @else
                        <div class="avatar" aria-hidden="true">{{ strtoupper(substr($p['name'], 0, 1)) }}</div>
                    @endif
                    <div class="hello">Hello, I'm</div>
                    <h1>{{ $p['name'] }}</h1>
                    <p class="tag">{{ $p['tagline'] }}</p>
                    <div class="contacts">
                        @foreach ($p['contacts'] as [$label, $href])
                            <a href="{{ $href }}">{{ $label }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="orbit" aria-hidden="true">
                    <i></i><i></i><i></i><u></u>
                    <span><b>{{ strtoupper(substr($p['name'], 0, 1)) }}</b></span>
                </div>
            </header>

            <div class="sections">
                <section id="about"><h2>About me</h2><p>{{ $p['about'] }}</p></section>

                <div class="pair">
                    <section id="education">
                        <h2>Education</h2>
                        @foreach ($p['education'] as $e)
                            <div class="item"><div><b>{{ $e['title'] }}</b><p>{{ $e['text'] }}</p></div></div>
                        @endforeach
                    </section>
                    <section id="skills">
                        <h2>Skills</h2>
                        <ul class="skills">
                            @foreach ($p['skills'] as $skill)
                                <li>{{ $skill }}</li>
                            @endforeach
                        </ul>
                    </section>
                </div>

                <section id="work">
                    <h2>Work experience</h2>
                    @foreach ($p['experience'] as $e)
                        <div class="item"><div><b>{{ $e['title'] }}</b><p>{{ $e['text'] }}</p></div></div>
                    @endforeach
                </section>

                <section id="projects">
                    <h2>Projects</h2>
                    @foreach ($p['projects'] as $e)
                        <div class="item"><div><b>{{ $e['title'] }}</b><p>{{ $e['text'] }}</p></div></div>
                    @endforeach
                </section>

                <section id="additional"><h2>Additional information</h2><p>{{ $p['additional'] }}</p></section>
            </div>

            <footer>
                <span>{{ $p['name'] }}</span>
                <span>© {{ date('Y') }} · Portfolio</span>
            </footer>
        </main>

        <div id="cz">
            <div id="panel" role="dialog" aria-label="Customize template">
                <h3>Accent color</h3>
                <div class="opts" data-group="accent">
                    <button class="opt" data-v="green" aria-pressed="false"><span class="dot" style="background:#4ea37a"></span><span>Forest Green<small>Natural and professional</small></span></button>
                    <button class="opt" data-v="blue" aria-pressed="false"><span class="dot" style="background:#5b8def"></span><span>Cool Blue<small>Modern and polished</small></span></button>
                    <button class="opt" data-v="plum" aria-pressed="false"><span class="dot" style="background:#a855f7"></span><span>Plum<small>Expressive and creative</small></span></button>
                </div>
                <h3>Layout style</h3>
                <div class="opts" data-group="layout">
                    <button class="opt" data-v="standard" aria-pressed="false"><span>Standard<small>Open page, round shapes</small></span></button>
                    <button class="opt" data-v="cards" aria-pressed="false"><span>Cards<small>Floating glass cards</small></span></button>
                    <button class="opt" data-v="editorial" aria-pressed="false"><span>Editorial<small>Sharp corners, huge type</small></span></button>
                </div>
            </div>
            <button id="toggle" aria-expanded="false">Customize</button>
        </div>

        <script>
            (function () {
                var root = document.documentElement;
                var panel = document.getElementById('panel'), tg = document.getElementById('toggle');
                tg.addEventListener('click', function () {
                    var o = panel.classList.toggle('open');
                    tg.setAttribute('aria-expanded', o);
                    tg.textContent = o ? 'Close' : 'Customize';
                });
                function apply(group, v, save) {
                    root.setAttribute('data-' + group, v);
                    document.querySelectorAll('[data-group="' + group + '"] .opt').forEach(function (b) {
                        b.setAttribute('aria-pressed', b.dataset.v === v);
                    });
                    if (save) { try { localStorage.setItem('pf-' + group, v); } catch (e) {} }
                }
                document.querySelectorAll('.opts').forEach(function (g) {
                    g.addEventListener('click', function (e) {
                        var b = e.target.closest('.opt'); if (b) apply(g.dataset.group, b.dataset.v, true);
                    });
                });
                var d = { accent: @json($p['accent']), layout: @json($p['layout']) };
                ['accent', 'layout'].forEach(function (k) {
                    var v = d[k];
                    try { v = localStorage.getItem('pf-' + k) || v; } catch (e) {}
                    apply(k, v, false);
                });
            })();
        </script>
    </body>
</html>
