<?php

class UserManager
{
    private array $users = [];
    private Validator $validator;

    public function __construct(array $users = [])
    {
        $this->validator = new Validator();

        foreach ($users as $u) {
            $this->users[] = new User(
                $u['id'],
                $u['nome'],
                $u['email'],
                password_get_info($u['senha'])['algo'] !== 0
                    ? $u['senha']
                    : password_hash($u['senha'], PASSWORD_DEFAULT)
            );
        }
    }

    public function register(string $name, string $email, string $password): array
    {
        if (!$this->validator->validEmail($email)) {
            return $this->error("E-mail inválido.");
        }

        if ($this->findByEmail($email)) {
            return $this->error("E-mail já está em uso.");
        }

        if (!$this->validator->strongPassword($password)) {
            return $this->error("Senha fraca.");
        }

        $id = count($this->users) + 1;
        $this->users[] = new User(
            $id,
            $name,
            $email,
            password_hash($password, PASSWORD_DEFAULT)
        );

        return $this->success("Usuário cadastrado com sucesso.");
    }

    public function login(string $email, string $password): array
    {
        $user = $this->findByEmail($email);

        if (!$user || !password_verify($password, $user->passwordHash)) {
            return $this->error("Credenciais inválidas.");
        }

        return $this->success("Login bem-sucedido.");
    }

    public function resetPassword(int $id, string $newPassword): array
    {
        $user = $this->findById($id);

        if (!$user) {
            return $this->error("Usuário não encontrado.");
        }

        if (!$this->validator->strongPassword($newPassword)) {
            return $this->error("Senha fraca.");
        }

        $user->passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

        return $this->success("Senha alterada com sucesso.");
    }

    private function findByEmail(string $email): ?User
    {
        foreach ($this->users as $u) {
            if ($u->email === $email) {
                return $u;
            }
        }
        return null;
    }

    private function findById(int $id): ?User
    {
        foreach ($this->users as $u) {
            if ($u->id === $id) {
                return $u;
            }
        }
        return null;
    }

    private function success(string $message): array
    {
        return ['success' => true, 'message' => $message];
    }

    private function error(string $message): array
    {
        return ['error' => false, 'message' => $message];
    }
}

