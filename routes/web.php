<?php

/*------------------------------------------------------------------------------------|
|                 ROUTES ACCESSIBLES PAR TOUT UTILISATEUR DU SITE                     |
|-------------------------------------------------------------------------------------|
| Les routes définies dans la première section ci-dessous sont accessible par tous les|
| utilisateurs du site, elles ne font l'objet d'aucune sécurité.                      |                                |
|-------------------------------------------------------------------------------------|
|------------------------------------------------------------------------------------*/

// Route pour acceder à la plateforme (page d'accueil)
Route::get('/', 'IndexController@getIndex');


// Routes pour la gestion de la recherche
Route::post('/recherches','IndexController@getElements');
Route::get('/details-temoignage/{id}','TemoignageController@getContenuTemoignageEtIncrementeNbreVue');

// Route pour choisir une langue de navigation sur le site
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

// Routes pour s'inscrire à une formation
Route::get('inscription-formation','IndexController@souscrireFormation');
Route::post('inscription-formation', array('as' => 'inscription-formation',
                                  'uses' => 'IndexController@storeFormation'));

// Routes pour s'inscrire au marketing relationnel
Route::get('inscription-marketing','IndexController@souscrireMarketing');
Route::post('inscription-marketing', array('as' => 'inscription-marketing',
                                   'uses' => 'IndexController@storeMarketing'));

// Routes pour la connexion d'un utilisateur
Route::get('login', array('as' => 'login','uses' => 'IndexController@getLogin'));
Route::post('login','IndexController@postLogin');

// Route pour se déconnecter du site
Route::get('logout', array('as' => 'logout','uses' => 'IndexController@getLogout'));

// Routes vers les pages de gestion des erreurs
Route::get('erreur404','ErrorController@index');

//Route qui capte les utilisateurs qui suivent les liens d'invitation. 
Route::get('invitation/{id}','InvitationController@addInvite');

//route public pour les actualites
Route::get('actualites', 'IndexController@getActualites');

/*------------------------------------------------------------------------------------|
|                 ROUTES ACCESSIBLES LES UTILISATEURS                   |
|-------------------------------------------------------------------------------------|
| Les routes qui exécutent les fonctions utilisateurs sont définies  dans le groupe|
| de route ci-dessous, ceci permet de sécuriser ces routes en limitant leur accès      |
| seulement à l'utilisateur.                                                       |
|-------------------------------------------------------------------------------------|
|------------------------------------------------------------------------------------*/
Route::group(array('middleware' => 'SentinelUser','prefix'=>'user'), function (){
  Route::get('user-home','AdminController@showHome');
  Route::get('edit-profile','UserController@editAccount');
  Route::put('edit-profile','UserController@postEditAccount');
  Route::get('activation/{email}/{activationcode}','ActivationController@activate');
  Route::get('desactivate/{id}/{activationcode}','ActivationController@desactivate');
  Route::get('utilisatteur/{id}','UserController@getuser');

  //Definition des routes pour l'Actualitéshorray
  Route::get('user-actualites', 'PostController@getPosts');

  //Definition des routes pour les cours
  Route::get('user-cours', 'CoursController@getCours');

  //routes pour la gestion des formations
  Route::get('user-formations', 'FormationController@getFormations');

  Route::get('user-matrice', 'MatriceController@index');

  //Route pour la gestion des partenaires (les personnes qui se sont enregistrés via le lien de la personne connecté)
  Route::get('user-partenaires', 'PartenaireController@getPartenaires');
  Route::get('add-partenaire', 'PartenaireController@addPartenaire');
  Route::get('cancel-action','IndexController@cancel');

  Route::get('enreg-marketeur-test','IndexController@storeSerieMarketeur');

  Route::post('add-partenaire', 'PartenaireController@postaddPartenaire');

  //Route pour la gestion des paiements (souscriptions ou tranches)
  Route::get('paiement-souscription', 'PaiementController@initPaiementSouscription');
  Route::post('paiement-souscription', 'PaiementController@postInitPaiementSouscription');

});


