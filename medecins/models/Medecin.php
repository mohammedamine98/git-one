<?php
class Medecin {
    private $conn;
    private $table_name = "medecins";

    public $id;
    public $nom;
    public $prenom;
    public $specialite;
    public $adresse_cabinet;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nom=:nom, prenom=:prenom, specialite=:specialite, adresse_cabinet=:adresse_cabinet";

        $stmt = $this->conn->prepare($query);

        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->prenom = htmlspecialchars(strip_tags($this->prenom));
        $this->specialite = htmlspecialchars(strip_tags($this->specialite));
        $this->adresse_cabinet = htmlspecialchars(strip_tags($this->adresse_cabinet));

        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":prenom", $this->prenom);
        $stmt->bindParam(":specialite", $this->specialite);
        $stmt->bindParam(":adresse_cabinet", $this->adresse_cabinet);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nom = :nom, prenom = :prenom, specialite = :specialite, adresse_cabinet = :adresse_cabinet WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->prenom = htmlspecialchars(strip_tags($this->prenom));
        $this->specialite = htmlspecialchars(strip_tags($this->specialite));
        $this->adresse_cabinet = htmlspecialchars(strip_tags($this->adresse_cabinet));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':prenom', $this->prenom);
        $stmt->bindParam(':specialite', $this->specialite);
        $stmt->bindParam(':adresse_cabinet', $this->adresse_cabinet);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function search($keywords) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nom LIKE ? OR prenom LIKE ? OR specialite LIKE ?";

        $stmt = $this->conn->prepare($
