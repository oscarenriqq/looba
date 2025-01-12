<script setup>
import { useForm, router } from '@inertiajs/vue3';
import { comment } from 'postcss';
import { ref } from 'vue';

const props = defineProps({
    categories: {
        type: Array,
        required: true
    },
    difficulties: {
        type: Array,
        required: true
    },
    themes: {
        type: Array,
        required: true
    },
    technologies: {
        type: Array,
        required: true
    },
    errors: {
        type: Object
    }
});

const form = useForm({
    category: '',
    technology: '',
    difficulty: '',
    theme: '',
    comments: ''
});

const technologies = ref([]);
const themes = ref([]);
const commentsCharactersCount = ref(0);

function setTechnologies(e) {    
    category.value = parseInt(e.target.value);
    const selectedCategory = props.categories.find(cat => cat.id === form.category);
    technologies.value = selectedCategory.technologies;

    form.technology = '';
}

function setThemes(e) {
    theme.value = parseInt(e.target.value);
    const technologySelected = props.technologies.find(tech => tech.id === form.technology);
    themes.value = technologySelected.themes;

    form.theme = '';
}

function countCommentCharacters() {
    commentsCharactersCount.value = form.comments.length;
}

</script>

<template>
    <div class="pt-10 text-light text-center">
        <h1 class="text-4xl font-bold">Diseña tu experiencia de aprendizaje</h1>
        <p class="text-accent mt-2 text-lg">Define tus preferencias y utilizando inteligencia artificial diseñaremos el reto perfecto para tu aprendizaje.</p>

        <div v-if="form.erros">
            Hay errores
        </div>
        <form @submit.prevent="form.post('/projects/create')" class="mt-10">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-accent">Categoría</label>
                    <select @change="setTechnologies" v-model="form.category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 " required>
                        <option selected disabled value="">Selecciona una categoría</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                    </select>
                </div>  
                <div>
                    <label for="technology" class="block mb-2 text-sm font-medium text-accent">Selecciona la tecnología</label>
                    <select @change="setThemes" id="technology" v-model="form.technology" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 ">
                        <option selected disabled value="">Tecnología</option>
                        <option v-for="technology in technologies" :key="technology.id" :value="technology.id">
                            {{ technology.name }}
                        </option>
                    </select>
                </div>
                <div>
                    <label for="theme" class="block mb-2 text-sm font-medium text-accent">Temática</label>
                    <select id="theme" v-model="form.theme" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 ">
                        <option selected disabled value="">Temática</option>
                        <option v-for="theme in themes" :key="theme.id" :value="theme.id">{{ theme.name }}</option>
                    </select>
                </div>
                <div>
                    <label for="difficulty" class="block mb-2 text-sm font-medium text-accent">Nivel de dificultad</label>
                    <select id="difficulty" v-model="form.difficulty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 ">
                        <option selected disabled value="">Dificultad</option>
                        <option v-for="difficulty in difficulties" :key="difficulty.id" :value="difficulty.id">{{ difficulty.name }}</option>
                    </select>
                </div>
                <div class="col-span-2 text-start">
                    <div class="flex justify-between items-center">
                        <label for="comments" class="block mb-2 text-sm font-medium text-accent">Comentarios adicionales</label>
                        <small>({{ commentsCharactersCount }}/75)</small>
                    </div>
                    <input @input="countCommentCharacters()" v-model="form.comments" maxlength="75" type="text" id="message" rows="4" class="block p-2.5 w-full text-sm text-primary bg-white rounded-lg border border-gray-300" placeholder="Leave a comment..." />
                </div>
            </div>
            <button type="submit" class="text-light bg-secondary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Empezar
            </button>
        </form>
    </div>
</template>