<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Sentinel;
use App\Question;
use App\Cours;
use App\Repositories\QuestionRepository;
use App\Repositories\CoursRepository;
use App\Repositories\UserRepository;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getQuestions()
    {
        //$questions = Question::all();
        $cours = Cours::all()->sortBy('label');

        $questions = new Collection();
        foreach($cours as $cour)
        {
            $questions = $questions->merge($cour->questions()->get());

        }
        $count = 1;
        $nbreQuestions = $questions->count();
        $tab =[];
        return view('admin/admin-gestion-questions')
        ->with(['questions'=>$questions,'tab'=>$tab,'cours'=>$cours,'count'=>$count,'nbreQuestions'=>$nbreQuestions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addQuestion()
    {
        $questionToAdd = "add";
        //$cours = Cours::all();
        return redirect('admin/admin-questions')->with(['questionToAdd'=>$questionToAdd]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $question = $this->questionRepository->store($request->all());
        return $question;
    }

    public function postaddQuestion(QuestionRequest $request)
    {
        $question = $this->store($request);
        $message = "Question inseré avec succès !!!";
        return redirect('admin/admin-questions')->with(['message'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showQuestion($id)
    {
        $questionToDisplay = $this->questionRepository->getById($id);
        return redirect('admin/admin-questions')->with(['questionToDisplay'=>$questionToDisplay]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateQuestion($id)
    {
        $questionToUpdate = $this->questionRepository->getById($id);
        $tmp =$questionToUpdate->liste_proposition;
        $listQuest = substr($tmp,0,strlen($tmp)-2) ;
        $tab = explode(':;',$listQuest);
        return redirect('admin/admin-questions')
        ->with(['questionToUpdate'=>$questionToUpdate,'tab'=>$tab]);
    }

    public function postupdateQuestion(QuestionRequest $request)
    {
        $questionToUpdate = $this->questionRepository->update($request->all());
        $request->session()->forget('questionToUpdate');
        $message = "La question a été mise à jours avec succès";
        return redirect('admin/admin-questions')->with(['message'=>$message]);
    }

    public function melangeQuestion()
    {
        $questions = Question::all();
        $test = array_rand($questions,20);
        return  redirect('admin/admin-questions')->with(['test'=>shuffle($test)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->questionRepository->destroy($id);
        return redirect()->back();
    }
    public function jaimeQuestion($id)
    {
        $question = $this->questionRepository->getById($id);
        $this->questionRepository->update($id,['nbre_ok'=>$question->nbre_ok+1]);
    }
    public function detesteQuestion($id)
    {
        $question = $this->questionRepository->getById($id);
        $this->questionRepository->update($id,['nbre_ko'=>$question->nbre_ko+1]);
    }

    public function nbreVue($id)
    {
        $question = $this->questionRepository->getById($id);
        $this->questionRepository->update($id,['nbre_vue'=>$question->nbre_vue+1]);
    }  
}