/*------------------------------------------------------------------------------------|
|                 ROUTES ACCESSIBLES UNIQUEMENT PAR UN ADMISTRATEUR                   |
|-------------------------------------------------------------------------------------|
| Les routes qui exécutent les fonctions administrateurs sont définies  dans le groupe|
| de route ci-dessus, ceci permet de sécuriser ces routes en limitant leur accès      |
| seulement à l'administrateur.                                                       |
|-------------------------------------------------------------------------------------|
|------------------------------------------------------------------------------------*/
Route::group(array('middleware' => 'SentinelAdmin','prefix'=>'admin'), function () {
  Route::get('admin-home','AdminController@showHome');
  Route::get('utilisateurs','UserController@utilisateurs');
  Route::get('edit-profile','UserController@editAccount');
  Route::put('edit-profile','UserController@posteditAccount');
  Route::get('activation/{email}/{activationcode}','ActivationController@activate');
  Route::get('desactivate/{id}/{activationcode}','ActivationController@desactivate');
  Route::get('utilisatteur/{id}','UserController@getuser');

  // Routes pour la gestion des posts  delete-evaluation-question
  Route::get('admin-posts','PostController@getPosts');
  Route::get('add-post','PostController@addPost');
  Route::post('add-post','PostController@postaddPost');

  Route::get('update-post/{id}','PostController@updatePost');
  Route::post('update-post','PostController@postupdatePost');

  Route::get('delete-post/{id}','PostController@deletePost');

  Route::get('show-post/{id}','PostController@showPost');
  Route::get('publish-post/{id}','PostController@onlinePost');
  Route::get('unpublish-post/{id}','PostController@offlinePost');
  Route::get('delete-media-post/{media_id}/{post_id}', 'PostController@deleteMediaPost');

  // Routes pour la gestion des messages
  // Route::get('admin-messages','MessageController@getMessages');

  // Routes pour la gestion des formations
  Route::get('admin-formations','FormationController@getFormations');

  Route::get('add-formation','FormationController@addFormation');
  Route::post('add-formation','FormationController@postaddFormation');

  Route::get('update-formation/{id}','FormationController@updateFormation');
  Route::post('update-formation','FormationController@postupdateFormation');

  Route::get('delete-formation/{id}','FormationController@deleteFormation');

  Route::get('show-formation/{id}','FormationController@showFormation');

  Route::get('publish-formation/{id}','FormationController@activateFormation');
  Route::get('unpublish-formation/{id}','FormationController@desactivateFormation');


  // Routes pour la gestion des cours delete-media-cours
  Route::get('admin-cours','CoursController@getCours');
  Route::get('add-cours','CoursController@addCours');
  Route::post('add-cours','CoursController@postaddCours');

  Route::get('update-cours/{id}','CoursController@updateCours');
  Route::post('update-cours','CoursController@postupdateCours');

  Route::get('edit-cours/{id}','CoursController@editCours');
  Route::post('edit-cours','CoursController@posteditCours');
  Route::get('delete-cours/{id}','CoursController@deleteCours');
  Route::get('show-cours/{id}','CoursController@showCours');
  Route::get('publish-cours/{id}','CoursController@activateCours');
  Route::get('unpublish-cours/{id}','CoursController@desactivatecours');
  Route::get('delete-media-cours/{media_id}/{cours_id}', 'PostController@deleteMediaCours');

  // Routes pour la gestion des évaluations
  Route::get('admin-evaluations','EvaluationController@getEvaluations');

  Route::get('add-evaluation','EvaluationController@addEvaluation');
  Route::post('add-evaluation','EvaluationController@postaddEvaluation');

  Route::get('show-evaluation/{id}','EvaluationController@showEvaluation');
  Route::get('delete-evaluation/{id}','EvaluationController@destroy');
  Route::get('delete-evaluation-question/{evaluation_id}/{question_id}', 'EvaluationController@deleteEvaluationQuestion');

  Route::get('update-evaluation/{id}','EvaluationController@updateEvaluation');
  //Route::post('update-evaluation/{id}','EvaluationController@postupdateEvaluation');
  Route::post('update-evaluation','EvaluationController@postupdateEvaluation');

  // Routes pour la gestion des questions
  Route::get('admin-questions','QuestionController@getQuestions');

  Route::get('add-question','QuestionController@addQuestion');
  Route::post('add-question','QuestionController@postaddQuestion');


  Route::get('show-question/{id}','QuestionController@showQuestion');
  Route::get('delete-question/{id}','QuestionController@destroy');

  Route::get('update-question/{id}','QuestionController@updateQuestion');
  Route::post('update-question','QuestionController@postupdateQuestion');


  // Routes pour la gestion des apprenants
  Route::get('admin-apprenants','IndexController@getApprenants');
  Route::get('delete-apprenant/{id}','IndexController@deleteApprenant');
  Route::get('show-apprenant/{id}','IndexController@showApprenant');


  // Routes pour la gestion des gadgets
  Route::get('admin-gadgets','GadgetController@getGadgets');

  Route::get('add-gadget','GadgetController@addGadget');
  Route::post('add-gadget','GadgetController@postaddGadget');

  Route::get('update-gadget/{id}','GadgetController@updateGadget');
  Route::post('update-gadget','GadgetController@postupdateGadget');

  Route::get('delete-gadget/{id}','GadgetController@deleteGadget');

  Route::get('show-gadget/{id}','GadgetController@showGadget');
  Route::get('cancel-action','IndexController@cancel');

   // Routes pour la gestion des medias
   Route::get('admin-medias','MediaController@getMedias');

   Route::get('add-media','MediaController@addMedia');
   Route::post('add-media','MediaController@postaddMedia');
 
   Route::get('update-media/{id}','MediaController@updateMedia');
   Route::post('update-media','MediaController@postupdateMedia');
 
   Route::get('delete-media/{id}','MediaController@deleteMedia');
 
   Route::get('show-media/{id}','MediaController@showMedia');



  // Aperçu du réseau de marketing relationnel
  Route::get('admin-marketing-relationnel','MarketingController@getMarketing');


  // Gestion des transactions
  Route::get('admin-transactions','TransactionController@getTransactions');

  Route::get('admin-debut-transactions','TransactionController@getDebutTransactions');
  Route::post('admin-debut-transactions','TransactionController@postDebutTransactions');

  Route::post('admin-rechercher-user','UserController@getUserByCriteria');

  Route::get('admin-add-transaction/{id}','TransactionController@addTransaction');
  Route::post('admin-add-transaction','TransactionController@postaddTransaction');

  // Routes pour la gestion des tranches
  Route::get('config-tranche-formation/{id}','TrancheController@configTrancheFormation');
  Route::get('add-tranche/{id}','TrancheController@addTrancheFormation');
  Route::post('add-tranche','TrancheController@postaddTrancheFormation');


  // Gestion des privilèges
  Route::get('admin-privileges','PrivilegeController@getPrivileges');


  // Gestion des témoignages
  Route::get('admin-temoignages','TemoignageController@getTemoignages');
  Route::get('show-temoignage/{id}','TemoignageController@showTemoignage');
  Route::get('delete-temoignage/{id}','TemoignageController@deleteTemoignage');


  // Gestion des paramètres
  Route::get('admin-parametres','ParametreController@getParametres');

  Route::get('add-parametre','ParametreController@addParametre');
  Route::post('add-parametre','ParametreController@postaddParametre');
  Route::put('edit-parametre/{id}','ParametreController@edit');
  Route::get('update-parametre/{id}','ParametreController@update');
  Route::post('update-parametre','ParametreController@postupdateParametre');
  Route::get('delete-parametre','ParametreController@destroy');
  Route::get('show-parametre/{id}','ParametreController@showParametre');


  //routes de gestion des messages et des mails
  Route::get('/admin-messages', 'MessageController@messages');
  Route::get('/show-message/{id}', 'MessageController@showMessage');
  Route::get('/reply-message/{id}', 'MessageController@replyMessage');
  Route::post('/reply-message','MessageController@sendByEmailMessage');
  Route::get('/delete-message/{id}','MessageController@deleteMessage');

  // Routes pour la gestion des promotions
  Route::get('admin-promotions','PromotionController@getPromotions');

  Route::get('add-promotion','PromotionController@addPromotion');
  Route::post('add-promotion','PromotionController@postaddPromotion');

  Route::get('show-promotion/{id}','PromotionController@showPromotion');
  Route::get('delete-promotion/{id}','PromotionController@destroy');

  Route::get('update-promotion/{id}','PromotionController@updatePromotion');
  Route::post('update-promotion','PromotionController@postupdatePromotion');
  Route::get('publish-promotion/{id}','PromotionController@publishPromotion');
  Route::get('unpublish-promotion/{id}','PromotionController@unpublishPromotion');

  //Route pour la mise en ligne ou pas des témoignages de la part de l'administrateur
    Route::get('/publier-temoignage/{id}','TemoignageController@onlineTemoignage');
    Route::get('/depublier-temoignage/{id}','TemoignageController@offlineTemoignage');



});


