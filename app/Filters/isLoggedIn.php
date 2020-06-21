<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class isLoggedIn implements FilterInterface
{
    public function before(RequestInterface $request)
    {           
        $uri = service('uri');
        if(!session()->isLoggedIn && $uri->getSegment(1) == 'jugador') {              
            return redirect()->to(base_url());                 
        }
        if(session()->isLoggedIn && $uri->getSegment(1) != 'jugador') {              
            return redirect()->to(base_url('jugador'));                 
        } 

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}