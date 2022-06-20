<?php

namespace App\Controller;

class InstructionController extends AbstractController
{

    /** Display instructions page
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        return $this->twig->render('Instruction/index.html.twig');
    }
}
