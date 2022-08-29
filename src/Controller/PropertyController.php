<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class PropertyController extends AbstractController {

    #[Route('/biens', name: 'biens', methods: 'GET')]
    public function index(): Response
    {
    return $this->render ('biens/biens_index.html.twig');
    }
}