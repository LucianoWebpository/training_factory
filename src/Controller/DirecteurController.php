<?php


namespace App\Controller;


use App\Entity\Lessen;
use App\Entity\User;
use App\form\type\ActiviteitType;
use App\form\type\UserType;
use App\form\type\UserType2;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Activiteiten;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DirecteurController extends AbstractController
{

//    /**
//     * @Route("/activiteit/toevoegen", name="create_activiteit")
//     */
//    public function createActiviteitAction(): Response
//    {
//
//        $entityManager=$this->getDoctrine()->getManager();
//
//        $activiteit = new Activiteiten();
//        $activiteit->setNaam('boxen');
//        $activiteit->setBeschrijving('boxen voor jong en oud');
//        $activiteit->setDuur('2 uur');
//        $activiteit->setPrijs(50.00);
//        $entityManager->persist($activiteit);
//
//
//        $entityManager->flush();
//
//        return new Response('activiteiten zijn toegevoegd '.$activiteit->getId());
//    }
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

            return $this->redirectToRoute('lijst_activiteit');
        }
        return $this->render('/directeur/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("directeur/activiteit/{id}", name="aanpassen_activiteit")
     */
    public function aanpassenActiviteitAction(Request $request,$id)
    {
        $activiteit = $this->getDoctrine()
            ->getRepository(Activiteiten::class)
            ->find($id);

        if (!$activiteit) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

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

            return $this->redirectToRoute('lijst_activiteit');
        }
        return $this->render('/directeur/form.html.twig', [
            'form' => $form->createView(),
        ]);



        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
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
    /**
     * @Route("/directeur/activiteitEdit", name="lijst_activiteit")
     */
    public function editEntity()
    {
        $activiteit = $this->getDoctrine()
            ->getRepository(Activiteiten::class)
            ->findAll();

        if (!$activiteit) {
            throw $this->createNotFoundException(
                'No products found '
            );
        }

        return $this->render("/directeur/activiteitLijst.html.twig", [
            'activiteit' => $activiteit]);

    }
    /**
     * @Route("/directeur/delete/{id}" , name="delete_activiteit")
     */
    public function deleteAction($id)
    {
        $activiteit = $this->getDoctrine()
            ->getRepository(Activiteiten::class)
            ->find($id);
        if (!$activiteit) {
            throw $this->createNotFoundException(
                'No products found '
            );
        }
        $enitymanager = $this->getDoctrine()->getManager();
        $enitymanager->remove($activiteit);
        $enitymanager->flush();

        return $this->redirectToRoute("lijst_activiteit");
    }
    /**
     * @Route("/directeur/update/{id}" , name="aanpassen_activiteit")
     */
    public function updateAction(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $activiteit = $entityManager->getRepository(Activiteiten::class)->find($id);
        if (!$activiteit) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }
        $form = $this->createForm(ActiviteitType::class, $activiteit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $activiteit = $form->getData();
            $entityManager->persist($activiteit);
            $entityManager->flush();
            return $this->redirectToRoute('lijst_activiteit', [
                'id' => $activiteit->getId()]);
        }
        return $this->render('directeur/activiteitAanpassen.html.twig' , [
            'form' => $form->createView()]);
    }


    /**
     * @Route("/directeur/userLijst", name="lijst_user")
     */
    public function userShowAction()
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        if (!$user) {
            throw $this->createNotFoundException(
                'No products found '
            );
        }

        return $this->render("/directeur/userLijst.html.twig", [
            'user' => $user]);

    }
    /**
     * @Route("/directeur/deleteUser/{id}" , name="delete_user")
     */
    public function deleteUserAction($id)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);
        if (!$user) {
            throw $this->createNotFoundException(
                'No products found '
            );
        }
        $enitymanager = $this->getDoctrine()->getManager();
        $enitymanager->remove($user);
        $enitymanager->flush();

        return $this->redirectToRoute("lijst_user");
    }
    /**
     * @Route("/directeur/updateUser/{id}" , name="aanpassen_user")
     */
    public function updateUserAction(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);
        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }
//        $showField=0;
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $activiteit = $form->getData();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('lijst_user', [
                'id' => $user->getId()]);
        }
        return $this->render('directeur/userAanpassen.html.twig' , [
            'form' => $form->createView()]);
    }
}