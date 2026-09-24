<?php

session_start();

require_once "koneksi.php";


/* =========================
   LOGIN ADMIN
========================= */

$username_admin = "root";
$password_admin = "12345";


if (isset($_POST["login"])) {

    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if (
        $username === $username_admin &&
        $password === $password_admin
    ) {

        $_SESSION["admin_login"] = true;

        header("Location: admin.php");
        exit;

    } else {

        $login_error = "Username atau password salah.";
    }
}


/* =========================
   LOGOUT
========================= */

if (isset($_GET["logout"])) {

    session_destroy();

    header("Location: admin.php");

    exit;
}


/* =========================
   CEK LOGIN
========================= */

if (!isset($_SESSION["admin_login"])) {
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Admin - SMP Karya</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;

            font-family: Arial, sans-serif;

            min-height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

            background:
                linear-gradient(
                    135deg,
                    #1267e8,
                    #0b4db0
                );

            padding: 20px;
        }

        .login {
            width: 100%;
            max-width: 400px;

            background: white;

            padding: 35px;

            border-radius: 20px;

            box-shadow:
                0 25px 60px
                rgba(0,0,0,.2);
        }

        .icon {
            text-align: center;

            font-size: 50px;

            margin-bottom: 10px;
        }

        h1 {
            text-align: center;

            margin-bottom: 8px;
        }

        .sub {
            text-align: center;

            color: #667085;

            margin-bottom: 28px;
        }

        label {
            display: block;

            font-weight: bold;

            margin-bottom: 7px;
        }

        input {
            width: 100%;

            padding: 13px;

            border: 1px solid #d5dbe5;

            border-radius: 9px;

            margin-bottom: 18px;

            font-size: 14px;
        }

        button {
            width: 100%;

            padding: 13px;

            border: none;

            border-radius: 9px;

            background: #1267e8;

            color: white;

            font-size: 15px;

            font-weight: bold;

            cursor: pointer;
        }

        .error {
            background: #fee4e2;

            color: #b42318;

            padding: 12px;

            border-radius: 9px;

            margin-bottom: 18px;

            text-align: center;
        }

        .back {
            display: block;

            text-align: center;

            margin-top: 18px;

            text-decoration: none;

            color: #1267e8;
        }

    </style>

</head>

<body>


<div class="login">

    <div class="icon">
        🔐
    </div>

    <h1>
        Admin SPMB
    </h1>

    <p class="sub">
        SMP Karya
    </p>


    <?php if (!empty($login_error)): ?>

        <div class="error">
            <?= htmlspecialchars($login_error) ?>
        </div>

    <?php endif; ?>


    <form method="POST">

        <label>
            Username
        </label>

        <input
            type="text"
            name="username"
            required
        >


        <label>
            Password
        </label>

        <input
            type="password"
            name="password"
            required
        >


        <button
            type="submit"
            name="login"
        >
            Login Admin
        </button>

    </form>


    <a
        href="index.php"
        class="back"
    >
        ← Kembali ke Beranda
    </a>

</div>

</body>

</html>

<?php
exit;
}


/* =========================
   KONFIRMASI / TOLAK
========================= */

if (
    isset($_GET["aksi"]) &&
    isset($_GET["id"])
) {

    $id = (int) $_GET["id"];

    if ($_GET["aksi"] === "konfirmasi") {

        $status = "Dikonfirmasi";

    } elseif ($_GET["aksi"] === "tolak") {

        $status = "Ditolak";

    } else {

        $status = "";
    }


    if ($status !== "") {

        $stmt = $conn->prepare(
            "UPDATE pendaftaran
             SET status = ?
             WHERE id = ?"
        );

        $stmt->bind_param(
            "si",
            $status,
            $id
        );

        $stmt->execute();

        $stmt->close();

        header("Location: admin.php");
        exit;
    }
}


/* =========================
   DATA PENDAFTAR
========================= */

$result = $conn->query(
    "SELECT *
     FROM pendaftaran
     ORDER BY id DESC"
);

