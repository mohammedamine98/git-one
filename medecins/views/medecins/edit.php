<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Médecin</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <h1>Modifier un Médecin</h1>
    <form action="index.php?action=edit&id=<?= $medecin['id'] ?>" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($medecin['nom']) ?>" required>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($medecin['prenom']) ?>" required>
        <label for="specialite">Spécialité:</label>
        <input type="text" id="specialite" name="specialite" value="<?= htmlspecialchars($medecin['specialite']) ?>" required>
        <label for="adresse_cabinet">Adresse Cabinet:</label>
        <input type="text" id="adresse_cabinet" name="adresse_cabinet" value="<?= htmlspecialchars($medecin['adresse_cabinet']) ?>" required>
        <input type="submit" value="Modifier">
    </form>
    <a href="index.php">Retour à la liste</a>
</body>
</html>
