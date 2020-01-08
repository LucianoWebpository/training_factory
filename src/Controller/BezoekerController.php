<?php


namespace App\Controller;


use App\Entity\Activiteiten;
use App\Entity\User;
use App\form\type\UserType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
    /**
     * @Route("/bezoeker/registreren/", name="bez_registreren")
     */
    public function RegisterNewMemberAction(Request $request, UserPasswordEncoderInterface $passwordEncoder){
        $newMember= new User();
        $form= $this->createForm(UserType::class, $newMember);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $newMember=$form->getData();
            $newMember->setPassword($passwordEncoder->encodePassword($newMember, $form->get('plainPassword')->getData()));
            $newMember->setRoles(['ROLE_MEMBER']);
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist(($newMember));
            $entityManager->flush();
            return $this->redirectToRoute('lid_les_show');
        }
return $this->render('bezoeker/registreren.html.twig',[
    'form'=>$form->createView(),
]);
    }

}