<template>
  <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded shadow p-6 max-w-md w-full">
      <h2 class="text-xl font-bold mb-2">{{ task.title }}</h2>

      <p class="mb-2 text-gray-600">
        {{ task.description || 'Sem descrição' }}
      </p>

      <p class="text-sm mb-1">
        Prioridade: <strong>{{ task.priority }}</strong>
      </p>

      <p v-if="task.due_date" class="text-sm mb-4">
        Data limite: {{ task.due_date }}
      </p>

      <button
        @click="$emit('close')"
        class="mt-4 bg-gray-700 text-white px-4 py-2 rounded"
      >
        Fechar
      </button>
    </div>
  </div>
</template>

<script setup>
defineProps({
  task: Object,
})
</script>
