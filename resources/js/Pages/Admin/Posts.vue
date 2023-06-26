<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, Link } from '@inertiajs/vue3';


const posts = usePage().props.posts;

</script>

<template>
    <Head title="Posts" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="table w-full text-white">
                    <div class="table-header-group">
                        <div class="table-row">
                            <div class="table-cell cellheader">
                                Title</div>
                            <div class="table-cell cellheader">
                                Slug</div>
                            <div class="table-cell cellheader">
                                Publish Date</div>
                            <div class="table-cell cellheader">
                                Author</div>
                            <div class="table-cell cellheader">
                            </div>
                        </div>
                    </div>
                    <div class="table-row-group">
                        <div class="table-row" v-for="post in posts">
                            <div class="table-cell cell">{{ post.title }}</div>
                            <div class="table-cell cell">{{ post.slug }}</div>
                            <div class="table-cell cell">{{ post.published_at }}</div>
                            <div class="table-cell cell">{{ post.author.name }}</div>
                            <div class="table-cell cell">
                                <Link :href="route('admin.posts.edit', post.id)">
                                <div class="px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
                                    Edit
                                </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </AuthenticatedLayout>
</template>
