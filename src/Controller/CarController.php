<?php

namespace App\Controller;

use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    /**
     * @Route("/car", name="car_list")
     */
    public function listAction()
    {
        $cars = $this->getDoctrine()
            ->getRepository(Car::class)
            ->findAll();
        return $this->render('car/index.html.twig', [
            'cars' => $cars
        ]);
    }
    /**
     * @Route("/car/details/{id}", name="car_details")
     */
    public
    function detailsAction($id)
    {
        $cars = $this->getDoctrine()
            ->getRepository(Car::class)
            ->find($id);

        return $this->render('car/details.html.twig', [
            'car' => $cars
        ]);
    }
    /**
     * @Route("/car/delete/{id}", name="car_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $car = $em->getRepository(Car::class)->find($id);
        $em->remove($car);
        $em->flush();

        $this->addFlash(
            'error',
            'Deleted successful'
        );

        return $this->redirectToRoute('car_list');
    }
}
