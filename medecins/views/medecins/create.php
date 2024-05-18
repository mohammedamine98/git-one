<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Médecin</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <h1>Ajouter un Médecin</h1>
    <form action="index.php?action=create" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
        <label for="specialite">Spécialité:</label>
        <input type="text" id="specialite" name="specialite" required>
        <label for="adresse_cabinet">Adresse Cabinet:</label>
        <input type="text" id="adresse_cabinet" name="adresse_cabinet" required>
        <input type="submit" value="Ajouter">
    </form>
    <a href="index.php">Retour à la liste</a>
</body>
</html>
