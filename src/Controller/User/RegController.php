<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\UserType;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegController extends AbstractController
{
    /**
     * @Route ("/reg",name="reg")
     */
    public function index()
    {
        return $this->render('index.html.twig', [
            'title' => 'Страница регистрации',
        ]);
    }

    public function create(Request $request, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);

        if (($form->isSubmitted()) && ($form->isValid())) {
            $password = $userPasswordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setRoles('ROLE_USER');
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('home');
        }
    }
}