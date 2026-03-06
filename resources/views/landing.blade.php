<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ESOK HARI</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon/esokhari-logo-white.ico') }}" sizes="128x128">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Libertinus+Serif+Display&family=Petit+Formal+Script&display=swap"
        rel="stylesheet">
    <link href="https://cdn.lineicons.com/5.1/line/lineicons.css" rel="stylesheet" />

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav {
            /* font-family: 'Libertinus Serif Display', serif; */
            font-weight: 600;
            font-size: 0.75rem;

            position: fixed;
            top: 0;
            left: 0;
            width: 100%;

            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;

            padding: 20px 50px;
            background: transparent;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        nav.scrolled {
            background: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .nav-left {
            justify-self: start;
        }

        .nav-center {
            display: flex;
            gap: 30px;
            list-style: none;
            margin: 0;
            padding: 0;
            justify-self: center;
        }

        .nav-right {
            display: flex;
            gap: 20px;
            list-style: none;
            margin: 0;
            padding: 0;
            justify-self: end;
            align-items: center;
            height: 100%;
            vertical-align: middle;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 30px;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            color: #ffffff;
            cursor: pointer;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav ul li a {
            color: #ffffff;
            transition: color 0.3s ease;
        }

        nav.scrolled ul li {
            color: #333333;
        }

        nav.scrolled ul li a {
            color: #333333;
        }

        nav img {
            height: 25px;
            width: auto;
        }


        #hero {
            position: relative;
            width: 100%;
            height: 600px;
            overflow: hidden;
        }

        /* Background image */
        #hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            filter: brightness(70%);
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            transform: scale(1.1);
        }

        /* Center content */
        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #ffffff;
        }

        /* Title animation */
        .hero-title {
            font-family: 'Libertinus Serif Display', serif;
            letter-spacing: 10px;
            font-size: 2.8rem;
            font-weight: 600;
            opacity: 0;
            transform: translateY(40px);
            animation: fadeUp 1.2s ease forwards;
        }

        /* Button styling */
        .hero-btn {
            margin-top: 30px;
            padding: 12px 28px;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background: transparent;
            border: 2px solid white;
            cursor: pointer;
            letter-spacing: 2px;

            opacity: 0;
            transform: translateY(40px);
            animation: fadeUp 1.2s ease forwards;
            animation-delay: 0.4s;

            transition: all 0.3s ease;
        }

        /* Button hover */
        .hero-btn:hover {
            background: white;
            color: black;
        }

        /* Animations */
        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes zoomOut {
            to {
                transform: scale(1);
            }
        }

        .btn-booknow {
            margin-top: 30px;
            padding: 12px 28px;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background: transparent;
            border: 2px solid white;
            cursor: pointer;
            letter-spacing: 2px;

            opacity: 0;
            transform: translateY(40px);
            animation: fadeUp 1.2s ease forwards;
            animation-delay: 0.4s;

            transition: all 0.3s ease;
        }

        .btn-booknow:hover {
            background: white;
            color: black;
        }

        /* Animation for brief-portofolio images */
        .brief-img {
            opacity: 0;
            transform: translateY(60px) scale(0.95);
            transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1), transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .brief-img.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .feedback-section {
            padding: 40px 0;
            background: #fafbfc;
        }

        .feedback-title {
            font-size: 2rem;
            color: #232323;
            font-weight: 600;
            margin-bottom: 28px;
            text-align: center;
            font-family: 'Libertinus Serif Display', serif;
            letter-spacing: 2px;
        }

        .feedback-list {
            display: flex;
            justify-content: center;
            gap: 28px;
            flex-wrap: wrap;
        }

        .feedback-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
            padding: 28px 22px 20px 22px;
            max-width: 340px;
            min-width: 260px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 18px;
            transition: box-shadow 0.2s;
        }

        .feedback-card:hover {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.13);
        }

        .feedback-photo {
            width: 100%;
            height: 350px;
            object-fit: cover;
            margin-bottom: 14px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.10);
            border-radius: 8px;
            border: none;
        }

        .feedback-quote {
            font-size: 1.05rem;
            color: #333;
            font-style: italic;
            text-align: center;
            margin-bottom: 10px;
            line-height: 1.7;
            letter-spacing: 0.1px;
        }

        .feedback-client {
            font-size: 0.98rem;
            color: #888;
            font-weight: 500;
            text-align: center;
            margin-top: 0;
            letter-spacing: 0.5px;
        }

        .feedback-highlight {
            color: #2e7d32;
            font-weight: 600;
        }

        #portofolio,
        #service,
        #contact,
        #booking {
            display: none;
            min-height: calc(100vh - 80px);
            padding-bottom: 60px;
        }

        .section-active {
            display: block !important;
        }

        nav ul li.nav-link-active {
            color: #f7b731;
            border-bottom: 2px solid #f7b731;
        }

        nav ul li {
            border-bottom: 2px solid transparent;
            transition: color 0.3s, border-bottom 0.3s;
        }

        nav.scrolled ul li.nav-link-active {
            color: #f7b731;
            border-bottom: 2px solid #f7b731;
        }

        .home-portfolio-container {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 20px;

            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .home-portfolio-item {
            position: relative;
            border-radius: 1px;
            overflow: hidden;
            background: #e0e0e0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Stagger animation for items */
        .home-portfolio-item:nth-child(1) { animation-delay: 0.1s; }
        .home-portfolio-item:nth-child(2) { animation-delay: 0.2s; }
        .home-portfolio-item:nth-child(3) { animation-delay: 0.3s; }
        .home-portfolio-item:nth-child(4) { animation-delay: 0.4s; }
        .home-portfolio-item:nth-child(5) { animation-delay: 0.5s; }
        .home-portfolio-item:nth-child(6) { animation-delay: 0.6s; }
        .home-portfolio-item:nth-child(7) { animation-delay: 0.7s; }
        .home-portfolio-item:nth-child(8) { animation-delay: 0.8s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .home-portfolio-item:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        .home-portfolio-item img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            display: block;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .home-portfolio-item:hover img {
            transform: scale(1.1);
        }

        .home-portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 50%);
            opacity: 0;
            transition: opacity 0.4s ease;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 20px;
        }

        .home-portfolio-item:hover .home-portfolio-overlay {
            opacity: 1;
        }

        /* Featured items - span 2 columns for visual interest */
        .home-portfolio-item:nth-child(1),
        .home-portfolio-item:nth-child(5) {
            grid-column: span 2;
        }

        .home-portfolio-item:nth-child(1) img,
        .home-portfolio-item:nth-child(5) img {
            height: 320px;
        }

        .home-portfolio-overlay-text {
            color: white;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-align: center;
        }

        /* Responsive adjustments for home portfolio */
        @media (max-width: 992px) {
            .home-portfolio-container {
                grid-template-columns: repeat(3, 1fr);
                gap: 18px;
            }
        }

        @media (max-width: 768px) {
            .home-portfolio-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                margin: 40px auto;
            }

            .home-portfolio-item img {
                height: 220px;
            }

            /* Remove spanning on mobile for better layout */
            .home-portfolio-item:nth-child(1),
            .home-portfolio-item:nth-child(5) {
                grid-column: span 1;
            }

            .home-portfolio-item:nth-child(1) img,
            .home-portfolio-item:nth-child(5) img {
                height: 220px;
            }
        }

        @media (max-width: 480px) {
            .home-portfolio-container {
                grid-template-columns: 1fr;
                gap: 15px;
                padding: 0 15px;
                margin: 30px auto;
            }

            .home-portfolio-item img {
                height: 280px;
            }
        }


        .portfolio-container {
            max-width: 1100px;
            margin: 60px auto;
            padding: 0 20px;

            column-count: 3;
            column-gap: 25px;
        }

        /* Responsive columns */
        @media (max-width: 992px) {
            .portfolio-container {
                column-count: 2;
            }
        }

        @media (max-width: 600px) {
            .portfolio-container {
                column-count: 1;
            }
        }

        /* Portfolio item */
        .portfolio-item {
            background: #e0e0e0;
            /* fallback gray */
            border-radius: 1px;
            overflow: hidden;
            margin-bottom: 25px;
            break-inside: avoid;

            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }

        .portfolio-item:hover {
            /* transform: translateY(-6px); */
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.08);
        }

        /* Images */
        .portfolio-item img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            nav {
                grid-template-columns: auto 1fr;
                padding: 15px 20px;
            }

            nav img {
                height: 20px;
            }

            .nav-center {
                display: none;
            }

            .nav-right {
                justify-self: end;
            }

            .nav-right li {
                font-size: 0.7rem;
            }

            .nav-right a {
                font-size: 0.7rem;
            }

            #hero {
                height: 400px;
            }

            .hero-title {
                font-size: 1.8rem !important;
                letter-spacing: 4px !important;
            }

            .hero-btn, .btn-booknow {
                padding: 10px 20px;
                font-size: 0.85rem;
                letter-spacing: 1px;
            }

            #brief-explanation img {
                width: 200px !important;
            }

            #brief-explanation p {
                font-size: 0.75rem !important;
                padding: 5px 20px !important;
            }

            #brief-portofolio {
                flex-direction: column !important;
                padding: 0 20px;
                    gap: 15px !important;
                    margin-top: 20px !important;
                }

                #brief-portofolio img {
                    width: 100% !important;
                    height: 300px !important;
                }

                #brief-about {
                    padding: 0 20px;
                    margin: 30px 0 !important;
                }

                #brief-about > div:first-child {
                    font-size: 1.5rem !important;
                    margin-bottom: 20px !important;
                }

                #brief-about > div:last-child {
                    flex-direction: column !important;
                    gap: 12px !important;
                }

                #brief-about span {
                    width: 100%;
                    text-align: center;
                }

                .feedback-section {
                    padding: 20px 10px;
                }

                .feedback-title {
                    font-size: 1.5rem !important;
                }

                .feedback-list {
                    gap: 20px;
                    padding: 0 10px;
                }

                .feedback-card {
                    max-width: 100%;
                    min-width: auto;
                    padding: 20px 16px;
                }

                .feedback-photo {
                    height: 280px;
                }

                .feedback-quote {
                    font-size: 0.95rem;
                }

                .feedback-client {
                    font-size: 0.9rem;
                }

                #service > div {
                    margin: 60px auto !important;
                    padding: 0 15px !important;
                }

                #service > div > div:first-child {
                    font-size: 1.5rem !important;
                }

                #service > div > p {
                    font-size: 0.85rem !important;
                    padding: 0 10px !important;
                }

                #mainPackagesList,
                #addOnPackagesList {
                    grid-template-columns: 1fr !important;
                    padding: 0 10px;
                }

                #contact {
                    padding: 80px 20px !important;
                }

                #contact > div > div:first-child {
                    font-size: 1.5rem !important;
                }

                #contact > div > div:last-child {
                    flex-direction: column !important;
                    gap: 30px !important;
                }

                footer {
                    padding: 30px 0 15px 0 !important;
                }

                footer > div {
                    padding: 0 15px !important;
                }

                footer img {
                    height: 36px !important;
                }

                footer > div > div:nth-child(2) {
                    font-size: 1.1rem !important;
                }

                footer > div > div:nth-child(3) {
                    font-size: 0.85rem !important;
                }

                footer > div > div:nth-child(4) a {
                    font-size: 1.1rem !important;
                }

                footer > div > div:last-child {
                    font-size: 0.75rem !important;
                }

                #portofolio {
                    padding: 20px 0 !important;
                }

                .portfolio-container {
                    margin: 40px auto !important;
                }
            }

            @media (max-width: 480px) {
                nav {
                    padding: 12px 15px;
                }

                nav img {
                    height: 18px;
                }

                .nav-right {
                    gap: 10px;
                }

                .nav-right li {
                    font-size: 0.65rem;
                }

                #hero {
                    height: 350px;
                }

                .hero-title {
                    font-size: 1.4rem !important;
                    letter-spacing: 3px !important;
                    padding: 0 15px;
                }

                .hero-btn, .btn-booknow {
                    padding: 8px 16px;
                    font-size: 0.75rem;
                }

                #hero > div:last-child p {
                    font-size: 0.9rem !important;
                }

                #brief-explanation {
                    margin-top: 30px !important;
                }

                #brief-explanation img {
                    width: 160px !important;
                }

                #brief-explanation p {
                    font-size: 0.7rem !important;
                    padding: 5px 15px !important;
                }

                #brief-portofolio {
                    margin-top: 15px !important;
                    padding: 0 15px !important;
                    gap: 12px !important;
                }

                #brief-portofolio img {
                    height: 250px !important;
                }

                #brief-about {
                    padding: 0 15px !important;
                    margin: 25px 0 !important;
                }

                #brief-about > div:first-child {
                    font-size: 1.3rem !important;
                    padding: 0 10px;
                }

                #brief-about span {
                    font-size: 0.85rem !important;
                }

                .feedback-section {
                    padding: 15px 5px !important;
                }

                .feedback-title {
                    font-size: 1.3rem !important;
                }

                .feedback-list {
                    padding: 0 5px !important;
                }

                .feedback-photo {
                    height: 240px;
                }

                .feedback-quote {
                    font-size: 0.9rem;
                }

                .feedback-client {
                    font-size: 0.85rem;
                }

                #service > div {
                    margin: 40px auto !important;
                    padding: 0 10px !important;
                }

                #service > div > div:first-child {
                    font-size: 1.3rem !important;
                    padding: 0 5px;
                }

                #service > div > p {
                    padding: 0 5px !important;
                }

                #mainPackagesList,
                #addOnPackagesList {
                    padding: 0 5px !important;
                }

                #contact {
                    padding: 60px 15px !important;
                }

                #contact > div > div:first-child {
                    font-size: 1.3rem !important;
                }

                #contact > div > div:last-child i {
                    font-size: 2.5rem !important;
                }

                #contact > div > div:last-child span {
                    font-size: 0.9rem !important;
                }

                footer > div {
                    padding: 0 10px !important;
                }

                footer > div > div:nth-child(2) {
                    font-size: 1rem !important;
                    letter-spacing: 2px !important;
                }

                .portfolio-container {
                    margin: 30px auto !important;
                    padding: 0 15px !important;
                }
            }

        /* Hamburger Menu for Mobile */
        .mobile-menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
        }

        .mobile-menu-toggle span {
            width: 24px;
            height: 2px;
            background: #fff;
            transition: all 0.3s ease;
        }

        nav.scrolled .mobile-menu-toggle span {
            background: #333;
        }

        .mobile-nav-menu {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.95);
            z-index: 999;
            padding: 80px 20px 20px;
        }

        .mobile-nav-menu.active {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }

        .mobile-nav-menu li {
            color: #fff;
            font-size: 1.2rem;
            cursor: pointer;
            list-style: none;
            padding: 15px 30px;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .mobile-nav-menu li:hover {
            color: #f7b731;
            border-bottom-color: #f7b731;
        }

        .mobile-menu-close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 2rem;
            color: #fff;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: flex;
            }
        }

        /* Button styling */
        .btn-view-portfolio {
            padding: 12px 32px;
            font-size: 0.95rem;
            font-weight: 600;
            color: white;
            background: #222;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-view-portfolio:hover {
            background: #000;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        }

        .btn-view-portfolio:active {
            transform: translateY(0);
        }

        /* Loading skeleton effect - if needed in future */
        .home-portfolio-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }

        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
