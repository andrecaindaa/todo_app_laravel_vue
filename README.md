# 📝 To-Do App

Aplicação web para gestão de tarefas desenvolvida com Laravel 12,
Vue 3 e Tailwind CSS.

## 🚀 Funcionalidades
- Criação de tarefas com:
  - Título
  - Descrição
  - Prioridade (baixa, média, alta)
  - Data de vencimento
- Listagem de tarefas
- Edição de tarefas existentes
- Marcação de tarefas como concluídas
- Remoção de tarefas
- Filtros por:
  - Estado (pendente / concluída)
  - Prioridade
  - Data de vencimento
- Visualização de detalhes da tarefa
- Interface responsiva
- API RESTful
- Testes automatizados

## 🧱 Arquitetura

- **Backend**: Laravel 12 (API REST)
- **Frontend**: Vue 3 (componentizado)
- **Estilização**: Tailwind CSS
- **Base de Dados**: MySQL
- **Comunicação**: Axios
- **Build Frontend**: Vite

## 🛠️ Tecnologias
- Laravel 12
- Vue 3
- Tailwind CSS
- MySQL
- Axios
- Vite

## 📦 Instalação
```bash
git clone <repo>
cd todo_app
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
