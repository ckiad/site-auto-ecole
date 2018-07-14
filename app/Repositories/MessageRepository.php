<?php

namespace App\Repositories;

use App\Message;
use Carbon\Carbon;

class  MessageRepository implements MessageRepositoryInterface
{

    protected $message;

    public function __construct(Message $message)
	{
		$this->message = $message;
	}

	public function save(Message $message, Array $inputs)
	{
		$message->objet = $inputs['objet'];
		$message->contenu = $inputs['contenu'];
		$message->emetteur = $inputs['email'];
		//$message->date_envoi = new Carbon();//$inputs['date_envoi'];
		$message->motif = " Motif_ **** .... **** "; //$inputs['motif'];
		//$message->user_id = $inputs[$iduser];
		$message->save();
	}

	public function getPaginate($n)
	{
		return $this->message->paginate($n);
	}

	public function store(Array $inputs)
	{
		$message = new $this->message;		
		$message->etat = 0;

		$this->save($message,$inputs);

		return $message;
	}

	public function getById($id)
	{
		return $this->message->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}