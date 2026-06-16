# Sistema de Controle de Chamados Internos

Aplicação web para abertura e acompanhamento de chamados internos de uma empresa. No sistema, é possível criar, visualizar e editar chamados. O sistema também oferece a possibilidade de atribuição automática de chamados para um melhor controle de carga, garantindo o equilíbrio de tarefas entre os responsáveis responsáveis.

Sistema desenvolvido para desafio técnico para a equipe Codificar.

## Funcionalidades

- **CRUD de chamados**: cadastro, edição, listagem, visualização
- **Campos do chamado**: título, descrição, prioridade (baixa, média, alta), status (aberto, em andamento, resolvido, fechado), responsável e data/hora de abertura.
- **Responsáveis**: conjunto de responsáveis pré-cadastrados (via seeder), selecionáveis ao abrir ou editar um chamado.
- **Distribuição automática**: Opção de atribuição automática ao responsável com menos chamados em aberto.
- **Atribuição manual**: O usuário pode escolher manualmente o responsável

---

## Stack utilizada

| Camada | Tecnologia |
|---|---|
| Backend | Laravel 13 (PHP 8.4) |
| Ponte | Inertia.js |
| Frontend | Vue 3 (Composition API) |
| Estilos | Tailwind CSS |
| Banco de dados | SQLite |

---

## Justificativa das Escolhas

### Por que Laravel + Inertia + Js ?

O desafio sugere que o sistema deve ser simples, de baixa manutenibilidade, e por último e principal requisito: o sistema deve garantir o mínimo de atrito possível entre backend e frontend. Esse último requisito é uma "dica" valiosa de qual Stack utilizar para o projeto. Além de ser a stack principal da empresa codificar, a stack Laravel + Inertia.js + Vue (Continuação aqui)

- Laravel: O Laravel entra no back-end pela produtividade e quantidade de recursos que oferece por padrão: Eloquent ORM, migrations, seeders, Query Builders, Form Requests.

- Inertia.js: O inertia.js é a peça central da arquitetura, ele permite a criação de SPAs (Single Pages Application) em Vue sem precisar consumir uma API Rest separada. O Controller Laravel devolve os dados (props) diretamente para o componente Vue. Isso proporciona o menor atrito possível entre backend e frontend, garantindo um sistema harmonioso em seu ecossistema.

- Vue 3: O Vue 3 com Composition API oferece componentização e reatividade para construir telas

- Tailwind Css: O tailwind css permite montar uma interface organizada, simples e de forma rápida sem precisar "reinventar a roda

- SQLite: O banco de dados SQLite foi escolhido para que a aplicação seja executável localmente por qualquer pessoa do time sem configuração. Atendendo diretamente ao requisito 6.1.

### Decisões arquiteturais

