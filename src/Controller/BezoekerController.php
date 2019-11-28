<?php


namespace App\Controller;


use App\Entity\Activiteiten;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
class BezoekerController extends AbstractController
{
    /**
     * @Route("/bezoeker/activiteit/", name="bez_activiteit_show")
     */
    public function showAction()
    {
        $activiteit = $this->getDoctrine()
            ->getRepository(Activiteiten::class)
            ->findAll();

        if (!$activiteit) {
            throw $this->createNotFoundException(
                'No products found '
            );
        }

        return $this->render("/bezoeker/showActiviteit.html.twig" , [
            'activiteiten'=>$activiteit]);



        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
    public function showContactAction(){
        return $this->render("/bezoeker/showContact.html.twig");

    }

}