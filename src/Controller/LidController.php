<?php
namespace App\Controller;

use App\Entity\Activiteiten;
use App\Entity\Lessen;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LidController extends AbstractController
{
    /**
     * @Route("/lid/kalender/", name="lid_les_show")
     */
    public function showAction()
    {
        $les = $this->getDoctrine()
            ->getRepository(Lessen::class)
            ->findAll();

        if (!$les) {
            throw $this->createNotFoundException(
                'No products found '
            );
        }

        return $this->render("/lid/showLid.html.twig" , [
            'lessen'=>$les]);



        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
    public function showLessenAction(){
        return $this->render("/lid/showContact.html.twig");

    }

}