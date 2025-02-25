<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminInitController extends AbstractController{
    #[Route('/index.html', name: 'back')]
    public function gen_pwd():Response{
        $pwd = "";
        $i = 0;
        while (i < 10){
            $pwd .= random_int(0,9);
            $i++;
        }

        return new Response('<html><body>pwd gen: '.$pwd.'</body></html>');
    }
}