<?php 
if(isset($_SESSION["email"])){
if($_SESSION["role"]!=2){
header('Location:../index.php');


}

}else{

    header('Location:../index.php');



}































?>