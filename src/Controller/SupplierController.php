<?php

namespace App\Controller;

use App\Entity\Supplier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupplierController extends AbstractController
{
    /**
     * @Route("/supplier", name="supplier_list")
     */
    public function listAction() : Response
    {
        $suppliers = $this->getDoctrine()->getRepository(Supplier::class)->findAll();
        return $this->render('supplier/index.html.twig', [
            'suppliers' => $suppliers
        ]);
    }
    /**
     * @Route("/supplier/details/{id}", name="supplier_details")
     */
    function detailsAction($id) : Response
    {
        $supplier = $this->getDoctrine()
            ->getRepository(Supplier::class)
            ->find($id);

        return $this->render('supplier/details.html.twig', [
            'supplier' => $supplier
        ]);
    }
}
