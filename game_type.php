<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประเภทเกม</title>
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
            background-color: #f97316;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }
        .btn:hover {
            background-color: #ea580c;
        }
        .btn-wrap {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            border-collapse: collapse;
            background: #2a2a40;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        }
        thead {
            background: linear-gradient(135deg, #f97316, #ec4899);
        }
        th {
            padding: 14px;
            color: #fff;
            text-transform: uppercase;
            font-size: 13px;
        }
        td {
            padding: 14px;
            border-bottom: 1px solid #3a3a55;
            text-align: center;
        }
        tbody tr:hover {
            background: #34345080;
        }
        footer {
            text-align: center;
            margin: 30px auto 0;
            padding: 20px;
            color: #a1a1c2;
            font-size: 14px;
            width: 100%;
            max-width: 500px;
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
    
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        include 'action/connect.php';

        $sql = "SELECT * FROM game_types";
        $result = mysqli_query($con, $sql);
    ?>

    <h1>🕹️ ประเภทเกมทั้งหมด</h1>

    <div class="btn-wrap">
        <a href="index.php" class="btn">กลับไปหน้ารายการเกม</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>รหัสประเภท</th>
                <th>ชื่อประเภท</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($result as $type){
                    ?>
                    <tr>
                        <td> <?= $type["type_id"] ?> </td>
                        <td> <?= $type["type_name"] ?> </td>
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