<?php

class userModel {

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "tdw";

    
    // Connection avec la base de donnes
    private function connect($servername, $username, $password, $database) {
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
    
    // Deconnection
    private function deconnect(&$conn) {
        if ($conn) {
            $conn->close();
        }
    }

    // Preparation et execution du requete
    private function requete($conn, $r) 
    {
        $stmt = $conn->prepare($r);
        if (!$stmt) {
            die("Error: " . $conn->error);
        }
        $stmt->execute();
        return $stmt->get_result();
    }


    // get user table 
    public function get_user_table()
   {
    $conn = $this->connect($this->servername, $this->username, $this->password, $this->database);
    $query = "SELECT * FROM utilisateur"; 

    $res = $this->requete($conn, $query);
    $this->deconnect($conn);

    $users = array();
    while ($row = $res->fetch_assoc()) {
        $users[] = $row;
    }
    return $users;
   }

       // get user table 
    public function block_user($id)
   {
    $conn = $this->connect($this->servername, $this->username, $this->password, $this->database);
    $query = "UPDATE utilisateur SET est_blockee = 1 WHERE username = '$id'"; 
    $res = $this->requete($conn, $query);
    $this->deconnect($conn);
   }
  

   // add user 
   
   public function add_user_table($username, $password, $nom , $prenom , $sexe , $date)
   {
    $conn = $this->connect($this->servername, $this->username, $this->password, $this->database);
    $query = "INSERT INTO utilisateur (username, password, est_blockee, Valide_ins, nom , prenom, sexe, date_naissance) VALUES('$username', '$password', 0, 'Non Valide', '$nom' , '$prenom' , '$sexe' , '$date')";
    $res = $this->requete($conn, $query);
    $this->deconnect($conn);
   }


   // valider ins 
   public function valide_user_table($username)
   {
    $conn = $this->connect($this->servername, $this->username, $this->password, $this->database);
    $query = "UPDATE utilisateur 
          SET 
          Valide_ins ='Valide'
          WHERE username = '$username'";
    $res = $this->requete($conn, $query);
    $this->deconnect($conn);
   }
   
   // get user
 
   public function get_userT($username)
   {
    $conn = $this->connect($this->servername, $this->username, $this->password, $this->database);
    $query = "SELECT * FROM utilisateur where username = '$username'"; 

    $res = $this->requete($conn, $query);
    $this->deconnect($conn);

    $users = array();
    while ($row = $res->fetch_assoc()) {
        $users[] = $row;
    }
    return $users;
   }



}
?>