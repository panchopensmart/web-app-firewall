<?php

class Router
{
    /*
     * @return Возвращается массив роутов ['uri' => 'nameController@nameAction@nameEntityDTO']
    */
    public static function getRoutes(): array
    {
        return [
            '/user' => 'UserController@listAction@User'
        ];
    }
}