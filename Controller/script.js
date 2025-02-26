var message_valeur=document.querySelector(".information").children[1];
var Prenom,Nom,Matricule,email,dateNaissance,Genre,Numero,Password;
var valeur;
//CECI NOUS PERMET DE SELECTIONNER LE 2 EME PARAGRAHPE DANS LA DIV AYANT LA CLASS INFORMATION
window.onload=()=>{
    valeur="Aucune valeur"
    message_valeur.innerHTML=valeur;
}
document.forms[0].onchange=()=>{
    console.log("change");
}
var qr = new QRious({
    element: document.querySelector('.qrious'),
    size: 250,
    value: valeur
  });
function change(element) {
switch (element.name) {
    case "id_proj":
        id_proj=element.value;
      break;
    
    
}

valeur=id_proj;
qr.value=valeur;
message_valeur.innerHTML=qr.value;


  
   
}



  