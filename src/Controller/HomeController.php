<?php
namespace App\Controller;

use App\Entity\Property;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home', methods: 'GET')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Property::class)->twelveElements(12);

        return $this->render ('home/home_index.html.twig', [
            'repository' => $repository
        ]);
    }
}