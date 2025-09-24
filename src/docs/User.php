<?php

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $passwordHash;

    public function __construct(
        int $id,
        string $name,
        string $email,
        string $passwordHash
    ) {
        $this->id=$id;
        $this->name=$name;
        $this->email=$email;
        $this->passwordHash=$passwordHash;
    }

    public function getId(){
        return $this->id;        
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPasswordHash(){
        return $this->passwordHash;
    }

    public function newPassworrdHash(string $newPasswordHash){
        $this->passwordHash = password_hash($newPasswordHash, PASSWORD_DEFAULT);
    }
}