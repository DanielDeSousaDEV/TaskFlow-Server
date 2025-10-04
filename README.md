<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a id="readme-top"></a>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->






<!-- PROJECT LOGO -->
<br />
<div align="center">

  <h3 align="center">TaskFlow</h3>

  <p align="center">
    Do mais simples ao mais importante, faça acontecer 
  </p>
</div>

<div align="center">

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![LinkedIn][linkedin-shield]][linkedin-url]
</div>

<!-- ABOUT THE PROJECT -->
## Sobre o Projeto

<!-- [![Product Name Screen Shot][product-screenshot]](https://github.com/DanielDeSousaDEV/PayForge) -->

TaskFlow é um aplicativo de **gerenciamento de tarefas baseado em Kanban**, criado para oferecer uma forma simples, visual e eficiente de organizar atividades. Este projeto nasceu da necessidade de facilitar a rotina de pessoas e equipes que buscam produtividade sem abrir mão da praticidade.

* Tornar o gerenciamento de tarefas mais intuitivo com quadros, listas e cartões no estilo Kanban
* Ajudar equipes e indivíduos a visualizarem melhor o fluxo de trabalho
* Reduzir a complexidade na organização de projetos, sem burocracia
* Proporcionar uma experiência agradável e acessível para qualquer nível de usuário

<p align="right">(<a href="#readme-top">Voltar para o topo</a>)</p>



## Tecnologias Utilizadas

No desenvolvimento deste projeto, as seguintes tecnologias foram utilizadas para estruturar o sistema e facilitar a manutenção do código. 

* [![Laravel][Laravel.com]][Laravel-url]
* [![React][React.js]][React-url]
* [![Typescript][Typescript.com]][TypeScript-url]
* [![Tailwind][Tailwind.com]][Tailwind-url]

<p align="right">(<a href="#readme-top">Voltar para o topo</a>)</p>

## Configuração inicial

Este é um exemplo de como fornecer instruções para configurar o projeto localmente.  
Para obter uma cópia local e colocar o sistema em funcionamento, siga esses passos:

### Pré-requisitos

Certifique-se de ter as seguintes ferramentas instaladas e configuradas:
* PHP (recomendo uma versão maior que 8)
* composer
* Git

### Instalação

_Siga o passo a passo abaixo para configurar o projeto em seu ambiente local._

1. Clone o repositório
      ```sh
      git clone https://github.com/DanielDeSousaDEV/TaskFlow-Server.git
      ```
2. Instale os pacote do composer
      ```sh
      composer install
      ```
3. Copie e cole o arquivo o arquivo `.env.example` e renomeie para `.env`
      ```
      cp .env.example .env
      ```
4. Configure as seguintes variáveis de ambiente
      ```
      DB_CONNECTION=sqlite
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=laravel
      DB_USERNAME=root
      DB_PASSWORD=

      SESSION_DOMAIN=localhost
      SANCTUM_STATEFUL_DOMAINS=localhost:5173
      ```
5.  Crie a chade do aplicativo
      ```sh
      php artisan key:generate
      ```
6.  Execute as migrations
      ```sh
      php artisan migrate 
      ```
7.  Execute o seeder
      ```sh
      php artisan db:seed 
      ```
8.  Execute as o projeto
      ```sh
      php artisan serve
      ```
9.  Configure o [frontend](https://github.com/DanielDeSousaDEV/TaskFlow-Client) ou use postman para interagir com o aplicativo
      ```
      email      =>   test@example.com,
      password   =>   password,
      ```

<p align="right">(<a href="#readme-top">Voltar para o topo</a>)</p>


<!-- CONTACT -->
## Contato

Daniel De Sousa - danieldesousa.dev@gmail.com

Link do repositório: [https://github.com/DanielDeSousaDEV/TaskFlow-Server](https://github.com/DanielDeSousaDEV/TaskFlow-Server)

<p align="right">(<a href="#readme-top">Voltar para o topo</a>)</p>


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/DanielDeSousaDEV/PayForge?style=for-the-badge
[contributors-url]: https://github.com/DanielDeSousaDEV/PayForfe/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/DanielDeSousaDEV/PayForge?style=for-the-badge
[forks-url]: https://github.com/DanielDeSousaDEV/PayForge/network/members
[stars-shield]: https://img.shields.io/github/stars/DanielDeSousaDEV/PayForge?style=for-the-badge
[stars-url]: https://github.com/DanielDeSousaDEV/PayForge/stargazers
[issues-shield]: https://img.shields.io/github/issues/DanielDeSousaDEV/PayForge?style=for-the-badge
[issues-url]: https://github.com/DanielDeSousaDEV/PayForge/issues
[license-shield]: https://img.shields.io/github/license/DanielDeSousaDEV/PayForge?style=for-the-badge
[license-url]: https://github.com/DanielDeSousaDEV/PayForge/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/daniel-de-sousa-257275314/
[product-screenshot]: /public/banner.png
[Next.js]: https://img.shields.io/badge/next.js-000000?style=for-the-badge&logo=nextdotjs&logoColor=white
[Next-url]: https://nextjs.org/
[React.js]: https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB
[React-url]: https://reactjs.org/
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Angular.io]: https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-url]: https://angular.io/
[Svelte.dev]: https://img.shields.io/badge/Svelte-4A4A55?style=for-the-badge&logo=svelte&logoColor=FF3E00
[Svelte-url]: https://svelte.dev/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Inertia.com]: https://img.shields.io/badge/Inertia-20232A?style=for-the-badge&logo=inertia&logoColor=b1b6ff
[Inertia-url]: https://inertiajs.com/
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[Tailwind.com]: https://img.shields.io/badge/Tailwind-030712?style=for-the-badge&logo=tailwindcss&logoColor=00bcff
[Tailwind-url]: https://tailwindcss.com/
[Typescript.com]: https://img.shields.io/badge/Typesctript-030712?style=for-the-badge&logo=typescript&logoColor=00bcff
[Typescript-url]: https://www.typescriptlang.org/
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
