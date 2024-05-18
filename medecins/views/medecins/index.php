<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Médecins</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <h1>Liste des Médecins</h1>
    <form action="index.php?action=search" method="get">
        <input type="text" name="search" placeholder="Rechercher par nom, prénom ou spécialité">
        <input type="submit" value="Rechercher">
    </form>
    <a href="index.php?action=create">Ajouter un Médecin</a>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Spécialité</th>
            <th>Adresse Cabinet</th>
            <th>Actions</th>
        </tr>
        <?php if (isset($stmt) && $stmt->rowCount() > 0): ?>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nom']) ?></td>
                    <td><?= htmlspecialchars($row['prenom']) ?></td>
                    <td><?= htmlspecialchars($row['specialite']) ?></td>
                    <td><?= htmlspecialchars($row['adresse_cabinet']) ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?= $row['id'] ?>">Modifier</a>
                        <a href="index.php?action=delete&id=<?= $row['id'] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucun médecin trouvé.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

