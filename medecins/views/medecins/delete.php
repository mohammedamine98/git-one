<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un Médecin</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <h1>Supprimer un Médecin</h1>
    <form action="index.php?action=delete&id=<?= $medecin['id'] ?>" method="post">
        <p>Êtes-vous sûr de vouloir supprimer ce médecin ?</p>
        <input type="submit" name="confirm" value="Valider">
        <a href="index.php">Annuler</a>
    </form>
</body>
</html>
