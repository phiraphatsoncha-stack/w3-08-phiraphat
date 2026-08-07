<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มเกมใหม่</title>
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
            display: flex;
            justify-content: center;
        }
        form {
            background: #2a2a40;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
            width: 100%;
            max-width: 480px;
        }
        h1 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 24px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #c7c7d9;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #3a3a55;
            border-radius: 8px;
            background: #1e1e2f;
            color: #fff;
            font-size: 14px;
        }
        input[type="text"]:focus,
        select:focus {
            outline: none;
            border-color: #6366f1;
        }
        select option {
            background: #2a2a40;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #6366f1;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            transition: 0.2s;
        }
        button:hover {
            background-color: #4f46e5;
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
    </style>
</head>
<body>

    <form action="action/insert_game.php" method="post">

        <h1>➕ เพิ่มเกมใหม่</h1>

        <label for="">รหัสเกม</label>
        <input type="text" name="game_id">

        <label for="">ชื่อเกม</label>
        <input type="text" name="game_name">

        <label for="">ราคา</label>
        <input type="text" name="game_price">

        <label for="">ภาพปก</label>
        <input type="text" name="game_cover">

        <?php
            include 'action/connect.php';

            $sql = "SELECT * FROM game_types";
            
            $result = mysqli_query($con, $sql);
        ?>

        <label for="">ประเภท</label>
        <select name="type_id" id="">
            <?php
                foreach($result as $type){
                    ?>
                        <option value=" <?= $type["type_id"] ?>"> <?= $type["type_name"] ?> </option>
                    <?php
                }
            ?>
        </select>

        <button>บันทึก</button>

        <div class="btn-wrap">
            <a href="index.php" class="btn btn-add">กลับหน้าหน้าหลัก</a>
        </div>

    </form>

</body>
</html>