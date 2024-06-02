<?php

class UserController
{
    private $userEntity;
    public function __construct($entity)
    {
        $this->userEntity = $entity;
    }
    public function listAction(): array
    {
        return [
            $this->userEntity->getId(),
            $this->userEntity->getUserId(),
            $this->userEntity->getTitle(),
            $this->userEntity->getCompleted()
        ];
    }
}