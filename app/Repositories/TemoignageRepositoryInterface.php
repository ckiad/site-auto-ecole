<?php

namespace App\Repositories;
use App\Temoignage;
interface TemoignageRepositoryInterface
{
   public function save(Temoignage $temoignage, Array $inputs);
   public function store(Array $inputs);
   public function getById($id);
   public function update($id, Array $inputs);
   public function destroy($id);
   public function getPaginate($n);

   //Fonction ecrite par cedric et qui peuvent utiliser les fonctions précédement déclarer
   public function getTemoignagesRecent($n);
}
