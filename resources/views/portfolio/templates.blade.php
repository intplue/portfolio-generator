<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Choose a Template</title>

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
            width: min(1150px, 88%);
            margin: 45px auto 80px;
        }

        .page-header {
            margin-bottom: 40px;
        }

        .page-header h1 {
            margin: 0 0 10px;
            color: #18382a;
            font-size: 38px;
        }

        .page-header p {
            margin: 0;
            max-width: 700px;
            color: #526b5d;
            font-size: 15px;
            line-height: 1.7;
        }

        .templates {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .template-card {
            overflow: hidden;
            background: #faf8f2;
            border: 1px solid #ded8c9;
            border-radius: 12px;
        }

        .template-preview {
            min-height: 300px;
            padding: 25px;
        }

        .simple-preview {
            background: #faf8f2;
        }

        .simple-preview .preview-top {
            width: 65%;
            height: 18px;
            margin-bottom: 12px;
            background: #18382a;
        }

        .simple-preview .preview-line {
            width: 90%;
            height: 7px;
            margin-bottom: 9px;
            background: #cfc9ba;
        }

        .simple-preview .preview-line.short {
            width: 55%;
        }

        .simple-preview .preview-section {
            margin-top: 35px;
            width: 100%;
            height: 55px;
            background: #e8e3d7;
        }

        .modern-preview {
            background: #eef1f3;
        }

        .modern-preview .preview-header {
            width: 100%;
            height: 55px;
            margin-bottom: 18px;
            background: #172033;
        }

        .modern-preview .preview-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .modern-preview .preview-card {
            height: 75px;
            background: #ffffff;
            border: 1px solid #dce5ed;
        }

        .modern-preview .preview-card.blue {
            background: #dce5ed;
        }

        .creative-preview {
            position: relative;
            overflow: hidden;
            background: #f7f0e2;
        }

        .creative-preview .preview-plum {
            width: 75%;
            height: 95px;
            background: #432a46;
        }

        .creative-preview .preview-orange {
            position: absolute;
            top: 80px;
            right: 25px;
            width: 100px;
            height: 100px;
            background: #b85c45;
        }

        .creative-preview .preview-yellow {
            position: absolute;
            bottom: 35px;
            left: 25px;
            width: 70px;
            height: 70px;
            background: #d6a63a;
        }

        .creative-preview .preview-text {
            width: 60%;
            height: 10px;
            margin-top: 35px;
            background: #2d2524;
        }

        .template-info {
            padding: 25px;
        }

        .template-info h2 {
            margin: 0 0 8px;
            color: #18382a;
            font-size: 22px;
        }

        .template-info p {
            min-height: 48px;
            margin: 0 0 22px;
            color: #526b5d;
            font-size: 13px;
            line-height: 1.6;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .preview-button,
        .use-button {
            flex: 1;
            display: inline-block;
            padding: 12px 10px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.8px;
        }

        .preview-button {
            background: #e5e1d4;
            color: #18382a;
        }

        .use-button {
            background: #18382a;
            color: #ffffff;
        }

        .back-link {
            display: inline-block;
            margin-top: 35px;
            color: #526b5d;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        @media (max-width: 900px) {
            .templates {
                grid-template-columns: 1fr;
            }

            .template-preview {
                min-height: 260px;
            }
        }

        @media (max-width: 600px) {
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
                width: 90%;
                margin-top: 30px;
            }

            .page-header h1 {
                font-size: 30px;
            }

            .template-info {
                padding: 20px;
            }

            .actions {
                flex-direction: column;
            }

            .preview-button,
            .use-button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="logo">
            Portfolio Generator
        </div>

        <div class="nav-links">
            <a href="{{ route('home') }}">HOME</a>
            <a href="{{ route('portfolio.manage') }}">MANAGE</a>
        </div>

    </nav>


    <main class="page">

        <div class="page-header">

            <h1>Choose a Template</h1>

            <p>
                Select a portfolio design that best represents your style and
                presentation needs.
            </p>

        </div>


        <div class="templates">


            <!-- SIMPLE -->

            <div class="template-card">

                <div class="template-preview simple-preview">

                    <div class="preview-top"></div>

                    <div class="preview-line"></div>
                    <div class="preview-line"></div>
                    <div class="preview-line short"></div>

                    <div class="preview-section"></div>

                    <div class="preview-line"></div>
                    <div class="preview-line short"></div>

                </div>


                <div class="template-info">

                    <h2>Simple</h2>

                    <p>
                        A clean and professional layout focused on
                        readability, structure, and timeless presentation.
                    </p>

                    <div class="actions">

                        <a
                            href="{{ route('portfolio.simple', $portfolio->id) }}"
                            class="preview-button"
                        >
                            PREVIEW
                        </a>

                        <a
                            href="{{ route('portfolio.simple', $portfolio->id) }}"
                            class="use-button"
                        >
                            USE THIS TEMPLATE
                        </a>

                    </div>

                </div>

            </div>


            <!-- MODERN -->

            <div class="template-card">

                <div class="template-preview modern-preview">

                    <div class="preview-header"></div>

                    <div class="preview-grid">

                        <div class="preview-card"></div>

                        <div class="preview-card blue"></div>

                        <div class="preview-card blue"></div>

                        <div class="preview-card"></div>

                    </div>

                </div>


                <div class="template-info">

                    <h2>Modern</h2>

                    <p>
                        A polished card-based layout with visual sections
                        for a structured and contemporary portfolio.
                    </p>

                    <div class="actions">

                        <a
                            href="{{ route('portfolio.modern', $portfolio->id) }}"
                            class="preview-button"
                        >
                            PREVIEW
                        </a>

                        <a
                            href="{{ route('portfolio.modern', $portfolio->id) }}"
                            class="use-button"
                        >
                            USE THIS TEMPLATE
                        </a>

                    </div>

                </div>

            </div>


            <!-- CREATIVE -->

            <div class="template-card">

                <div class="template-preview creative-preview">

                    <div class="preview-plum"></div>

                    <div class="preview-text"></div>

                    <div class="preview-orange"></div>

                    <div class="preview-yellow"></div>

                </div>


                <div class="template-info">

                    <h2>Creative</h2>

                    <p>
                        An expressive editorial-inspired design with
                        bold shapes, contrast, and an unconventional layout.
                    </p>

                    <div class="actions">

                        <a
                            href="{{ route('portfolio.creative', $portfolio->id) }}"
                            class="preview-button"
                        >
                            PREVIEW
                        </a>

                        <a
                            href="{{ route('portfolio.creative', $portfolio->id) }}"
                            class="use-button"
                        >
                            USE THIS TEMPLATE
                        </a>

                    </div>

                </div>

            </div>


        </div>


        <a
            href="{{ route('portfolio.create') }}"
            class="back-link"
        >
            ← Back to Information
        </a>

    </main>

</body>
</html>