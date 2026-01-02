<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <AppLayout title="Início">
    <div class="max-w-4xl mx-auto py-10 space-y-8">

      <!-- User info -->
      <div class="flex items-center gap-6">
        <img
          :src="$page.props.auth.user.profile_photo_url"
          class="w-20 h-20 rounded-full"
        />

        <div>
          <h1 class="text-2xl font-semibold">
            {{ $page.props.auth.user.name }}
          </h1>

          <p class="text-gray-600">
            {{ $page.props.auth.user.status || 'Sem estado definido' }}
          </p>
        </div>
      </div>

      <!-- Actions -->
      <div class="bg-white border rounded-lg p-6">
        <h2 class="font-semibold mb-4">
          Onde queres ir?
        </h2>

        <div class="flex gap-4">
          <Link
            :href="route('rooms.index')"
            class="px-5 py-2 bg-black text-white rounded"
          >
            Entrar nas salas
          </Link>

          <Link
            :href="route('profile.show')"
            class="px-5 py-2 border rounded"
          >
            Editar perfil
          </Link>
        </div>
      </div>

    </div>
  </AppLayout>
</template>
