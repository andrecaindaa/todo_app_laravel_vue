<template>
  <div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

      <h1 class="text-2xl font-bold mb-4 text-center">
        📝 To-Do App
      </h1>

      <!-- Formulário -->
      <form @submit.prevent="createTask" class="mb-6 space-y-3">
        <input
          v-model="form.title"
          type="text"
          placeholder="Título da tarefa"
          class="w-full border rounded px-3 py-2"
          required
        />

        <select
          v-model="form.priority"
          class="w-full border rounded px-3 py-2"
        >
          <option value="low">Baixa</option>
          <option value="medium">Média</option>
          <option value="high">Alta</option>
        </select>

        <button
          type="submit"
          class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700"
        >
          Adicionar
        </button>
      </form>

      <!-- Lista de tarefas -->
      <ul v-if="tasks.length">
        <li
          v-for="task in tasks"
          :key="task.id"
          class="border-b py-2 flex justify-between"
        >
          <span>
            {{ task.title }}
            <small class="text-gray-500">
              ({{ task.priority }})
            </small>
          </span>
        </li>
      </ul>

      <p v-else class="text-center text-gray-500">
        Nenhuma tarefa encontrada.
      </p>

    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, getCurrentInstance } from 'vue';

const { appContext } = getCurrentInstance();
const axios = appContext.config.globalProperties.$axios;

// estado
const tasks = ref([]);

const form = ref({
  title: '',
  priority: 'medium',
});

// buscar tarefas
const fetchTasks = async () => {
  const response = await axios.get('/tasks');
  tasks.value = response.data;
};

// criar tarefa
const createTask = async () => {
  await axios.post('/tasks', form.value);

  form.value.title = '';
  form.value.priority = 'medium';

  fetchTasks();
};

// quando o componente carrega
onMounted(fetchTasks);
</script>