if (!$result) {

    die(
        "Query database gagal: "
        . $conn->error
    );
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin SPMB - SMP Karya</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;

            background: #f3f7ff;

            color: #172033;
        }

        header {
            background:
                linear-gradient(
                    135deg,
                    #1267e8,
                    #0b4db0
                );

            color: white;

            padding: 22px 30px;
        }

        .head {
            max-width: 1450px;
            margin: auto;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;
        }

        header h1 {
            margin-bottom: 5px;
            font-size: 23px;
        }

        header p {
            opacity: .85;
        }

        .logout {
            background: #ef4444;

            color: white;

            text-decoration: none;

            padding: 11px 18px;

            border-radius: 9px;
        }

        .container {
            width: 95%;

            max-width: 1450px;

            margin: 30px auto;
        }

        .top {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;
        }

        .jumlah {
            background: #1267e8;

            color: white;

            padding: 10px 18px;

            border-radius: 20px;

            font-weight: bold;
        }

        .table-card {
            background: white;

            border-radius: 15px;

            padding: 20px;

            box-shadow:
                0 8px 25px
                rgba(0,0,0,.06);

            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 1200px;
        }

        th {
            background: #eaf2ff;

            color: #164b9a;

            padding: 13px;

            text-align: left;

            white-space: nowrap;
        }

        td {
            padding: 13px;

            border-bottom:
                1px solid #e7ebf0;

            white-space: nowrap;
        }

        tr:hover td {
            background: #f8fbff;
        }

        .status {
            display: inline-block;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: bold;
        }

        .menunggu {
            background: #fff4cc;
            color: #8a5b00;
        }

        .dikonfirmasi {
            background: #dcfae6;
            color: #067647;
        }

        .ditolak {
            background: #fee4e2;
            color: #b42318;
        }

        .aksi {
            display: flex;

            gap: 5px;
        }

        .btn {
            display: inline-block;

            padding: 7px 10px;

            border-radius: 7px;

            color: white;

            text-decoration: none;

            font-size: 12px;

            font-weight: bold;
        }

        .confirm {
            background: #16a34a;
        }

        .reject {
            background: #dc2626;
        }

        .empty {
            text-align: center;

            padding: 60px 20px;

            color: #667085;
        }

        @media(max-width:700px) {

            .head {
                flex-direction: column;

                align-items: flex-start;
            }

            .logout {
                width: 100%;

                text-align: center;
            }

            .top {
                flex-direction: column;

                align-items: flex-start;

                gap: 12px;
            }

        }

    </style>

</head>

<body>


<header>

    <div class="head">

        <div>

            <h1>
                📋 Admin SPMB SMP Karya
            </h1>

            <p>
                Kelola peserta pendaftaran
            </p>

        </div>


        <a
            href="admin.php?logout=1"
            class="logout"
        >
            Logout
        </a>

    </div>

</header>


<div class="container">


    <div class="top">

        <h2>
            Data Pendaftar
        </h2>

        <div class="jumlah">

            <?= $result->num_rows ?>

            Peserta

        </div>

    </div>


    <div class="table-card">


        <?php if ($result->num_rows > 0): ?>


            <table>

                <thead>

                    <tr>

                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Asal Sekolah</th>
                        <th>No. WA</th>
                        <th>Tanggal Input</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>


                <tbody>

                <?php

                $no = 1;

                while (
                    $row = $result->fetch_assoc()
                ):

                    $status =
                        $row["status"]
                        ?? "Menunggu";

                    if (
                        $status ===
                        "Dikonfirmasi"
                    ) {

                        $status_class =
                            "dikonfirmasi";

                    } elseif (
                        $status === "Ditolak"
                    ) {

                        $status_class =
                            "ditolak";

                    } else {

                        $status_class =
                            "menunggu";
                    }

                ?>


                    <tr>

                        <td>
                            <?= $no++ ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $row["nisn"]
                            ) ?>
                        </td>

                        <td>
                            <strong>
                                <?= htmlspecialchars(
                                    $row["nama"]
                                ) ?>
                            </strong>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $row["tempat_lahir"]
                            ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $row["tanggal_lahir"]
                            ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $row["asal_sekolah"]
                            ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $row["no_wa"]
                            ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $row["tanggal_input"]
                            ) ?>
                        </td>

                        <td>

                            <span
                                class="status
                                <?= $status_class ?>"
                            >

                                <?= htmlspecialchars(
                                    $status
                                ) ?>

                            </span>

                        </td>

                        <td>

                            <div class="aksi">

                                <?php if (
                                    $status !==
                                    "Dikonfirmasi"
                                ): ?>

                                    <a
                                        href="admin.php?aksi=konfirmasi&id=<?= $row["id"] ?>"
                                        class="btn confirm"
                                        onclick="return confirm('Konfirmasi peserta ini?')"
                                    >
                                        ✓ Konfirmasi
                                    </a>

                                <?php endif; ?>


                                <?php if (
                                    $status !== "Ditolak"
                                ): ?>

                                    <a
                                        href="admin.php?aksi=tolak&id=<?= $row["id"] ?>"
                                        class="btn reject"
                                        onclick="return confirm('Tolak peserta ini?')"
                                    >
                                        ✕ Tolak
                                    </a>

                                <?php endif; ?>

                            </div>

                        </td>

                    </tr>


                <?php endwhile; ?>

                </tbody>

            </table>


        <?php else: ?>


            <div class="empty">

                <h3>
                    Belum ada pendaftar
                </h3>

                <p>
                    Data peserta akan muncul
                    setelah melakukan pendaftaran.
                </p>

            </div>


        <?php endif; ?>


    </div>

</div>


</body>

</html>

<?php

$conn->close();

?>