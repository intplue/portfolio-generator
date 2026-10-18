
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Portfolios | Portfolio Generator</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        :root {
            --background: #f6f4ee;
            --surface: #fffefa;
            --surface-hover: #ffffff;
            --text: #26362c;
            --muted: #778278;
            --green: #254936;
            --green-light: #e9f0e8;
            --border: #e7e5dc;
            --lavender: #8b7ac5;
            --lavender-light: #f2effb;
            --rose: #c77e88;
            --rose-light: #fbefef;
            --radius: 18px;
            --shadow: 0 12px 35px rgba(38, 54, 44, 0.045);
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
            background: var(--background);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font: inherit;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            min-height: 82px;
            padding: 18px max(7%, calc((100% - 1120px) / 2));
            background: rgba(246, 244, 238, 0.92);
            border-bottom: 1px solid rgba(231, 229, 220, 0.9);
            backdrop-filter: blur(16px);
        }

        .logo {
            color: var(--green);
            font-family: 'Manrope', sans-serif;
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -0.6px;
            white-space: nowrap;
        }

        .logo span {
            color: var(--lavender);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-links a {
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.1px;
            transition: color 0.2s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--green);
        }

        .page {
            width: min(1050px, calc(100% - 48px));
            margin: 0 auto;
            padding: 66px 0 90px;
        }

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 32px;
        }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            color: var(--lavender);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .eyebrow::before {
            width: 22px;
            height: 1px;
            background: currentColor;
            content: '';
        }

        .page-header h1 {
            margin-bottom: 12px;
            color: var(--green);
            font-family: 'Manrope', sans-serif;
            font-size: clamp(34px, 5vw, 49px);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -2px;
        }

        .page-header p {
            max-width: 530px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        .portfolio-count {
            flex-shrink: 0;
            padding: 10px 14px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 999px;
            color: var(--green);
            font-size: 11px;
            font-weight: 700;
        }

        .success-message {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            padding: 15px 18px;
            background: var(--green-light);
            border: 1px solid #d8e5d7;
            border-radius: 12px;
            color: var(--green);
            font-size: 13px;
            line-height: 1.6;
        }

        .success-dot {
            width: 8px;
            height: 8px;
            flex-shrink: 0;
            background: #62856a;
            border-radius: 50%;
        }

        .portfolio-list {
            display: grid;
            gap: 16px;
        }

        .portfolio-card {
            padding: 27px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: border-color 0.2s ease,
                        transform 0.2s ease,
                        box-shadow 0.2s ease;
        }

        .portfolio-card:hover {
            transform: translateY(-2px);
            background: var(--surface-hover);
            border-color: #d8dfd3;
            box-shadow: 0 16px 38px rgba(38, 54, 44, 0.065);
        }

        .portfolio-main {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .portfolio-info {
            min-width: 0;
            flex: 1;
        }

        .portfolio-topline {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 9px;
        }

        .portfolio-info h2 {
            overflow-wrap: anywhere;
            color: var(--green);
            font-family: 'Manrope', sans-serif;
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .template-label {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 10px;
            background: #f0eee6;
            border: 1px solid #e8e5db;
            border-radius: 999px;
            color: #697367;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.9px;
            text-transform: uppercase;
        }

        .template-label::before {
            width: 5px;
            height: 5px;
            background: var(--lavender);
            border-radius: 50%;
            content: '';
        }

        .portfolio-email {
            overflow-wrap: anywhere;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .portfolio-contact {
            margin-top: 3px;
            color: #969d94;
            font-size: 12px;
            line-height: 1.8;
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-shrink: 0;
            gap: 9px;
        }

        .actions a,
        .actions button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            padding: 0;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--green);
            cursor: pointer;
            transition: transform 0.2s ease,
                        background 0.2s ease,
                        border-color 0.2s ease,
                        color 0.2s ease;
        }

        .actions a:hover,
        .actions button:hover {
            transform: translateY(-2px);
        }

        .actions a:focus-visible,
        .actions button:focus-visible,
        .create-button:focus-visible,
        .nav-links a:focus-visible {
            outline: 3px solid rgba(139, 122, 197, 0.35);
            outline-offset: 3px;
        }

        .actions svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.7;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .view-button:hover {
            background: var(--green-light);
            border-color: #cdddcf;
            color: var(--green);
        }

        .edit-button,
        .download-button {
            color: var(--lavender) !important;
        }

        .edit-button:hover,
        .download-button:hover {
            background: var(--lavender-light);
            border-color: #dcd4f2;
        }

        .delete-button {
            color: var(--rose) !important;
        }

        .delete-button:hover {
            background: var(--rose-light);
            border-color: #efcfd3;
        }

        .actions form {
            margin: 0;
        }

        .empty-state {
            padding: 65px 25px;
            background: var(--surface);
            border: 1px dashed #d8d9cc;
            border-radius: var(--radius);
            text-align: center;
        }

        .empty-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 62px;
            height: 62px;
            margin: 0 auto 23px;
            background: var(--green-light);
            border-radius: 20px;
            color: var(--green);
        }

        .empty-icon svg {
            width: 27px;
            height: 27px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.6;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .empty-state h2 {
            margin-bottom: 10px;
            color: var(--green);
            font-family: 'Manrope', sans-serif;
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -0.7px;
        }

        .empty-state p {
            max-width: 390px;
            margin: 0 auto 25px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.9;
        }

        .create-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 46px;
            padding: 0 20px;
            background: var(--green);
            border: 1px solid var(--green);
            border-radius: 10px;
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.7px;
            transition: background 0.2s ease,
                        transform 0.2s ease;
        }

        .create-button:hover {
            transform: translateY(-2px);
            background: #315b40;
        }

        .create-button svg {
            width: 16px;
            height: 16px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .page-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 35px;
            padding-top: 22px;
            border-top: 1px solid var(--border);
            color: #92988e;
            font-size: 11px;
        }

        .page-footer a {
            color: var(--green);
            font-weight: 700;
        }

        .page-footer a:hover {
            color: var(--lavender);
        }

        @media (max-width: 760px) {
            .navbar {
                min-height: 72px;
                padding: 17px 6%;
            }

            .nav-links {
                gap: 17px;
            }

            .page {
                width: calc(100% - 36px);
                padding-top: 45px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 18px;
            }

            .portfolio-card {
                padding: 22px;
            }

            .portfolio-main {
                align-items: flex-start;
                flex-direction: column;
                gap: 22px;
            }

            .actions {
                width: 100%;
                justify-content: flex-start;
            }

            .portfolio-count {
                align-self: flex-start;
            }
        }

        @media (max-width: 420px) {
            .logo {
                font-size: 14px;
            }

            .nav-links {
                gap: 12px;
            }

            .nav-links a {
                font-size: 10px;
            }

            .page-header h1 {
                font-size: 34px;
            }

            .portfolio-card {
                padding: 18px;
            }

            .portfolio-info h2 {
                font-size: 19px;
            }

            .page-footer {
                align-items: flex-start;
                flex-direction: column;
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
    </style>
</head>

<body>

    <nav class="navbar">
        <a class="logo" href="{{ route('home') }}">
            Portfolio Generator<span>.</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('home') }}">HOME</a>
            <a href="{{ route('portfolio.create') }}">CREATE</a>
        </div>
    </nav>

    <main class="page">

        <header class="page-header">
            <div>
                <p class="eyebrow">Your workspace</p>

                <h1>My portfolios.</h1>

                <p>
                    Everything you've created, all in one place.
                    View your work, make changes, or download a copy.
                </p>
            </div>

            @if ($portfolios->count())
                <div class="portfolio-count">
                    {{ $portfolios->count() }}
                    {{ $portfolios->count() === 1 ? 'PORTFOLIO' : 'PORTFOLIOS' }}
                </div>
            @endif
        </header>

        @if (session('success'))
            <div class="success-message" role="status">
                <span class="success-dot" aria-hidden="true"></span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($portfolios->count())

            <section class="portfolio-list" aria-label="Saved portfolios">

                @foreach ($portfolios as $portfolio)

                    <article class="portfolio-card">

                        <div class="portfolio-main">

                            <div class="portfolio-info">

                                <div class="portfolio-topline">
                                    <h2>{{ $portfolio->full_name }}</h2>

                                    <span class="template-label">
                                        {{ ucfirst($portfolio->template ?: 'simple') }}
                                    </span>
                                </div>

                                <p class="portfolio-email">
                                    {{ $portfolio->email }}
                                </p>

                                @if ($portfolio->contact_number)
                                    <p class="portfolio-contact">
                                        {{ $portfolio->contact_number }}
                                    </p>
                                @endif

                            </div>

                            <div class="actions">

                                {{-- View portfolio --}}
                                <a
                                    href="{{ route('portfolio.preview', $portfolio->id) }}"
                                    class="view-button"
                                    title="View portfolio"
                                    aria-label="View portfolio for {{ $portfolio->full_name }}"
                                >
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </a>

                                {{-- Edit portfolio --}}
                                <a
                                    href="{{ route('portfolio.edit', $portfolio->id) }}"
                                    class="edit-button"
                                    title="Edit portfolio"
                                    aria-label="Edit portfolio for {{ $portfolio->full_name }}"
                                >
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 20h9"/>
                                        <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4Z"/>
                                    </svg>
                                </a>

                                {{-- Download portfolio --}}
                                <a
                                    href="{{ route('portfolio.download', $portfolio->id) }}"
                                    class="download-button"
                                    title="Download portfolio"
                                    aria-label="Download portfolio for {{ $portfolio->full_name }}"
                                >
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                        <path d="m7 10 5 5 5-5"/>
                                        <path d="M12 15V3"/>
                                    </svg>
                                </a>

                                {{-- Delete portfolio --}}
                                <form
                                    action="{{ route('portfolio.destroy', $portfolio->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this portfolio? This action cannot be undone.');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-button"
                                        title="Delete portfolio"
                                        aria-label="Delete portfolio for {{ $portfolio->full_name }}"
                                    >
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M3 6h18"/>
                                            <path d="M8 6V4h8v2"/>
                                            <path d="m19 6-1 14H6L5 6"/>
                                            <path d="M10 11v5"/>
                                            <path d="M14 11v5"/>
                                        </svg>
                                    </button>
                                </form>

                            </div>

                        </div>

                    </article>

                @endforeach

            </section>

        @else

            <section class="empty-state">

                <div class="empty-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4z"/>
                        <path d="M8 9h8"/>
                        <path d="M8 13h5"/>
                        <path d="M8 17h3"/>
                    </svg>
                </div>

                <h2>Your story starts here.</h2>

                <p>
                    You haven't created a portfolio yet.
                    Start with your information, choose a design,
                    and build a portfolio that feels like you.
                </p>

                <a
                    href="{{ route('portfolio.create') }}"
                    class="create-button"
                >
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 5v14"/>
                        <path d="M5 12h14"/>
                    </svg>
                    CREATE YOUR FIRST PORTFOLIO
                </a>

            </section>

        @endif

        <footer class="page-footer">
            <p>Made for your next chapter.</p>

            <a href="{{ route('home') }}">Back to home ↗</a>
        </footer>

    </main>

</body>
</html>
