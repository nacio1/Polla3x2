<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class checkReferidoLink implements FilterInterface
{
    public function before(RequestInterface $request)
    {             
        if(isset($_GET['r'])) {              
            session()->setTempdata('referido', $_GET['r'] , 1800);            
        }    
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}