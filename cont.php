<?php
session_start();
include 'db_connect.php';

if(!isset($_SESSION['ID_utilizator'])){
    header("Location: login.php");
    exit;
}

$mesaj = "";
$id = $_SESSION['ID_utilizator'];

// Preluăm datele utilizatorului
$stmt = $conn->prepare("SELECT nume_utilizator, email, parola FROM utilizatori WHERE ID_utilizator=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Modificare username
if(isset($_POST['update_username'])){
    $new_username = trim($_POST['new_username']);
    $stmt = $conn->prepare("SELECT * FROM utilizatori WHERE nume_utilizator=? AND ID_utilizator<>?");
    $stmt->bind_param("si", $new_username, $id);
    $stmt->execute();
    if($stmt->get_result()->num_rows > 0){
        $mesaj = "Acest username este deja folosit!";
    } else {
        $stmt = $conn->prepare("UPDATE utilizatori SET nume_utilizator=? WHERE ID_utilizator=?");
        $stmt->bind_param("si", $new_username, $id);
        if($stmt->execute()){
            $_SESSION['username'] = $new_username;
            $mesaj = "Username-ul a fost actualizat!";
            $user['nume_utilizator'] = $new_username;
        } else $mesaj = "Eroare la actualizarea username-ului!";
    }
}

// Modificare parolă
if(isset($_POST['update_password'])){
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if(!password_verify($current, $user['parola'])){
        $mesaj = "Parola curentă este greșită!";
    } elseif($new !== $confirm){
        $mesaj = "Noile parole nu coincid!";
    } else {
        $hash = password_hash($new, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE utilizatori SET parola=? WHERE ID_utilizator=?");
        $stmt->bind_param("si", $hash, $id);
        if($stmt->execute()){
            $mesaj = "Parola a fost actualizată cu succes!";
        } else {
            $mesaj = "Eroare la actualizarea parolei!";
        }
    }
}

// Ștergere cont
if(isset($_POST['delete_account'])){
    $stmt = $conn->prepare("DELETE FROM utilizatori WHERE ID_utilizator=?");
    $stmt->bind_param("i", $id);
    if($stmt->execute()){
        session_destroy();
        header("Location: signup.php");
        exit;
    } else $mesaj = "Eroare la ștergerea contului!";
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="UTF-8">
<title>Contul Meu</title>
<link rel="icon" href="images/logo.png" type="image/png">
<link rel="stylesheet" href="css/style.css">
</head>
<body style="font-family: Arial; background:#111; margin:0; padding:0;">
<header>
    <h1>Kinoshu</h1>
    <nav>
        <a href="index.php">Acasă</a>
        <a href="#">Top Filme</a>
        <a href="#">Genuri</a>
        <a href="prezentare.php">Despre</a> 
        <a href="#">Contact</a>
    </nav>

    <form action="cauta.php" method="GET" class="search-form">
        <input type="text" name="q" placeholder="Caută..." required>
        <button type="submit">🔍︎</button>
    </form>

    <div class="header-right">
        <?php if(isset($_SESSION['username'])): ?>
            <a href="cont.php" class="cont-button">Contul meu ✦ <?php echo htmlspecialchars($_SESSION['username']); ?></a>
            <a href="logout.php" class="logout-button">Logout</a>
        <?php else: ?>
            <a href="login.php" class="login-button">Login</a>
        <?php endif; ?>
    </div>
</header>

<main style="padding-top:120px; display:flex; justify-content:center; background:black">
    <div style="width:90%; max-width:450px; background:#1a1a1a; padding:25px 30px; border-radius:10px; color:#fff; box-shadow:0 0 15px rgba(0,0,0,0.7);">
        <h2 style="text-align:center; margin-bottom:20px; color:#ff4444;">Contul Meu</h2>

        <?php if($mesaj != ""): ?>
            <p style="text-align:center; padding:10px; margin-bottom:15px; border-radius:6px; color:<?php echo strpos($mesaj,'Eroare')!==false ? '#ff4444' : '#44ff44'; ?>; background:<?php echo strpos($mesaj,'Eroare')!==false ? 'rgba(255,68,68,0.1)' : 'rgba(68,255,68,0.1)'; ?>;">
                <?php echo $mesaj; ?>
            </p>
        <?php endif; ?>

        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['nume_utilizator']); ?></p>
        <hr style="border-color:#444; margin:20px 0;">

        <!-- Modificare username -->
        <form method="POST" style="display:flex; flex-direction:column; gap:10px; margin-bottom:20px;">
            <label>Schimbă username-ul:</label>
            <input type="text" name="new_username" placeholder="Noul username" required style="padding:10px; border-radius:6px; border:1px solid #333; background:#222; color:#fff;">
            <button type="submit" name="update_username" style="padding:10px; background:#ff4444; color:#fff; border:0; border-radius:6px; font-weight:bold; cursor:pointer;">Actualizează</button>
        </form>

        <!-- Modificare parola -->
        <form method="POST" style="display:flex; flex-direction:column; gap:10px; margin-bottom:20px;">
            <label>Parola curentă:</label>
            <input type="password" name="current_password" required style="padding:10px; border-radius:6px; border:1px solid #333; background:#222; color:#fff;">
            <label>Noua parolă:</label>
            <input type="password" name="new_password" required style="padding:10px; border-radius:6px; border:1px solid #333; background:#222; color:#fff;">
            <label>Confirmă noua parolă:</label>
            <input type="password" name="confirm_password" required style="padding:10px; border-radius:6px; border:1px solid #333; background:#222; color:#fff;">
            <button type="submit" name="update_password" style="padding:10px; background:#ff4444; color:#fff; border:0; border-radius:6px; font-weight:bold; cursor:pointer;">Schimbă parola</button>
        </form>

        <!-- Stergere cont -->
        <form method="POST" onsubmit="return confirm('Ești sigur că vrei să ștergi contul?');">
            <button type="submit" name="delete_account" style="padding:10px; background:#d32f2f; color:#fff; border:0; border-radius:6px; font-weight:bold; cursor:pointer;">Șterge contul</button>
        </form>
    </div>
</main>

<footer style="text-align:center; padding:15px; background:#111; color:#FF0000;">
    <p>&copy; 2025 Kinoshu</p>
</footer>
</body>
</html>
