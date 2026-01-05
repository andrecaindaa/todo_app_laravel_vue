<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>To-Do App</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">
    <div class="max-w-xl bg-white shadow rounded p-8 text-center">
        <h1 class="text-4xl font-bold mb-4">📝 To-Do App</h1>

        <p class="text-gray-600 mb-6">
            Organiza as tuas tarefas diárias de forma simples,
            rápida e eficiente.
        </p>

        <ul class="text-left text-gray-700 mb-6 space-y-2">
            <li>✔ Criar, editar e remover tarefas</li>
            <li>✔ Definir prioridades e datas</li>
            <li>✔ Marcar tarefas como concluídas</li>
            <li>✔ Interface responsiva</li>
        </ul>

        <a
            href="/app"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded font-semibold"
        >
            Entrar na aplicação
        </a>
    </div>
</div>

</body>
</html>
