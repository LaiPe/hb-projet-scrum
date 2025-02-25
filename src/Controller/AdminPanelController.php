<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminPanelController extends AbstractController
{
    #[Route('/admin/panel', name: 'app_admin_panel')]
    public function index(): JsonResponse
    {
        $newpassword = "";
        $username = "";

        if(isset($_POST['username'])){
            $username = $_POST['username'];
        }

        if($username!=""){
            $newpassword = $this->generator_password();
        }

        return $this->json([
            'username' => $username,
            'password' => $newpassword,
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
}
