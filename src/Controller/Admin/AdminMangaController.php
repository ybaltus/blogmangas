<?php

namespace App\Controller\Admin;

use App\Entity\Manga;
use App\Form\MangaType;
use App\Repository\MangaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminMangaController extends AbstractController
{
    /**
     * @var MangaRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(MangaRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em =$em;
    }
    /**
     * @Route("/admin_mangas", name="admin_mangas_index")
     */
    public function index()
    {
        $mangas = $this->repository->findAll();
        return $this->render('admin/admin_manga/index.html.twig', compact('mangas'));
    }

    /**
     * @Route("/admin_mangas/{title_slug}/{id}", name="admin_mangas_edit", requirements={"title_slug"="[a-z0-9\-]*", "id"="\d+"}, methods={"GET|POST"})
     * @param Request $request
     * @param Manga $manga
     * @return Response
     */
    public function edit(Request $request, Manga $manga)
    {
        $form = $this->createForm(MangaType::class, $manga);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            $this->addFlash('success', 'Manga modifié avec succès.');
            return $this->redirectToRoute('admin_mangas_index');
        }

        return $this->render('admin/admin_manga/edit.html.twig', array(
            'manga' => $manga,
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/admin_mangas/add", name="admin_mangas_add")
     */
    public function add(Request $request)
    {
        $manga = new Manga();
        $form = $this->createForm(MangaType::class, $manga);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->persist($manga);
            $this->em->flush();
            $this->addFlash('success', 'Manga ajouté avec succès.');
            return $this->redirectToRoute('admin_mangas_index');
        }

        return $this->render('admin/admin_manga/add.html.twig', array(
            'manga' => $manga,
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/admin_mangas/{title_slug}/{id}", name="admin_mangas_delete", requirements={"title_slug"="[a-z0-9\-]*", "id"="\d+"}, methods={"DELETE"})
     * @param Request $request
     * @param Manga $manga
     * @return Response
     */
    public function delete(Manga $manga, Request $request)
    {
        if($this->isCsrfTokenValid('delete'.$manga->getId(), $request->get('_token')))
        {
            $this->em->remove($manga);
            $this->em->flush();
            $this->addFlash('success', 'Manga supprimé avec succès.');
        }
        return $this->redirectToRoute('admin_mangas_index');

    }
}
