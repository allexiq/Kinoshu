<?php
session_start();
include 'db_connect.php';

$mesaj = "";

if(isset($_POST['signup'])){
    $username = trim($_POST['username']);
    $email = $_POST['email'];
    $parola = $_POST['parola'];
    $confirm = $_POST['confirm_parola'];

    if($parola !== $confirm){
        $mesaj = "Parolele nu coincid!";
    } else {
        $stmt = $conn->prepare("SELECT * FROM utilizatori WHERE nume_utilizator=? OR email=?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $mesaj = "Username sau email deja folosit!";
        } else {
            // Hash parola
            $hash = password_hash($parola, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO utilizatori(nume_utilizator, email, parola) VALUES(?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hash);

            if($stmt->execute()){
                header("Location: login.php");
                exit;
            } else {
                $mesaj = "A apărut o eroare!";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="images/logo.png" type="image/png">
    <title>Înregistrare</title>
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
        <h2>Înregistrare</h2>
        <?php if($mesaj != "") echo "<p class='error'>$mesaj</p>"; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="parola" placeholder="Parola" required>
            <input type="password" name="confirm_parola" placeholder="Confirmă parola" required>
            <button type="submit" name="signup">Creează cont</button>
        </form>

        <p>Ai deja cont? <a href="login.php">Loghează-te</a></p>
    </div>
</body>
</html>
