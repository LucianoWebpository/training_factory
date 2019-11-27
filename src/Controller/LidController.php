<?php
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LidController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function HomepageAction(){
 return new Response('first page');

    }
    /**
     * @Route("/article/{slug}")
     */
    public function show($slug)

    {
       return $this->render('lid/lid.html.twig', [
           'title' => ucwords(str_replace('-', ' ', $slug))
       ] );
    }

}