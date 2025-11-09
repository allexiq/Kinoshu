<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Despre Kinoshu</title>
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
</header>

<main>
    <section class="despre-container">
        <h2>Despre aplicația Kinoshu</h2>

        <div class="info-box">
            <p>
                <strong>Kinoshu</strong> este o aplicație web comercială dedicată iubitorilor de filme. 
                Platforma permite utilizatorilor să <strong>vizioneze filme online</strong>, 
                să <strong>cumpere DVD-uri</strong> și să <strong>rezerve bilete la cinematografe</strong> 
                partenere, totul într-un mediu modern, intuitiv și sigur.
            </p>
        </div>

        <div class="info-box">
            <h3>Arhitectura aplicației</h3>
            <p>
                Aplicația <strong>Kinoshu</strong> este construită pe o arhitectură <em>client–server</em> 
                bazată pe PHP și MySQL. Datele sunt gestionate printr-o bază de date relațională, iar interfața 
                utilizatorului este realizată în HTML, CSS și JavaScript.
            </p>

            <ul class="schema-list">
                <li><strong>Roluri principale:</strong>
                    <ul>
                        <li>🧑‍💻 <strong>Administrator</strong> – adaugă filme, actualizează stocurile și gestionează utilizatorii.</li>
                        <li>🎟️ <strong>Utilizator</strong> – poate vizualiza, cumpăra și rezerva filme.</li>
                    </ul>
                </li>

                <li><strong>Entități principale:</strong>
                    <ul>
                        <li><code>utilizatori</code> – conturi de utilizatori (nume, email, rol, parolă).</li>
                        <li><code>filme</code> – informații despre filme (titlu, gen, regizor, an, preț).</li>
                        <li><code>comenzi</code> – comenzile plasate de utilizatori.</li>
                        <li><code>detalii_comenzi</code> – filmele incluse în fiecare comandă.</li>
                        <li><code>cinematografe</code> – locații unde pot fi rezervate bilete.</li>
                        <li><code>adrese</code> – adrese de livrare sau puncte EasyBox.</li>
                    </ul>
                </li>

                <li><strong>Procese principale:</strong>
                    <ul>
                        <li>Înregistrarea și autentificarea utilizatorilor.</li>
                        <li>Vizualizarea și filtrarea filmelor.</li>
                        <li>Adăugarea filmelor în coș și finalizarea comenzii.</li>
                        <li>Rezervarea biletelor la cinema.</li>
                        <li>Administrarea filmelor și comenzilor de către admin.</li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="info-box">
            <h3>Baza de date</h3>
            <p>
                Baza de date <strong>„cinematografie”</strong> este organizată în tabele relaționate prin chei primare și străine,
                asigurând integritatea datelor și o navigare logică între informații.
            </p>
            <ul class="baza-list">
                <li><code>utilizatori(id_utilizator)</code> → cheie străină în <code>comenzi</code></li>
                <li><code>filme(id_film)</code> → cheie străină în <code>detalii_comenzi</code></li>
                <li><code>cinematografe(id_cinema)</code> → legătură cu biletele rezervate</li>
                <li><code>adrese(id_adresa)</code> → folosită pentru livrare/EasyBox</li>
            </ul>
        </div>

        <div class="info-box">
            <h3>Descrierea soluției de implementare</h3>
            <p>
                Aplicația utilizează PHP pentru logica backend și MySQL pentru gestionarea datelor.
                Partea de interfață este construită cu HTML, CSS și JavaScript pentru o experiență
                intuitivă și modernă.
            </p>

            <ol class="flux">
                <li>Utilizatorul accesează pagina principală și navighează printre filme.</li>
                <li>Selectează un film → <code>film.php</code> afișează detalii și opțiuni de cumpărare sau vizionare.</li>
                <li>Comanda este salvată în baza de date și confirmată utilizatorului.</li>
                <li>Administratorul poate gestiona stocurile, comenzile și adăuga filme noi.</li>
            </ol>

            <p>
                Aplicația respectă separarea logică între <strong>Frontend</strong> (interfață), 
                <strong>Backend</strong> (PHP, procese server) și <strong>Baza de date</strong> (MySQL).
            </p>
        </div>

        <div class="info-box final-box">
            <h3>Echipa & Proiectul</h3>
            <p>
                <strong>Proiect:</strong> Kinoshu – Platformă comercială pentru filme<br>
                <strong>Realizat de:</strong> Alexia<br>
                <strong>Disciplina:</strong> Dezvoltarea aplicațiilor web – 2025
            </p>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 Kinoshu - Cinematografie Online</p>
</footer>
</body>
</html>
