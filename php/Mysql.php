<?php

const DBNAME 	= "wetterdaten";
const USERNAME 	= "root";
const PASSWORD 	= "";
const HOST 		= "localhost";

class Mysql {

    public $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USERNAME, PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Fehlerhafte Verbindungsdaten!";
        }
    }

   public function getLastWetterData() {
        try {
            $result = "";
            $sel = $this->db->prepare('SELECT * FROM `wetter` ORDER BY `insert-date` DESC LIMIT 1');
            $sel->execute();
            $out = $sel->fetch();
        } catch (Exception $e) {
            $out = "Fehler beim Auslesen der Wetterdaten!";
        }
        return $out;
    }
}

?>
