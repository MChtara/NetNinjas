<?php
	class abonnement{
		private $idab=null;
		private $type=null;
		private $debut=null;
		private $expiration=null;
        private $iduser=null;
		private $payid=null;
		
		function __construct($idab,$type,$debut,$expiration, $iduser, $payid = ""){
			$this->idab=$idab;
			$this->type=$type;
			$this->debut=$debut;
			$this->expiration=$expiration;
			$this->iduser=$iduser;
			$this->payid=$payid;
		}
        function getidab(){
            return $this->idab;
        }
		function gettype(){
			return $this->type;
		}
		function getdebut(){
			return $this->debut;
		}
		function getexpiration(){
			return $this->expiration;
		}
		function getiduser(){
			return $this->iduser;
		}
		function getpayid(){
			return $this->payid;
		}
		function settype(string $type){
			$this->type=$type;
		}
		function setdebut(date $debut){
			$this->debut=$debut;
		}
		function setexpiration(date $expiration){
			$this->expiration=$expiration;
		}
        function setiduser(int $iduser){
			$this->iduser=$iduser;
		}
		function setpayid(string $payid){
			$this->payid=$payid;
		}
	}
	class typeabon {
		private $id_typeabon=null;
		private $label_typeabon=null;
		private $prix_typeabon=null;
		private $icon_typeabon=null;
		function __construct($id_typeabon,$label_typeabon,$prix_typeabon=10,$icon_typeabon=""){
			$this->id_typeabon=$id_typeabon;
			$this->label_typeabon=$label_typeabon;
			$this->prix_typeabon=$prix_typeabon;
			$this->icon_typeabon=$icon_typeabon;
		}
		function getid(){
            return $this->id_typeabon;
        }
		function getlabel(){
			return $this->label_typeabon;
		}
		function getprix(){
			return $this->prix_typeabon;
		}
		function geticon(){
			return $this->icon_typeabon;
		}
		function setlabel(string $label_typeabon){
			$this->label_typeabon=$label_typeabon;
		}
		function setprix(float $prix_typeabon){
			$this->prix_typeabon=$prix_typeabon;
		}
		function seticon(string $icon_typeabon){
			$this->icon_typeabon=$icon_typeabon;
		}
	}
?>