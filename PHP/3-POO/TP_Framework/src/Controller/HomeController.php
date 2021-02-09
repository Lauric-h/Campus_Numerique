<?php


namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @param Request $request
     *
     */
    public function index(Request $request)  {
        return $this->render(
            "home/index",
            [
                "name"=>$request->query->get('name')
            ]
        );
    }
}