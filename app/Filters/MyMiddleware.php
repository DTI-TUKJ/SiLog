<?php 

// app/Filters/MyMiddleware.php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MyMiddleware implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $cookie = \Config\Services::cookie();
        $cookie->set('my_cookie', 'nilai_cookie', 3600, '', '', false, true);

        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return $response;
    }
}
 ?>