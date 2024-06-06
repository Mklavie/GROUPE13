window.onload = () =>{
    const navbutton = document.querySelector("#ma-navbar .nav-button");
    
    navbutton.addEventListener("click", function(){
        this.nextElementSibling.classList.toggle("show");
    });

    var supprimer = document.getElementsByClassName('button-sup');

    Array.from(supprimer).forEach(function(supprime) {
        supprime.addEventListener('click' , function(event) {
            if(!confirm('voulez-vous supprimer?')){
                event.preventDefault();
            }
        });
    });

    var ajouter = document.getElementsByClassName('button-ajout');

    Array.from(ajouter).forEach(function(ajout) {
        ajout.addEventListener('click' , function(event) {
            if(!confirm('voulez-vous ajouter?')){
                event.preventDefault();
            }
        });
    });


    var annuler = document.getElementsByClassName('annuler');

    Array.from(annuler).forEach(function(annul) {
        annul.addEventListener('click' , function(event) {
            if(!confirm('voulez-vous vraiment annuler cette reservation ?')){
                event.preventDefault();
            }
        });
    });

    var valider = document.getElementsByClassName('valider');

    Array.from(valider).forEach(function(valid) {
        valid.addEventListener('click' , function(event) {
            if(!confirm('voulez-vous vraiment valider cette reservation ?')){
                event.preventDefault();
            }
        });
    });




}