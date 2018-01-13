<?php

/**
 * Class Article
 * использую паттерн фабрика для создания в контроллере  экземплер класса
 */
class Article
{

    /** User $user  **/
    private $user;

    public function __construct($userId)
    {
        $this->user = new User($userId);
    }

    /**
     * Create new article
     * @return int $id
     **/
    public function newArticle()
    {

    }

    /**
     * Get User by Article
     * @return User $this->user
     **/
    public function getUser()
    {

    }

    /**
     * Change user for current article
     * @return User $this->user
     **/
    public function changeUser($userId)
    {

    }

}