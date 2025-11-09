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
        Baza de date <strong>„cinematografie”</strong> este elementul central al aplicației <strong>Kinoshu</strong>, 
        responsabilă pentru stocarea și gestionarea datelor despre utilizatori, filme, comenzi și bilete. 
        Structura bazei de date este de tip relațional (MySQL) și este concepută pentru a asigura consistența datelor, 
        scalabilitatea și o interconectare logică între entități.
    </p>

    <p>
        Fiecare tabel are o cheie primară unică (<em>PRIMARY KEY</em>), iar legăturile dintre ele se realizează prin chei străine 
        (<em>FOREIGN KEY</em>), respectând principiile normalizării bazei de date.
    </p>

    <ul class="baza-list">
        <li>
            <code>utilizatori</code> – stochează informațiile despre conturile utilizatorilor:
            <br>• <em>id_utilizator</em> (PK), <em>nume</em>, <em>email</em>, <em>parola</em>, <em>rol</em> (admin/user)
        </li>

        <li>
            <code>filme</code> – conține detalii despre filmele disponibile:
            <br>• <em>id_film</em> (PK), <em>titlu</em>, <em>descriere</em>, <em>gen</em>, <em>regizor</em>, <em>an_lansare</em>, 
            <em>durata</em>, <em>pret</em>, <em>tip_produs</em> (online, DVD, cinema), <em>stoc</em>, <em>imagine</em>
        </li>

        <li>
            <code>cinematografe</code> – listează sălile partenere unde pot fi vizionate filmele:
            <br>• <em>id_cinema</em> (PK), <em>nume_cinema</em>, <em>adresa</em>, <em>oras</em>, <em>numar_sali</em>
        </li>

        <li>
            <code>bilete</code> – leagă filmele disponibile la cinema de utilizatori:
            <br>• <em>id_bilet</em> (PK), <em>id_utilizator</em> (FK), <em>id_film</em> (FK), <em>id_cinema</em> (FK), 
            <em>data_proiectie</em>, <em>ora</em>, <em>loc</em>, <em>pret_bilet</em>
        </li>

        <li>
            <code>comenzi</code> – stochează comenzile plasate de utilizatori pentru achiziția de filme:
            <br>• <em>id_comanda</em> (PK), <em>id_utilizator</em> (FK), <em>data_comanda</em>, <em>status</em>, 
            <em>metoda_plata</em>, <em>total</em>, <em>id_adresa</em> (FK)
        </li>

        <li>
            <code>detalii_comenzi</code> – conține produsele (filmele) incluse în fiecare comandă:
            <br>• <em>id_detaliu</em> (PK), <em>id_comanda</em> (FK), <em>id_film</em> (FK), <em>cantitate</em>, <em>pret_unitar</em>
        </li>

        <li>
            <code>adrese</code> – salvează adresele de livrare și punctele EasyBox selectate de utilizatori:
            <br>• <em>id_adresa</em> (PK), <em>id_utilizator</em> (FK), <em>oras</em>, <em>strada</em>, <em>nr</em>, 
            <em>tip_livrare</em> (EasyBox / Livrare la domiciliu)
        </li>
    </ul>

    <p>
        Relațiile dintre tabele sunt bidirecționale și se bazează pe integritate referențială:
    </p>

    <ul class="schema-list">
        <li>Un <strong>utilizator</strong> poate avea mai multe <strong>comenzi</strong> și <strong>adrese</strong>.</li>
        <li>O <strong>comandă</strong> poate conține mai multe <strong>filme</strong> (prin <code>detalii_comenzi</code>).</li>
        <li>Un <strong>film</strong> poate apărea în mai multe comenzi și proiecții de cinema.</li>
        <li>Un <strong>bilet</strong> face legătura între un utilizator, un film și un cinematograf.</li>
    </ul>

    <p>
        Această structură oferă o bază solidă pentru implementarea funcționalităților de 
        <strong>achiziție, rezervare și gestionare a filmelor</strong>, asigurând performanță și flexibilitate în administrarea datelor.
    </p>
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
