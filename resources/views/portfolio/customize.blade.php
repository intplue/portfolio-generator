
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customize Template | Portfolio Generator</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --forest: #18382a;
            --muted-green: #526b5d;
            --cream: #f3efe3;
            --card: #faf8f2;
            --border: #ded8c9;
        }

        body {
            margin: 0;
            background: var(--cream);
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
            color: var(--forest);
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-links {
            display: flex;
            gap: 28px;
        }

        .nav-links a {
            color: var(--forest);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .nav-links a:hover {
            opacity: 0.7;
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
            color: var(--forest);
            font-size: 38px;
        }

        .page-header p {
            margin: 0;
            color: var(--muted-green);
            font-size: 15px;
            line-height: 1.7;
        }

        .form-card {
            padding: 35px;
            background: var(--card);
            border: 1px solid var(--border);
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
            color: var(--muted-green);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .selected-template strong {
            color: var(--forest);
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
            color: var(--forest);
            font-size: 20px;
        }

        .section-description {
            margin: -8px 0 20px;
            color: var(--muted-green);
            font-size: 13px;
            line-height: 1.6;
        }

        .options {
            display: grid;
            gap: 12px;
        }

        .option {
            position: relative;
            min-width: 0;
        }

        .option input[type="radio"] {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
        }

        .option label {
            display: block;
            height: 100%;
            padding: 17px 18px;
            background: #fff;
            border: 1px solid #cfc9ba;
            border-radius: 9px;
            color: #202722;
            cursor: pointer;
            transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
        }

        .option label strong {
            display: block;
            margin-bottom: 5px;
            color: var(--forest);
            font-size: 14px;
        }

        .option label span {
            color: var(--muted-green);
            font-size: 12px;
            line-height: 1.5;
        }

        .option input[type="radio"]:checked + label {
            border-color: var(--forest);
            background: #e9eee9;
            box-shadow: 0 0 0 2px var(--forest);
        }

        .option input[type="radio"]:focus-visible + label {
            outline: 3px solid #8b9d90;
            outline-offset: 4px;
        }

        .color-options {
            grid-template-columns: repeat(3, minmax(0, 1fr));
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

        .custom-color-option label {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .custom-color-content {
            flex: 1;
            min-width: 110px;
        }

        .custom-color-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 13px;
        }

        input[type="color"] {
            width: 45px;
            height: 38px;
            padding: 3px;
            background: #fff;
            border: 1px solid #cfc9ba;
            border-radius: 7px;
            cursor: pointer;
        }

        .hex-value {
            color: #202722;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .color-help {
            display: block;
            margin-top: 10px;
            color: var(--muted-green);
            font-size: 11px;
            line-height: 1.5;
        }

        .validation-errors {
            margin-bottom: 25px;
            padding: 16px 20px;
            background: #fff0ed;
            border: 1px solid #dba49b;
            border-radius: 9px;
            color: #8b3027;
            font-size: 13px;
            line-height: 1.7;
        }

        .validation-errors ul {
            margin: 8px 0 0;
            padding-left: 20px;
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
            text-align: center;
        }

        .back-button {
            background: #e5e1d4;
            color: var(--forest);
        }

        .save-button {
            border: none;
            background: var(--forest);
            color: #fff;
        }

        .back-button:hover,
        .save-button:hover {
            opacity: 0.85;
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
            }
        }
    </style>
</head>

<body>
    @php
        $savedAccent = old('accent_color', $portfolio->accent_color ?? 'green');

        $presets = [
            'green' => '#526b5d',
            'blue' => '#3d6fa8',
            'plum' => '#432a46',
        ];

        $isCustomColor = is_string($savedAccent)
            && preg_match('/^#[0-9a-fA-F]{6}$/', $savedAccent) === 1;

        $customColor = $isCustomColor
            ? $savedAccent
            : old('custom_color', '#8b1e3f');

        $selectedAccent = $isCustomColor ? 'custom' : $savedAccent;
        $selectedLayout = old('layout_style', $portfolio->layout_style ?? 'standard');
    @endphp

    <nav class="navbar">
        <div class="logo">Portfolio Generator</div>

        <div class="nav-links">
            <a href="{{ route('home') }}">HOME</a>
            <a href="{{ route('portfolio.manage') }}">MANAGE</a>
        </div>
    </nav>

    <main class="page">
        <div class="page-header">
            <h1>Customize Template</h1>
            <p>Personalize the appearance of your selected portfolio template.</p>
        </div>

        <div class="form-card">
            <div class="selected-template">
                <span>SELECTED TEMPLATE</span>
                <strong>{{ ucfirst($portfolio->template ?? 'simple') }}</strong>
            </div>

            @if ($errors->any())
                <div class="validation-errors" role="alert">
                    <strong>Please check the following:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('portfolio.saveCustomization', $portfolio->id) }}"
                method="POST"
                id="customization-form"
            >
                @csrf

                <section class="section">
                    <h2>Accent Color</h2>

                    <p class="section-description">
                        Choose a preset or pick any custom color for your portfolio.
                    </p>

                    <div class="options color-options">
                        <div class="option color-option">
                            <input
                                type="radio"
                                id="green"
                                name="accent_color"
                                value="green"
                                {{ $selectedAccent === 'green' ? 'checked' : '' }}
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
                                {{ $selectedAccent === 'blue' ? 'checked' : '' }}
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
                                {{ $selectedAccent === 'plum' ? 'checked' : '' }}
                            >
                            <label for="plum">
                                <span class="color-circle plum"></span>
                                <span>
                                    <strong>Plum</strong>
                                    Expressive and creative
                                </span>
                            </label>
                        </div>

                        <div class="option custom-color-option">
                            <input
                                type="radio"
                                id="custom"
                                name="accent_color"
                                value="custom"
                                {{ $selectedAccent === 'custom' ? 'checked' : '' }}
                            >
                            <label for="custom">
                                <span class="color-circle" id="custom-swatch"></span>

                                <span class="custom-color-content">
                                    <strong>Custom Color</strong>
                                    Choose your own color
                                    <span class="custom-color-controls">
                                        <input
                                            type="color"
                                            id="custom_color"
                                            name="custom_color"
                                            value="{{ $customColor }}"
                                            aria-label="Choose a custom accent color"
                                        >
                                        <span class="hex-value" id="hex-value">{{ strtoupper($customColor) }}</span>
                                    </span>
                                    <span class="color-help">
                                        Selecting a custom color will use this color for your portfolio.
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                </section>

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
                                {{ $selectedLayout === 'standard' ? 'checked' : '' }}
                                required
                            >
                            <label for="standard">
                                <strong>Standard</strong>
                                <span>
                                    A clean, organized layout with clear sections and comfortable spacing.
                                </span>
                            </label>
                        </div>

                        <div class="option">
                            <input
                                type="radio"
                                id="cards"
                                name="layout_style"
                                value="cards"
                                {{ $selectedLayout === 'cards' ? 'checked' : '' }}
                            >
                            <label for="cards">
                                <strong>Cards</strong>
                                <span>
                                    Organizes portfolio sections into distinct visual cards.
                                </span>
                            </label>
                        </div>

                        <div class="option">
                            <input
                                type="radio"
                                id="editorial"
                                name="layout_style"
                                value="editorial"
                                {{ $selectedLayout === 'editorial' ? 'checked' : '' }}
                            >
                            <label for="editorial">
                                <strong>Editorial</strong>
                                <span>
                                    Uses a more expressive arrangement inspired by magazine-style layouts.
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

                    <button type="submit" class="save-button">
                        SAVE &amp; GENERATE
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        const colorPicker = document.getElementById('custom_color');
        const customRadio = document.getElementById('custom');
        const customSwatch = document.getElementById('custom-swatch');
        const hexValue = document.getElementById('hex-value');

        function updateCustomColor() {
            const color = colorPicker.value.toUpperCase();

            customSwatch.style.backgroundColor = color;
            hexValue.textContent = color;
        }

        colorPicker.addEventListener('input', function () {
            updateCustomColor();
            customRadio.checked = true;
        });

        colorPicker.addEventListener('click', function () {
            customRadio.checked = true;
        });

        updateCustomColor();
    </script>
</body>
</html>
