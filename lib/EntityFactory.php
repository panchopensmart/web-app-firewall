<?php
Autoloader::loadClassesFromFolder('Models/');

class EntityFactory
{
    private array $linksToGetData;
    public function __construct()
    {
        $this->linksToGetData = LinksToGetData::getLinks();
    }
    public function createEntity($entityType): User|array
    {
        switch ($entityType) {
            case 'User':
                $userRepository = new UserRepository($this->linksToGetData['User']);
                return new User($userRepository->getArrayData());
            default:
                return [];
        }

    }
}