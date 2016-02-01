$(document).ready(function(){
    
// MODIFIER LES CHAMPS
    
    // APPARITION DES INPUT/PLACEHOLDER
    
  $("#modifier").click(function(){ // ETATS DES AUTRES CHAMPS / DIV / INPUT AU CLICK SUR LE BOUTON #MODIFIER
      
      // INITIALISATION D'UN JEU D'AJOUT ET DE SUPP DE CLASSE 'disparition' qui gère la visibilité des div concernées
        $(this).addClass("disparition");
        $(".form-control").removeClass("disparition");
        $("#valider").removeClass("disparition");
        $(".modifs").removeClass("disparition");
        $(".placeholder").removeClass("disparition");
}); 

    
    
    $("#valider").click(function(){    // ETATS DES AUTRES CHAMPS / DIV / INPUT AU CLICK SUR LE BOUTON #VALIDER
        
        // INITIALISATION D'UN JEU D'AJOUT ET DE SUPP DE CLASSE 'disparition' qui gère la visibilité des div concernées
        
        $(this).addClass("disparition");
        $(".form-control").addClass("disparition"); 
         $(".placeholder").addClass("disparition");
        $(".modifs").addClass("disparition");
        $("#modifier").removeClass("disparition");
  

}); 

           
    
    
});