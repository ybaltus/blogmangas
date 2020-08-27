<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MangasController extends AbstractController
{

    public function list()
    {
        return $this->render('mangas/list.html.twig');
    }
}
