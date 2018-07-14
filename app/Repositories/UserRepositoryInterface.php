<?php

namespace App\Repositories;
use App\User;
interface UserRepositoryInterface
{
   public function save(User $user, Array $inputs);
   public function store(Array $inputs);
   public function getById($id);
   public function update($id, Array $inputs);
   public function destroy($id);
   public function getPaginate($n);
   
//methodes de recherche des utilisateurs
   public function findUserByName($nom);
   public function findUserByCNI($cni);
   public function findUserByPhone($phone);
   public function findUserByMail($mail);
   public function listerApprenants();
   
   
   //Ajout de ckiadjeu gestion des partenaires
   public function getPartenaires($id);
   //Ajout de ckiadjeu gestion des paiements des souscriptions
   public function paiementSouscription($telephone);
   public function updateNombreInvite($id, $nbre_invite);
   public function updateNiveau($id, $niveau);
   public function updateNumeroNW($id, $numero_nw);
   public function findUserByNumero_NW($numero_nw); 


}
