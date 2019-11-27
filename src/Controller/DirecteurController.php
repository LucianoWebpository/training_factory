<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Activiteiten;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class DirecteurController extends AbstractController
{

    /**
     * @Route("/activiteit/toevoegen", name="create_activiteit")
     */
    public function createActiviteit(): Response
    {

        $entityManager=$this->getDoctrine()->getManager();

        $activiteit = new Activiteiten();
        $activiteit->setNaam('boxen');
        $activiteit->setBeschrijving('boxen voor jong en oud');
        $activiteit->setDuur('2 uur');
        $activiteit->setPrijs(50.00);
        $entityManager->persist($activiteit);


        $entityManager->flush();

        return new Response('activiteiten zijn toegevoegd '.$activiteit->getId());
    }

    /**
     * @Route("/activiteit/{id}", name="activiteit_show")
     */
    public function show($id)
    {
        $activiteit = $this->getDoctrine()
            ->getRepository(Activiteiten::class)
            ->find($id);

        if (!$activiteit) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render("/directeur/showActiviteit.html.twig" , [
            'activiteit'=>$activiteit]);



        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}