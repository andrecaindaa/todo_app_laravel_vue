<template>
  <ul v-if="tasks.length" class="space-y-3">
    <TaskItem
      v-for="task in tasks"
      :key="task.id"
      :task="task"
      @toggle="$emit('toggle', $event)"
      @edit="$emit('edit', $event)"
      @delete="$emit('delete', $event)"
      @show-details="$emit('show-details', $event)"
    />
  </ul>

  <p v-else class="text-center text-gray-500 mt-6">
    Nenhuma tarefa encontrada.
  </p>
</template>

<script setup>
import TaskItem from './TaskItem.vue'

defineProps({
  tasks: Array,
})
</script>
