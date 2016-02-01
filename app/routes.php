<?php

$w_routes = array(
    
// -------------------------------------------------- ROUTES KILIAN -------------------------------------------------- \\
    
    ['GET', '/', 'Default#home', 'home'],                                                   // Route de la page d'accueil
    
    ['POST', '/recup', 'Default#recupPost', 'recup'],                                       // Route pour récupérer la recherche
    ['GET|POST', '/search=[:result]', 'Question#search', 'search'],                         // Route pour afficher les résultats de la recherche
    ['GET|POST', '/search=[:result]/orderby=[:orderby]', 'Question#search', 'search2'],     // Route pour changer l'order by des résultats de la recherche
    ['GET|POST', '/orderby=[:orderby]', 'Question#orderBy', 'orderby'],                     // Route pour changer l'order by des questions (sans recherche)
    
    ['GET|POST', '/question=[:id]', 'Question#question', 'question'],                       // Route pour afficher les détails d'une question
    ['POST', '/recupVote', 'Default#recupVote', 'recupVote'],                               // Route pour récupérer le vote d'une réponse
    ['GET|POST', '/question=[:qid]/reponse=[:aid]/vote=[:vote]', 'Question#vote', 'vote'],  // Route pour rediriger vers les détails de la question après le vote
        
    ['GET|POST', '/profilModif', 'Profil#profilModif', 'profilModif'],                      // Route pour modifier son profil
    
// -------------------------------------------------- FIN ROUTES KILIAN -------------------------------------------------- \\
    
    /*['GET|POST', '/post/create', 'Default#create', 'create'], 
		['GET', '/post/[i:id]/delete', 'Default#delete', 'delete'],
		['GET|POST', '/post/[i:id]/edit', 'Default#edit', 'edit'],
		['GET', '/post/[i:id]', 'Default#post', 'post'],*/
    
    // Route pour la validation du formulaire d'inscription
    ['GET|POST', '/register', 'Default#register', 'register'], 
    // Route pour la validation du formulaire de connexion
    ['GET|POST', '/login', 'Default#login', 'login'], 
    // Route pour la déconnexion de l'utilisateur connecté
    ['GET', '/logout', 'Default#logout', 'logout'],
    // Route permettant d'afficher le profil de l'utilisateur selon son id
    ['GET|POST', '/profil=[:id]', 'Profil#profilView', 'profil'],
    // Route permettant d'acceder au panneau d'administration
    ['GET', '/adminpanel', 'Admin#adminPanel', 'adminpanel'],
    // Route permettant le comptage des Questions pour affichage sur le home
    ['GET', '/count', 'Default#countQ', 'countQ'],
 // Route pour la validation d'une nouvelle question
    ['GET|POST', '/newQ', 'Default#newQ', 'newQ'],
// Route pour la validation d'une reponse à une question
    ['GET|POST', '/newR', 'Default#newR', 'newR'],

);