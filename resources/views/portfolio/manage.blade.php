<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Portfolio | Portfolio Generator</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: #f3efe3;
            color: #18382a;
            min-height: 100vh;
        }

        nav {
            height: 76px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-links {
            display: flex;
            gap: 32px;
        }

        .nav-links a {
            text-decoration: none;
            color: #18382a;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .nav-links a:hover {
            color: #526b5d;
        }

        .page-header {
            text-align: center;
            padding: 55px 20px 35px;
        }

        .page-header h1 {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .page-header p {
            color: #526b5d;
            font-size: 14px;
            line-height: 1.7;
        }

        .manage-container {
            width: 86%;
            max-width: 950px;
            margin: 15px auto 70px;
        }

        .portfolio-card {
            background: #faf8f2;
            border: 1px solid #ddd7c8;
            border-radius: 12px;
            padding: 30px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid #ddd7c8;
        }

        .portfolio-title {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .profile-placeholder {
            width: 68px;
            height: 68px;
            border-radius: 50%;
            background: #dce3da;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #526b5d;
            font-size: 9px;
            font-weight: 700;
            text-align: center;
            flex-shrink: 0;
        }

        .portfolio-title h2 {
            font-size: 22px;
            margin-bottom: 5px;
        }

        .portfolio-title p {
            color: #526b5d;
            font-size: 12px;
        }

        .template-label {
            background: #e4e9df;
            color: #18382a;
            padding: 8px 12px;
            border-radius: 7px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.7px;
            white-space: nowrap;
        }

        .portfolio-details {
            padding: 25px 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .detail {
            background: #f2eee4;
            border-radius: 8px;
            padding: 17px;
        }

        .detail-label {
            display: block;
            color: #526b5d;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin-bottom: 7px;
        }

        .detail-value {
            color: #202722;
            font-size: 13px;
            line-height: 1.6;
        }

        .about-section {
            background: #f2eee4;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .about-section h3 {
            font-size: 13px;
            margin-bottom: 9px;
        }

        .about-section p {
            color: #526b5d;
            font-size: 12px;
            line-height: 1.7;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .action-button {
            display: inline-block;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.7px;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .view-button {
            background: #18382a;
            color: white;
        }

        .view-button:hover {
            background: #526b5d;
        }

        .edit-button {
            background: #e3dfd2;
            color: #18382a;
        }

        .edit-button:hover {
            background: #d7d1c2;
        }

        .delete-button {
            background: #eadbd6;
            color: #704137;
        }

        .delete-button:hover {
            background: #dfc9c2;
        }

        .back-section {
            text-align: center;
            margin-top: 28px;
        }

        .back-link {
            color: #526b5d;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .back-link:hover {
            color: #18382a;
        }

        .preview-note {
            margin-top: 22px;
            padding: 13px 17px;
            background: #e7ebe4;
            border-radius: 8px;
            color: #526b5d;
            font-size: 11px;
            line-height: 1.6;
            text-align: center;
        }

        @media (max-width: 700px) {
            nav {
                padding: 0 5%;
            }

            .logo {
                font-size: 16px;
            }

            .nav-links {
                gap: 14px;
            }

            .nav-links a {
                font-size: 10px;
            }

            .page-header h1 {
                font-size: 32px;
            }

            .manage-container {
                width: 90%;
            }

            .card-header {
                flex-direction: column;
            }

            .portfolio-details {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
            }

            .action-button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav>

        <div class="logo">
            Portfolio Generator
        </div>

        <div class="nav-links">

            <a href="{{ route('home') }}">
                HOME
            </a>

            <a href="{{ route('portfolio.templates') }}">
                TEMPLATES
            </a>

            <a href="{{ route('portfolio.create') }}">
                CREATE
            </a>

        </div>

    </nav>


    <header class="page-header">

        <h1>
            Manage Portfolio
        </h1>

        <p>
            View, edit, or remove your saved portfolio information.
        </p>

    </header>


    <main class="manage-container">

        <div class="portfolio-card">

            <div class="card-header">

                <div class="portfolio-title">

                    <div class="profile-placeholder">
                        PROFILE
                    </div>

                    <div>

                        <h2>
                            {{ $portfolio->full_name }}
                        </h2>

                        <p>
                            {{ $portfolio->email }}
                        </p>

                    </div>

                </div>

                <div class="template-label">
                    {{ strtoupper($portfolio->template) }} TEMPLATE
                </div>

            </div>


            <div class="portfolio-details">

                <div class="detail">

                    <span class="detail-label">
                        Contact Number
                    </span>

                    <div class="detail-value">
                        {{ $portfolio->contact_number ?: 'Not provided' }}
                    </div>

                </div>


                <div class="detail">

                    <span class="detail-label">
                        Address
                    </span>

                    <div class="detail-value">
                        {{ $portfolio->address ?: 'Not provided' }}
                    </div>

                </div>


                <div class="detail">

                    <span class="detail-label">
                        Education
                    </span>

                    <div class="detail-value">
                        {{ $portfolio->educational_background ?: 'Not provided' }}
                    </div>

                </div>


                <div class="detail">

                    <span class="detail-label">
                        Skills
                    </span>

                    <div class="detail-value">
                        {{ $portfolio->skills ?: 'Not provided' }}
                    </div>

                </div>

            </div>


            @if ($portfolio->about_me)

                <div class="about-section">

                    <h3>
                        About Me
                    </h3>

                    <p>
                        {{ $portfolio->about_me }}
                    </p>

                </div>

            @endif


            <div class="actions">

                <!-- Temporary View -->
                <a
                    href="{{ route('portfolio.preview') }}"
                    class="action-button view-button"
                >
                    VIEW PORTFOLIO
                </a>


                <!-- Temporary Edit -->
                <a
                    href="{{ route('portfolio.create') }}"
                    class="action-button edit-button"
                >
                    EDIT INFORMATION
                </a>


                <!-- Temporary Delete -->
                <a
                    href="{{ route('portfolio.manage.preview') }}"
                    class="action-button delete-button"
                    onclick="return confirm('Delete action will be connected after the database is set up.');"
                >
                    DELETE
                </a>

            </div>


            <div class="preview-note">

                This is currently a preview version. View, edit, and delete
                actions will be connected to the online database after the
                interface has been tested.

            </div>

        </div>


        <div class="back-section">

            <a
                href="{{ route('home') }}"
                class="back-link"
            >
                ← Back to Home
            </a>

        </div>

    </main>

</body>
</html>