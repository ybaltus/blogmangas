<?php


namespace App\Controller;


use App\Repository\MangaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index(MangaRepository $repository)
    {
        $lastMangas = $repository->findLastMangas();
        return $this->render('home/home.html.twig', array(
            "lastMangas" => $lastMangas
        ));
    }

    public function contact()
    {
        return $this->render('home/contact.html.twig');
    }
}