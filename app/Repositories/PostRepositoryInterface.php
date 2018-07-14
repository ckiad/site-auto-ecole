<?php

namespace App\Repositories;
use App\Post;
interface PostRepositoryInterface
{
   public function save(Array $inputs);
   public function store(Array $inputs);
   public function getById($id);
   public function update(Array $inputs);
   public function destroy($id);
   public function getPaginate($n);
}