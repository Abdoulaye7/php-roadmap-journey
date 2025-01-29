<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisissez vos hobbies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        .hobby-list {
            text-align: left;
            margin-bottom: 15px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Choisissez vos hobbies</h2>
    <form method="post">
        <div class="hobby-list">
            <label><input type="checkbox" name="hobbies[]" value="Lecture"> Lecture</label><br>
            <label><input type="checkbox" name="hobbies[]" value="Sport"> Sport</label><br>
            <label><input type="checkbox" name="hobbies[]" value="Voyage"> Voyage</label><br>
            <label><input type="checkbox" name="hobbies[]" value="Musique"> Musique</label><br>
            <label><input type="checkbox" name="hobbies[]" value="Cuisine"> Cuisine</label><br>
            <label><input type="checkbox" name="hobbies[]" value="Jeux vidéo"> Jeux vidéo</label><br>
        </div>
        <input type="submit" name="submit" value="Valider">
    </form>

    <?php
    if (isset($_POST['submit']) && !empty($_POST['hobbies'])) {
        echo "<div class='result'>Vos hobbies sélectionnés : " . implode(", ", $_POST['hobbies']) . "</div>";
    } elseif (isset($_POST['submit'])) {
        echo "<div class='result' style='color: red;'>Veuillez sélectionner au moins un hobby.</div>";
    }
    ?>

</body>
</html>
