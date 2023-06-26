<script setup>
import { Head, usePage, useForm, router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

const page = usePage()
const post = page.props.post;
const users = page.props.users;
let newUser = true;
const form = useForm({
    id: null,
    title: '',
    content: '',
    author: null,
});

if (post.hasOwnProperty('id')) {
    newUser = false;
    form.id = post.id
    form.title = post.title
    form.content = post.content
    form.author = post.author.id
}


const createOrUpdate = () => {
    if (newUser) {
        form.post(route('admin.posts.create'), {
            preserveScroll: true,
            onSuccess: () => router.reload(),
            onError: () => {
                console.log('error')
                console.log(form.errors)
            },
        });
    } else {
        form.put(route('admin.posts.update'), {
            preserveScroll: true,
            onSuccess: () => router.reload(),
            onError: () => {
                console.log('error')
                console.log(form.errors)
            },
        });
    }
};

</script>

<template>
    <Head title="Edit Post" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ form.title }}
            </h2>
        </template>

        <div class="py-12">
            <form @submit.prevent="createOrUpdate">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white dark:bg-gray-800 overflow-auto shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 mb-4">
                        <div>
                            <InputLabel for="postTitle" value="Title" />

                            <TextInput v-model="form.title" id="postTitle" name="title" class="block w-full mt-1 p-2" />
                        </div>
                        <div class="conntent pt-2">
                            <InputLabel for="content" value="Content" />

                            <textarea name="content" id="content" cols="30" rows="10"
                                class="block w-full mt-1 text-white bg-gray-900" v-model="form.content"></textarea>
                        </div>
                        <div class="author text-sm pt-4">
                            <input type="hidden" name="author_id" v-model="form.author">
                            <InputLabel for="content" value="Author" />
                            <vSelect :options="users" label="name" v-model="form.author" class="mb-4 mt-1"
                                :reduce="sel => sel.id"></vSelect>
                        </div>

                        <PrimaryButton :disabled="false" class="float-right mt-4">Save</PrimaryButton>
                    </div>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
:deep() {
    --vs-controls-color: #664cc3;
    --vs-border-color: #664cc3;

    --vs-dropdown-bg: #282c34;
    --vs-dropdown-color: #cc99cd;
    --vs-dropdown-option-color: #cc99cd;

    --vs-selected-bg: #664cc3;
    --vs-selected-color: #eeeeee;

    --vs-search-input-color: #eeeeee;

    --vs-dropdown-option--active-bg: #664cc3;
    --vs-dropdown-option--active-color: #eeeeee;
}
</style>