</head>

<body>

    <nav id="navbar">
        <img class="nav-left" src="{{ asset('images/icon/esokhari.png') }}" alt="esokhari-logo"
            style="filter: brightness(0) invert(1);">
        <ul class="nav-center">
            <li class="nav-link" onclick="showSection('home')">HOME</li>
            <li class="nav-link" onclick="showSection('portofolio')">PORTFOLIO</li>
            <li class="nav-link" onclick="showSection('service')">SERVICE</li>
            <li class="nav-link" onclick="showSection('contact')">CONTACT</li>
            <li class="nav-link" onclick="showSection('booking')">BOOKING</li>
        </ul>
        <ul class="nav-right">
            <li style="display: flex;">
                <i class="lni lni-instagram"></i>
                <a href="https://www.instagram.com/wisudaesokhari" target="_blank"
                    style="transform: translateY(-3px); text-decoration: none;">&nbsp;wisudaesokhari</a>
            </li>
            <li class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                <span></span>
                <span></span>
                <span></span>
            </li>
        </ul>
    </nav>

    <!-- Mobile Navigation Menu -->
    <div class="mobile-nav-menu" id="mobileNavMenu">
        <span class="mobile-menu-close" onclick="toggleMobileMenu()">&times;</span>
        <li class="nav-link" onclick="showSection('home')">HOME</li>
        <li class="nav-link" onclick="showSection('portofolio')">PORTFOLIO</li>
        <li class="nav-link" onclick="showSection('service')">SERVICE</li>
        <li class="nav-link" onclick="showSection('contact')">CONTACT</li>
        <li class="nav-link" onclick="showSection('booking')">BOOKING</li>
    </div>

    <section id="home">
        <section id="hero">
            <img id="hero-img" src="{{ $heroImage }}" alt="hero-image">
            <div class="hero-content">
                <p style="font-family: 'Libertinus Serif Display', serif; letter-spacing: 10px; font-size: 2.8rem;">YOUR
                    GRADUATION<br>REDEFINED</p>
                <button class="btn-booknow" onclick="showSection('booking')">
                    Book Now
                </button>
            </div>
            <div
                style="position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); width: 100%; text-align: center; z-index: 2;">
                <p
                    style="font-family: 'Libertinus Serif Display', serif; font-size: 1.1rem; color: #fff; margin: 0; letter-spacing: 3px;">
                    est. 2021</p>
            </div>
        </section>

        <section id="brief-explanation" style="margin-top: 2%;">
            <img src="{{ asset('images/icon/esokhari.png') }}" alt="logo-image"
                style="width: 350px; height: auto; display: block; margin: 0 auto;">
            <p
                style="text-align: center; padding:5px 15px; font-size: 0.8rem; color: #555555; max-width: 600px; margin: 5px auto 0 auto; letter-spacing: 0.5px;">
                Esok Hari captures graduation moments where dreams bloom and new journeys begin. With a professional an
                artistic touch, we turn fleeting seconds into timeless memories.
            </p>
        </section>

        <!-- Portfolio Preview Section -->
        <section style="padding: 40px 0; background: #fff;">
            <div style="text-align: center; margin-bottom: 40px;">
                <h2 style="font-family: 'Libertinus Serif Display', serif; font-size: 2.2rem; color: #222; font-weight: 500; margin-bottom: 12px; letter-spacing: 2px;">
                    Our Recent Works
                </h2>
                <p style="font-size: 0.95rem; color: #666; max-width: 600px; margin: 0 auto;">
                    Capturing unforgettable graduation moments with artistic excellence
                </p>
            </div>

            <div class="home-portfolio-container">
                @if(isset($portfolioImages) && count($portfolioImages) > 0)
                    @foreach($portfolioImages as $image)
                        @if($loop->iteration <= 8)
                            <div class="home-portfolio-item">
                                <img src="{{ asset($image) }}" alt="Portfolio Image {{ $loop->iteration }}">
                                <div class="home-portfolio-overlay">
                                    <span class="home-portfolio-overlay-text" onclick="showSection('portofolio')">
                                        <i class="fas fa-search-plus"></i> View More
                                    </span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; color: #999;">
                        <i class="fas fa-camera" style="font-size: 4rem; margin-bottom: 20px; opacity: 0.3;"></i>
                        <p style="font-size: 1.1rem; color: #666;">Our portfolio is being updated with amazing new photos!</p>
                        <p style="font-size: 0.9rem; color: #999;">Check back soon to see our latest work</p>
                    </div>
                @endif
            </div>

            @if(isset($portfolioImages) && count($portfolioImages) > 0)
                <div style="text-align: center; margin-top: 50px;">
                    <button onclick="showSection('portofolio')" class="btn-view-portfolio">
                        <i class="fas fa-images"></i> View Full Portfolio
                    </button>
                </div>
            @endif
        </section>

        {{-- <section id="brief-portofolio" style="display: flex; gap: 20px; justify-content: center; margin-top: 2%;">
            <img class="brief-img" src="{{ asset('images/landing_page/brief-1.png') }}" alt="hero-image"
                style="width: 30%; height: 500px; object-fit: cover; object-position: center;">
            <img class="brief-img" src="{{ asset('images/landing_page/brief-2.png') }}" alt="hero-image"
                style="width: 30%; height: 500px; object-fit: cover; object-position: center;">
            <img class="brief-img" src="{{ asset('images/landing_page/brief-3.png') }}" alt="hero-image"
                style="width: 30%; height: 500px; object-fit: cover; object-position: center;">
        </section>

        <section id="brief-portofolio" style="display: flex; gap: 20px; justify-content: center; margin-top: 2%;">
            <img class="brief-img" src="{{ asset('images/landing_page/couple-1.png') }}" alt="hero-image"
                style="width: 30%; height: 500px; object-fit: cover; object-position: center;">
            <img class="brief-img" src="{{ asset('images/landing_page/couple-2.png') }}" alt="hero-image"
                style="width: 30%; height: 500px; object-fit: cover; object-position: center;">
            <img class="brief-img" src="{{ asset('images/landing_page/couple-3.png') }}" alt="hero-image"
                style="width: 30%; height: 500px; object-fit: cover; object-position: center;">
        </section>

        <section id="brief-portofolio" style="display: flex; gap: 20px; justify-content: center; margin-top: 2%;">
            <img class="brief-img" src="{{ asset('images/landing_page/group-1.png') }}" alt="hero-image"
                style="width: 45%; height: 550px; object-fit: cover; object-position: center;">
            <img class="brief-img" src="{{ asset('images/landing_page/group-2.png') }}" alt="hero-image"
                style="width: 45%; height: 550px; object-fit: cover; object-position: center;">
        </section> --}}

        <section id="brief-about" style="margin: 40px 0; text-align: center;">
            <div
                style="font-size: 2rem; color: #222; font-weight: 500; margin-bottom: 32px; text-align: center; font-family: 'Libertinus Serif Display', serif;">
                Available in Big Cities!
            </div>
            <div style="display: flex; justify-content: center; gap: 28px;">
                <span
                    style="font-size: 0.95rem; color: #888; padding: 6px 18px; border-radius: 16px; background: #f7f7f7;">Jakarta</span>
                <span
                    style="font-size: 0.95rem; color: #888; padding: 6px 18px; border-radius: 16px; background: #f7f7f7;">Bandung</span>
                <span
                    style="font-size: 0.95rem; color: #888; padding: 6px 18px; border-radius: 16px; background: #f7f7f7;">Semarang</span>
                <span
                    style="font-size: 0.95rem; color: #888; padding: 6px 18px; border-radius: 16px; background: #f7f7f7;">Surabaya</span>
                <span
                    style="font-size: 0.95rem; color: #888; padding: 6px 18px; border-radius: 16px; background: #f7f7f7;">Malang</span>
            </div>
        </section>

        <section id="feedback" style="padding: 30px 0; background: #fafbfc;">
            <section class="feedback-section">
                <div
                    style="font-size: 2rem; color: #222; font-weight: 500; margin-bottom: 32px; text-align: center; font-family: 'Libertinus Serif Display', serif;">
                    What Our Clients Say
                </div>
                <div class="feedback-list">
                    <div class="feedback-card">
                        <img class="feedback-photo" src="{{ asset('images/landing_page/feedback-1.jpg') }}"
                            alt="Client Feedback Photo">
                        <div class="feedback-quote">
                            "Waw, hasilnya <span class='feedback-highlight'>bagus banget</span> dan prosesnya <span
                                class='feedback-highlight'>super cepat</span>! Kakak-kakaknya ramah dan sangat
                            membantu. Pokoknya <span class='feedback-highlight'>recommended</span> buat foto wisuda.
                            Terima kasih Esok Hari, semoga makin sukses!"
                        </div>
                        <div class="feedback-client">Hentong<br><span style="font-size:0.92em; color:#aaa;">Nanjing
                                University Of Information Science Technology</span></div>
                    </div>
                    <div class="feedback-card">
                        <img class="feedback-photo" src="{{ asset('images/landing_page/solo-3.png') }}"
                            alt="Client Feedback Photo">
                        <div class="feedback-quote">
                            "Hasil fotonya <span class='feedback-highlight'>memuaskan</span>, sesuai keinginan, dan
                            prosesnya <span class='feedback-highlight'>sangat cepat</span>. Terima kasih tim Esok
                            Hari!"
                        </div>
                        <div class="feedback-client">Subagyo<br><span
                                style="font-size:0.92em; color:#aaa;">Universitas Indonesia</span></div>
                    </div>
                    <div class="feedback-card">
                        <img class="feedback-photo" src="{{ asset('images/landing_page/solo-back-1.png') }}"
                            alt="Client Feedback Photo">
                        <div class="feedback-quote">
                            "Beneran <span class='feedback-highlight'>bagus banget</span> hasilnya, prosesnya <span
                                class='feedback-highlight'>cepat</span>, dan timnya <span
                                class='feedback-highlight'>profesional</span>. Sangat direkomendasikan!"
                        </div>
                        <div class="feedback-client">Maliki<br><span style="font-size:0.92em; color:#aaa;">Universitas
                                Gadjah Mada</span></div>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <section id="portofolio">
        <div class="portfolio-container py-4">
            @if(isset($portfolioImages) && count($portfolioImages) > 0)
                @foreach($portfolioImages as $image)
                    <div class="portfolio-item">
                        <img src="{{ asset($image) }}" alt="Portfolio Image">
                    </div>
                @endforeach
            @else
                <!-- Fallback to default images if no portfolio images in storage -->
                <div class="portfolio-item">
                    <img src="{{ asset('images/landing_page/solo-1.png') }}" alt="Project 1">
                </div>

                <div class="portfolio-item">
                    <img src="{{ asset('images/landing_page/couple-2.png') }}" alt="Project 2">
                </div>

                <div class="portfolio-item">
                    <img src="{{ asset('images/landing_page/solo-back-1.png') }}" alt="Project 3">
                </div>                
            @endif
        </div>
    </section>
    
    <section id="service">
        <div style="max-width: 1200px; margin: 100px auto; padding: 0 20px;">
            <div style="font-size: 2rem; color: #222; font-weight: 500; margin-bottom: 16px; text-align: center; font-family: 'Libertinus Serif Display', serif; letter-spacing: 2px;">
                Our Services
            </div>
            <p style="text-align: center; font-size: 0.95rem; color: #666; margin-bottom: 40px;">
                Select your city to view available photography packages
            </p>

            <!-- City Selection -->
            <div style="max-width: 400px; margin: 0 auto 40px auto; padding: 0 15px;">
                <select id="serviceCity" class="form-control" style="width: 100%; padding: 12px 16px; border: 1.5px solid #e0e0e0; border-radius: 8px; font-size: 0.95rem; background: #fff;">
                    <option value="">-- Pilih Kota --</option>
                    @foreach($cities as $city)
                        <option value="{{ $city }}">{{ $city }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Services Grid -->
            <div id="servicesContainer" style="display: none;">
                <!-- Main Packages -->
                <div id="mainPackages" style="margin-bottom: 50px;">
                    <h3 style="font-size: 1.5rem; color: #222; font-weight: 500; margin-bottom: 24px; font-family: 'Libertinus Serif Display', serif;">
                        Photography Packages
                    </h3>
                    <div id="mainPackagesList" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 24px;">
                        <!-- Will be populated by JavaScript -->
                    </div>
                </div>

                <!-- Add-ons -->
                <div id="addOnPackages">
                    <h3 style="font-size: 1.5rem; color: #222; font-weight: 500; margin-bottom: 24px; font-family: 'Libertinus Serif Display', serif;">
                        Add-On Services
                    </h3>
                    <div id="addOnPackagesList" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
                        <!-- Will be populated by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- No services message -->
            <div id="noServicesMessage" style="display: none; text-align: center; padding: 60px 20px; color: #999;">
                <i class="fas fa-info-circle" style="font-size: 3rem; margin-bottom: 16px;"></i>
                <p style="font-size: 1.1rem;">Pilih kota untuk melihat paket yang tersedia</p>
            </div>
        </div>
    </section>

    <section id="contact" style="padding: 120px 20px; text-align: center;">
        <div style="max-width: 600px; margin: 0 auto;">
            <div style="font-size: 2rem; color: #222; font-weight: 500; margin-bottom: 40px; font-family: 'Libertinus Serif Display', serif;">
                Get In Touch
            </div>
            <div style="display: flex; justify-content: center; gap: 40px; margin-top: 40px;">
                <a href="https://wa.me/6281234567890" target="_blank" style="text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 12px;">
                    <i class="fab fa-whatsapp" style="font-size: 3rem; color: #25D366;"></i>
                    <span style="font-size: 1rem; color: #333; font-weight: 500;">WhatsApp</span>
                </a>
                <a href="https://instagram.com/wisudaesokhari" target="_blank" style="text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 12px;">
                    <i class="fab fa-instagram" style="font-size: 3rem; color: #E4405F;"></i>
                    <span style="font-size: 1rem; color: #333; font-weight: 500;">Instagram</span>
                </a>
            </div>
        </div>
    </section>

    <section id="booking" style="height: 100%; display: flex; justify-content: center; align-items: center; min-height: 100vh;">
        <embed src="{{ url('forms') }}" style="width: 100%; height: 100vh; min-height: 100vh;">
        {{-- <div class="row" style="width: 100%; display: flex; justify-content: center;"> --}}
        {{-- <div class="col-start-2 col-8 col-end2" style="display: flex; justify-content: center; width: 100%;"> --}}
        {{-- </div> --}}
        {{-- </div> --}}
    </section>

    <footer
        style="background: #222; color: #fff; padding: 40px 0 20px 0; text-align: center; position: relative; margin-top: auto;">
        <div style="max-width: 900px; margin: 0 auto; padding: 0 20px;">
            <img src="{{ asset('images/icon/esokhari-logo-white.png') }}" alt="Esok Hari Logo"
                style="height: 48px; width: auto; margin-bottom: 18px; filter: brightness(0) invert(1);">
            <div
                style="font-family: 'Libertinus Serif Display', serif; font-size: 1.3rem; letter-spacing: 4px; margin-bottom: 10px;">
                ESOK HARI</div>

            {{-- <img src="{{ asset('images/icon/esokhari.png') }}" alt="Esok Hari Logo" style="height: 48px; width: auto; margin-bottom: 18px; filter: brightness(0) invert(1);"> --}}
            <div style="font-size: 0.95rem; color: #bbb; margin-bottom: 18px;">Your Graduation Redefined</div>
            <div style="margin-bottom: 18px;">
                <a href="https://instagram.com/wisudaesokhari" target="_blank"
                    style="color: #fff; margin: 0 10px; font-size: 1.3rem; text-decoration: none;"><i
                        class="fab fa-instagram"></i></a>
                <a href="https://wa.me/6281234567890" target="_blank"
                    style="color: #fff; margin: 0 10px; font-size: 1.3rem; text-decoration: none;"><i
                        class="fab fa-whatsapp"></i></a>
                <a href="mailto:esokhari@gmail.com"
                    style="color: #fff; margin: 0 10px; font-size: 1.3rem; text-decoration: none;"><i
                        class="fas fa-envelope"></i></a>
            </div>
            <div style="font-size: 0.85rem; color: #888;">&copy; {{ date('Y') }} Esokhari. All rights reserved.
            </div>
        </div>
    </footer>    
</body>
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script>
    var currentSection = 'home'; // Default section

    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobileNavMenu');
        mobileMenu.classList.toggle('active');
        
        // Prevent body scroll when menu is open
        if (mobileMenu.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }

    function showSection(sectionId) {
        currentSection = sectionId;
        // Map nav link text to section IDs
        const sectionMap = {
            'home': 'home',
            'portfolio': 'portofolio',
            'service': 'service',
            'contact': 'contact',
            'booking': 'booking'
        };

        if (sectionId != 'home') {
            // If booking section, ensure navbar is in scrolled state for readability
            document.getElementById("navbar").classList.add("scrolled");
            document.querySelector("#navbar img").style.filter = "brightness(0) invert(0)";
        } else {
            // For other sections, remove scrolled state if at top
            if (window.scrollY === 0) {
                document.getElementById("navbar").classList.remove("scrolled");
                document.querySelector("#navbar img").style.filter = "brightness(0) invert(1)";
            }
        }

        // Hide all sections
        Object.values(sectionMap).forEach(id => {
            const section = document.getElementById(id);
            if (section) {
                section.style.display = 'none';
            }
        });

        // Show the selected section
        const section = document.getElementById(sectionId);
        if (section) {
            section.style.display = 'block';
        }

        // Update active link styling
        document.querySelectorAll('.nav-link').forEach(li => {
            li.classList.remove('nav-link-active');
            const linkText = li.textContent.trim().toLowerCase();
            if (sectionMap[linkText] === sectionId) {
                li.classList.add('nav-link-active');
            }
        });

        // Close mobile menu if open
        const mobileMenu = document.getElementById('mobileNavMenu');
        if (mobileMenu && mobileMenu.classList.contains('active')) {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Update URL parameter without reloading the page
        const url = new URL(window.location);
        url.searchParams.set('section', sectionId);
        window.history.pushState({}, '', url);
    }

    // On page load, check for section parameter and show appropriate section
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const sectionParam = urlParams.get('section');

        if (sectionParam) {
            showSection(sectionParam);
        } else {
            // Show home by default and set HOME as active
            showSection('home');
        }
    });

    const navbar = document.getElementById("navbar");
    const heroImg = document.getElementById("hero-img");

    window.addEventListener("scroll", function() {
        if (currentSection != 'home') {
            // set bg white and logo dark and text dark for better readability
            navbar.classList.add("scrolled");
            navbar.querySelector("img").style.filter = "brightness(0) invert(0)";

        } else {
            // Navbar scroll effect
            if (window.scrollY > 0) {
                navbar.classList.add("scrolled");
                navbar.querySelector("img").style.filter = "brightness(0) invert(0)";
            } else {
                navbar.classList.remove("scrolled");
                navbar.querySelector("img").style.filter = "brightness(0) invert(1)";
            }

            // Dynamic hero image zoom based on scroll
            // 0px scroll = scale(1.1), 400px+ scroll = scale(1)
            let minScale = 1;
            let maxScale = 1.1;
            let scrollTop = window.scrollY;
            let maxScroll = 400;
            let scale = maxScale - (Math.min(scrollTop, maxScroll) / maxScroll) * (maxScale - minScale);
            heroImg.style.transform = `scale(${scale})`;
        }
    });
