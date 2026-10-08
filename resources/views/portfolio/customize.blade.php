<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customize Template</title>

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
            width: min(850px, 88%);
            margin: 45px auto 80px;
        }

        .page-header {
            margin-bottom: 35px;
        }

        .page-header h1 {
            margin: 0 0 10px;
            color: #18382a;
            font-size: 38px;
        }

        .page-header p {
            margin: 0;
            color: #526b5d;
            font-size: 15px;
            line-height: 1.7;
        }

        .form-card {
            padding: 35px;
            background: #faf8f2;
            border: 1px solid #ded8c9;
            border-radius: 12px;
        }

        .selected-template {
            margin-bottom: 35px;
            padding: 20px;
            background: #e8e3d7;
            border-radius: 10px;
        }

        .selected-template span {
            display: block;
            margin-bottom: 7px;
            color: #526b5d;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .selected-template strong {
            color: #18382a;
            font-size: 22px;
        }

        .section {
            margin-bottom: 35px;
        }

        .section:last-of-type {
            margin-bottom: 0;
        }

        .section h2 {
            margin: 0 0 18px;
            color: #18382a;
            font-size: 20px;
        }

        .section-description {
            margin: -8px 0 20px;
            color: #526b5d;
            font-size: 13px;
            line-height: 1.6;
        }

        .options {
            display: grid;
            gap: 12px;
        }

        .option {
            position: relative;
        }

        .option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .option label {
            display: block;
            padding: 17px 18px;
            background: #ffffff;
            border: 1px solid #cfc9ba;
            border-radius: 9px;
            color: #202722;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .option label strong {
            display: block;
            margin-bottom: 5px;
            color: #18382a;
            font-size: 14px;
        }

        .option label span {
            color: #526b5d;
            font-size: 12px;
            line-height: 1.5;
        }

        .option input:checked + label {
            border-color: #18382a;
            background: #e9eee9;
            box-shadow: 0 0 0 2px #18382a;
        }

        .color-options {
            grid-template-columns: repeat(3, 1fr);
        }

        .color-option label {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .color-circle {
            width: 28px;
            height: 28px;
            flex-shrink: 0;
            border-radius: 50%;
            border: 1px solid #cfc9ba;
        }

        .green {
            background: #526b5d;
        }

        .blue {
            background: #3d6fa8;
        }

        .plum {
            background: #432a46;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-top: 35px;
        }

        .back-button,
        .save-button {
            display: inline-block;
            padding: 13px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-family: 'Raleway', sans-serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            cursor: pointer;
        }

        .back-button {
            background: #e5e1d4;
            color: #18382a;
        }

        .save-button {
            border: none;
            background: #18382a;
            color: #ffffff;
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
                width: 90%;
                margin-top: 30px;
            }

            .page-header h1 {
                font-size: 30px;
            }

            .form-card {
                padding: 24px;
            }

            .color-options {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column-reverse;
            }

            .back-button,
            .save-button {
                width: 100%;
                text-align: center;
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

            <h1>Customize Template</h1>

            <p>
                Personalize the appearance of your selected portfolio template.
            </p>

        </div>


        <div class="form-card">

            <div class="selected-template">

                <span>SELECTED TEMPLATE</span>

                <strong>
                    {{ ucfirst($portfolio->template) }}
                </strong>

            </div>


            <form
                action="{{ route('portfolio.saveCustomization', $portfolio->id) }}"
                method="POST"
            >

                @csrf


                <!-- ACCENT COLOR -->

                <section class="section">

                    <h2>Accent Color</h2>

                    <p class="section-description">
                        Choose the main accent color used throughout your portfolio.
                    </p>

                    <div class="options color-options">


                        <div class="option color-option">

                            <input
                                type="radio"
                                id="green"
                                name="accent_color"
                                value="green"
                                {{ old('accent_color', $portfolio->accent_color) === 'green' ? 'checked' : '' }}
                                required
                            >

                            <label for="green">

                                <span class="color-circle green"></span>

                                <span>
                                    <strong>Forest Green</strong>
                                    Natural and professional
                                </span>

                            </label>

                        </div>


                        <div class="option color-option">

                            <input
                                type="radio"
                                id="blue"
                                name="accent_color"
                                value="blue"
                                {{ old('accent_color', $portfolio->accent_color) === 'blue' ? 'checked' : '' }}
                            >

                            <label for="blue">

                                <span class="color-circle blue"></span>

                                <span>
                                    <strong>Cool Blue</strong>
                                    Modern and polished
                                </span>

                            </label>

                        </div>


                        <div class="option color-option">

                            <input
                                type="radio"
                                id="plum"
                                name="accent_color"
                                value="plum"
                                {{ old('accent_color', $portfolio->accent_color) === 'plum' ? 'checked' : '' }}
                            >

                            <label for="plum">

                                <span class="color-circle plum"></span>

                                <span>
                                    <strong>Plum</strong>
                                    Expressive and creative
                                </span>

                            </label>

                        </div>


                    </div>

                </section>


                <!-- LAYOUT -->

                <section class="section">

                    <h2>Layout Style</h2>

                    <p class="section-description">
                        Choose how the sections of your portfolio should be presented.
                    </p>

                    <div class="options">


                        <div class="option">

                            <input
                                type="radio"
                                id="standard"
                                name="layout_style"
                                value="standard"
                                {{ old('layout_style', $portfolio->layout_style) === 'standard' ? 'checked' : '' }}
                                required
                            >

                            <label for="standard">

                                <strong>Standard</strong>

                                <span>
                                    A clean, organized layout with clear sections
                                    and comfortable spacing.
                                </span>

                            </label>

                        </div>


                        <div class="option">

                            <input
                                type="radio"
                                id="cards"
                                name="layout_style"
                                value="cards"
                                {{ old('layout_style', $portfolio->layout_style) === 'cards' ? 'checked' : '' }}
                            >

                            <label for="cards">

                                <strong>Cards</strong>

                                <span>
                                    Organizes portfolio sections into distinct
                                    visual cards.
                                </span>

                            </label>

                        </div>


                        <div class="option">

                            <input
                                type="radio"
                                id="editorial"
                                name="layout_style"
                                value="editorial"
                                {{ old('layout_style', $portfolio->layout_style) === 'editorial' ? 'checked' : '' }}
                            >

                            <label for="editorial">

                                <strong>Editorial</strong>

                                <span>
                                    Uses a more expressive arrangement inspired
                                    by magazine-style layouts.
                                </span>

                            </label>

                        </div>


                    </div>

                </section>


                <div class="actions">

                    <a
                        href="{{ route('portfolio.templates', $portfolio->id) }}"
                        class="back-button"
                    >
                        BACK
                    </a>

                    <button
                        type="submit"
                        class="save-button"
                    >
                        SAVE & GENERATE
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>