<?php

namespace App\Repositories;

use App\Question;

class  QuestionRepository implements QuestionRepositoryInterface
{
	protected $question;
	protected $coursRepository;

    public function __construct(Question $question, CoursRepository $coursRepository)
	{
		$this->question = $question;
		$this->coursRepository = $coursRepository;
	}

	public function save(Array $inputs)
	{
		$question = new Question;
		$question->texte_question = $inputs['texte_question'];
		$question->separateur = ':;';//$inputs['separateur']
		$question->liste_proposition = $inputs['props'];
		$question->niveau_difficulte = $inputs['niveau_difficulte'];
		$question->duree_question = $inputs['duree_question'];
		
		//$question->cours_id=$inputs['cours_id'];
		$cours = $this->coursRepository->getById($inputs['cours_id']);
		$question->cours()->associate($cours);
				
		$question->save();

		return $question;
	}

	public function getPaginate($n)
	{
		return $this->question->paginate($n);
	}

	public function store(Array $inputs)
	{
		$question = new $this->question;		
		//$question->en_ligne = 0;
		$question = $this->save($inputs);

		return $question;
	}

	public function getById($id)
	{
		return $this->question->findOrFail($id);
	}

	public function update(Array $inputs)
	{
		$id = $inputs['id'];
		$question =$this->getById($id);
		$question->texte_question = $inputs['texte_question'];
		$question->separateur = ':;';
		$question->liste_proposition = $inputs['rprops'];
		$question->niveau_difficulte = $inputs['niveau_difficulte'];
		$question->duree_question = $inputs['duree_question'];
		
		//$question->cours_id=$inputs['cours_id'];
		$cours = $this->coursRepository->getById($inputs['cours_id']);
		$question->cours()->associate($cours);

		$question->save();
		return $question;
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}