<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขเกม</title>
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

        form {
            max-width: 600px;
            margin: 0 auto;
            background: #2a2a40;
            border-radius: 12px;
            padding: 30px 35px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
            color: #c7c7e0;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #3a3a55;
            border-radius: 8px;
            background: #1e1e2f;
            color: #fff;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #6366f1;
        }

        input[readonly] {
            opacity: 0.6;
            cursor: not-allowed;
        }

        select option {
            background: #1e1e2f;
            color: #fff;
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
            background-color: #9b1717;
        }
        .btn-add:hover {
            background-color: #701b1b;
        }
        .btn-wrap {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <?php
        $id = $_GET['id'];

        include 'action/connect.php';

        $sql = "SELECT * FROM games WHERE game_id = '$id' ";

        $result = mysqli_query($con, $sql);

        $game = mysqli_fetch_assoc($result);
    ?>

    <h1>✏️ แก้ไขเกม</h1>

    <form action="action/update_game.php" method="post">

        <label for="">รหัสเกม</label>
        <input type="text" name="game_id" value="<?= $game['game_id'] ?>" readonly> 

        <label for="">ชื่อเกม</label>
        <input type="text" name="game_name" value="<?= $game['game_name'] ?>">

        <label for="">ราคา</label>
        <input type="text" name="game_price" value="<?= $game['game_price'] ?>">

        <label for="">ภาพปก</label>
        <input type="text" name="game_cover" value="<?= $game['game_cover'] ?>">

        <?php
            $sql = "SELECT * FROM game_types";
            $result = mysqli_query($con, $sql);
        ?>

        <label for="">ประเภท</label>
        <select name="type_id" id="">
            <?php
                foreach($result as $type){
                    ?>
                        <option 
                            value="<?= $type["type_id"] ?>"                           
                            <?= $type["type_id"] == $game["type_id"] ? "selected" : "" ?>
                            > 
                            <?= $type["type_name"] ?> 
                        </option>
                    <?php
                }
            ?>
        </select>

        <button>บันทึก</button>

        <div class="btn-wrap">
            <a href="manage_game.php" class="btn btn-add">return</a>
        </div>

    </form>

</body>
</html>