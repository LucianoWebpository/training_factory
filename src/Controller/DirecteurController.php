<?php


namespace App\Controller;


use App\Entity\Lessen;
use App\form\type\ActiviteitType;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Activiteiten;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DirecteurController extends AbstractController
{

    /**
     * @Route("/activiteit/toevoegen", name="create_activiteit")
     */
    public function createActiviteitAction(): Response
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
     * @Route("/les/toevoegen", name="create_les")
     */
    public function createLesAction(): Response{
        $entityManager=$this->getDoctrine()->getManager();

        $les = new Lessen();
        $tijd = new DateTime('2018-12-31 13:05:21');

        $les->setTijd($tijd);
        $les->setLocatie('Den Haag');
        $les->setMaxPersonen('14');
        $entityManager->persist($les);


        $entityManager->flush();

        return new Response('lessen zijn toegevoegd '.$les->getId());
    }

    /**
     * @Route("directeur/activiteit/form", name="dir_form_show")
     */
    public function new(Request $request)
    {
        // creates a task object and initializes some data for this example
        $activiteit = new Activiteiten();


        $form = $this->createForm(ActiviteitType::class, $activiteit);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $activiteit = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($activiteit);
             $entityManager->flush();

            return $this->redirectToRoute('dir_form_show');
        }
        return $this->render('/directeur/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("directeur/activiteit/{id}", name="dir_activiteit_show")
     */
    public function showAction($id)
    {
        $activiteit = $this->getDoctrine()
            ->getRepository(Activiteiten::class)
            ->find($id);

        if (!$activiteit) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        return $this->render("/directeur/showActiviteit.html.twig", [
            'activiteit' => $activiteit]);


        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }






}