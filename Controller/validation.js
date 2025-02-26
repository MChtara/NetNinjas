
//controle de saisie de Categorie
function validateCategoryName() {
    var categoryNameInput = document.getElementById("nom_cat");
    var categoryName = categoryNameInput.value.trim();
    var regex = /^[a-zA-Z0-9 ]+$/;
    if (!regex.test(categoryName)) {
        categoryNameInput.classList.add("is-invalid");
        categoryNameInput.focus();
        return false;
    } else {
        categoryNameInput.classList.remove("is-invalid");
        return true;
    }
}

//controle de saisie de FILM
function validateFilm() {
    var titreInput = document.getElementById("titre");
    var dureeInput = document.getElementById("duree");
    var realisateurInput = document.getElementById("realisateur");
    var anneeInput = document.getElementById("annee");

    var regexAlphaNum = /^[a-zA-Z0-9 ]+$/;
    var regexYear = /^(19[0-9]{2}|20[0-2][0-9])$/;
    var regexInt = /^[1-9][0-9]*$/;

    var titre = titreInput.value.trim();
    var duree = dureeInput.value.trim();
    var realisateur = realisateurInput.value.trim();
    var annee = anneeInput.value.trim();

    var isValid = true;

    if (!regexAlphaNum.test(titre)) {
        titreInput.classList.add("is-invalid");
        titreInput.focus();
        isValid = false;
    } else {
        titreInput.classList.remove("is-invalid");
    }

    if (!regexInt.test(duree)) {
        dureeInput.classList.add("is-invalid");
        dureeInput.focus();
        isValid = false;
    } else {
        dureeInput.classList.remove("is-invalid");
    }

    if (!regexAlphaNum.test(realisateur)) {
        realisateurInput.classList.add("is-invalid");
        realisateurInput.focus();
        isValid = false;
    } else {
        realisateurInput.classList.remove("is-invalid");
    }

    if (!regexYear.test(annee)) {
        anneeInput.classList.add("is-invalid");
        anneeInput.focus();
        isValid = false;
    } else {
        var currentYear = new Date().getFullYear();
        if (annee > currentYear) {
            anneeInput.classList.add("is-invalid");
            anneeInput.focus();
            isValid = false;
        } else {
            anneeInput.classList.remove("is-invalid");
        }
    }

    return isValid;
}
function validateReservation(reservation) {
    let errors = [];
  
  
    if (!reservation.siege) {
      errors.push("Le numéro de siège est obligatoire.");
    }
  
    if (typeof reservation.etat !== "string") {
        errors.push("L'état de la réservation doit être une chaîne de caractères.");
      }
    
      if (!reservation.etat) {
        errors.push("L'état de la réservation est obligatoire.");
      }
  
    if (!reservation.id_proj) {
      errors.push("L'identifiant du projet est obligatoire.");
    }
  
    return errors;
  }