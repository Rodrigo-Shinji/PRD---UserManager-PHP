<?php

require_once './src/docs/UserManager.php';
require_once './src/docs/User.php';
require_once './src/docs/Validator.php';
session_start();

$users = [[
    'id' => 1,
    'nome' => 'João Silva',
    'email' => 'joao@email.com',
    'senha' => password_hash('Senha123', PASSWORD_DEFAULT)
]];

$manager = new UserManager($users);

echo "<pre>";
echo "<h1>Casos de Teste - Sistema de Usuários</h1>";

echo "<h2>Caso 1 — Cadastro válido</h2>";
echo "<h3>Entrada:</h3>";

print_r([
    'nome' => 'Maria Oliveira',
    'email' => 'maria@email.com',
    'senha' => 'SenhA@%123'
]);

$result = $manager->register('Maria Oliveira', 'maria@email.com', 'SenhA@%123');
echo "<h3>Resultado:</h3>";
print_r($result);

echo "<h2>Caso 2 — Cadastro com e-mail inválido</h2>";
echo "<h3>Entrada:</h3>";

print_r([
    'nome' => 'Pedro',
    'email' => 'pedro@@email',
    'senha' => 'Senha123'
]);

$result = $manager->register('Pedro', 'pedro@@email', 'Senha123');
echo "<h3>Resultado:</h3>";
print_r($result);
echo "<hr>";

echo "<h2>Caso 3 — Tentativa de login com senha errada</h2>";
echo "<h3>Entrada:</h3>";

print_r([
    'email' => 'joao@email.com',
    'senha' => 'Errada123'
]);

$result = $manager->login('joao@email.com', 'Errada123');
echo "<h3>Resultado:</h3>";
print_r($result);
echo "<hr>";

echo "<h2>Caso 4 — Reset de senha válido</h2>";
echo "<h3>Entrada:</h3>";

print_r([
    'id' => 1,
    'nova_senha' => 'NovaSenha1'
]);

$result = $manager->resetPassword(1, 'NovaSenha1');
echo "<h3>Resultado:</h3>";
print_r($result);
echo "<hr>";

echo "<h2>Caso 5 — Cadastro de usuário com e-mail duplicado</h2>";
echo "<h3>Entrada:</h3>";

print_r([
    'nome' => 'Outro João',
    'email' => 'joao@email.com',
    'senha' => 'Senha123'
]);

$result = $manager->register('Outro João', 'joao@email.com', 'Senha123');
echo "<h3>Resultado:</h3>";
print_r($result);
echo "<hr>";

echo "<h2>Caso Extra - Array com dados salvos: senha em hash</h2>";
print_r($users);
echo "<hr>";

echo "</pre>";