//envoi de message chez l'administrateur
Route::post('/send-message','MessageController@sendMessage');





/*-----------------------------------------------------------------
* Routes provisoires pour naviguer sur la vue administrateur
* NE PAS UTILISER CETTE SECTION POUR L'IMPLEMENTATION FINALE
* DES ROUTES, CES ROUTES NE SONT PAS SECURISEES.
*------------------------------------------------------------------*/
// Accueil



// Gestion des apprenants
Route::get('/admin-apprenants', function () {
  return view('admin.admin-gestion-apprenants');
});


// Consultation des activités du marketing relationnel
Route::get('/admin-marketing-relationnel', function () {
  return view('admin.admin-marketing-relationnel');
});

// Debut de l'enregistrement d'une transaction
Route::get('/admin-recherche-user', function () {
  return view('admin.admin-recherche-user');
});

// Gestion des privilèges
Route::get('/admin-privileges', function () {
  return view('admin.admin-gestion-privileges');
});

/*-----------------------------------------------------------------
* Routes provisoires pour naviguer sur la vue user
* NE PAS UTILISER CETTE SECTION POUR L'IMPLEMENTATION FINALE
* DES ROUTES, CES ROUTES NE SONT PAS SECURISEES.
*------------------------------------------------------------------*/


// Gestion provisoire des routes de l'utilisateur
// posts

// formations
Route::get('/formations', function () {
  return view('formations');
});

//gestion de l'oubli des mots de passe
Route::get('forgotpassword', 'IndexController@getForgotPassword');
Route::post('forgotpassword','IndexController@postForgotPassword');
# Forgot Password Confirmation
Route::get('reset-password/{email}/{code}','IndexController@getForgotPasswordConfirm');
Route::post('reset-password/{email}/{code}', 'IndexController@postForgotPasswordConfirm');