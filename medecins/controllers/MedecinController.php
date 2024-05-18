<?php
include_once '../config/database.php';
include_once '../models/Medecin.php';

class MedecinController {
    private $db;
    private $medecin;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->medecin = new Medecin($this->db);
    }

    public function index() {
        $stmt = $this->medecin->readAll();
        include '../views/medecins/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->medecin->nom = $_POST['nom'];
            $this->medecin->prenom = $_POST['prenom'];
            $this->medecin->specialite = $_POST['specialite'];
            $this->medecin->adresse_cabinet = $_POST['adresse_cabinet'];
            if ($this->medecin->create()) {
                header("Location: index.php");
                exit();
            } else {
                echo "Erreur lors de l'ajout du médecin.";
            }
        }
        include '../views/medecins/create.php';
    }

    public function edit($id) {
        $this->medecin->id = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->medecin->nom = $_POST['nom'];
            $this->medecin->prenom = $_POST['prenom'];
            $this->medecin->specialite = $_POST['specialite'];
            $this->medecin->adresse_cabinet = $_POST['adresse_cabinet'];
            if ($this->medecin->update()) {
                header("Location: index.php");
                exit();
            }
        } else {
            $this->medecin->id = $id;
            $stmt = $this->medecin->readOne();
            $medecin = $stmt->fetch(PDO::FETCH_ASSOC);
            include '../views/medecins/edit.php';
        }
    }

    public function delete($id) {
        $this->medecin->id = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['confirm'])) {
                if ($this->medecin->delete()) {
                    header("Location: index.php");
                    exit();
                }
            } else {
                header("Location: index.php");
                exit();
            }
        }
        include '../views/medecins/delete.php';
    }

    public function search() {
        $keywords = isset($_GET['search']) ? $_GET['search'] : '';
        $stmt = $this->medecin->search($keywords);
        include '../views/medecins/index.php';
    }
}
?>
