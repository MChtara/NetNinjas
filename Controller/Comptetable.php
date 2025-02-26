<?php
	include_once '../admin/partials/Config.php';
	include_once '../Model/compte.php';

    class compte_table {
        //-------------ajout compte--------------------------------------
            function Ajoutercompte($compte){
                $sql="INSERT INTO user (firstname, lastname, date_de_N, email, password,role) 
                VALUES (:firstname,:lastname,:date,:email,:password,:role)";
                
                $db = config::getConnexion();
                try{
                    $query = $db->prepare($sql);
                    $query->execute([
                    'firstname' => $compte->getfirstname(),
                    'lastname' => $compte->getlastname(),
                    'date' => $compte->getdate(),
                    'email' => $compte->getemail(),
                    'password' => $compte->getPassword(),
                    'role' => $compte->getRole()
                        
                ]);			
                }
                catch (Exception $e){
                    echo 'Erreur: '.$e->getMessage();
                }			
            }
        
            //--------------------------affiche compte-----------------------
            function Affichercompte(){
                $sql="SELECT * FROM user";
                $db = config::getConnexion();
                try{
                    $liste = $db->query($sql);
                    return $liste;
                }
                catch(Exception $e){
                    die('Erreur:'. $e->getMessage());
                }
            }
            //------------type---------------
            function Recuperertype($id_type){
                $sql="SELECT * from type_users where id_type=$id_type";
                $db = config::getConnexion();
                try{
                    $query=$db->prepare($sql);
                    $query->execute();
        
                    $bidofil=$query->fetch();
                    return $bidofil;
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }
            
            function Affichertype(){
                $sql="SELECT * FROM type_users";
                $db = config::getConnexion();
                try{
                    $liste = $db->query($sql);
                    return $liste;
                }
                catch(Exception $e){
                    die('Erreur:'. $e->getMessage());
                }
            }
            //------------------------supprimer compte-------------------------
            function Supprimercompte($id_compte){
                $sql="DELETE FROM user WHERE id_user=:id_compte";
                $db = config::getConnexion();
                $req=$db->prepare($sql);
                $req->bindValue(':id_compte', $id_compte);   
                try{
                    $req->execute();
                }
                catch(Exception $e){
                    die('Erreur:'. $e->getMeesage());
                }
            }
        //----------------------update compte-------------------------------------
        function Modifiercompte($compte, $id){
            $db = config::getConnexion();
            try {
        $query = $db->prepare('UPDATE user SET  firstname = :firstname, lastname = :lastname, date_de_N = :date, email = :email,password = :password,role = :role   WHERE id_user = :id_user');
                $query->execute([
                    'firstname' => $compte->getfirstname(),
                    'lastname' => $compte->getlastname(),
                    'date' => $compte->getdate(),
                    'email' => $compte->getemail(),
                    'password' => $compte->getPassword(),
                    'role' => $compte->getRole(),
                    'id_user' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
            
            function Recuperercompte($id_compte){
                $sql="SELECT * from user where id_user=$id_compte";
                $db = config::getConnexion();
                try{
                    $query=$db->prepare($sql);
                    $query->execute();
        
                    $compte=$query->fetch();
                    return $compte;
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }
            public function getUserByemail($email) {
                $sql="SELECT * from user where email=:email";
                $params = array('email' => $email);
                $db = config::getConnexion();
                try{
                    $query=$db->prepare($sql);
                    $query->execute($params);
        
                    $compte=$query->fetch();
                    return $compte;
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }
            function pass($compte, $email){
                $db = config::getConnexion();
                try {
                    $query = $db->prepare('UPDATE user SET  firstname = :firstname, lastname = :lastname, date_de_N = :date, email = :email,password = :password,role = :role   WHERE email = :email');
                    $query->execute([
                        'firstname' => $compte->getfirstname(),
                        'lastname' => $compte->getlastname(),
                        'date' => $compte->getdate(),
                        'email' => $compte->getemail(),
                        'password' => $compte->getPassword(),
                        'role' => $compte->getRole(),
                    ]);
                } catch (PDOException $e) {
                    $e->getMessage();
                }
            }
        
            public function getUserByUsername($username) {
                $sql = "SELECT * FROM users WHERE username = :username";
                $params = array('username' => $username);
                $stmt = $this->link->prepare($sql);
                $status = $stmt->execute($params);
                if ($status != true) {
                    $errorInfo = $stmt->errorInfo();
                    throw new Exception("Could not retrieve user: " . $errorInfo[2]);
                }
        
                $user = null;
                if ($stmt->rowCount() == 1) {
                    $row = $stmt->fetch();
                    $id = $row['id'];
                    $pwd = $row['password'];
                    $role = $row['role'];
                    $user = new User($id, $username, $pwd, $role);
                }
                return $user;
            }
        
            public function getUsers() {
                $sql = "SELECT * FROM users";
                $stmt = $this->link->prepare($sql);
                $status = $stmt->execute();
                if ($status != true) {
                    $errorInfo = $stmt->errorInfo();
                    throw new Exception("Could not retrieve users: " . $errorInfo[2]);
                }
        
                $users = array();
                $row = $stmt->fetch();
                while ($row != null) {
                    $id = $row['id'];
                    $username = $row['username'];
                    $pwd = $row['password'];
                    $role = $row['role'];
                    $user = new User($id, $username, $pwd, $role);
                    $users[$id] = $user;
        
                    $row = $stmt->fetch();
                }
                return $users;
            }
            function echoValue($array, $fieldName) {
                if (isset($array) && isset($array[$fieldName])) {
                    echo $array[$fieldName];
                }
            }
            
            function echoChecked($array, $fieldName, $value) {
                if (isset($array[$fieldName]) && $array[$fieldName] == $value) {
                    echo 'checked="checked"';
                }
            }
            
            function echoCheckedArray($array, $fieldName, $value) {
                if (isset($array[$fieldName]) &&
                        is_array($array[$fieldName]) &&
                        in_array($value, $array[$fieldName])) {
                    echo 'checked="checked"';
                }
            }
            
            function echoSelected($array, $fieldName, $value) {
                if (isset($array[$fieldName]) && $array[$fieldName] == $value) {
                    echo 'selected="selected"';
                }
            }
            
            function echoSelectedArray($array, $fieldName, $value) {
                if (isset($array[$fieldName]) &&
                        is_array($array[$fieldName]) &&
                        in_array($value, $array[$fieldName])) {
                    echo 'selected="selected"';
                }
            }
            
            
            function is_logged_in() {
                start_session();
                return (isset($_SESSION['user']));
            }
            
            function start_session() {
                $id = session_id();
                if ($id === "") {
                    if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
                }
            }
        }
        
        ?>
        