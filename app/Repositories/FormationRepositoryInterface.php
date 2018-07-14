<?php

namespace App\Repositories;
use App\Formation;

interface FormationRepositoryInterface
{
   public function save(Array $inputs);
   public function store(Array $inputs);
   public function getById($id);
   public function update(Array $inputs);
   public function destroy($id);
   public function getPaginate($n);
}