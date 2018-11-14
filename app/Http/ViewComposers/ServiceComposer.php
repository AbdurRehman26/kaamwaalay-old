<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Data\Repositories\ServiceRepository;
use Illuminate\Support\Facades\Route;


class ServiceComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $service;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(ServiceRepository $service)
    {
        // Dependencies automatically resolved by service container...
        $this->service = $service;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $currentRoute = Route::current();
        $params = $currentRoute->parameters();
        if(!empty($params['any'])) {
            $any = $params['any'];
            dd($any);
            $any = explode("/", $any);
            $service_id = $any[0];
            $zip = $any[1];
            //dd(explode("/", $any));
            $service = $this->service->findByAttribute('id', (int)$service_id);
            //dd($service->title);
            $view->with('service', $service);
        }

    }
}