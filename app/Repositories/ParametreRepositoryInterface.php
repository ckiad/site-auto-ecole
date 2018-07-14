<?php

namespace App\Repositories;
use App\User;
interface ParametreRepositoryInterface
{
   public function save(Parametre $parametre, Array $inputs);
   public function store(Array $inputs);
   public function getById($id);
   public function update($id, Array $inputs);
   public function destroy($id);
   public function getPaginate($n);
}