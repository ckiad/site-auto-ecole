<?php

namespace App\Repositories;
use App\User;
interface MediaRepositoryInterface
{
   public function save(Array $inputs, $fichier);
   public function store(Array $inputs, $fichier);
   public function getById($id);
   public function update(Array $inputs,$fichier);
   public function destroy($id);
   public function getPaginate($n);
   public function updateSansFichier(Array $inputs);
}