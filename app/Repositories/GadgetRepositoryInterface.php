<?php

namespace App\Repositories;
use App\Formation;

interface GadgetRepositoryInterface
{
   public function save(Array $inputs,$photo);
   public function store(Array $inputs,$photo);
   public function getById($id);
   public function update(Array $inputs,$photo);
   public function destroy($id);
   public function getPaginate($n);
   public function getAllGadget();
   public function updateSansPhotos(Array $inputs);
}
