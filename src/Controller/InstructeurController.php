<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class InstructeurController
{
    /**
     * @Route("/instructeur/activiteiten", name="edit_act")
     */
public function editEntity(){

    return $this->render("/bezoeker/showContact.html.twig");
}

}