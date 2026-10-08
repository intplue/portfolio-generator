<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Choose Template | Portfolio Generator</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">

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
            background: #f3efe3;
        }

        .logo {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-links {
            display: flex;
            gap: 36px;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #18382a;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: 0.2s ease;
        }

        .nav-links a:hover {
            color: #526b5d;
        }

        .page-header {
            text-align: center;
            padding: 55px 20px 35px;
        }

        .page-header h1 {
            font-size: 42px;
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 12px;
        }

        .page-header p {
            color: #526b5d;
            font-size: 15px;
            line-height: 1.7;
        }

        .templates-container {
            width: 86%;
            max-width: 1180px;
            margin: 20px auto 70px;
        }

        .templates-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .template-card {
            background: #faf8f2;
            border: 1px solid #ddd7c8;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .template-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(24, 56, 42, 0.10);
        }

        .template-preview {
            height: 285px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* SIMPLE PREVIEW */

        .simple-preview {
            background: #e9e3d3;
        }

        .simple-paper {
            width: 82%;
            height: 88%;
            background: #faf8f2;
            padding: 24px;
            box-shadow: 0 8px 20px rgba(24, 56, 42, 0.10);
        }

        .simple-paper .line-title {
            width: 45%;
            height: 8px;
            background: #18382a;
            margin-bottom: 12px;
        }

        .simple-paper .line {
            height: 5px;
            background: #c9c4b6;
            margin-bottom: 8px;
            width: 80%;
        }

        .simple-paper .line.short {
            width: 55%;
        }

        .simple-paper .section {
            margin-top: 25px;
        }

        .simple-paper .section-title {
            width: 35%;
            height: 6px;
            background: #526b5d;
            margin-bottom: 10px;
        }

        /* MODERN PREVIEW */

        .modern-preview {
            background: #dce5ed;
        }

        .modern-paper {
            width: 86%;
            height: 88%;
            background: white;
            padding: 17px;
            display: grid;
            grid-template-columns: 32% 1fr;
            gap: 13px;
            box-shadow: 0 8px 20px rgba(23, 32, 51, 0.10);
        }

        .modern-sidebar {
            background: #172033;
            padding: 14px;
        }

        .modern-sidebar .circle {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #dce5ed;
            margin-bottom: 18px;
        }

        .modern-sidebar .line {
            height: 5px;
            background: #3d6fa8;
            margin-bottom: 9px;
            width: 80%;
        }

        .modern-content {
            padding: 4px;
        }

        .modern-content .title {
            height: 10px;
            width: 70%;
            background: #172033;
            margin-bottom: 14px;
        }

        .modern-content .card-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            margin-bottom: 10px;
        }

        .modern-content .card {
            height: 48px;
            background: #eef1f3;
            border: 1px solid #dce5ed;
        }

        .modern-content .line {
            height: 5px;
            background: #b9c6d0;
            width: 85%;
            margin-bottom: 8px;
        }

        /* CREATIVE PREVIEW */

        .creative-preview {
            background: #eaded0;
        }

        .creative-paper {
            width: 88%;
            height: 88%;
            background: #f7f0e2;
            padding: 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(67, 42, 70, 0.10);
        }

        .creative-paper .shape-one {
            position: absolute;
            top: -35px;
            right: -25px;
            width: 115px;
            height: 115px;
            border-radius: 50%;
            background: #d6a63a;
        }

        .creative-paper .shape-two {
            position: absolute;
            bottom: -45px;
            left: -35px;
            width: 110px;
            height: 110px;
            background: #b85c45;
            transform: rotate(20deg);
        }

        .creative-paper .title {
            position: relative;
            width: 62%;
            height: 12px;
            background: #432a46;
            margin-bottom: 12px;
            z-index: 1;
        }

        .creative-paper .line {
            position: relative;
            height: 5px;
            background: #9c888f;
            width: 67%;
            margin-bottom: 8px;
            z-index: 1;
        }

        .creative-paper .accent {
            position: relative;
            width: 42%;
            height: 7px;
            background: #b85c45;
            margin: 25px 0 12px;
            z-index: 1;
        }

        .creative-paper .small-block {
            position: relative;
            width: 75%;
            height: 42px;
            background: #fffaf0;
            border-left: 6px solid #d6a63a;
            z-index: 1;
        }

        .template-info {
            padding: 25px 25px 27px;
        }

        .template-info h2 {
            font-size: 21px;
            margin-bottom: 8px;
            color: #18382a;
        }

        .template-info p {
            color: #526b5d;
            font-size: 13px;
            line-height: 1.65;
            min-height: 45px;
            margin-bottom: 22px;
        }

        .template-button {
            display: block;
            width: 100%;
            padding: 13px 18px;
            text-align: center;
            text-decoration: none;
            background: #18382a;
            color: #ffffff;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            transition: 0.2s ease;
        }

        .template-button:hover {
            background: #526b5d;
        }

        .back-section {
            text-align: center;
            margin-top: 35px;
        }

        .back-link {
            color: #526b5d;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .back-link:hover {
            color: #18382a;
        }

        @media (max-width: 900px) {
            .templates-grid {
                grid-template-columns: 1fr;
                max-width: 520px;
                margin: auto;
            }

            .page-header h1 {
                font-size: 34px;
            }

            .nav-links {
                gap: 18px;
            }
        }

        @media (max-width: 600px) {
            nav {
                padding: 0 5%;
            }

            .logo {
                font-size: 16px;
            }

            .nav-links a {
                font-size: 10px;
            }

            .page-header {
                padding-top: 40px;
            }

            .page-header h1 {
                font-size: 29px;
            }

            .templates-container {
                width: 90%;
            }
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo">Portfolio Generator</div>

        <div class="nav-links">
            <a href="{{ route('home') }}">HOME</a>
            <a href="{{ route('home') }}#about">ABOUT</a>
            <a href="{{ route('home') }}#help">HELP</a>
        </div>
    </nav>

    <header class="page-header">
        <h1>Choose your template.</h1>

        <p>
            Select a design that best represents your work, style, and personality.
        </p>
    </header>

    <main class="templates-container">

        <div class="templates-grid">

            <!-- SIMPLE -->
            <div class="template-card">

                <div class="template-preview simple-preview">

                    <div class="simple-paper">

                        <div class="line-title"></div>

                        <div class="line"></div>
                        <div class="line short"></div>

                        <div class="section">
                            <div class="section-title"></div>
                            <div class="line"></div>
                            <div class="line short"></div>
                        </div>

                        <div class="section">
                            <div class="section-title"></div>
                            <div class="line"></div>
                            <div class="line short"></div>
                        </div>

                    </div>

                </div>

                <div class="template-info">

                    <h2>Simple</h2>

                    <p>
                        A clean and professional layout focused on readability,
                        structure, and timeless presentation.
                    </p>

                    <a
                        href="{{ route('portfolio.simple') }}"
                        class="template-button"
                    >
                        PREVIEW TEMPLATE
                    </a>

                </div>

            </div>


            <!-- MODERN -->
            <div class="template-card">

                <div class="template-preview modern-preview">

                    <div class="modern-paper">

                        <div class="modern-sidebar">

                            <div class="circle"></div>

                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line" style="width: 60%;"></div>

                        </div>

                        <div class="modern-content">

                            <div class="title"></div>

                            <div class="card-row">
                                <div class="card"></div>
                                <div class="card"></div>
                            </div>

                            <div class="line"></div>
                            <div class="line" style="width: 70%;"></div>

                            <div class="card-row">
                                <div class="card"></div>
                                <div class="card"></div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="template-info">

                    <h2>Modern</h2>

                    <p>
                        A structured, card-based design with a polished visual
                        hierarchy for a contemporary portfolio.
                    </p>

                    <a
                        href="{{ route('portfolio.modern') }}"
                        class="template-button"
                    >
                        PREVIEW TEMPLATE
                    </a>

                </div>

            </div>


            <!-- CREATIVE -->
            <div class="template-card">

                <div class="template-preview creative-preview">

                    <div class="creative-paper">

                        <div class="shape-one"></div>
                        <div class="shape-two"></div>

                        <div class="title"></div>

                        <div class="line"></div>
                        <div class="line" style="width: 48%;"></div>

                        <div class="accent"></div>

                        <div class="small-block"></div>

                    </div>

                </div>

                <div class="template-info">

                    <h2>Creative</h2>

                    <p>
                        An expressive editorial layout using asymmetry, bold
                        accents, and visual elements to stand out.
                    </p>

                    <a
                        href="{{ route('portfolio.creative') }}"
                        class="template-button"
                    >
                        PREVIEW TEMPLATE
                    </a>

                </div>

            </div>

        </div>

        <div class="back-section">

            <a
                href="{{ route('portfolio.create') }}"
                class="back-link"
            >
                ← Back to Information
            </a>

        </div>

    </main>

</body>
</html>