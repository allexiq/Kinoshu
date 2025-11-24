<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}
$filme = [
    [
        "titlu" => "Inception",
        "regizor" => "Christopher Nolan",
        "an" => 2010,
        "gen" => "Sci-Fi",
        "imagine" => "images/inception.jpg",
    ],
    [
        "titlu" => "The Godfather",
        "regizor" => "Francis Ford Coppola",
        "an" => 1972,
        "gen" => "Crime",
        "imagine" => "images/godfather.jpg",
    ],
    [
        "titlu" => "Parasite",
        "regizor" => "Bong Joon-ho",
        "an" => 2019,
        "gen" => "Thriller",
        "imagine" => "images/parasite.jpg",
    ],
    [
        "titlu" => "It",
        "regizor" => "Andy Muschietti",
        "an" => 2017,
        "gen" => "Horror",
        "imagine" => "images/it.jpg",
    ],
    [
        "titlu" => "Jurassic Park",
        "regizor" => "Steven Spielberg",
        "an" => 1993,
        "gen" => "Aventura",
        "imagine" => "images/jurassicpark.jpg",
    ],
    [
        "titlu" => "Avengers: Endgame",
        "regizor" => "Anthony și Joe Russo",
        "an" => 2019,
        "gen" => "Aventura",
        "imagine" => "images/avengers.jpg",
    ],
    [
        "titlu" => "The Shining",
        "regizor" => "Stanley Kubrick",
        "an" => 1980,
        "gen" => "Horror",
        "imagine" => "images/shining.jpg",
    ],
     [
        "titlu" => "Superbad",
        "regizor" => "Greg Mottola",
        "an" => 2007,
        "gen" => "Comedie",
        "imagine" => "images/superbad.jpg",
    ],
    [
        "titlu" => "The Hangover",
        "regizor" => "Todd Phillips",
        "an" => 2009,
        "gen" => "Comedie",
        "imagine" => "images/hangover.jpg",
    ],
    [
        "titlu" => "A Quiet Place",
        "regizor" => "John Krasinski",
        "an" => 2018,
        "gen" => "Horror",
        "imagine" => "images/aquietplace.jpg",
    ],
];
$filme_premiera = [
    ["titlu"=>"Dune", "imagine"=>"images/dune.jpg"],
    ["titlu"=>"Avatar: Way of Water", "imagine"=>"images/avatar2.jpg"],
    ["titlu"=>"The Batman", "imagine"=>"images/batman.jpg"],
    ["titlu"=>"My Little Pony: The Movie", "imagine"=>"images/mlp.jpg"],
    ["titlu"=>"Pulp Fiction", "imagine"=>"images/pulp.jpg"],
    ["titlu"=>"Black Panther: Wakanda Forever", "imagine"=>"images/blackpanther2.jpg"],
    ["titlu"=>"Doctor Strange 2", "imagine"=>"images/doctorstrange2.jpg"],
    ["titlu"=>"Thor: Love and Thunder", "imagine"=>"images/thor2.jpg"],
    ["titlu"=>"Heart Eyes", "imagine"=>"images/hearteyes.jpg"],
    ["titlu"=>"V/H/S Halloween", "imagine"=>"images/vhs.jpg"],
    ["titlu"=>"Everything Everywhere All At Once", "imagine"=>"images/everything.jpg"],
    ["titlu"=>"Lightyear", "imagine"=>"images/lightyear.jpg"],
    ["titlu"=>"Bullet Train", "imagine"=>"images/bullettrain.jpg"],
    ["titlu"=>"Elvis", "imagine"=>"images/elvis.jpg"],
    ["titlu"=>"The Flash", "imagine"=>"images/flash.jpg"],
    ["titlu"=>"Babylon", "imagine"=>"images/babylon.jpg"],
    ["titlu"=>"Oppenheimer", "imagine"=>"images/oppenheimer.jpg"],
    ["titlu"=>"Wonka", "imagine"=>"images/wonka.jpg"],
    ["titlu"=>"Miraculous: Ladybug & Cat Noir", "imagine"=>"images/mlb.jpg"],
    ["titlu"=>"Spider-Man: Across the Spider-Verse", "imagine"=>"images/spiderman2.jpg"],
    ["titlu"=>"Shazam! Fury of the Gods", "imagine"=>"images/shazam2.jpg"],
    ["titlu"=>"Guardians of the Galaxy Vol. 3", "imagine"=>"images/guardians3.jpg"],
    ["titlu"=>"Transformers: Rise of the Beasts", "imagine"=>"images/transformers.jpg"],
    ["titlu"=>"The Little Mermaid", "imagine"=>"images/littlemermaid.jpg"],
    ["titlu"=>"The Nun III", "imagine"=>"images/nun.jpg"],
    ["titlu"=>"Barbie", "imagine"=>"images/barbie.jpg"],
    ["titlu"=>"Puss in Boots: The Last Wish", "imagine"=>"images/pussboots.jpg"],
    ["titlu"=>"M3GAN", "imagine"=>"images/megan.jpg"],
    ["titlu"=>"Haunted Mansion", "imagine"=>"images/hauntedmansion.jpg"],
    ["titlu"=>"Wish", "imagine"=>"images/wish.jpg"]
];
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Kinoshu</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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

    <main>
        <h2>Filme populare</h2>
        <div class="filme-container-wrapper">
    <div class="filme-container" id="filmeContainer">
        <?php foreach($filme as $film): ?>
            <div class="film-card">
                <img src="<?php echo $film['imagine']; ?>" alt="<?php echo $film['titlu']; ?>">
                <h3><?php echo $film['titlu']; ?> (<?php echo $film['an']; ?>)</h3>
                <p><strong>Regizor:</strong> <?php echo $film['regizor']; ?></p>
                <p><strong>Gen:</strong> <?php echo $film['gen']; ?></p>
                <a href="film.php?t=<?php echo urlencode($film['titlu']); ?>">Vezi detalii</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<section class="premiere-filme">
        <h2>Filme în Premieră</h2>
        <div class="film-grid-premiere">
            <?php foreach($filme_premiera as $film): ?>
                <div class="film-card" onclick="location.href='film.php?t=<?php echo urlencode($film['titlu']); ?>'">
                    <img src="<?php echo $film['imagine']; ?>" alt="">
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    </main>

    <footer>
        <p>&copy; 2025 Kinoshu</p>
    </footer>
<script>
const container = document.getElementById('filmeContainer');
const wrapper = document.querySelector('.filme-container-wrapper'); // corectăm selectorul

// duplicăm cardurile pentru loop infinit
container.innerHTML += container.innerHTML;

let pos = 0;
let speed = 0.3; // viteza de mișcare
let autoScroll = true;
let restartTimeout = null;

// animație continuă
function animate() {
    if (autoScroll) {
        pos -= speed;
        if (pos <= -container.scrollWidth / 2) {
            pos = 0; // reset fluid
        }
        container.style.transform = `translateX(${pos}px)`;
    }
    requestAnimationFrame(animate);
}
requestAnimationFrame(animate);

// pauză la hover
wrapper.addEventListener('mouseenter', () => {
    autoScroll = false;
    if (restartTimeout) clearTimeout(restartTimeout); // anulăm orice timer vechi
});

// repornește la 1s după ce iei cursorul
wrapper.addEventListener('mouseleave', () => {
    restartTimeout = setTimeout(() => {
        autoScroll = true;
    }, 500); // 1000ms = 1s
});
</script>

</body>
</html>
