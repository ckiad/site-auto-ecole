<?php

namespace App\Repositories;
use App\Formation;

interface EvaluationRepositoryInterface
{
   public function save(Array $inputs);
   public function store(Array $inputs);
   public function getById($id);
   public function update(Array $inputs);
   public function destroy($id);
   public function getPaginate($n);
   public function getListCoursFormationEvaluation($id);
   public function getListQuestionEvaluation($id);
   public function destroyEvaluationQuestion($evaluation_id, $question_id);
}