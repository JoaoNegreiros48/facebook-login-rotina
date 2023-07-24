
# Login com Facebook usando OAuth 2.0

## Introdução

Este é um script em PHP que permite que os usuários façam login usando suas contas do Facebook usando o protocolo de autenticação OAuth 2.0. O script utiliza a biblioteca `League\OAuth2\Client\Provider\Facebook` para lidar com o fluxo de autenticação do OAuth 2.0. Os usuários podem fazer login com suas credenciais do Facebook e acessar informações como nome e email.

## Pré-requisitos

Antes de executar este script, você precisa do seguinte:

1.  Uma Conta de Desenvolvedor do Facebook: É necessário ter uma conta de desenvolvedor do Facebook e criar um aplicativo do Facebook para obter o `client_id` e `client_secret` necessários para a autenticação.
    
2.  Composer: Verifique se você tem o [Composer](https://getcomposer.org/) instalado para gerenciar as dependências do projeto.
    

## Instalação

1.  Clone o repositório ou baixe o script para o diretório do seu servidor local.
    
2.  Instale as dependências usando o Composer:
    
 
 ```bash
composer install
```    
    
3.  Configure o Aplicativo do Facebook:
    
    -   Crie um novo aplicativo do Facebook em [https://developers.facebook.com/apps/](https://developers.facebook.com/apps/)
    -   Obtenha o `client_id` e `client_secret` para o seu aplicativo do Facebook.
4.  Substitua as variáveis no script:
    
    -   Substitua `{facebook-app-id}` pelo `client_id` do seu aplicativo do Facebook.
    -   Substitua `{facebook-app-secret}` pelo `client_secret` do seu aplicativo do Facebook.
    -   Altere `'https://example.com/callback-url'` pela URL de retorno desejada.

## Como funciona

1.  Quando um usuário acessa o script pela primeira vez, ele verifica se há uma sessão ativa para o usuário. Se não houver, ele exibe um link "Login com Facebook".
    
2.  Quando o link "Login com Facebook" é clicado, o usuário é redirecionado para a página de autorização do Facebook, onde ele pode permitir o acesso do aplicativo do Facebook às suas informações.
    
3.  Após a autorização bem-sucedida, o usuário é redirecionado de volta para o script com um código de autorização.
    
4.  O script troca o código de autorização por um token de acesso usando a biblioteca OAuth 2.0 do Facebook.
    
5.  Com o token de acesso, o script solicita as informações do usuário, como nome e email, da API Graph do Facebook.
    
6.  As informações do usuário são exibidas na página após o login bem-sucedido.
    
7.  Quando o usuário faz logout, a sessão é destruída.
    

Este script básico pode ser utilizado como ponto de partida para implementar o login com Facebook em seus próprios projetos PHP, usando o protocolo OAuth 2.0 para autenticação segura e fácil integração com o Facebook.
