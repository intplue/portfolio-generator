<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portfolio Information | Portfolio Generator</title>

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
            color: #202722;
            min-height: 100vh;
        }

        nav {
            width: 100%;
            padding: 26px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            color: #18382a;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 32px;
        }

        .nav-links a {
            color: #526b5d;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1.5px;
            transition: 0.2s ease;
        }

        .nav-links a:hover {
            color: #18382a;
        }

        .page-header {
            max-width: 1050px;
            margin: 55px auto 35px;
            padding: 0 30px;
        }

        .eyebrow {
            color: #526b5d;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        h1 {
            color: #18382a;
            font-size: clamp(32px, 5vw, 50px);
            line-height: 1.1;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .intro {
            max-width: 650px;
            color: #526b5d;
            font-size: 14px;
            line-height: 1.8;
        }

        .form-wrapper {
            max-width: 1050px;
            margin: 0 auto 70px;
            padding: 0 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .form-section {
            background: #faf8f2;
            border: 1px solid rgba(24, 56, 42, 0.12);
            border-radius: 10px;
            padding: 32px;
        }

        .section-heading {
            margin-bottom: 25px;
        }

        .section-heading h2 {
            color: #18382a;
            font-size: 19px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .section-heading p {
            color: #526b5d;
            font-size: 12px;
            line-height: 1.6;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            color: #18382a;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .required {
            color: #b85c45;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #d5d0c3;
            border-radius: 8px;
            background: #ffffff;
            color: #202722;
            padding: 13px 15px;
            font-family: 'Raleway', sans-serif;
            font-size: 13px;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input {
            height: 46px;
        }

        textarea {
            min-height: 125px;
            resize: vertical;
            line-height: 1.6;
        }

        input:focus,
        textarea:focus {
            border-color: #526b5d;
            box-shadow: 0 0 0 3px rgba(82, 107, 93, 0.10);
        }

        input::placeholder,
        textarea::placeholder {
            color: #9a9c94;
        }

        .file-input {
            padding: 11px 13px;
            cursor: pointer;
        }

        .field-note {
            color: #7b8179;
            font-size: 11px;
            line-height: 1.5;
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-top: 5px;
        }

        .back-button,
        .submit-button {
            min-width: 155px;
            height: 46px;
            border-radius: 7px;
            padding: 0 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-family: 'Raleway', sans-serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .back-button {
            color: #18382a;
            background: transparent;
            border: 1px solid #526b5d;
        }

        .back-button:hover {
            background: rgba(82, 107, 93, 0.08);
        }

        .submit-button {
            color: #faf8f2;
            background: #18382a;
            border: 1px solid #18382a;
        }

        .submit-button:hover {
            background: #526b5d;
            border-color: #526b5d;
        }

        .error-message {
            color: #a44835;
            font-size: 11px;
            line-height: 1.5;
            margin-top: 2px;
        }

        @media (max-width: 700px) {
            nav {
                padding: 22px 6%;
            }

            .nav-links {
                gap: 15px;
            }

            .nav-links a {
                font-size: 10px;
            }

            .page-header {
                margin-top: 35px;
                padding: 0 20px;
            }

            .form-wrapper {
                padding: 0 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-section {
                padding: 24px 20px;
            }

            .actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .back-button,
            .submit-button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav>
        <a href="{{ route('home') }}" class="logo">
            Portfolio Generator
        </a>

        <div class="nav-links">
            <a href="{{ route('home') }}">HOME</a>
            <a href="{{ route('home') }}#about">ABOUT</a>
            <a href="{{ route('home') }}#help">HELP</a>
        </div>
    </nav>

    <header class="page-header">
        <div class="eyebrow">Step 01 · Portfolio Information</div>

        <h1>Tell us about yourself.</h1>

        <p class="intro">
            Add the information you want to showcase in your portfolio.
            You can always edit your details later.
        </p>
    </header>

    <main class="form-wrapper">

        <form
            action="{{ route('portfolio.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <!-- Personal Information -->
            <section class="form-section">

                <div class="section-heading">
                    <h2>Personal Information</h2>
                    <p>Basic information that will appear on your portfolio.</p>
                </div>

                <div class="form-grid">

                    <div class="form-group full">
                        <label for="full_name">
                            Full Name <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="full_name"
                            name="full_name"
                            value="{{ old('full_name') }}"
                            placeholder="Enter your full name"
                            required
                        >

                        @error('full_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">
                            Email <span class="required">*</span>
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            required
                        >

                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="contact_number">
                            Contact Number
                        </label>

                        <input
                            type="text"
                            id="contact_number"
                            name="contact_number"
                            value="{{ old('contact_number') }}"
                            placeholder="09XX XXX XXXX"
                        >

                        @error('contact_number')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label for="address">
                            Address
                        </label>

                        <input
                            type="text"
                            id="address"
                            name="address"
                            value="{{ old('address') }}"
                            placeholder="City, Province, Country"
                        >

                        @error('address')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label for="profile_picture">
                            Profile Picture
                        </label>

                        <input
                            type="file"
                            id="profile_picture"
                            name="profile_picture"
                            class="file-input"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <span class="field-note">
                            Recommended formats: JPG, JPEG, PNG, or WEBP. Maximum size: 2MB.
                        </span>

                        @error('profile_picture')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

            </section>


            <!-- About You -->
            <section class="form-section">

                <div class="section-heading">
                    <h2>About You</h2>
                    <p>Introduce yourself and describe what makes your work meaningful.</p>
                </div>

                <div class="form-grid">

                    <div class="form-group full">
                        <label for="about_me">
                            About Me
                        </label>

                        <textarea
                            id="about_me"
                            name="about_me"
                            placeholder="Write a short introduction about yourself..."
                        >{{ old('about_me') }}</textarea>

                        @error('about_me')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

            </section>


            <!-- Education and Experience -->
            <section class="form-section">

                <div class="section-heading">
                    <h2>Education & Experience</h2>
                    <p>Share your educational background and professional experience.</p>
                </div>

                <div class="form-grid">

                    <div class="form-group full">
                        <label for="educational_background">
                            Educational Background
                        </label>

                        <textarea
                            id="educational_background"
                            name="educational_background"
                            placeholder="Example: Bachelor of Science in Information Technology — University Name, 2026"
                        >{{ old('educational_background') }}</textarea>

                        @error('educational_background')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label for="work_experience">
                            Work Experience
                        </label>

                        <textarea
                            id="work_experience"
                            name="work_experience"
                            placeholder="Describe your previous work, internships, or relevant experience..."
                        >{{ old('work_experience') }}</textarea>

                        @error('work_experience')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

            </section>


            <!-- Skills and Projects -->
            <section class="form-section">

                <div class="section-heading">
                    <h2>Skills & Projects</h2>
                    <p>Highlight your abilities and the projects you have worked on.</p>
                </div>

                <div class="form-grid">

                    <div class="form-group full">
                        <label for="skills">
                            Skills
                        </label>

                        <textarea
                            id="skills"
                            name="skills"
                            placeholder="Example: Java, Laravel, PHP, MySQL, UI/UX Design..."
                        >{{ old('skills') }}</textarea>

                        @error('skills')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label for="projects">
                            Projects
                        </label>

                        <textarea
                            id="projects"
                            name="projects"
                            placeholder="Describe your projects, including your role and what you created..."
                        >{{ old('projects') }}</textarea>

                        @error('projects')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

            </section>


            <!-- Social Media and Websites -->
            <section class="form-section">

                <div class="section-heading">
                    <h2>Social Media & Websites</h2>
                    <p>Add links where people can learn more about you or your work.</p>
                </div>

                <div class="form-grid">

                    <div class="form-group">
                        <label for="website">
                            Personal Website
                        </label>

                        <input
                            type="url"
                            id="website"
                            name="website"
                            value="{{ old('website') }}"
                            placeholder="https://example.com"
                        >

                        @error('website')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="linkedin">
                            LinkedIn
                        </label>

                        <input
                            type="url"
                            id="linkedin"
                            name="linkedin"
                            value="{{ old('linkedin') }}"
                            placeholder="https://linkedin.com/in/username"
                        >

                        @error('linkedin')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="github">
                            GitHub
                        </label>

                        <input
                            type="url"
                            id="github"
                            name="github"
                            value="{{ old('github') }}"
                            placeholder="https://github.com/username"
                        >

                        @error('github')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="social_links">
                            Other Social Links
                        </label>

                        <input
                            type="text"
                            id="social_links"
                            name="social_links"
                            value="{{ old('social_links') }}"
                            placeholder="Instagram, Facebook, etc."
                        >

                        @error('social_links')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

            </section>


            <!-- Additional Information -->
            <section class="form-section">

                <div class="section-heading">
                    <h2>Additional Information</h2>
                    <p>Add anything else you want to include in your portfolio.</p>
                </div>

                <div class="form-grid">

                    <div class="form-group full">
                        <label for="additional_info">
                            Additional Information
                        </label>

                        <textarea
                            id="additional_info"
                            name="additional_info"
                            placeholder="Awards, certifications, interests, achievements, or other information..."
                        >{{ old('additional_info') }}</textarea>

                        @error('additional_info')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

            </section>


            <!-- Actions -->
            <div class="actions">

                <a
                    href="{{ route('home') }}"
                    class="back-button"
                >
                    BACK
                </a>

                <button
                    type="submit"
                    class="submit-button"
                >
                    SAVE & CONTINUE
                </button>

            </div>

        </form>

    </main>

</body>
</html>