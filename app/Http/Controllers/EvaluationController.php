<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Sentinel;
use App\Evaluation;
use App\Formation;
use App\Question;
use App\Http\Requests\EvaluationRequest;
use App\Repositories\EvaluationRepository;
use App\Repositories\UserRepository;
use App\Repositories\FormationRepository;
use App\Http\Requests\PromotionRequest;

class EvaluationController extends Controller
{
    protected $evaluationRepository;

    public function __construct(EvaluationRepository $evaluationRepository)
    {
        $this->evaluationRepository = $evaluationRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEvaluations()
    {
        //$evaluations = Evaluation::all();
        //$formations = Formation::all();
        $evaluations = new Collection();
        $formations = Formation::all()->sortBy('label');
        foreach($formations as $formation)
        {
            $evaluations = $evaluations->merge($formation->evaluations()->get()->sortBy('label'));
        }
      //$count = $evaluations->count();
      $count = 1;
      //$nbreFormation = $formations->count();
      return view('admin/admin-gestion-evaluations')->with(['evaluations'=> $evaluations,'formations'=>$formations,'count'=>$count]);
        //return view('admin.evaluations',compact('evaluations','count','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addEvaluation()
    {
      $evaluationToAdd = "add";

      return redirect('admin/admin-evaluations')->with(['evaluationToAdd'=>$evaluationToAdd]);
      //  $formations = Formation::all();
        //$user = Sentinel::getUser();
        //return view('admin', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(EvaluationRequest $request)
    {
        $evaluation = $this->evaluationRepository->store($request->all());
        return $evaluation;
    }

    public function postaddEvaluation(EvaluationRequest $request)
    {
       // $inputs = array_merge($request->all(), ['user_id'=>$user->id]); add-question
        $evaluation = $this->store($request);
        $message = "evaluation  inseré avec succès";
        return redirect('admin/admin-evaluations')->with(['message'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEvaluation($id)
    {
        $evaluationToDisplay = $this->evaluationRepository->getById($id);
        return redirect('admin/admin-evaluations')->with(['evaluationToDisplay'=>$evaluationToDisplay]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEvaluation($id)
    {
        $evaluationToUpdate = $this->evaluationRepository->getById($id);
        /*
        *Il faut aussi afficher du même cout les questions qui sont déjà dans l'évaluation
        */
        $questions_evaluation = $this->evaluationRepository->getListQuestionEvaluation($id);
        $count_question_evaluation = $questions_evaluation->count();

        /*
        *Il faut la liste des questions de la formation associe à cet évaluation afin
        * qu'il choisisse les questions qui doivent faire parti de l'évaluation.
        */

        $cours = $this->evaluationRepository->getListCoursFormationEvaluation($id);
        //dd($cours);
        $questions = new Collection();
        foreach($cours as $cour)
        {
            $questions = $questions->merge($cour->questions()->get());

        }

        //dd($questions);
        return redirect('admin/admin-evaluations')->with(['evaluationToUpdate'=>$evaluationToUpdate,
            'questions'=>$questions, 'questions_evaluation'=>$questions_evaluation,
            'count_question_evaluation'=>$count_question_evaluation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function postupdateEvaluation(EvaluationRequest $request)
     {
        //dd($request['question_check']);
        $evaluationToUpdate = $this->evaluationRepository->update($request->all());
        $request->session()->forget('evaluationToUpdate');
        $request->session()->forget('questions');
        $message = "l'evaluation a ete mise a jour avec success";

        return redirect('admin/admin-evaluations')->with(['message'=>$message]);
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->evaluationRepository->destroy($id);
        return redirect()->back();
    }

    public function deleteEvaluationQuestion($evaluation_id, $question_id)
    {
        $this->evaluationRepository->destroyEvaluationQuestion($evaluation_id, $question_id);
        return redirect()->back();
    }

}
