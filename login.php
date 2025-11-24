<?php
session_start();
include 'db_connect.php';

$mesaj = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $parola = $_POST['parola'];

    $stmt = $conn->prepare("SELECT * FROM utilizatori WHERE nume_utilizator=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $user = $result->fetch_assoc();

        if(password_verify($parola, $user['parola'])){
            $_SESSION['ID_utilizator'] = $user['ID_utilizator'];
            $_SESSION['username'] = $user['nume_utilizator'];

            header("Location: index.php");
            exit;
        } else {
            $mesaj = "Parola este greșită!";
        }
    } else {
        $mesaj = "Acest username nu există!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="images/logo.png" type="image/png">
    <title>Login</title>
    <style>
        body {
            font-family: Arial;
            background: #111;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            background: #1a1a1a; 
            padding: 30px;
            border-radius: 10px;
            width: 320px;
            box-shadow: 0 0 15px rgba(0,0,0,0.7);
            color: #fff;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #333;
            background: #222;
            color: #fff;
        }

        input:focus {
            border-color: #ff4444;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #ff4444;
            color: white;
            border: 0;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }

        button:hover {
            background: #ff2222;
            transform: scale(1.02);
        }

        .error {
            color: #ff4444;
            margin-bottom: 10px;
            background: rgba(255, 68, 68, 0.1);
            padding: 8px;
            border-radius: 6px;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #ff4444;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="box">
        <h2>Login</h2>
        <?php if($mesaj != "") echo "<p class='error'>$mesaj</p>"; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="parola" placeholder="Parola" required>
            <button type="submit" name="login">Login</button>
        </form>

        <p>Nu ai cont? <a href="signup.php">Creează unul</a></p>
    </div>
</body>
</html>
