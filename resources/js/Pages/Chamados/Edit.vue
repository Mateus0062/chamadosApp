<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  chamado: Object,
  responsaveis: Array,
})

const form = useForm({
    titulo: props.chamado.titulo,
    descricao: props.chamado.descricao,
    prioridade: props.chamado.prioridade,
    status: props.chamado.status,
    responsavel_id: props.chamado.responsavel_id,
    atribuir_auto: false,
})

function submit() {
    form.put(`/chamados/${props.chamado.id}`)
}
</script>

<template>
    <div class="max-w-xl mx-auto p-6 space-y-4">
        <h1 class="text-2xl font-bold">Editar chamado</h1>

        <div>
            <label class="block text-sm font-medium">Título</label>
            <input v-model="form.titulo" class="w-full border rounded-md p-2" />
            <p v-if="form.errors.titulo" class="text-red-600 text-sm">{{ form.errors.titulo }}</p>
        </div>

        <div>
            <label class="block text-sm font-medium">Descrição</label>
            <textarea v-model="form.descricao" class="w-full border rounded-md p-2"></textarea>
            <p v-if="form.errors.descricao" class="text-red-600 text-sm">{{ form.errors.descricao }}</p>
        </div>

        <div>
            <label class="block text-sm font-medium">Prioridade</label>
            <select v-model="form.prioridade" class="w-full border rounded-md p-2">
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium">Status</label>
            <select v-model="form.status" class="w-full border rounded-md p-2">
                <option value="aberto">Aberto</option>
                <option value="em_andamento">Em andamento</option>
                <option value="resolvido">Resolvido</option>
                <option value="fechado">Fechado</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium">Responsável</label>
            <select v-model="form.responsavel_id"
                    :disabled="form.atribuir_auto"
                    class="w-full border rounded-md p-2 disabled:bg-gray-100">
                <option :value="null">— selecione —</option>
                <option v-for="r in responsaveis" :key="r.id" :value="r.id">{{ r.nome }}</option>
            </select>
        </div>

        <label class="flex items-center gap-2">
            <input type="checkbox" v-model="form.atribuir_auto" />
            <span class="text-sm">Atribuir automaticamente (menos chamados em aberto)</span>
        </label>

        <div class="flex gap-2">
            <button @click="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Salvar alterações
            </button>

            <button @click="form.delete(`/chamados/${props.chamado.id}`)" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                Excluir chamado
            </button>

            <button @click="$inertia.get('/chamados')" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                Voltar para lista
            </button>
        </div>
    </div>
</template>
