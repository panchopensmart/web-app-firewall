<?php

class LinksToGetData
{
    /*
     * @return Возвращается массив ссылок для получения данных ['entityName' => 'linkToGetData']
    */
    public static function getLinks(): array
    {
        return [
            'User' => 'https://jsonplaceholder.typicode.com/todos/1'
        ];
    }
}