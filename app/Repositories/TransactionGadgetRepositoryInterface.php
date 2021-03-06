<?php

namespace App\Repositories;
use App\User;
interface TransactionGadgetRepositoryInterface
{
   public function save(TransactionGadget $transaction, Array $inputs);
   public function store(Array $inputs);
   public function getById($id);
   public function update($id, Array $inputs);
   public function destroy($id);
   public function getPaginate($n);
}
