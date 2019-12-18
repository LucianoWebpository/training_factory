<?php


namespace App\Controller;


use App\Entity\Lessen;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InstructeurController extends AbstractController
{
    /**
     * @Route("/instructeur/activiteiten", name="edit_act")
     */
public function editEntity(){
    $les = $this->getDoctrine()
        ->getRepository(Lessen::class)
        ->findAll();

    if (!$les) {
        throw $this->createNotFoundException(
            'No products found '
        );
    }

    return $this->render("/instructeur/activiteitEdit.html.twig", [
        'lessen'=>$les]);
}


}