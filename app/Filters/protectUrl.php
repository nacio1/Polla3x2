<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class protectUrl implements FilterInterface
{
    public function before(RequestInterface $request)
    {           
        $uri = service('uri');
        if($uri->getSegment(1) == 'usuario' || $uri->getSegment(1) == 'home') {              
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();               
        }   

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}