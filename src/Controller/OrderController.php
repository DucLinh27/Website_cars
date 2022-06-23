<?php

namespace App\Controller;

use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    /**
     * @Route("/order", name="order_list")
     */
    public function listAction()
    {
        $order = $this->getDoctrine()
            ->getRepository(Order::class)
            ->findAll();
        return $this->render('order/index.html.twig', [
            'orders' => $order
        ]);
    }
    /**
     * @Route("/order/details/{id}", name="order_details")
     */
    public
    function detailsAction($id)
    {
        $order = $this->getDoctrine()
            ->getRepository(Order::class)
            ->find($id);

        return $this->render('order/details.html.twig', [
            'orders' => $order
        ]);
    }
    /**
     * @Route("/orders/delete/{id}", name="order_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $order = $em->getRepository(Order::class)->find($id);
        $em->remove($order);
        $em->flush();

        $this->addFlash(
            'error',
            'Deleted successful'
        );

        return $this->redirectToRoute('order_list');
    }
}
