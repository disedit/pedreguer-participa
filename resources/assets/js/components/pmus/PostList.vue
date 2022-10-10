<template>
    <ul class="post-list">
        <li v-for="{ fields: post } in posts" :key="post.slug">
            <router-link :to="`/pmus/${post.slug}`" class="post-item">
                {{ post.title }}
                <time>{{ post.date | dateFilter}}</time>
            </router-link>
        </li>
    </ul>
</template>

<script>
export default {
    data () {
        return {
            posts: []
        }
    },

    async mounted () {
        const { items } = await this.$contentful.getEntries({ content_type: 'post' })
        this.posts = items
    },

    filters: {
        dateFilter (value) {
            const date = new Date(value)
            return new Intl.DateTimeFormat('ca').format(date)
        }
    }
}
</script>
