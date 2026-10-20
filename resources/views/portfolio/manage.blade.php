<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f3efe3;
            color: #202722;
            font-family: 'Raleway', sans-serif;
        }

        .navbar {
            width: 100%;
            padding: 24px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .app-logout {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background: #18382a;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-family: 'Raleway', sans-serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.8px;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(24, 56, 42, 0.18);
        }

        .logo {
            color: #18382a;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-links {
            display: flex;
            gap: 28px;
        }

        .nav-links a {
            color: #18382a;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .page {
            width: min(1100px, 86%);
            margin: 45px auto 80px;
        }

        .page-header {
            margin-bottom: 35px;
        }

        .page-header h1 {
            margin: 0 0 10px;
            color: #18382a;
            font-size: 38px;
            font-weight: 700;
        }

        .page-header p {
            margin: 0;
            color: #526b5d;
            font-size: 15px;
            line-height: 1.7;
        }

        .success-message {
            margin-bottom: 25px;
            padding: 14px 18px;
            border-radius: 10px;
            background: #dfe9df;
            color: #18382a;
            font-size: 14px;
        }

        .portfolio-list {
            display: grid;
            gap: 20px;
        }

        .portfolio-card {
            padding: 26px;
            background: #faf8f2;
            border: 1px solid #ded8c9;
            border-radius: 12px;
        }

        .portfolio-main {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 25px;
        }

        .portfolio-info h2 {
            margin: 0 0 8px;
            color: #18382a;
            font-size: 22px;
        }

        .portfolio-info p {
            margin: 5px 0;
            color: #526b5d;
            font-size: 14px;
        }

        .template-label {
            display: inline-block;
            margin-top: 12px;
            padding: 7px 12px;
            border-radius: 7px;
            background: #e5e1d4;
            color: #18382a;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .actions a,
        .actions button {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 8px;
            font-family: 'Raleway', sans-serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.7px;
            text-decoration: none;
            cursor: pointer;
        }

        .view-button {
            background: #18382a;
            color: #ffffff;
        }

        .edit-button {
            background: #dfe7df;
            color: #18382a;
        }

        .delete-button {
            background: #eadbd6;
            color: #713f32;
        }

        .empty-state {
            padding: 50px 30px;
            background: #faf8f2;
            border: 1px solid #ded8c9;
            border-radius: 12px;
            text-align: center;
        }

        .empty-state h2 {
            margin: 0 0 10px;
            color: #18382a;
            font-size: 24px;
        }

        .empty-state p {
            margin: 0 0 25px;
            color: #526b5d;
            font-size: 14px;
            line-height: 1.7;
        }

        .create-button {
            display: inline-block;
            padding: 13px 22px;
            background: #18382a;
            color: #ffffff;
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        form {
            margin: 0;
        }

        @media (max-width: 700px) {
            .navbar {
                padding: 20px 6%;
                align-items: flex-start;
                gap: 20px;
            }

            .nav-links {
                gap: 14px;
                flex-wrap: wrap;
                justify-content: flex-end;
            }

            .page {
                width: 88%;
                margin-top: 30px;
            }

            .page-header h1 {
                font-size: 30px;
            }

            .portfolio-main {
                flex-direction: column;
            }

            .actions {
                width: 100%;
            }

            .actions a,
            .actions button {
                flex: 1;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <form method="POST" action="{{ route('logout') }}" style="position: fixed; top: 20px; left: 20px; z-index: 1000; margin: 0;">
        @csrf
        <button type="submit" class="app-logout">LOG OUT</button>
    </form>

    <nav class="navbar">
        <div class="logo">
            Portfolio Generator
        </div>

        <div class="nav-links">
            <a href="{{ route('home') }}">HOME</a>
            <a href="{{ route('portfolio.create') }}">CREATE</a>
        </div>
    </nav>


    <main class="page">

        <div class="page-header">
            <h1>Manage Portfolio</h1>

            <p>
                View, edit, or delete your saved portfolio information.
            </p>
        </div>


        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div style="display:flex; justify-content:space-between; align-items:center; gap:16px; margin-bottom:22px; flex-wrap:wrap; padding-top: 24px;">
            <div style="color:#526b5d; font-size:14px;">Signed in as <strong>{{ auth()->user()->name }}</strong></div>
        </div>

        @if($portfolios->count())

            <div class="portfolio-list">

                @foreach($portfolios as $portfolio)

                    <div class="portfolio-card">

                        <div class="portfolio-main">

                            <div class="portfolio-info">

                                <h2>
                                    {{ $portfolio->full_name }}
                                </h2>

                                <p>
                                    {{ $portfolio->email }}
                                </p>

                                @if($portfolio->contact_number)
                                    <p>
                                        {{ $portfolio->contact_number }}
                                    </p>
                                @endif

                                <span class="template-label">
                                    {{ ucfirst($portfolio->template) }} Template
                                </span>

                            </div>


                            <div class="actions">

                                <a
                                    href="{{ route('portfolio.preview', $portfolio->id) }}"
                                    class="view-button"
                                >
                                    VIEW
                                </a>

                                <a
                                    href="{{ route('portfolio.edit', $portfolio->id) }}"
                                    class="edit-button"
                                >
                                    EDIT
                                </a>

                                <form method="POST" action="{{ route('portfolio.share', $portfolio->id) }}">
                                    @csrf
                                    <input type="hidden" name="is_public" value="{{ $portfolio->is_public ? 0 : 1 }}">
                                    <button type="submit" class="edit-button" style="background:#e5e1d4; color:#18382a;">
                                        {{ $portfolio->is_public ? 'DISABLE SHARE' : 'SHARE PORTFOLIO' }}
                                    </button>
                                </form>

                                @if($portfolio->is_public && $portfolio->share_token)
                                    <div style="width:100%; margin-top:12px;">
                                        <input type="text" value="{{ url('/shared/' . $portfolio->share_token) }}" readonly style="width:100%; padding:10px 12px; border:1px solid #d5d0c3; border-radius:8px; font-size:12px; background:#fff;">
                                        <button type="button" onclick="navigator.clipboard.writeText('{{ url('/shared/' . $portfolio->share_token) }}'); this.textContent='COPIED';" style="margin-top:8px;background:#18382a;color:#fff;border:none;border-radius:8px;padding:9px 12px;font-family:'Raleway',sans-serif;font-weight:700;cursor:pointer;">COPY LINK</button>
                                    </div>
                                @endif

                                <form
                                    action="{{ route('portfolio.destroy', $portfolio->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this portfolio?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-button"
                                    >
                                        DELETE
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-state">

                <h2>No portfolios yet</h2>

                <p>
                    Create your first portfolio to start building your
                    professional online presence.
                </p>

                <a
                    href="{{ route('portfolio.create') }}"
                    class="create-button"
                >
                    CREATE PORTFOLIO
                </a>

            </div>

        @endif

    </main>

</body>
</html>