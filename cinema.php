//save, remove, getByID(ID), all, getByField(fieldValue)

<?php

$pdo = require 'connection.php';

class cinema {
    private $movieID;
    private $movieName;
    private $director;

    public function __construct($movieID, $movieName, $director) {
      $this->movieID = $movieID;
      $this->movieName = $movieName;
      $this->director = $director;  
    }

    public function save($pdo) {
      $request = $pdo->prepare("INSERT INTO cinema (movieID, movieName, director) VALUE (:movieID, :movieName, :director)");
      $request->execute([
        "movieID"=>$this->movieID,
        "movieName"=>$this->movieName,
        "director"=>$this->director
      ]);
    }

    public function remove($pdo) {
      $request = $pdo->prepare("DELETE INTO cinema WHERE movieID = $this->movieID");
      $this->pdo->exec($request);
    }

    public function getByID($movieID, $pdo) {
      $request = $pdo->prepare("SELECT * FROM cinema WHERE movieID = $movieID");
      $request->execute([$movieID]);
      $allData = $request->fetchAll();
      $data = count($allData);
      if($data = 0) {
        echo 'movie not found';
      }
      else {
        $this->movieID = $allData['movieID'];
        $this->movieName = $allData['movieName'];
        $this->director = $allData['director'];
      }
    }

    public function all($pdo) : array {
      $request = $pdo->prepare("SELECT * FROM cinema");
      $request->execute();
      $allData = $request->fetchAll();
      return $allData;
    }

    public function getByDirector($director, $pdo) : array {
      $request = $pdo->prepare("SELECT * FROM cinema WHERE director = $director");
      $request->execute([$director]);
      $allData = $request->fetchAll();
      $data = count($allData);
      if($data = 0) {
        echo 'movie not found';
      }
      else {
        return $allData;
      }
    }
}

?>