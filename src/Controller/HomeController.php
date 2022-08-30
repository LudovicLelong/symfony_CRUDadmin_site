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
            'repository' => $repository,
        ]);
    }


    #[Route('/biens-{id}', name: 'home_show')]
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $id = $id;

        $article = $doctrine->getRepository(Property::class)->findOneBy(['id'=> $id]);


        $id = $article->getId();
        $title = $article->getTitle();
        $description = $article->getDescription();
        $surface = $article->getSurface();
        $rooms = $article->getRooms();
        $bedrooms = $article->getBedrooms();
        $floor = $article->getFloor();
        $price = $article->getPrice();
        $heat = $article->getHeat();
        $city = $article->getCity();
        $address = $article->getAddress();
        $postal_code = $article->getPostalCode();
//        $sold = $article->getSold();
        $created_at = $article->getCreatedAt();


        dump($article);


        return $this->render('home/home_show.html.twig', [
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'surface' => $surface,
            'rooms' => $rooms,
            'bedrooms' => $bedrooms,
            'floor' => $floor,
            'price' => $price,
            'heat' => $heat,
            'city' => $city,
            'address' => $address,
            'postal_code' => $postal_code,
        ]);
    }

}