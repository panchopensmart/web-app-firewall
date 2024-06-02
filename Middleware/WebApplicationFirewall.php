<?php

class WebApplicationFirewall
{
    public static function protectRequests($requestUri)
    {
       $requestData = file_get_contents('php://input');

       if (!empty($requestData)) {
           throw new Exception('not empty request body in request URI (' .$requestUri. ')');
       }
    }
}
