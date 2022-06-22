<?php

namespace App\Controller;

use App\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customer", name="customer_list")
     */
    public function listAction()
    {
        $customers = $this->getDoctrine()
            ->getRepository(Customer::class)
            ->findAll();
        return $this->render('customer/index.html.twig', [
            'customers' => $customers
        ]);
    }
    /**
     * @Route("/customer/details/{id}", name="customer_details")
     */
    public
    function detailsAction($id)
    {
        $customers = $this->getDoctrine()
            ->getRepository(Customer::class)
            ->find($id);

        return $this->render('customer/details.html.twig', [
            'customers' => $customers
        ]);
    }
}
