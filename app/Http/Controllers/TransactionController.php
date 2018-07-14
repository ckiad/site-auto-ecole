<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gadget;
use App\TransactionGadget;
use App\User;

class TransactionController extends Controller
{


    public function getTransactions(){
      $gadgets = Gadget::all()->sortBy();
      $transactions = TransactionGadget::all()->sortBy();
      $count = 1;
      return view('admin.admin-gestion-transactions')->with(['gadgets' => $gadgets,'transactions' => $transactions,'count' => $count]);
    }

    public function getDebutTransactions(){
        $users = [];
        $count = 1;
        return view('admin.admin-recherche-user')->with(['users' => $users, 'count' => $count]);
    }

    public function postDebutTransactions(Request $request){

    }

    // Methode de lancement de création d'une transaction
    public function addTransaction($id_user){
      $user = User::find($id_user);
      $transactionToAdd = $user;
      return redirect('admin/admin-transactions')->with(['transactionToAdd' => $transactionToAdd]);
    }

    // Methode creant effectivement la transaction
    public function postaddTransaction(Request $request){

    }

}
