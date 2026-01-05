<template>
  <div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white rounded shadow p-6">

      <h1 class="text-3xl font-bold mb-6 text-center">📝 To-Do App</h1>

      <TaskForm
        :model-value="form"
        :editing-task="editingTask"
        @submit="submitTask"
      />

      <TaskFilters v-model="filters" />

      <TaskList
        :tasks="tasks"
        @toggle="toggleTask"
        @edit="editTask"
        @delete="deleteTask"
        @show-details="selectedTask = $event"
      />

      <TaskDetailsModal
        v-if="selectedTask"
        :task="selectedTask"
        @close="selectedTask = null"
      />

    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, getCurrentInstance, watch } from 'vue'

import TaskForm from './TaskForm.vue'
import TaskFilters from './TaskFilters.vue'
import TaskList from './TaskList.vue'
import TaskDetailsModal from './TaskDetailsModal.vue'

const { appContext } = getCurrentInstance()
const axios = appContext.config.globalProperties.$axios

const tasks = ref([])
const selectedTask = ref(null)
const editingTask = ref(null)

const form = ref({
  title: '',
  description: '',
  priority: 'medium',
  due_date: '',
})

const filters = ref({
  completed: '',
  priority: '',
  due_date: '',
})

watch(filters, () => {
  fetchTasks()
}, { deep: true })




const fetchTasks = async () => {
  const { data } = await axios.get('/tasks', { params: filters.value })
  tasks.value = data
}

const submitTask = async (payload) => {
  if (editingTask.value) {
    await axios.put(`/tasks/${editingTask.value.id}`, payload)
    editingTask.value = null
  } else {
    await axios.post('/tasks', payload)
  }

  form.value = { title: '', description: '', priority: 'medium', due_date: '' }
  fetchTasks()
}

const editTask = (task) => {
  editingTask.value = task
  form.value = { ...task }
}

const deleteTask = async (task) => {
  if (confirm('Tens a certeza que queres apagar esta tarefa?')) {
    await axios.delete(`/tasks/${task.id}`)
    fetchTasks()
  }
}

const toggleTask = async (task) => {
  await axios.patch(`/tasks/${task.id}/toggle`)
  fetchTasks()
}

onMounted(fetchTasks)
</script>
