<?php

class Validator
{
    public function validEmail(string $email): bool
    {
        return (bool) preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email);
    }

    public function strongPassword(string $password): bool
    {
        return (bool) preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
    }
}
