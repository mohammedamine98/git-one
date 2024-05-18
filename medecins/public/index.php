<?php
// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclusion des contrôleurs et des modèles
require_once '../controllers/MedecinController.php';

// Instancier le contrôleur
$controller = new MedecinController();

// Déterminer l'action à exécuter
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Exécuter l'action appropriée
switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    case 'search':
        $controller->search();
        break;
    default:
        $controller->index();
        break;
}
?>
