<?php

namespace App\Controller;

use App\Model\CupcakeManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $lastCupcake = (new CupcakeManager())->selectLast();
        $lastCupcakeAccessory = (new CupcakeManager())->selectByCupcakeId($lastCupcake['id']);
        $cupcake = array_merge($lastCupcake, $lastCupcakeAccessory);
        return $this->twig->render('Home/index.html.twig', [
            'cupcake' => $cupcake,
        ]);
    }
}
