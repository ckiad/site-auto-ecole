<?php

namespace App\Repositories;
use Carbon\Carbon;

use App\Evaluation;
use App\Formation;
use App\Question;

class  EvaluationRepository implements EvaluationRepositoryInterface
{

	protected $evaluation;
	protected $formationRepository;
	protected $coursRepository;
	protected $questionRepository;

    public function __construct(Evaluation $evaluation, FormationRepository $formationRepository, CoursRepository $coursRepository, QuestionRepository $questionRepository)
	{
		$this->evaluation = $evaluation;
		$this->formationRepository = $formationRepository;
		$this->coursRepository = $coursRepository;
		$this->questionRepository = $questionRepository;
	}

	public function save(Array $inputs)
	{
		$evaluation = new Evaluation;
		$evaluation->date = $inputs['date'];
		//$evaluation->date = Carbon::now();
		$evaluation->label = $inputs['label'];

		//$evaluation->en_ligne = $inputs['en_ligne'];
		//$formation = Formation::find('formation_id');
		//$formation->evaluations()->save($evaluation);
		/*
		*La fonction isset verifie juste l'existance de la variable et ne saurait créer l'association
		*/
		//$evaluation->formations_id = isset($inputs['formation_id']);
		//$evaluation->formations_id = $inputs['formation_id'];

		$formation = $this->formationRepository->getById($inputs['formation_id']);
		$evaluation->formation()->associate($formation);
		$evaluation->save();

		return $evaluation;
	}

	public function getPaginate($n)
	{
		return $this->evaluation->paginate($n);
	}

	public function store(Array $inputs)
	{
		$evaluation = new $this->evaluation;
	//	$evaluation->en_ligne = 0;
	    $evaluation = $this->save($inputs);

		return $evaluation;
	}
	public function addQuestionToEvaluation($question, $evaluation)
	{
		if(!($evaluation->question->contains($question)))
		{
			$evaluation->question()->attach($question);
		}
	}

	public function getById($id)
	{
		return $this->evaluation->findOrFail($id);
	}

	public function update(Array $inputs)
	{
		$id = $inputs['id'];
		$evaluation = $this->getById($id);
		$evaluation->label = $inputs['label'];

		$evaluation->date = $inputs['date'];
		//$formation = Formation::find('formation_id');
		//$formation->evaluations()->save($evaluation);
		$formation = $this->formationRepository->getById($inputs['formation_id']);
		$evaluation->formation()->associate($formation);
		$evaluation->save();

		
		$questions_id = $inputs['question_check'];
		foreach($questions_id as $question_id)
		{
			//Enregistrement de la question dans l'évaluation
			//dd($question_id);
			$question = $this->questionRepository->getById($question_id);
			/*
			*On ajoute la question à l'evaluation que si cette question n'est pas déjà
			*dans cette evaluation
			*/

			if(!($evaluation->questions->contains($question)))
			{
				$evaluation->questions()->attach($question);
			}
		}

		return $evaluation;
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

	public function getListCoursFormationEvaluation($id)
	{
		/*
		*Faut rechercher la formation qui est associe à l'évaluation dont l'id est passé en paramètre
		*/
		$evaluation = $this->getById($id);

		$formation = $evaluation->formation;
		//dd('formationrepository '.$formation->cours);
		return $formation->cours;//->cours()->get()
	}

	public function getListQuestionEvaluation($id)
	{
		$evaluation = $this->getById($id);
		return $evaluation->questions;
	}

	public function destroyEvaluationQuestion($evaluation_id, $question_id)
	{
		$evaluation = $this->getById($evaluation_id);
		$question = $this->questionRepository->getById($question_id);
		$evaluation->questions()->detach($question);
	}

}
