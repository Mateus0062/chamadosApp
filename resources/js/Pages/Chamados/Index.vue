<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  chamados: Array,
})
</script>

<template>
  <div class="max-w-5xl mx-auto p-6">
    <div class="flex items-center justify-between mb-4">
      <h1 class="text-2xl font-bold">Chamados</h1>
      <Link href="/chamados/create"
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
        Novo chamado
      </Link>
    </div>

    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="border-b text-sm text-gray-500">
          <th class="py-2">Título</th>
          <th>Prioridade</th>
          <th>Status</th>
          <th>Responsável</th>
          <th>Aberto em</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="c in chamados" :key="c.id" class="border-b hover:bg-gray-50">
          <td class="py-2">
            <Link :href="`/chamados/${c.id}/edit`" class="text-blue-600 hover:underline">
              {{ c.titulo }}
            </Link>
          </td>
          <td>{{ c.prioridade }}</td>
          <td>{{ c.status }}</td>
          <td>{{ c.responsavel?.nome ?? '—' }}</td>
          <td class="text-sm text-gray-500">
            {{ new Date(c.created_at).toLocaleString('pt-BR') }}
          </td>
          <td>
            <Link :href="`/chamados/${c.id}/edit`" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
              Editar
            </Link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>