</script>

<!-- Add this in the <head> section or before closing </body> -->
<script>
// Add after existing scripts in landing.blade.php
var servicesData = @json($services);
var additionalsData = @json($additionals);

function formatPrice(price) {
    return new Intl.NumberFormat('id-ID', { 
        style: 'currency', 
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(price);
}

function createServiceCard(service) {
    return `
        <div style="background: #fff; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); padding: 28px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
            <div style="background: linear-gradient(135deg, #222 0%, #444 100%); color: #fff; padding: 16px 20px; border-radius: 12px; margin-bottom: 20px;">
                <h4 style="font-size: 1.4rem; margin: 0 0 8px 0; font-weight: 600; letter-spacing: 0.5px;">${service.package}</h4>
                <div style="font-size: 0.9rem; opacity: 0.9;">
                    <i class="fas fa-clock"></i> ${service.duration} jam
                </div>
            </div>
            <div style="margin-bottom: 20px;">
                <div style="font-size: 2rem; color: #222; font-weight: 600; margin-bottom: 8px;">
                    ${formatPrice(service.price)}
                </div>
            </div>
            ${service.description ? `
                <div style="font-size: 0.9rem; color: #666; line-height: 1.6; padding-top: 16px; border-top: 1px solid #eee;">
                    ${service.description}
                </div>
            ` : ''}
        </div>
    `;
}

function createAddOnCard(addon) {
    return `
        <div style="background: #f9f9f9; border-radius: 12px; padding: 20px; border-left: 4px solid #222;">
            <h5 style="font-size: 1.1rem; color: #222; margin: 0 0 10px 0; font-weight: 600;">${addon.package}</h5>
            <div style="font-size: 1.3rem; color: #222; font-weight: 600; margin-bottom: 8px;">
                ${formatPrice(addon.price)}
            </div>
            ${addon.description ? `
                <div style="font-size: 0.85rem; color: #666; line-height: 1.5;">
                    ${addon.description}
                </div>
            ` : ''}
        </div>
    `;
}

document.getElementById('serviceCity').addEventListener('change', function() {
    const selectedCity = this.value;
    const servicesContainer = document.getElementById('servicesContainer');
    const noServicesMessage = document.getElementById('noServicesMessage');
    const mainPackagesList = document.getElementById('mainPackagesList');
    const addOnPackagesList = document.getElementById('addOnPackagesList');
    
    if (!selectedCity) {
        servicesContainer.style.display = 'none';
        noServicesMessage.style.display = 'block';
        return;
    }
    
    // Filter services by city
    const cityServices = servicesData.filter(s => s.city === selectedCity);
    const cityAddOns = additionalsData.filter(a => a.city === selectedCity);
    
    if (cityServices.length === 0 && cityAddOns.length === 0) {
        servicesContainer.style.display = 'none';
        noServicesMessage.style.display = 'block';
        noServicesMessage.innerHTML = `
            <i class="fas fa-info-circle" style="font-size: 3rem; margin-bottom: 16px; color: #ddd;"></i>
            <p style="font-size: 1.1rem; color: #999;">Belum ada paket tersedia untuk kota ${selectedCity}</p>
        `;
        return;
    }
    
    // Show services
    servicesContainer.style.display = 'block';
    noServicesMessage.style.display = 'none';
    
    // Populate main packages
    if (cityServices.length > 0) {
        document.getElementById('mainPackages').style.display = 'block';
        mainPackagesList.innerHTML = cityServices.map(service => createServiceCard(service)).join('');
    } else {
        document.getElementById('mainPackages').style.display = 'none';
    }
    
    // Populate add-ons
    if (cityAddOns.length > 0) {
        document.getElementById('addOnPackages').style.display = 'block';
        addOnPackagesList.innerHTML = cityAddOns.map(addon => createAddOnCard(addon)).join('');
    } else {
        document.getElementById('addOnPackages').style.display = 'none';
    }
    
    // Add hover effects
    document.querySelectorAll('#mainPackagesList > div').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
            this.style.boxShadow = '0 12px 32px rgba(0,0,0,0.12)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 20px rgba(0,0,0,0.06)';
        });
    });
});

// Initial state
document.getElementById('noServicesMessage').style.display = 'block';
</script>

</html>
