<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class isAdmin implements FilterInterface
{
    public function before(RequestInterface $request)
    {           
        if(session('usuario_role') != 'admin') {              
            //return redirect()->to(base_url());    
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();             
        }    
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}