<?php

require_once "koneksi.php";

$pesan = "";
$berhasil = false;
$id_pendaftaran = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nisn = trim($_POST["nisn"] ?? "");
    $nama = trim($_POST["nama"] ?? "");
    $tempat_lahir = trim($_POST["tempat_lahir"] ?? "");
    $tanggal_lahir = $_POST["tanggal_lahir"] ?? "";
    $asal_sekolah = trim($_POST["asal_sekolah"] ?? "");
    $no_wa = trim($_POST["no_wa"] ?? "");

    if (
        $nisn === "" ||
        $nama === "" ||
        $tempat_lahir === "" ||
        $tanggal_lahir === "" ||
        $asal_sekolah === "" ||
        $no_wa === ""
    ) {

        $pesan = "Semua data wajib diisi.";

    } else {

        $cek = $conn->prepare(
            "SELECT id FROM pendaftaran WHERE nisn = ?"
        );

        $cek->bind_param("s", $nisn);

        $cek->execute();

        $hasil = $cek->get_result();

        if ($hasil->num_rows > 0) {

            $pesan = "NISN tersebut sudah terdaftar.";

        } else {

            $stmt = $conn->prepare(
                "INSERT INTO pendaftaran
                (
                    nisn,
                    nama,
                    tempat_lahir,
                    tanggal_lahir,
                    asal_sekolah,
                    no_wa
                )
                VALUES (?, ?, ?, ?, ?, ?)"
            );

            $stmt->bind_param(
                "ssssss",
                $nisn,
                $nama,
                $tempat_lahir,
                $tanggal_lahir,
                $asal_sekolah,
                $no_wa
            );

            if ($stmt->execute()) {

                $berhasil = true;

                $id_pendaftaran = $conn->insert_id;

            } else {

                $pesan = "Data gagal disimpan: " . $stmt->error;
            }

            $stmt->close();
        }

        $cek->close();
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Pendaftaran - SPMB SMP Karya</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Inter, sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #edf5ff,
                    #f7faff
                );

            color: #172033;

            min-height: 100vh;
        }

        .header {
            background: linear-gradient(
                135deg,
                #1267e8,
                #0b4db0
            );

            color: white;

            padding: 25px 20px;
        }

        .header-inner {
            max-width: 900px;
            margin: auto;
        }

        .header h1 {
            margin-bottom: 5px;
        }

        .container {
            width: 92%;
            max-width: 760px;

            margin: 40px auto;
        }

        .card {
            background: white;

            padding: 38px;

            border-radius: 22px;

            box-shadow:
                0 20px 60px
                rgba(31,50,81,.1);
        }

        .title {
            margin-bottom: 30px;
        }

        .title h2 {
            margin-bottom: 8px;
        }

        .title p {
            color: #667085;
            line-height: 1.6;
        }

        .alert {
            padding: 15px;

            border-radius: 12px;

            margin-bottom: 20px;

            background: #fff1f1;

            color: #b42318;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            font-weight: 700;

            font-size: 14px;

            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;

            padding: 14px 15px;

            border: 1px solid #d8dee8;

            border-radius: 10px;

            font-family: inherit;

            font-size: 14px;

            outline: none;

            transition: .2s;
        }

        .form-group input:focus {
            border-color: #1267e8;

            box-shadow:
                0 0 0 3px
                rgba(18,103,232,.1);
        }

        .buttons {
            display: flex;

            gap: 12px;

            margin-top: 28px;
        }

        .btn {
            flex: 1;

            padding: 14px;

            border-radius: 10px;

            text-align: center;

            font-weight: 700;

            text-decoration: none;

            border: none;

            cursor: pointer;

            font-size: 14px;
        }

        .btn-kembali {
            background: #eef1f5;
            color: #344054;
        }

        .btn-submit {
            background: #1267e8;
            color: white;
        }

        .success {
            text-align: center;
        }

        .success-icon {
            width: 80px;
            height: 80px;

            margin: auto auto 20px;

            border-radius: 50%;

            background: #dcfae6;
            color: #067647;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 40px;
        }

        .success h2 {
            margin-bottom: 10px;
        }

        .success p {
            color: #667085;
            line-height: 1.7;
        }

        .nomor {
            margin: 25px auto;

            padding: 20px;

            max-width: 280px;

            border-radius: 14px;

            background: #eef5ff;

            color: #1267e8;
        }

        .nomor strong {
            display: block;

            font-size: 30px;

            margin-top: 5px;
        }

        @media(max-width:600px) {

            .card {
                padding: 25px 20px;
            }

            .buttons {
                flex-direction: column;
            }

        }

    </style>

</head>

<body>


<div class="header">

    <div class="header-inner">

        <h1>
            SPMB SMP Karya
        </h1>

        <p>
            Formulir Pendaftaran Murid Baru
        </p>

    </div>

</div>


<div class="container">

    <div class="card">

        <?php if ($berhasil): ?>

            <div class="success">

                <div class="success-icon">
                    ✓
                </div>

                <h2>
                    Pendaftaran Berhasil
                </h2>

                <p>
                    Data kamu berhasil disimpan ke sistem.
                </p>

                <div class="nomor">

                    <small>
                        No. Pendaftaran
                    </small>

                    <strong>
                        <?= htmlspecialchars($id_pendaftaran) ?>
                    </strong>

                </div>

                <div class="buttons">

                    <a
                        href="index.php"
                        class="btn btn-kembali"
                    >
                        Kembali ke Beranda
                    </a>

                    <a
                        href="pendaftaran.php"
                        class="btn btn-submit"
                    >
                        Daftar Lagi
                    </a>

                </div>

            </div>

        <?php else: ?>

            <div class="title">

                <h2>
                    Formulir Pendaftaran
                </h2>

                <p>
                    Silakan isi seluruh data calon murid
                    dengan benar.
                </p>

            </div>


            <?php if ($pesan !== ""): ?>

                <div class="alert">
                    <?= htmlspecialchars($pesan) ?>
                </div>

            <?php endif; ?>


            <form
                method="POST"
                action="pendaftaran.php"
            >

                <div class="form-group">

                    <label for="nisn">
                        NISN
                    </label>

                    <input
                        type="text"
                        id="nisn"
                        name="nisn"
                        placeholder="Masukkan NISN"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="nama">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan nama lengkap"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="tempat_lahir">
                        Tempat Lahir
                    </label>

                    <input
                        type="text"
                        id="tempat_lahir"
                        name="tempat_lahir"
                        placeholder="Contoh: Kudus"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="tanggal_lahir">
                        Tanggal Lahir
                    </label>

                    <input
                        type="date"
                        id="tanggal_lahir"
                        name="tanggal_lahir"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="asal_sekolah">
                        Asal Sekolah
                    </label>

                    <input
                        type="text"
                        id="asal_sekolah"
                        name="asal_sekolah"
                        placeholder="Masukkan asal sekolah"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="no_wa">
                        No. WhatsApp
                    </label>

                    <input
                        type="tel"
                        id="no_wa"
                        name="no_wa"
                        placeholder="Contoh: 081234567890"
                        required
                    >

                </div>


                <div class="buttons">

                    <a
                        href="index.php"
                        class="btn btn-kembali"
                    >
                        ← Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-submit"
                    >
                        Kirim Pendaftaran
                    </button>

                </div>

            </form>

        <?php endif; ?>

    </div>

</div>

</body>

</html>