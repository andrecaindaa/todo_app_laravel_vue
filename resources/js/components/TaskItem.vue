<template>
  <li class="border rounded p-4 flex flex-col md:flex-row md:items-center md:justify-between">
    <div @click="$emit('show-details', task)" class="cursor-pointer">
      <p
        class="font-semibold"
        :class="{
          'line-through text-gray-400': task.is_completed,
          'text-green-600': task.priority === 'low',
          'text-yellow-600': task.priority === 'medium',
          'text-red-600': task.priority === 'high',
        }"
      >
        {{ task.title }}
      </p>

      <p v-if="task.due_date" class="text-sm text-gray-500">
        Vence em: {{ task.due_date }}
      </p>
    </div>

    <div class="flex gap-3 mt-3 md:mt-0">
      <button @click.stop="$emit('toggle', task)" class="text-sm text-blue-600 hover:underline">
        ✔
      </button>

      <button @click.stop="$emit('edit', task)" class="text-sm text-yellow-600 hover:underline">
        Editar
      </button>

      <button @click.stop="$emit('delete', task)" class="text-sm text-red-600 hover:underline">
        Apagar
      </button>
    </div>
  </li>
</template>

<script setup>
defineProps({
  task: Object,
})
</script>
