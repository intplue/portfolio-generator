<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Portfolio Generator</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #f3efe3 0%, #e8efe9 100%);
            font-family: 'Raleway', sans-serif;
            color: #202722;
        }
        .card {
            width: min(440px, calc(100% - 32px));
            background: #faf8f2;
            border: 1px solid #d9d5cc;
            border-radius: 18px;
            padding: 36px 32px;
            box-shadow: 0 24px 60px rgba(24, 56, 42, 0.12);
        }
        .eyebrow { color: #526b5d; font-size: 11px; letter-spacing: 2.5px; text-transform: uppercase; font-weight: 700; }
        h1 { margin: 12px 0 8px; font-size: clamp(2rem, 5vw, 2.5rem); color: #18382a; }
        p { margin: 0 0 28px; color: #526b5d; line-height: 1.7; }
        form { display: grid; gap: 18px; }
        .field { display: grid; gap: 8px; }
        label { font-size: 12px; font-weight: 700; color: #18382a; }
        .password-wrap { position: relative; }
        input {
            width: 100%;
            height: 48px;
            border: 1px solid #d5d0c3;
            border-radius: 10px;
            padding: 0 46px 0 15px;
            font: inherit;
            background: #fff;
            color: #202722;
        }
        input:focus { outline: none; border-color: #526b5d; box-shadow: 0 0 0 3px rgba(82, 107, 93, 0.10); }
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #526b5d;
            cursor: pointer;
            font-weight: 700;
        }
        .row { display: flex; justify-content: space-between; align-items: center; gap: 12px; font-size: 12px; }
        .remember { display: inline-flex; align-items: center; gap: 8px; color: #526b5d; }
        .remember input { width: auto; height: auto; }
        .link { color: #18382a; text-decoration: none; font-weight: 700; }
        .submit {
            margin-top: 6px;
            height: 48px;
            border: none;
            border-radius: 10px;
            background: #18382a;
            color: white;
            font: 700 12px 'Raleway', sans-serif;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            cursor: pointer;
        }
        .submit:disabled { opacity: .7; cursor: wait; }
        .error { color: #a44835; font-size: 12px; margin-top: -4px; }
        .alt { margin-top: 18px; text-align: center; color: #526b5d; font-size: 14px; }
        @media (max-width: 500px) { .card { padding: 28px 22px; } }
    </style>
</head>
<body>
    <main class="card">
        <div class="eyebrow">Welcome back</div>
        <h1>Log in</h1>
        <p>Access your private portfolio dashboard and edit your published portfolio.</p>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf
            <div class="field">
                <label for="email">Email address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <div class="password-wrap">
                    <input id="password" type="password" name="password" required>
                    <button type="button" class="toggle-password" data-target="password" aria-label="Show password">Show</button>
                </div>
            </div>

            <div class="row">
                <label class="remember"><input type="checkbox" name="remember"> Remember me</label>
                <a href="{{ route('register') }}" class="link">Need an account?</a>
            </div>

            <button class="submit" type="submit" id="login-button">Log in</button>
        </form>

        <p class="alt">New here? <a href="{{ route('register') }}" class="link">Create an account</a></p>
    </main>

    <script>
        document.querySelectorAll('.toggle-password').forEach((button) => {
            button.addEventListener('click', function () {
                const input = document.getElementById(this.dataset.target);
                const show = input.type === 'password';
                input.type = show ? 'text' : 'password';
                this.textContent = show ? 'Hide' : 'Show';
                this.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
            });
        });

        const loginForm = document.querySelector('form[action="{{ route('login') }}"]');
        if (loginForm) {
            loginForm.addEventListener('submit', function () {
                const submitButton = loginForm.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.disabled = true;
                    submitButton.textContent = 'Logging in...';
                }
            });
        }
    </script>
</body>
</html>
