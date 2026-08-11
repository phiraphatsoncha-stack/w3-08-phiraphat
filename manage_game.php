<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>รายการเกม</title>
<style>
    * {
        box-sizing: border-box;
        font-family: "Segoe UI", "Tahoma", sans-serif;
    }

    body {
        background: linear-gradient(135deg, #1e1e2f, #2b2b45);
        margin: 0;
        padding: 40px 20px;
        color: #fff;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        border-collapse: collapse;
        background: #2a2a40;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.4);
    }

    thead {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
    }

    thead th {
        color: #fff;
        padding: 14px;
        text-align: center;
        text-transform: uppercase;
        font-size: 13px;
        font-weight: 600;
    }

    tbody tr {
        border-bottom: 1px solid #3a3a55;
        transition: background 0.2s;
    }

    tbody tr:hover {
        background: #34345080;
    }

    tbody td {
        padding: 12px 14px;
        vertical-align: middle;
        text-align: center;
    }

    tbody td img {
        width: 100px;
        border-radius: 8px;
        border: 2px solid #6366f1;
        display: block;
        margin: 0 auto;
    }

    a.btn {
        text-decoration: none;
        padding: 6px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: bold;
        margin: 0 4px;
        display: inline-block;
        transition: 0.2s;
    }

    a.btn-edit {
        background-color: #3498db;
        color: #fff;
    }

    a.btn-edit:hover {
        background-color: #2980b9;
    }

    a.btn-delete {
        background-color: #e74c3c;
        color: #fff;
    }

    a.btn-delete:hover {
        background-color: #c0392b;
    }
    .btn {
            display: inline-block;
            padding: 10px 24px;
            background-color: #6366f1;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
            margin: 0 6px;
        }
        .btn:hover {
            background-color: #4f46e5;
        }
        .btn-add {
            background-color: #9b1717;
        }
        .btn-add:hover {
            background-color: #701b1b;
        }
        .btn-wrap {
            text-align: center;
            margin-bottom: 30px;
        }
       footer {
            text-align: center;
            margin: 30px auto 0;
            padding: 20px;
            color: #a1a1c2;
            font-size: 14px;
            width: 100%;
            max-width: 1200px;
        }
        footer a {
            color: #8b5cf6;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
</style>
</head>
<body>

<h1>🎮 รายการเกมทั้งหมด</h1>
<div class="btn-wrap">
            <a href="index.php" class="btn btn-add">กลับหน้าหน้าหลัก</a>
        </div>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'action/connect.php';

$sql = "SELECT * FROM games";

$result = mysqli_query($con, $sql);
?>

<table>
    <thead>
        <tr>
            <th>รหัสเกม</th>
            <th>ชื่อเกม</th>
            <th>ราคา</th>
            <th>ภาพปก</th>
            <th>ประเภท</th>
            <th>จัดการ</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($result as $game){
        ?>
        <tr>
            <td> <?= $game["game_id"] ?> </td>
            <td> <?= $game["game_name"] ?> </td>
            <td> <?= $game["game_price"] ?> </td>
            <td>
                <img src="<?= $game["game_cover"] ?>">
            </td>
            <td> <?= $game["type_id"] ?> </td>
            <td>
                <a href="edit_game.php?id=<?= $game['game_id'] ?>" class="btn btn-edit">แก้ไข</a>
                <a href="action/delete_game.php?id=<?= $game['game_id'] ?>" class="btn btn-delete">ลบ</a>
            </td>
        </tr>
        <?php
        }
    ?>
    </tbody>
</table>

    <footer>
        &copy; <?= date("Y") ?> ระบบจัดการร้านเกม | พัฒนาโดยFxrstyyy
    </footer>

</body>
</html>