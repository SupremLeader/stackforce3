//   SCROLL REVEAL DES BLOCK QUESTIONS ET DES BLOCKS REPONSES

	$(document).ready(function() {
	  
	    $(window).scroll( function(){
	    
	         /* Trouver l'emplacement de l'élément qui adoptera l'effet au scroll */
	        $('.question').each( function(i){
	            
	            var bottom_of_object = $(this).offset().top + $(this).outerHeight(); // Configuration de l'effet par rapport à l'objet
	            var bottom_of_window = $(window).scrollTop() + $(window).height(); // Configuration de l'effet scroll (emplacement du scroll) par rapport à la fenêtre
	            
	           /* Si l'objet est dans la fenêtre alors = si la fenêtre est plus basse que l'objet */
	            if( bottom_of_window > bottom_of_object ){
	                
	                $(this).animate({'opacity':'1'},600); // Animation apparition en fondu (depuis opacité 0 en css) de l'objet concerné après scroll
	                    
	            }
	            
	        }); 
	    
	    });
	    

	});

