<?php

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class AdminController
 * @package App\Controller\Security
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/login", name="admin_login")
     *
     * @param AuthenticationUtils $utils
     *
     * @return Response
     */
    public function login(AuthenticationUtils $utils): Response
    {
         if ($this->getUser()) {
             return $this->redirectToRoute('admin_dashboard');
         }

        return $this->render('@EasyAdmin/page/login.html.twig', [
            'last_username' => $utils->getLastUsername(),
            'error' => $utils->getLastAuthenticationError(),

            // OPTIONAL parameters to customize the login form
            'translation_domain' => 'admin',
            'page_title' => 'Integration Administration',
            'csrf_token_intention' => 'authenticate',
            'target_path' => $this->generateUrl('admin_dashboard'),
            'username_label' => 'Username',
            'password_label' => 'Password',
            'sign_in_label' => 'Validate',
            'username_parameter' => 'username',
            'password_parameter' => 'password',
        ]);
    }

    /**
     * @Route("/logout", name="admin_logout")
     */
    public function logout(): void
    {
    }
}
