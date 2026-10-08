<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Portfolio</title>

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
            width: min(900px, 88%);
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

        .section {
            margin-bottom: 35px;
        }

        .section:last-child {
            margin-bottom: 0;
        }

        .section h2 {
            margin: 0 0 20px;
            padding-bottom: 8px;
            color: #18382a;
            font-size: 20px;
        }

        .field {
            margin-bottom: 20px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #18382a;
            font-size: 13px;
            font-weight: 700;
        }

        input,
        textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #cfc9ba;
            border-radius: 8px;
            background: #ffffff;
            color: #202722;
            font-family: 'Raleway', sans-serif;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #526b5d;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
            line-height: 1.6;
        }

        .current-image {
            margin-bottom: 15px;
        }

        .current-image img {
            display: block;
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #ded8c9;
        }

        .current-image p {
            margin: 8px 0 0;
            color: #526b5d;
            font-size: 12px;
        }

        .error-box {
            margin-bottom: 25px;
            padding: 15px 18px;
            border-radius: 10px;
            background: #eadbd6;
            color: #713f32;
            font-size: 13px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
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

            .actions {
                flex-direction: column-reverse;
                align-items: stretch;
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

            <h1>Edit Portfolio</h1>

            <p>
                Update your portfolio information and save your changes.
            </p>

        </div>


        @if($errors->any())

            <div class="error-box">

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <div class="form-card">

            <form
                action="{{ route('portfolio.update', $portfolio->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <!-- PERSONAL INFORMATION -->

                <section class="section">

                    <h2>Personal Information</h2>

                    <div class="field">

                        <label for="full_name">
                            Full Name
                        </label>

                        <input
                            type="text"
                            id="full_name"
                            name="full_name"
                            value="{{ old('full_name', $portfolio->full_name) }}"
                            required
                        >

                    </div>


                    <div class="field">

                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $portfolio->email) }}"
                            required
                        >

                    </div>


                    <div class="field">

                        <label for="contact_number">
                            Contact Number
                        </label>

                        <input
                            type="text"
                            id="contact_number"
                            name="contact_number"
                            value="{{ old('contact_number', $portfolio->contact_number) }}"
                        >

                    </div>


                    <div class="field">

                        <label for="address">
                            Address
                        </label>

                        <textarea
                            id="address"
                            name="address"
                        >{{ old('address', $portfolio->address) }}</textarea>

                    </div>


                    <div class="field">

                        <label for="profile_picture">
                            Profile Picture
                        </label>

                        @if($portfolio->profile_picture)

                            <div class="current-image">

                                <img
                                    src="{{ asset('storage/' . $portfolio->profile_picture) }}"
                                    alt="Current profile picture"
                                >

                                <p>
                                    Current profile picture
                                </p>

                            </div>

                        @endif

                        <input
                            type="file"
                            id="profile_picture"
                            name="profile_picture"
                            accept="image/*"
                        >

                    </div>

                </section>


                <!-- ABOUT -->

                <section class="section">

                    <h2>About You</h2>

                    <div class="field">

                        <label for="about_me">
                            About Me
                        </label>

                        <textarea
                            id="about_me"
                            name="about_me"
                        >{{ old('about_me', $portfolio->about_me) }}</textarea>

                    </div>

                </section>


                <!-- EDUCATION AND EXPERIENCE -->

                <section class="section">

                    <h2>Education & Experience</h2>

                    <div class="field">

                        <label for="educational_background">
                            Educational Background
                        </label>

                        <textarea
                            id="educational_background"
                            name="educational_background"
                        >{{ old('educational_background', $portfolio->educational_background) }}</textarea>

                    </div>


                    <div class="field">

                        <label for="work_experience">
                            Work Experience
                        </label>

                        <textarea
                            id="work_experience"
                            name="work_experience"
                        >{{ old('work_experience', $portfolio->work_experience) }}</textarea>

                    </div>

                </section>


                <!-- SKILLS AND PROJECTS -->

                <section class="section">

                    <h2>Skills & Projects</h2>

                    <div class="field">

                        <label for="skills">
                            Skills
                        </label>

                        <textarea
                            id="skills"
                            name="skills"
                        >{{ old('skills', $portfolio->skills) }}</textarea>

                    </div>


                    <div class="field">

                        <label for="projects">
                            Projects
                        </label>

                        <textarea
                            id="projects"
                            name="projects"
                        >{{ old('projects', $portfolio->projects) }}</textarea>

                    </div>

                </section>


                <!-- SOCIAL LINKS -->

                <section class="section">

                    <h2>Social Media & Websites</h2>

                    <div class="field">

                        <label for="website">
                            Website
                        </label>

                        <input
                            type="text"
                            id="website"
                            name="website"
                            value="{{ old('website', $portfolio->website) }}"
                        >

                    </div>


                    <div class="field">

                        <label for="linkedin">
                            LinkedIn
                        </label>

                        <input
                            type="text"
                            id="linkedin"
                            name="linkedin"
                            value="{{ old('linkedin', $portfolio->linkedin) }}"
                        >

                    </div>


                    <div class="field">

                        <label for="github">
                            GitHub
                        </label>

                        <input
                            type="text"
                            id="github"
                            name="github"
                            value="{{ old('github', $portfolio->github) }}"
                        >

                    </div>


                    <div class="field">

                        <label for="social_links">
                            Other Social Links
                        </label>

                        <textarea
                            id="social_links"
                            name="social_links"
                        >{{ old('social_links', $portfolio->social_links) }}</textarea>

                    </div>

                </section>


                <!-- ADDITIONAL INFORMATION -->

                <section class="section">

                    <h2>Additional Information</h2>

                    <div class="field">

                        <label for="additional_info">
                            Additional Information
                        </label>

                        <textarea
                            id="additional_info"
                            name="additional_info"
                        >{{ old('additional_info', $portfolio->additional_info) }}</textarea>

                    </div>

                </section>


                <div class="actions">

                    <a
                        href="{{ route('portfolio.manage') }}"
                        class="back-button"
                    >
                        CANCEL
                    </a>

                    <button
                        type="submit"
                        class="save-button"
                    >
                        SAVE CHANGES
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>