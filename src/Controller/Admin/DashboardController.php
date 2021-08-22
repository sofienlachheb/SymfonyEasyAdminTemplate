<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @package App\Controller\Admin
 *
 * @Route("/admin")
 */
class DashboardController extends AbstractDashboardController
{
    /**
     * Avoids 404 error on GET /admin
     *
     * @Route("", name="admin_root", methods={"GET"})
     *
     * @return RedirectResponse
     */
    public function root(): RedirectResponse
    {
        return $this->redirectToRoute($this->getUser() ? 'admin_dashboard' : 'admin_login');
    }

    /**
     * @Route("/dashboard", name="admin_dashboard", methods={"GET"})
     */
    public function index(): Response
    {
        return  $this->render('Admin/Dashboard/index.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Integration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
    }
}
