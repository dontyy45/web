<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SPMB SMP Karya</title>

    <link rel="stylesheet" href="style.css">

    <style>
        /* ================= HERO ================= */

        .hero {
            min-height: calc(100vh - 75px);
            display: flex;
            align-items: center;
            overflow: hidden;
            position: relative;

            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(70,140,255,.18),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(20,100,230,.15),
                    transparent 25%
                ),
                #f5f9ff;
        }

        .hero-container {
            width: 92%;
            max-width: 1200px;
            margin: auto;

            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .hero-text {
            animation: munculKiri 1s ease;
        }

        @keyframes munculKiri {
            from {
                opacity: 0;
                transform: translateX(-60px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-badge {
            display: inline-block;

            padding: 9px 15px;
            margin-bottom: 20px;

            border-radius: 50px;

            background: #e7f0ff;
            color: #1267e8;

            font-size: 12px;
            font-weight: 800;
        }

        .hero h1 {
            font-size: clamp(42px, 6vw, 70px);
            line-height: 1.05;

            letter-spacing: -2px;

            margin-bottom: 20px;
        }

        .hero h1 span {
            display: block;
            color: #1267e8;

            animation: teksBergerak 3s ease-in-out infinite;
        }

        @keyframes teksBergerak {
            0%,100% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(7px);
            }
        }

        .hero-text p {
            color: #667085;
            font-size: 16px;
            line-height: 1.8;

            max-width: 600px;

            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .hero-btn {
            display: inline-block;
            padding: 14px 22px;

            border-radius: 11px;

            font-size: 14px;
            font-weight: 700;

            transition: .3s;
        }

        .hero-btn-primary {
            background: #1267e8;
            color: white;

            box-shadow:
                0 10px 25px
                rgba(18,103,232,.25);
        }

        .hero-btn-primary:hover {
            transform:
                translateY(-5px)
                scale(1.03);
        }

        .hero-btn-secondary {
            background: white;
            color: #344054;

            border: 1px solid #dfe5ee;
        }

        .hero-btn-secondary:hover {
            transform: translateY(-5px);

            color: #1267e8;

            border-color: #1267e8;
        }


        /* ================= FOTO ================= */

        .hero-image {
            position: relative;

            animation: munculKanan 1s ease;
        }

        @keyframes munculKanan {
            from {
                opacity: 0;
                transform:
                    translateX(60px)
                    scale(.9);
            }

            to {
                opacity: 1;
                transform:
                    translateX(0)
                    scale(1);
            }
        }

        .photo-card {
            background: white;

            padding: 15px;

            border-radius: 25px;

            box-shadow:
                0 25px 70px
                rgba(20,45,90,.15);

            animation:
                mengambang 4s ease-in-out infinite;
        }

        @keyframes mengambang {
            0%,100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        .school-photo {
            height: 420px;

            border-radius: 18px;

            background:
                linear-gradient(
                    rgba(18,103,232,.08),
                    rgba(18,103,232,.08)
                ),
                url("https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1200&q=80");

            background-size: cover;
            background-position: center;
        }


        /* ================= BOX ================= */

        .feature-section {
            padding: 90px 0;
            background: white;
        }

        .feature-container {
            width: 92%;
            max-width: 1200px;
            margin: auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-title span {
            color: #1267e8;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .section-title h2 {
            font-size: 38px;
            margin: 10px 0;
        }

        .section-title p {
            color: #667085;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 22px;
        }

        .feature-box {
            background: #fff;

            border: 1px solid #e7ebf2;

            padding: 30px;

            border-radius: 20px;

            box-shadow:
                0 10px 30px
                rgba(20,45,90,.06);

            opacity: 0;

            transform: translateY(50px);

            animation:
                boxMuncul .8s ease forwards;

            transition:
                .35s;
        }

        .feature-box:nth-child(1) {
            animation-delay: .2s;
        }

        .feature-box:nth-child(2) {
            animation-delay: .4s;
        }

        .feature-box:nth-child(3) {
            animation-delay: .6s;
        }

        @keyframes boxMuncul {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-box:hover {
            transform:
                translateY(-12px)
                scale(1.02);

            box-shadow:
                0 25px 50px
                rgba(20,45,90,.12);
        }

        .feature-icon {
            width: 55px;
            height: 55px;

            display: flex;
            justify-content: center;
            align-items: center;

            border-radius: 15px;

            background: #eaf2ff;
            color: #1267e8;

            font-size: 24px;

            margin-bottom: 18px;
        }

        .feature-box h3 {
            margin-bottom: 10px;
        }

        .feature-box p {
            color: #667085;
            font-size: 14px;
            line-height: 1.7;
        }


        /* ================= STATS ================= */

        .stats {
            background:
                linear-gradient(
                    135deg,
                    #1267e8,
                    #08469f
                );

            color: white;

            padding: 70px 0;
        }

        .stats-container {
            width: 92%;
            max-width: 1200px;
            margin: auto;

            display: grid;
            grid-template-columns: repeat(4,1fr);

            gap: 20px;

            text-align: center;
        }

        .stat-box {
            padding: 25px;

            border-radius: 15px;

            background:
                rgba(255,255,255,.08);

            transition: .3s;
        }

        .stat-box:hover {
            transform: translateY(-8px);
        }

        .stat-box h2 {
            font-size: 40px;
            margin-bottom: 5px;
        }

        .stat-box p {
            opacity: .85;
        }


        /* ================= SPONSOR ================= */

        .sponsor-section {
            background: white;
            padding: 70px 0;
            overflow: hidden;
        }

        .sponsor-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .sponsor-title h2 {
            margin-bottom: 7px;
        }

        .sponsor-title p {
            color: #667085;
        }

        .sponsor-wrapper {
            width: 100%;
            overflow: hidden;
        }

        .sponsor-track {
            display: flex;
            width: max-content;

            animation:
                sponsorJalan 25s linear infinite;
        }

        .sponsor-box {
            width: 180px;
            height: 80px;

            margin: 0 10px;

            border: 1px solid #e5eaf1;

            border-radius: 15px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: 800;

            color: #667085;

            background: #fafcff;
        }

        @keyframes sponsorJalan {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }


        /* ================= CTA ================= */

        .cta {
            padding: 90px 20px;

            text-align: center;

            background:
                linear-gradient(
                    135deg,
                    #1267e8,
                    #08469f
                );

            color: white;
        }

        .cta h2 {
            font-size: 38px;
            margin-bottom: 12px;
        }

        .cta p {
            margin-bottom: 25px;
            opacity: .9;
        }

        .cta a {
            display: inline-block;

            padding: 14px 22px;

            border-radius: 11px;

            background: white;

            color: #1267e8;

            font-weight: 800;

            transition: .3s;
        }

        .cta a:hover {
            transform:
                translateY(-5px)
                scale(1.03);
        }


        /* ================= RESPONSIVE ================= */

        @media(max-width:900px) {

            .hero-container {
                grid-template-columns: 1fr;

                text-align: center;
            }

            .hero-text p {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-image {
                max-width: 650px;
                width: 100%;
                margin: auto;
            }

            .feature-grid {
                grid-template-columns: repeat(2,1fr);
            }

            .stats-container {
                grid-template-columns: repeat(2,1fr);
            }
        }


        @media(max-width:600px) {

            .hero {
                padding: 110px 0 60px;
            }

            .hero h1 {
                font-size: 40px;
            }

            .school-photo {
                height: 280px;
            }

            .feature-grid,
            .stats-container {
                grid-template-columns: 1fr;
            }

            .cta h2 {
                font-size: 30px;
            }
        }

    </style>

</head>


<body>


<!-- ================= NAVBAR ================= -->

<nav class="navbar">

    <div class="nav-container">

        <a href="index.php" class="logo">
            🎓 SMP KARYA
        </a>

        <div class="nav-menu">

            <a href="index.php" class="active">
                Beranda
            </a>

            <a href="informasi.php">
                Informasi
            </a>

            <a href="jadwal.php">
                Jadwal
            </a>

            <a href="alur.php">
                Alur
            </a>

            <a href="pendaftaran.php"
               class="btn-nav">
                Daftar Sekarang
            </a>

            <a href="admin.php">
                Admin
            </a>

        </div>

    </div>

</nav>


<!-- ================= HERO ================= -->

<section class="hero">

    <div class="hero-container">


        <div class="hero-text">

            <div class="hero-badge">
                ✨ SPMB SMP KARYA
            </div>


            <h1>
                Raih Masa Depanmu
                <span>
                    Bersama SMP Karya
                </span>
            </h1>


            <p>
                Selamat datang di Sistem Penerimaan Murid
                Baru SMP Karya. Temukan informasi sekolah,
                jadwal, alur pendaftaran, dan lakukan
                pendaftaran dengan mudah.
            </p>


            <div class="hero-buttons">

                <a
                    href="pendaftaran.php"
                    class="hero-btn hero-btn-primary">

                    🚀 Daftar Sekarang

                </a>


                <a
                    href="informasi.php"
                    class="hero-btn hero-btn-secondary">

                    Lihat Informasi

                </a>

            </div>

        </div>


        <!-- FOTO SEKOLAH -->

        <div class="hero-image">

            <div class="photo-card">

                <div class="school-photo"></div>

            </div>

        </div>


    </div>

</section>


<!-- ================= FITUR ================= -->

<section class="feature-section">

    <div class="feature-container">

        <div class="section-title">

            <span>
                Kenapa SMP Karya?
            </span>

            <h2>
                Semua Lebih Mudah
            </h2>

            <p>
                Informasi dan pendaftaran tersedia
                dalam satu sistem.
            </p>

        </div>


        <div class="feature-grid">


            <div class="feature-box">

                <div class="feature-icon">
                    📝
                </div>

                <h3>
                    Pendaftaran Online
                </h3>

                <p>
                    Isi formulir pendaftaran secara online
                    dengan cepat dan mudah.
                </p>

            </div>


            <div class="feature-box">

                <div class="feature-icon">
                    📅
                </div>

                <h3>
                    Jadwal Jelas
                </h3>

                <p>
                    Lihat seluruh jadwal dan tahapan
                    penerimaan murid baru.
                </p>

            </div>


            <div class="feature-box">

                <div class="feature-icon">
                    💾
                </div>

                <h3>
                    Data Terintegrasi
                </h3>

                <p>
                    Data pendaftaran tersimpan langsung
                    ke sistem sekolah.
                </p>

            </div>


        </div>

    </div>

</section>


<!-- ================= STATISTIK ================= -->

<section class="stats">

    <div class="stats-container">


        <div class="stat-box">

            <h2>
                25+
            </h2>

            <p>
                Tahun Berdiri
            </p>

        </div>


        <div class="stat-box">

            <h2>
                500+
            </h2>

            <p>
                Murid
            </p>

        </div>


        <div class="stat-box">

            <h2>
                40+
            </h2>

            <p>
                Guru & Staff
            </p>

        </div>


        <div class="stat-box">

            <h2>
                20+
            </h2>

            <p>
                Prestasi
            </p>

        </div>


    </div>

</section>


<!-- ================= CTA ================= -->

<section class="cta">

    <h2>
        Siap Bergabung dengan SMP Karya?
    </h2>

    <p>
        Segera isi formulir pendaftaran.
    </p>

    <a href="pendaftaran.php">
        Mulai Pendaftaran →
    </a>

</section>


<!-- ================= SPONSOR ================= -->

<section class="sponsor-section">

    <div class="sponsor-title">

        <h2>
            Partner & Sponsor
        </h2>

        <p>
            Didukung oleh berbagai partner SMP Karya
        </p>

    </div>


    <div class="sponsor-wrapper">

        <div class="sponsor-track">


            <div class="sponsor-box">
                SPONSOR 01
            </div>

            <div class="sponsor-box">
                SPONSOR 02
            </div>

            <div class="sponsor-box">
                SPONSOR 03
            </div>

            <div class="sponsor-box">
                SPONSOR 04
            </div>

            <div class="sponsor-box">
                SPONSOR 05
            </div>

            <div class="sponsor-box">
                SPONSOR 06
            </div>

            <div class="sponsor-box">
                SPONSOR 07
            </div>

            <div class="sponsor-box">
                SPONSOR 08
            </div>


            <!-- DUPLIKAT AGAR LOOPING -->

            <div class="sponsor-box">
                SPONSOR 01
            </div>

            <div class="sponsor-box">
                SPONSOR 02
            </div>

            <div class="sponsor-box">
                SPONSOR 03
            </div>

            <div class="sponsor-box">
                SPONSOR 04
            </div>

            <div class="sponsor-box">
                SPONSOR 05
            </div>

            <div class="sponsor-box">
                SPONSOR 06
            </div>

            <div class="sponsor-box">
                SPONSOR 07
            </div>

            <div class="sponsor-box">
                SPONSOR 08
            </div>


        </div>

    </div>

</section>


<!-- ================= FOOTER ================= -->

<footer>

    <div class="footer-container">

        <div>

            <h3>
                🎓 SMP Karya
            </h3>

            <p>
                Sistem Penerimaan Murid Baru SMP Karya.
            </p>

        </div>


        <div>

            <h3>
                Menu
            </h3>

            <ul>

                <li>
                    <a href="index.php">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="informasi.php">
                        Informasi
                    </a>
                </li>

                <li>
                    <a href="jadwal.php">
                        Jadwal
                    </a>
                </li>

                <li>
                    <a href="alur.php">
                        Alur
                    </a>
                </li>

            </ul>

        </div>


        <div>

            <h3>
                Kontak
            </h3>

            <p>
                📍 Jl. Pendidikan No. 1
            </p>

            <p>
                📞 0812-3456-7890
            </p>

        </div>

    </div>


    <div class="copyright">

        © 2026 SMP Karya

    </div>
    <script src="script.js"></script>

</footer>


</body>
</html>
