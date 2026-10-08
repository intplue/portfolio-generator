<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: #f3efe3;
            color: #18382a;
        }

        /* NAVBAR */

        .navbar {
            width: 100%;
            padding: 25px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f3efe3;
        }

        .logo {
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #18382a;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-decoration: none;
            color: #526b5d;
        }

        .nav-links a:hover {
            color: #18382a;
        }

        /* PAGE HEADER */

        .page-header {
            width: 86%;
            max-width: 1100px;
            margin: 50px auto 35px;
        }

        .page-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #526b5d;
            margin-bottom: 12px;
        }

        .page-title {
            font-size: clamp(2.3rem, 5vw, 4rem);
            line-height: 1.05;
            font-weight: 700;
            color: #18382a;
            margin-bottom: 15px;
        }

        .page-description {
            max-width: 650px;
            font-size: 0.95rem;
            line-height: 1.7;
            color: #626b64;
        }

        /* FORM */

        .form-container {
            width: 86%;
            max-width: 1100px;
            margin: 0 auto 70px;
            background: #faf8f2;
            padding: 50px;
            border-radius: 10px;
        }

        .form-section {
            padding: 35px 0;
            border-bottom: 1px solid #dedbd0;
        }

        .form-section:first-child {
            padding-top: 0;
        }

        .form-section:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 700;
            color: #18382a;
            margin-bottom: 8px;
        }

        .section-description {
            font-size: 0.8rem;
            line-height: 1.6;
            color: #7a817b;
            margin-bottom: 25px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 0.75rem;
            font-weight: 700;
            color: #3f4942;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #d1d3ca;
            background: #ffffff;
            color: #18382a;
            font-family: 'Raleway', sans-serif;
            font-size: 0.85rem;
            padding: 13px 15px;
            border-radius: 8px;
            outline: none;
            transition: 0.2s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #526b5d;
            box-shadow: 0 0 0 3px rgba(82, 107, 93, 0.08);
        }

        textarea {
            min-height: 130px;
            resize: vertical;
            line-height: 1.7;
        }

        input::placeholder,
        textarea::placeholder {
            color: #a1a6a1;
        }

        /* PROFILE PICTURE */

        .picture-note {
            font-size: 0.7rem;
            color: #7a817b;
            margin-top: 7px;
            line-height: 1.5;
        }

        .current-picture {
            margin-bottom: 15px;
        }

        .picture-preview {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: #d8ddd3;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #526b5d;
            font-size: 0.7rem;
            text-align: center;
        }

        /* BUTTONS */

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 40px;
        }

        .back-button {
            color: #526b5d;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            padding-bottom: 5px;
            border-bottom: 1px solid #aab4ab;
        }

        .back-button:hover {
            color: #18382a;
            border-bottom-color: #18382a;
        }

        .save-button {
            border: none;
            background: #18382a;
            color: #ffffff;
            padding: 14px 30px;
            border-radius: 8px;
            font-family: 'Raleway', sans-serif;
            font-size: 0.8rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .save-button:hover {
            background: #526b5d;
        }

        /* RESPONSIVE */

        @media (max-width: 700px) {

            .navbar {
                padding: 22px 5%;
            }

            .nav-links {
                gap: 15px;
            }

            .page-header {
                width: 90%;
                margin-top: 35px;
            }

            .form-container {
                width: 90%;
                padding: 30px 25px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .save-button {
                width: 100%;
            }

            .back-button {
                align-self: center;
            }

        }

    </style>
</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar">

        <a href="{{ route('home') }}" class="logo">
            Portfolio Generator
        </a>

        <div class="nav-links">

            <a href="{{ route('home') }}">
                HOME
            </a>

            <a href="{{ route('home') }}#about">
                ABOUT
            </a>

            <a href="{{ route('home') }}#help">
                HELP
            </a>

        </div>

    </nav>


    <!-- PAGE HEADER -->

    <header class="page-header">

        <div class="page-label">
            PORTFOLIO GENERATOR
        </div>

        <h1 class="page-title">
            Edit your portfolio.
        </h1>

        <p class="page-description">
            Update your information below. Your changes will be saved
            and reflected in your generated portfolio.
        </p>

    </header>


    <!-- FORM -->

    <main class="form-container">

        <form
            action="#"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            <!-- PERSONAL INFORMATION -->

            <section class="form-section">

                <h2 class="section-title">
                    Personal Information
                </h2>

                <p class="section-description">
                    Keep your basic contact information up to date.
                </p>

                <div class="form-grid">

                    <div class="form-group">

                        <label for="full_name">
                            Full Name
                        </label>

                        <input
                            type="text"
                            id="full_name"
                            name="full_name"
                            value="{{ old('full_name', $portfolio->full_name ?? '') }}"
                            placeholder="Enter your full name"
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $portfolio->email ?? '') }}"
                            placeholder="you@example.com"
                        >

                    </div>


                    <div class="form-group">

                        <label for="contact_number">
                            Contact Number
                        </label>

                        <input
                            type="text"
                            id="contact_number"
                            name="contact_number"
                            value="{{ old('contact_number', $portfolio->contact_number ?? '') }}"
                            placeholder="+63 900 000 0000"
                        >

                    </div>


                    <div class="form-group">

                        <label for="address">
                            Address
                        </label>

                        <input
                            type="text"
                            id="address"
                            name="address"
                            value="{{ old('address', $portfolio->address ?? '') }}"
                            placeholder="City, Province, Country"
                        >

                    </div>

                </div>

            </section>


            <!-- PROFILE PICTURE -->

            <section class="form-section">

                <h2 class="section-title">
                    Profile Picture
                </h2>

                <p class="section-description">
                    Update the image that will appear on your portfolio.
                </p>

                <div class="current-picture">

                    <div class="picture-preview">
                        Current Photo
                    </div>

                </div>

                <div class="form-group">

                    <label for="profile_picture">
                        New Profile Picture
                    </label>

                    <input
                        type="file"
                        id="profile_picture"
                        name="profile_picture"
                        accept="image/*"
                    >

                    <p class="picture-note">
                        Upload a JPG, JPEG, PNG, or WEBP image.
                    </p>

                </div>

            </section>


            <!-- ABOUT -->

            <section class="form-section">

                <h2 class="section-title">
                    About You
                </h2>

                <p class="section-description">
                    Tell visitors who you are, what you do, and what
                    you are interested in.
                </p>

                <div class="form-group">

                    <label for="about_me">
                        About Me
                    </label>

                    <textarea
                        id="about_me"
                        name="about_me"
                        placeholder="Write a short introduction about yourself..."
                    >{{ old('about_me', $portfolio->about_me ?? '') }}</textarea>

                </div>

            </section>


            <!-- EDUCATION AND EXPERIENCE -->

            <section class="form-section">

                <h2 class="section-title">
                    Education & Experience
                </h2>

                <p class="section-description">
                    Add your educational background and relevant work experience.
                </p>

                <div class="form-grid">

                    <div class="form-group full">

                        <label for="educational_background">
                            Educational Background
                        </label>

                        <textarea
                            id="educational_background"
                            name="educational_background"
                            placeholder="Example: Bachelor of Science in Information Technology — University Name, 2024–Present"
                        >{{ old('educational_background', $portfolio->educational_background ?? '') }}</textarea>

                    </div>


                    <div class="form-group full">

                        <label for="work_experience">
                            Work Experience
                        </label>

                        <textarea
                            id="work_experience"
                            name="work_experience"
                            placeholder="Describe your previous work, internship, volunteer, or relevant experience..."
                        >{{ old('work_experience', $portfolio->work_experience ?? '') }}</textarea>

                    </div>

                </div>

            </section>


            <!-- SKILLS AND PROJECTS -->

            <section class="form-section">

                <h2 class="section-title">
                    Skills & Projects
                </h2>

                <p class="section-description">
                    Highlight the skills and projects you want visitors to see.
                </p>

                <div class="form-grid">

                    <div class="form-group">

                        <label for="skills">
                            Skills
                        </label>

                        <textarea
                            id="skills"
                            name="skills"
                            placeholder="Java, Laravel, MySQL, HTML, CSS..."
                        >{{ old('skills', $portfolio->skills ?? '') }}</textarea>

                    </div>


                    <div class="form-group">

                        <label for="projects">
                            Projects
                        </label>

                        <textarea
                            id="projects"
                            name="projects"
                            placeholder="Project name, description, technologies used..."
                        >{{ old('projects', $portfolio->projects ?? '') }}</textarea>

                    </div>

                </div>

            </section>


            <!-- SOCIAL LINKS -->

            <section class="form-section">

                <h2 class="section-title">
                    Social Media & Websites
                </h2>

                <p class="section-description">
                    Add links where visitors can learn more about you or your work.
                </p>

                <div class="form-grid">

                    <div class="form-group">

                        <label for="website">
                            Personal Website
                        </label>

                        <input
                            type="url"
                            id="website"
                            name="website"
                            value="{{ old('website', $portfolio->website ?? '') }}"
                            placeholder="https://yourwebsite.com"
                        >

                    </div>


                    <div class="form-group">

                        <label for="linkedin">
                            LinkedIn
                        </label>

                        <input
                            type="url"
                            id="linkedin"
                            name="linkedin"
                            value="{{ old('linkedin', $portfolio->linkedin ?? '') }}"
                            placeholder="https://linkedin.com/in/yourname"
                        >

                    </div>


                    <div class="form-group">

                        <label for="github">
                            GitHub
                        </label>

                        <input
                            type="url"
                            id="github"
                            name="github"
                            value="{{ old('github', $portfolio->github ?? '') }}"
                            placeholder="https://github.com/yourusername"
                        >

                    </div>


                    <div class="form-group">

                        <label for="social_links">
                            Other Social Links
                        </label>

                        <input
                            type="text"
                            id="social_links"
                            name="social_links"
                            value="{{ old('social_links', $portfolio->social_links ?? '') }}"
                            placeholder="Instagram, Facebook, Behance..."
                        >

                    </div>

                </div>

            </section>


            <!-- ADDITIONAL INFORMATION -->

            <section class="form-section">

                <h2 class="section-title">
                    Additional Information
                </h2>

                <p class="section-description">
                    Add anything else you would like to include in your portfolio.
                </p>

                <div class="form-group">

                    <label for="additional_info">
                        Additional Information
                    </label>

                    <textarea
                        id="additional_info"
                        name="additional_info"
                        placeholder="Awards, certifications, interests, achievements, or other information..."
                    >{{ old('additional_info', $portfolio->additional_info ?? '') }}</textarea>

                </div>

            </section>


            <!-- ACTIONS -->

            <div class="form-actions">

                <a
                    href="{{ route('portfolio.manage') }}"
                    class="back-button"
                >
                    ← Back to Manage
                </a>

                <button
                    type="submit"
                    class="save-button"
                >
                    Save Changes
                </button>

            </div>

        </form>

    </main>

</body>
</html>