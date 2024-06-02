<?php

class UserRepository
{
    private array|string $dataToArray;

    public function __construct($linkToConnect)
    {
        $data = file_get_contents($linkToConnect);
        $this->dataToArray = json_decode($data, true);
    }

    public function getArrayData()
    {
        if ($this->dataToArray === '') {
            return [
                'error' => 'No data for connection (data is empty)'
            ];
        }
        return $this->dataToArray;
    }
}