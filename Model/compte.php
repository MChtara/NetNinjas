<?php
class compte {
    private $id_compte;
    private $firstname;
    private $lastname;
    private $date;
    private $email;
    private $password;
    private $role;

    public function __construct($id_compte, $firstname,$lastname,$date,$email, $pwd,$role) {
        $this->id_compte = $id_compte;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->date = $date;
        $this->email = $email;
        $this->password = $pwd;
        $this->role =$role;
    }
    public function getId_compte() { return $this->id_compte; }
    public function getfirstname() { return $this->firstname; }
    public function getlastname() { return $this->lastname; }
    public function getdate() { return $this->date; }
    public function getemail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getRole() { return $this->role; }

    public function setId_compte($id_compte) { $this->id_compte = $id_compte; }
    public function setfirstname($firstname) { $this->firstname = $firstname; }
    public function setlastname($lastname) { $this->lastname = $lastname; }
    public function setdate($date) { $this->date = $date; }
    public function setemail($email) { $this->email = $email; }
    public function setPassword($pwd) { $this->password = $pwd; }
    public function setRole($role) { $this->role = $role; }
}
?>
