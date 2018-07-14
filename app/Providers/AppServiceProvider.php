<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            //'App\Repositories\UserRepository',
            'App\Repositories\FormationRepositoryInterface',
            'App\Repositories\FormationRepository',
            'App\Repositories\CoursRepositoryInterface',
            'App\Repositories\CoursRepository',

            'App\Repositories\EvaluationRepositoryInterface',
            'App\Repositories\EvaluationRepository',

            'App\Repositories\GadgetRepositoryInterface',
            'App\Repositories\GadgetRepository',

            'App\Repositories\MatriceRepositoryInterface',
            'App\Repositories\MatriceRepository',

            'App\Repositories\MediaRepositoryInterface',
            'App\Repositories\MediaRepository',

            'App\Repositories\MessageRepositoryInterface',
            'App\Repositories\MessageRepository',

            'App\Repositories\ParametreRepositoryInterface',
            'App\Repositories\ParametreRepository',

            'App\Repositories\PostRepositoryInterface',
            'App\Repositories\PostRepository',

            'App\Repositories\PromotionRepositoryInterface',
            'App\Repositories\PromotionRepository',

            'App\Repositories\QuestionRepositoryInterface',
            'App\Repositories\QuestionRepository',

            'App\Repositories\RoleRepositoryInterface',
            'App\Repositories\RoleRepository',

            'App\Repositories\TemoignageRepositoryInterface',
            'App\Repositories\TemoignageRepository',

            'App\Repositories\TrancheRepositoryInterface',
            'App\Repositories\TrancheRepository',

            'App\Repositories\TransactionGadgetRepositoryInterface',
            'App\Repositories\TransactionGadgetRepository'
           );
    }
}
