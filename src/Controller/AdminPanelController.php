<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminPanelController extends AbstractController
{
    #[Route('/admin/panel', name: 'app_admin_panel')]
    public function index(EntityManagerInterface $entityManager): JsonResponse
    {
        $newpassword = "";
        $username = "";

        if(isset($_POST['username'])){
            $username = $_POST['username'];
        }

        if($username!=""){
            $newpassword = $this->generator_password();
        }

        $usernameAdmin = $this->request_BDD($entityManager);
        if ($usernameAdmin) {
            $usernameAdmin = $usernameAdmin->getpseudo();
        } else {
            $usernameAdmin = 'No admin found';
        }
        return $this->json([
            'username' => $username,
            'password' => $newpassword,
            'test bdd request' => $usernameAdmin,
        ]);
    }

    function generator_password(){
        $i = 0;
        $password = "";

        while($i < 10){
            $i++;
            $password = $password . rand(0,9);
        }
        return $password;
    }

    function request_BDD(EntityManagerInterface $entityManager){
        $entityManager->getConnection()->connect();
        $test = $entityManager->getRepository(User::class)->findOneBy(['pseudo' => 'admin']);
        return $test;
    }
}
