<?php
// Preluăm titlul filmului din URL
$titlu = isset($_GET['t']) ? $_GET['t'] : 'Film necunoscut';

// Date simulate pentru filme
$filme = [
    "Inception" => [
        "titlu" => "Inception",
        "regizor" => "Christopher Nolan",
        "an" => 2010,
        "gen" => "Sci-Fi",
        "descriere" => "Un hoț care fură secrete din subconștientul oamenilor prin vise, primește misiunea să implanteze o idee într-o minte.",
        "imagine" => "images/inception.jpg",
        "trailer" => "https://www.youtube.com/watch?v=YoHD9XEInc0",
        "pret" => 24.99
    ],
    "The Godfather" => [
        "titlu" => "The Godfather",
        "regizor" => "Francis Ford Coppola",
        "an" => 1972,
        "gen" => "Crime",
        "descriere" => "Saga familiei Corleone, o poveste epică despre putere, loialitate și crimă organizată.",
        "imagine" => "images/godfather.jpg",
        "trailer" => "https://www.youtube.com/watch?v=sY1S34973zA",
        "pret" => 19.99
    ],
    "Parasite" => [
        "titlu" => "Parasite",
        "regizor" => "Bong Joon-ho",
        "an" => 2019,
        "gen" => "Thriller",
        "descriere" => "O familie săracă se infiltrează treptat în viața unei familii bogate, cu consecințe neașteptate.",
        "imagine" => "images/parasite.jpg",
        "trailer" => "https://www.youtube.com/watch?v=SEUXfv87Wpk",
        "pret" => 21.50
    ],
    "It" => [
        "titlu" => "It",
        "regizor" => "Andy Muschietti",
        "an" => 2017,
        "gen" => "Horror",
        "descriere" => "Un grup de copii dintr-un orășel mic descoperă că un monstru care ia forma unui clovn malefic, Pennywise, se hrănește cu frica și teroarea lor.",
        "imagine" => "images/it.jpg",
        "trailer" => "https://www.youtube.com/watch?v=FnCdOQsX5kc",
        "pret" => 18.99
    ],
    "Jurassic Park" => [
        "titlu" => "Jurassic Park",
        "regizor" => "Steven Spielberg",
        "an" => 1993,
        "gen" => "Aventura",
        "descriere" => "Un miliardar creează un parc tematic cu dinozauri reali reînviați prin inginerie genetică, dar când sistemele de siguranță eșuează, vizitatorii devin pradă.",
        "imagine" => "images/jurassicpark.jpg",
        "trailer" => "https://www.youtube.com/watch?v=lc0UehYemQA",
        "pret" => 22.00
    ],
    "Avengers: Endgame" => [
        "titlu" => "Avengers: Endgame",
        "regizor" => "Anthony și Joe Russo",
        "an" => 2019,
        "gen" => "Aventura",
        "descriere" => "Supraviețuitorii luptei devastatoare împotriva lui Thanos se reunesc pentru o ultimă misiune de a inversa dezastrul și a salva universul.",
        "imagine" => "images/avengers.jpg",
        "trailer" => "https://www.youtube.com/watch?v=TcMBFSGVi1c",
        "pret" => 26.99
    ],
    "The Shining" => [
        "titlu" => "The Shining",
        "regizor" => "Stanley Kubrick",
        "an" => 1980,
        "gen" => "Horror",
        "descriere" => "Un scriitor izolat într-un hotel montan împreună cu familia lui începe să-și piardă mințile, pe măsură ce forțele supranaturale din hotel îl corup.",
        "imagine" => "images/shining.jpg",
        "trailer" => "https://www.youtube.com/watch?v=5Cb3ik6zP2I",
        "pret" => 17.99
    ],
    "Superbad" => [
        "titlu" => "Superbad",
        "regizor" => "Greg Mottola",
        "an" => 2007,
        "gen" => "Comedie",
        "descriere" => "Doi adolescenți stângaci încearcă să organizeze o petrecere memorabilă înainte de absolvire, dar planurile lor haotice scapă complet de sub control.",
        "imagine" => "images/superbad.jpg",
        "trailer" => "https://www.youtube.com/watch?v=4eaZ_48ZYog",
        "pret" => 15.50
    ],
    "The Hangover" => [
        "titlu" => "The Hangover",
        "regizor" => "Todd Phillips",
        "an" => 2009,
        "gen" => "Comedie",
        "descriere" => "După o noapte de petrecere nebună în Las Vegas, trei prieteni se trezesc fără mire și fără amintiri despre ce s-a întâmplat — trebuie să refacă pașii lor haotici pentru a-l găsi.",
        "imagine" => "images/hangover.jpg",
        "trailer" => "https://www.youtube.com/watch?v=tcdUhdOlz9M",
        "pret" => 16.99
    ],
    "A Quiet Place" => [
        "titlu" => "A Quiet Place",
        "regizor" => "John Krasinski",
        "an" => 2018,
        "gen" => "Horror",
        "descriere" => "Într-o lume invadată de creaturi care vânează după sunet, o familie trebuie să trăiască în tăcere absolută pentru a supraviețui.",
        "imagine" => "images/aquietplace.jpg",
        "trailer" => "https://www.youtube.com/watch?v=WR7cc5t7tv8",
        "pret" => 19.50
    ],
];

$film = isset($filme[$titlu]) ? $filme[$titlu] : null;
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title><?php echo $film ? $film['titlu'] : "Film necunoscut"; ?></title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <header>
        <h1>Cinematografie Online</h1>
        <nav>
            <a href="index.php">Acasă</a>
            <a href="#">Top Filme</a>
            <a href="#">Genuri</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <main>
        <?php if ($film): ?>
            <div class="film-detail">
                <img src="<?php echo $film['imagine']; ?>" alt="<?php echo $film['titlu']; ?>">
                <div class="film-info">
                    <h2><?php echo $film['titlu']; ?> (<?php echo $film['an']; ?>)</h2>
                    <p><strong>Regizor:</strong> <?php echo $film['regizor']; ?></p>
                    <p><strong>Gen:</strong> <?php echo $film['gen']; ?></p>
                    <p class="descriere"><?php echo $film['descriere']; ?></p>
                    <p class="pret">Preț bilet: <?php echo number_format($film['pret'], 2); ?> RON</p>
                    <a href="<?php echo $film['trailer']; ?>" target="_blank" class="buton-actiune">Vezi trailer</a>
                    <a href="cumpara.php?t=<?php echo urlencode($film['titlu']); ?>" class="buton-actiune">Cumpără bilet</a>
                    <a href="index.php" class="buton-actiune" style="background:#024370;">⬅ Înapoi</a>
                </div>
            </div>
        <?php else: ?>
            <p style="text-align:center; color:#ff4444;">Filmul nu a fost găsit.</p>
            <a href="index.php" style="display:block; text-align:center; margin-top:20px; color:#ff0000;">⬅ Înapoi la filme</a>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2025 Cinematografie Online</p>
    </footer>
</body>
</html>
