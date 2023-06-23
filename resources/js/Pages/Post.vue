<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, Link } from '@inertiajs/vue3';


const post = usePage().props.post;

</script>

<template>
    <Head :title="post.title" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ post.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 mb-4">
                    <Link :href="route('post', post.slug)">
                    {{ post.title }}
                    </Link>
                    <div class="conntent pt-2">
                        {{ post.content }}
                    </div>
                    <div class="author text-sm pt-4 text-right">
                        <span class="">By </span>
                        <span class="font-serif italic">
                            {{ post.author.name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
