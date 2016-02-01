 $(document).ready(function(){ // Lancer une fois la page chargée

//   SCROLL REVEAL DES BLOCK QUESTIONS ET DES BLOCKS REPONSES

$('.blockqr:nth-child(1)').css('opacity', '1');
$('.blockqr:nth-child(2)').css('opacity', '1');
$('.blockqr:nth-child(3)').css('opacity', '1');

/* A chaque scroll, les actions sont les suivantes : */
$(window).scroll( function(){
  
  /* Trouver l'emplacement de l'élément qui adoptera l'effet au scroll */
  $('.blockqr').each( function(i){
    
    var bottom_of_object = $(this).offset().top +  $(this).outerHeight(); // Configuration de l'effet par rapport à l'objet
    var bottom_of_window = $(window).scrollTop() + $(window).height(); // Configuration de l'effet scroll (emplacement du scroll) par rapport à la fenêtre
    
    /* Si l'objet est dans la fenêtre alors = si la fenêtre est plus basse que l'objet */
    if( bottom_of_window > bottom_of_object ){
      
      $(this).animate({'opacity':'1'},600); // Animation apparition en fondu (depuis opacité 0 en css) de l'objet concerné après scroll
      
    }
    
  }); 
  
});



// Scroll jusqu'aux réponses

     $('.js-scrollTo').on('click', function() { // Au clic sur un élément
			var page = $(this).attr('href'); // Page cible
			var speed = 800; // Durée de l'animation (en ms)
			$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
			return false;
		});

     
// fonction formulaires reponse et question ==> Au click sur le bouton = affiche le textearea pour répondre
$(".manage_reply").hide();

$(".jsrepondre").click(function(){
  if($(".manage_reply").is(":hidden")){
    $(".manage_reply").show(700); 
  } else {
    $(".manage_reply").hide(700);
  }
  return false;
});


 // fonction bouton meilleure réponse  ==> au click fait apparaître une indication
 // de 'Meilleure réponse' à l'utilisateur ayant posé la question 

 $("#check").hide();
 
 $(".reponse").mouseover(function(){
  $("#check").fadeIn(400); 
});
 $(".reponse").mouseleave(function(){
  $("#check").fadeOut(400); 
});
 
 
// Scroll to top ==> Bouton "Haut de page" pour remonter au début
// Déterminer la taille de la fenêtre et une limite à partir de laquelle on affiche un bouton de class ".scrollToTop"

$(window).scroll(function(){
  if ($(this).scrollTop() > 100) {
   $('.scrollToTop').fadeIn(); // Le bouton apparaît en fondu
 } else {
   $('.scrollToTop').fadeOut(); // Le bouton disparaît en fondu
 }
});

$('.scrollToTop').click(function(){ // Réglages de l'effet scroll quand il est lancé (position et vitesse)
  $('html, body').animate({scrollTop : 0},800);
  return false;
});



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

    
    
    $("#valider").click(function(){ 

      // INITIALISATION D'UN JEU D'AJOUT ET DE SUPP DE CLASSE 'disparition' qui gère la visibilité des div concernées   
      
      $(this).addClass("disparition");
      $(".form-control").addClass("disparition"); 
      $(".placeholder").addClass("disparition");
      $(".modifs").addClass("disparition");
      $("#modifier").removeClass("disparition");
      

    }); 

    
    
  });
