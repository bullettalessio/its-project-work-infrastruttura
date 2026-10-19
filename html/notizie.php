<?php
// Rileva la sede passata come parametro dall'URL (?sede=perugia o ?sede=terni)
$sede = isset($_GET['sede']) ? strtolower($_GET['sede']) : 'perugia';

// Assegnazione dinamica dei titoli e delle notizie in base alla sede selezionata
if ($sede === 'terni') {
    $nome_sede = "Campus Terni";
    $notizie = [
        [
            "titolo" => "OPEN DAY APERTI ANCHE A TERNI",
            "data" => "14 Luglio 2026",
            "descrizione" => "Cominciati gli Open Day anche nella sede ITS di Terni",
            "link" => "https://www.ternitoday.it/attualita/appuntamento-its-umbria-percorsi-formativi-terni-2025.html"
        ],
        [
            "titolo" => "AL VIA LE ISCRIZIONI PER I NUOVI CORSI ITS",
            "data" => "05 Giugno 2026",
            "descrizione" => "Al via le iscrizioni per il biennio 2026-2028",
            "link" => "https://www.lavocedelterritorio.it/its-umbria-academy-al-via-le-iscrizioni-2026-2028/"
        ]
    ];
} else {
    // Sede di Perugia con i tuoi titoli e link reali richiesti
    $nome_sede = "Campus Perugia";
    $notizie = [
        [
            "titolo" => "LE POSSIBILITA' CHE OFFRE ITS",
            "data" => "Attualità",
            "descrizione" => "Scopri l'offerta formativa, i tassi di occupazione e le opportunità di crescita professionale offerte da Umbria Academy.",
            "link" => "https://www.lanazione.it/umbria/cronaca/umbria-academy-its-ecco-le-2f2e3176"
        ],
        [
            "titolo" => "ISCRIZIONI APERTE 26-28",
            "data" => "Bandi e Ammissioni",
            "descrizione" => "Al via le procedure di iscrizione per il nuovo biennio formativo 2026-2028. Consulta i requisiti e presenta la tua domanda.",
            "link" => "https://www.lavocedelterritorio.it/its-umbria-academy-al-via-le-iscrizioni-2026-2028/"
        ]
    ];
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rassegna Notizie - <?php echo $nome_sede; ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f0f4f8 0%, #d9e2ec 100%);
            color: #333;
            min-height: 100vh;
        }

        header {
            background-color: #004a99;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .header-title {
            font-size: 18px;
            font-weight: bold;
        }

        .back-btn {
            background-color: #f39200;
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 14px;
            transition: background 0.2s;
        }

        .back-btn:hover {
            background-color: #d78100;
        }

        /* Titolo della pagina esteso a tutta larghezza */
        .page-main-title {
            max-width: 1200px;
            margin: 30px auto 10px auto;
            padding: 0 20px;
            color: #004a99;
        }
        
        .page-main-title h2 {
            border-bottom: 3px solid #f39200;
            padding-bottom: 10px;
            margin: 0;
        }

        /* Layout principale a due colonne */
        .content-wrapper {
            max-width: 1200px;
            margin: 20px auto 40px auto;
            padding: 0 20px;
            display: flex;
            flex-direction: row;
            gap: 30px;
            box-sizing: border-box;
        }

        /* Colonna di sinistra (Corsi) */
        .left-side {
            flex: 0.9;
            display: flex;
            flex-direction: column;
        }

        /* Colonna centrale/destra (Notizie) */
        .center-side {
            flex: 1.1;
            display: flex;
            flex-direction: column;
        }

        .news-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border-left: 5px solid #004a99;
            box-sizing: border-box;
            width: 100%;
        }

        .news-card.courses-card {
            border-left: 5px solid #f39200;
            background-color: #ffffff;
            position: sticky; /* L'elenco rimane visibile scorrendo la pagina */
            top: 20px;
        }

        .news-date {
            font-size: 12px;
            color: #64748b;
            font-weight: bold;
            text-transform: uppercase;
        }

        .news-title {
            font-size: 18px;
            color: #1e293b;
            margin: 5px 0 10px 0;
            font-weight: bold;
        }

        .news-desc {
            font-size: 14.5px;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .courses-list {
            padding-left: 20px;
            margin: 10px 0;
        }

        .courses-list li {
            margin-bottom: 12px;
            font-size: 14px;
            color: #334155;
            line-height: 1.4;
        }

        .article-link {
            color: #f39200;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }

        .article-link:hover {
            text-decoration: underline;
        }

        /* Responsive design per schermi piccoli */
        @media (max-width: 768px) {
            .content-wrapper {
                flex-direction: column;
            }
            .news-card.courses-card {
                position: static;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="header-title">ITS UMBRIA ACADEMY // Portale Informazione</div>
        <a href="index.php" class="back-btn">⬅️ Torna alla Home</a>
    </header>

    <div class="page-main-title">
        <h2>Articoli e Novità - <?php echo $nome_sede; ?></h2>
    </div>

    <div class="content-wrapper">
        
        <div class="left-side">
            <?php if ($sede === 'perugia'): ?>
                <div class="news-card courses-card">
                    <div class="news-date">🎓 Offerta Formativa</div>
                    <div class="news-title">CORSI DISPONIBILI - SEDE DI PERUGIA</div>
                    <p class="news-desc">I percorsi di specializzazione tecnologica biennale attivi presso la sede:</p>
                    <ul class="courses-list">
                        <li><strong>Infrastrutture Digitali e Cloud Management</strong></li>
                        <li><strong>Cybersecurity Specialist (Cyber Range)</strong></li>
                        <li><strong>Data Management & Coding (Sviluppo Software)</strong></li>
                        <li><strong>BIM, Grafica Digitale e Sistema Casa</strong></li>
                        <li><strong>Digital Marketing e Gestione d'Impresa</strong></li>
                        <li><strong>Biotecnologie e Sostenibilità Ambientale</strong></li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="news-card courses-card">
                    <div class="news-date">🎓 Offerta Formativa</div>
                    <div class="news-title">CAMPUS SCIENTIFICO TERNI</div>
                    <p class="news-desc">Polo didattico focalizzato sull'innovazione industriale, materiali avanzati e sistemi digitali integrati.
                        I percorsi di specializzazione tecnologica biennale attivi presso la sede:
                        <li><strong>Biotecnologie e Sostenibilità Ambientale</strong></li>
                        <li><strong>Meccatronica, Automazione Industriale e Smart Manufacturing (Industria 4.0 / Robotica)</strong></li>
                        <li><strong>Digital Marketing e Gestione d'Impresa (Applicato all'internazionalizzazione e ai processi industriali)</strong></li>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <div class="center-side">
            <?php foreach ($notizie as $notizia): ?>
                <div class="news-card">
                    <div class="news-date">📌 <?php echo $notizia['data']; ?></div>
                    <div class="news-title"><?php echo $notizia['titolo']; ?></div>
                    <p class="news-desc"><?php echo $notizia['descrizione']; ?></p>
                    <a href="<?php echo $notizia['link']; ?>" target="_blank" class="article-link">Leggi l'articolo originale →</a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>
</html>