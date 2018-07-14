<?php

namespace App\Repositories;
use App\User;
use App\Message;

interface MessageRepositoryInterface
{
   public function save(Message $message,Array $inputs);
   public function store(Array $inputs);
   public function getById($id);
   public function update($id,Array $inputs);
   public function destroy($id);
   public function getPaginate($n);
}