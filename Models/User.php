<?php

class User
{
    private $userId;
    private $id;
    private $title;
    private $completed;

    public function __construct($data)
    {
        $this->userId = $data['userId'];
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->completed = $data['completed'];
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCompleted(): bool
    {
        return $this->completed;
    }
}