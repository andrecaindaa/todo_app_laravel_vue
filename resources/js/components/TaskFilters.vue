<template>
  <div class="flex flex-wrap gap-2 mb-4">
    <select
      v-model="localFilters.completed"
      @change="emitChange"
      class="border rounded px-2 py-1"
    >
      <option value="">Todas</option>
      <option value="0">Pendentes</option>
      <option value="1">Concluídas</option>
    </select>

    <select
      v-model="localFilters.priority"
      @change="emitChange"
      class="border rounded px-2 py-1"
    >
      <option value="">Todas prioridades</option>
      <option value="low">Baixa</option>
      <option value="medium">Média</option>
      <option value="high">Alta</option>
    </select>

    <input
      type="date"
      v-model="localFilters.due_date"
      @change="emitChange"
      class="border rounded px-2 py-1"
    />
  </div>
</template>

<script setup>
import { reactive, watch } from 'vue'

const props = defineProps({
  modelValue: Object,
})

const emit = defineEmits(['update:modelValue'])

const localFilters = reactive({
  completed: '',
  priority: '',
  due_date: '',
})

watch(
  () => props.modelValue,
  (value) => Object.assign(localFilters, value),
  { immediate: true }
)

const emitChange = () => {
  emit('update:modelValue', { ...localFilters })
}
</script>
