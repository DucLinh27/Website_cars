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
    public function listAction()
    {
        $supplier = $this->getDoctrine()
            ->getRepository(Supplier::class)
            ->findAll();
        return $this->render('supplier/index.html.twig', [
            'suppliers' => $supplier
        ]);
    }
}
