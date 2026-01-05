<template>
  <form
    @submit.prevent="onSubmit"
    class="grid grid-cols-1 md:grid-cols-4 gap-2 mb-6"
  >
    <input
      v-model="localForm.title"
      type="text"
      placeholder="Título da tarefa"
      class="border rounded px-3 py-2 md:col-span-2"
      required
    />

    <select v-model="localForm.priority" class="border rounded px-2">
      <option value="low">Baixa</option>
      <option value="medium">Média</option>
      <option value="high">Alta</option>
    </select>

    <input
      v-model="localForm.due_date"
      type="date"
      class="border rounded px-2"
    />

    <textarea
      v-model="localForm.description"
      placeholder="Descrição (opcional)"
      class="border rounded px-3 py-2 md:col-span-4"
    ></textarea>

    <button
      class="md:col-span-4 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded"
    >
      {{ isEditing ? 'Atualizar tarefa' : 'Adicionar tarefa' }}
    </button>
  </form>
</template>

<script setup>
import { reactive, watch, computed } from 'vue'

const props = defineProps({
  modelValue: Object,
  editingTask: Object,
})

const emit = defineEmits(['submit'])

const localForm = reactive({
  title: '',
  priority: 'medium',
  due_date: '',
  description: '',
})

watch(
  () => props.modelValue,
  (value) => {
    Object.assign(localForm, value)
  },
  { immediate: true }
)

const isEditing = computed(() => !!props.editingTask)

const onSubmit = () => {
  emit('submit', { ...localForm })
}
</script>
