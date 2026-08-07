<!DOCTYPE html>
<html lang="en">
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
            margin-bottom: 20px;
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
            background-color: #22c55e;
        }
        .btn-add:hover {
            background-color: #16a34a;
        }
        .btn-wrap {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            max-width: 1100px;
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
        th {
            padding: 14px;
            color: #fff;
            text-transform: uppercase;
            font-size: 13px;
        }
        td {
            padding: 12px 14px;
            border-bottom: 1px solid #3a3a55;
            text-align: center;
        }
        tbody tr:hover {
            background: #34345080;
        }
        td img {
            border-radius: 8px;
            border: 2px solid #6366f1;
        }
    </style>
</head>
<body>
    
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        include 'action/connect.php';

        $sql = "SELECT * FROM games";
        $result = mysqli_query($con, $sql);
    ?>

    <h1>🎮 รายการเกมทั้งหมด</h1>

    <div class="btn-wrap">
        <a href="game_type.php" class="btn">ดูประเภทเกมทั้งหมด</a>
        <a href="add_game.php" class="btn btn-add">➕ เพิ่มเกมใหม่</a>
        <a href="manage_game.php" class="btn btn-manage">จัดการเกม</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>รหัสเกม</th>
                <th>ชื่อเกม</th>
                <th>ราคา</th>
                <th>ภาพปก</th>
                <th>ประเภท</th>
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
                        <td> <img src="<?= $game["game_cover"] ?>" style="width:100px"> </td>
                        <td> <?= $game["type_id"] ?> </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>

</body>
</html>