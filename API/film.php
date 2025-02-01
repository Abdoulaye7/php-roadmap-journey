<?php
$curl = curl_init('https://www.omdbapi.com/?t=game+of+thrones&apikey=1313b466');

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Important pour récupérer la réponse comme une chaîne de caractères

$data = curl_exec($curl);

if ($data === false) {
    // Gérer l'erreur en cas d'échec de la requête
    var_dump(curl_error($curl));
} else {
    // Décoder la réponse JSON
    $serie = json_decode($data, true);

    // Affichage du résultat
    if (isset($serie['Title'])) {
        echo '
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>' . $serie['Title'] . '</title>
            <link href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h1 class="card-title text-center">' . $serie['Title'] . '</h1>
                    </div>
                    <div class="card-body">
                        <h2>Informations</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Année:</strong> ' . $serie['Year'] . '</li>
                            <li class="list-group-item"><strong>Genre:</strong> ' . $serie['Genre'] . '</li>
                            <li class="list-group-item"><strong>Acteurs:</strong> ' . $serie['Actors'] . '</li>
                            <li class="list-group-item"><strong>Réalisateur:</strong> ' . $serie['Director'] . '</li>
                            <li class="list-group-item"><strong>Pays:</strong> ' . $serie['Country'] . '</li>
                        </ul>
                        <h3 class="mt-4">Synopsis</h3>
                        <p>' . $serie['Plot'] . '</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="https://www.imdb.com/title/' . $serie['imdbID'] . '" class="btn btn-outline-info" target="_blank">Voir sur IMDB</a>
                    </div>
                </div>
            </div>
        </body>
        </html>';
    } else {
        echo "Aucune information disponible pour cette recherche.";
    }
}

curl_close($curl);
?>
