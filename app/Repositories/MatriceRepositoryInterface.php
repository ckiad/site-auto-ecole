<?php

namespace App\Matrice;
use App\User;
interface MatriceRepositoryInterface
{
   public function save(Matrice $matrice, $iduser, Array $inputs);
   public function store(Array $inputs);
   public function getById($id);
   public function update($id, Array $inputs);
   public function destroy($id);
   public function getPaginate($n);

   //Ajout de ckiadjeu
   public function incrementeNbreFilsEnreg($matrice);
   public function getProchainNumeroUsersPourReseau();
   public function getActiveMatriceUsers($user_id);
   public function desactiveMatrice($id);
   public function addUserInNetwork($user_id);
   public function getReseauUser($user_id);
}
