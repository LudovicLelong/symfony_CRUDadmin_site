<?php
namespace App\Controller\Admin;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropertyController extends AbstractController {

    /*
     * @var PropertyRepository
     */
    private $repository;

    public function __construct(PropertyRepository $repository)
    {
          $this->repository = $repository;
    }

    #[Route('/admin/', name: 'admin.property.index')]
    public function index()
    {
        $properties = $this->repository->findAll();
        return $this->render('admin/property/index.html.twig', [
            'properties' => $properties,
        ]);
    }

    #[Route('/admin/{id}', name: 'admin.property.edit')]
    public function edit (Property $property)
    {
        dump($property);
        return $this->render('admin/property/edit.html.twig', [
            'property' => $property,
        ]);
    }

}