<?php
// Authorized (Logged In)
namespace Core\Middleware;

class Auth
{
    public function handle()
    {
        if(! $_SESSION['user'] ?? false) {
            // echo 'logged';
            header('location: /login');
            exit();
        }
    }
}
