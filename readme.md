# Sistema de Usuários (PHP)

Projeto simples em PHP para gerenciamento de usuários, desenvolvido com foco em **PSR-12**, **POO**, **DRY** e **YAGNI**.

## Integrante

Rodrigo Shinji Yamashita
RA: 2001443

## 🚀 Como rodar o projeto

1. Clone ou baixe este repositório no diretório do seu servidor local (ex: `htdocs` no XAMPP ou `www` no WAMP).
2. Certifique-se de que o Apache/PHP está rodando.
3. Acesse no navegador:

http://localhost/user_manager

> Obs.: `user_manager` deve ser o nome da pasta onde você colocou os arquivos do projeto.

---

## 📋 Funcionalidades implementadas

- **Cadastro de usuários** com validação de e-mail e senha.
- **Validação de e-mail** (formato válido).
- **Validação de senha forte** (mínimo 8 caracteres, maiúsculas, minúsculas, número e caractere especial).
- **Login de usuário** com verificação de hash da senha.
- **Reset de senha** com validação de complexidade.
- **Prevenção de e-mails duplicados**.
- **Mensagens de retorno padronizadas** (`status` e `message`).

---

## 🧪 Casos de Uso (Cenários de Teste)

O projeto possui testes demonstrados no arquivo `index.php`.

```php
🔹 Caso 1 — Cadastro válido
Entrada:

['nome' => 'Maria Oliveira', 'email' => 'maria@email.com', 'senha' => 'SenhA@%123']
Resultado esperado:
✅ Usuário cadastrado com sucesso.

🔹 Caso 2 — Cadastro com e-mail inválido
Entrada:

['nome' => 'Pedro', 'email' => 'pedro@@email', 'senha' => 'Senha123']
Resultado esperado:
❌ E-mail inválido.

🔹 Caso 3 — Tentativa de login com senha errada
Entrada:

['email' => 'joao@email.com', 'senha' => 'Errada123']
Resultado esperado:
❌ Credenciais inválidas.

🔹 Caso 4 — Reset de senha válido
Entrada:

['id' => 1, 'nova_senha' => 'NovaSenha1@']
Resultado esperado:
✅ Senha alterada com sucesso.

🔹 Caso 5 — Cadastro de usuário com e-mail duplicado
Entrada:

['nome' => 'Outro João', 'email' => 'joao@email.com', 'senha' => 'Senha123']
Resultado esperado:
❌ E-mail já está em uso.

🔹 Caso Extra - Array com dados salvos: senha em hash
Array
(
    [0] => Array
        (
            [id] => 1
            [nome] => João Silva
            [email] => joao@email.com
            [senha] => $2y$10$AOcgIV2Ch6yF3yYNU.nD4OswbMokVCkR0BsDyd1.0.hTVn/sA6Mhm
        )

)

📂 Estrutura do projeto
pgsql
Copiar código
src/
 └── docs/
      ├── User.php
      ├── UserManager.php
      ├── Validator.php
index.php
📌 Observações
Não é utilizado banco de dados (os dados são mantidos em memória para fins de demonstração).


Para produção, seria necessário integrar com MySQL/PostgreSQL.

