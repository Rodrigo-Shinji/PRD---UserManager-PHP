# PRD - Sistema de Usuários

**Projeto:** Gerenciamento de Usuários em PHP  
**Autor:** Rodrigo Shinji Yamashita  
**RA:** 2001443  

---

## 📌 Instruções de Execução
Este projeto foi desenvolvido em **PHP puro** e deve ser executado em um ambiente local, como o **XAMPP**.  

---

## ▶️ Como Rodar
1. Certifique-se de que o **Apache** esteja ativo.  
2. Crie uma pasta `user_manager` dentro do diretório do servidor local (`htdocs` no XAMPP ou `www` no WAMP).  
3. Clone ou copie o repositório para dentro dessa pasta.  
4. Abra o navegador e acesse:  
http://localhost/user_manager  
5. O arquivo `index.php` executará automaticamente os casos de teste e exibirá os resultados.  

---

## 📖 Funcionalidades Implementadas
O sistema oferece as seguintes funcionalidades principais:  

- **Cadastro de Usuários**: Inclui novo usuário com validação de dados.  
- **Validação de E-mail**: Garante formato correto e evita duplicidade.  
- **Validação de Senha Forte**: Mínimo 8 caracteres, com letras maiúsculas, minúsculas e números.  
- **Login de Usuário**: Autenticação com verificação de hash da senha.  
- **Reset de Senha**: Permite alteração da senha com nova validação de complexidade.  
- **Mensagens Padronizadas**: Todas as respostas seguem formato com `status` e `message`.  

---

## ⚖️ Regras de Negócio e Validações
- E-mails devem ser válidos e únicos.  
- Senhas devem atender aos critérios de segurança (complexidade mínima).  
- Login só é aceito se o hash da senha for validado com sucesso.  
- Não é permitido cadastrar usuários com o mesmo e-mail.  
- Reset de senha deve seguir as mesmas regras de complexidade do cadastro.  

---

## ⚠️ Limitações
- **Sem persistência em banco de dados**: Os usuários são mantidos em array durante a execução.  
- **Sistema simplificado**: Voltado para fins acadêmicos e demonstração de boas práticas (**PSR-12**, **POO**, **DRY**, **YAGNI**).  

---

## 🧪 Exemplos de Uso (Casos de Teste)
O arquivo `index.php` demonstra os seguintes cenários:  

### Caso 1: Cadastro Válido
- **Entrada**:  
`['nome' => 'Maria Oliveira', 'email' => 'maria@email.com', 'senha' => 'Senha123']`  
- **Resultado**: ✅ Usuário cadastrado com sucesso.  

### Caso 2: Cadastro com E-mail Inválido
- **Entrada**:  
`['nome' => 'Pedro', 'email' => 'pedro@@email', 'senha' => 'Senha123']`  
- **Resultado**: ❌ E-mail inválido.  

### Caso 3: Tentativa de Login com Senha Errada
- **Entrada**:  
`['email' => 'joao@email.com', 'senha' => 'Errada123']`  
- **Resultado**: ❌ Credenciais inválidas.  

### Caso 4: Reset de Senha Válido
- **Entrada**:  
`['id' => 1, 'nova_senha' => 'NovaSenha1@']`  
- **Resultado**: ✅ Senha alterada com sucesso.  

### Caso 5: Cadastro com E-mail Duplicado
- **Entrada**:  
`['nome' => 'Outra Maria', 'email' => 'maria@email.com', 'senha' => 'Senha123']`  
- **Resultado**: ❌ E-mail já está em uso.  

### Caso Extra: Array de Usuários (Senha em Hash)

- **Resultado**: ✅ Senha armazenada em hash.

