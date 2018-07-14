<?php

namespace App\Repositories;
use App\User;
interface TrancheRepositoryInterface
{
   public function save(Array $inputs);
   public function store(Array $inputs);
   public function getById($id);
   public function update($id, Array $inputs);
   public function destroy($id);
   public function getPaginate($n);
   public function getFormation($id);
   public function getTranchesFormation($id);
   public function getResteMontantAPayerFormation($id);
   public function canAddTrancheFormation($id);
   public function montantTrancheFormationIsValid($id, $montant);
   public function getFormationTranche($idTranche);
   public function getTranche($id);
   public function getTrancheFormationNumero($id, $numero);
   public function supprimTranche($id);

}
