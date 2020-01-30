<?php
namespace App\Controller;

use App\Entity\Activiteiten;
use App\Entity\Lessen;
use App\Entity\Registratie;
use App\Entity\User;
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
//        $showButton=1;
//        dd($this->getUser());
//        dd($this->getUser());
        $lessen = $this->getDoctrine()
            ->getRepository(Lessen::class)
            ->findAll();
        $lessenin = $this->getDoctrine()
            ->getRepository(Lessen::class)
            ->findLessenFromUser($this->getUser());
//$mijnregistraties = $this->getDoctrine()->getRepository(Registratie::class )->findBy(['user' =>$this->getUser()]);

//        if (!$lessen) {
//            throw $this->createNotFoundException(
//                'No products found '
//            );
//        }

        return $this->render("/lid/kalender.html.twig" , [
            'mijnLessen'=>$lessenin, 'lessen'=>$lessen
            ]);




        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
    /**
     * @Route("/lid/inschrijve/les/{id}", name="lid_toevoegen")
     */
    public function inschrijvenAction($id)
    {

        $registreer=new Registratie();
        $les=$this->getDoctrine()->getManager()->getRepository(Lessen::class)->find($id);
        $user=$this->getUser();
//        dd($user);
        $registreer->setLes($les);
        $registreer->setUser($user);
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->persist($registreer);
        $entityManager->flush();

        return $this->redirectToRoute("lid_les_show");
    }
    /**
     * @Route("/lid/profiel", name="profiel_lid")
     */
    public function profileShow()
    {
        $user=$this->getDoctrine()
            ->getRepository(User::class)
            ->find($this->getUser());
        if (!$user){
            throw $this->createNotFoundException('no user found');
        }
        return $this->render("/lid/profiel.html.twig",
            ['user'=>$user]);
    }
}