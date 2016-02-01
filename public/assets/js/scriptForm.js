$(document).ready(function() {

// GESTION DE STYLE ET D'ETAT D'UN BOUTON "CLOSE"
$("#modal_trigger").leanModal({
		top: 100,
		overlay: 0.6,
		closeButton: ".modal_close" // LE MODAL X APPELLE AFFICHE le bouton "CLOSE"
});

$("#modalTriggerLogin").leanModal({ // LE MODAL Y APPELLE AFFICHE le bouton "CLOSE"
		top: 100,
		overlay: 0.6,
		closeButton: ".modal_close"
});

$(function() {

		// APPELER LE MODAL INSCRIPTION
		$("#modal_trigger").click(function() { // AU CLICK FAIT APPARAITRE LE MODAL d'ID X
				$("#modal_login").hide();
		});

		$("#modalTriggerLogin").click(function() { // AU CLICK FAIT APPARAITRE LE MODAL d'ID Y
				$("#modal").hide();
		});

	});

});