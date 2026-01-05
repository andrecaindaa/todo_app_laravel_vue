@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center px-6">
    <div class="max-w-xl text-center bg-white p-10 rounded-lg shadow">

        <h1 class="text-4xl font-bold mb-4">
            📝 To-Do App
        </h1>

        <p class="text-gray-600 mb-6">
            Organiza as tuas tarefas diárias de forma simples,
            rápida e eficiente.
        </p>

        <ul class="text-left text-gray-700 mb-8 space-y-2">
            <li>✔ Criar e editar tarefas</li>
            <li>✔ Definir prioridades e datas</li>
            <li>✔ Marcar tarefas como concluídas</li>
            <li>✔ Interface moderna e responsiva</li>
        </ul>

        <a
            href="/app"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded transition"
        >
            Entrar na aplicação
        </a>

    </div>
</div>
@endsection
