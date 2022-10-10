<template>
    <section class="single-post">
        <div v-if="post">
            <h1 class="single-post-title">{{ post.title }}</h1>
            <time>{{ post.date | dateFilter }}</time>
            <div class="single-post-content">
                <rich-text-renderer :document="post.content" :nodeRenderers="renderNodes()" />
            </div>
        </div>
        <div v-else>
            Carregant...
        </div>
    </section>
</template>

<script>
import RichTextRenderer from 'contentful-rich-text-vue-renderer'
import { BLOCKS } from '@contentful/rich-text-types'

const customEmbeddedAsset = (node, key, h) => {
    const src = node.data.target.fields.file.url
    return h('img', { key: key, class: 'image-asset', attrs: { src } });
}

export default {
    components: {
        RichTextRenderer
    },

    data () {
        return {
            post: null
        }
    },

    async mounted () {
        const { slug } = this.$route.params
        const { items } = await this.$contentful.getEntries({ content_type: 'post', 'fields.slug': slug })
        this.post = items[0].fields
    },

    filters: {
        dateFilter (value) {
            const date = new Date(value)
            return new Intl.DateTimeFormat('ca').format(date)
        }
    },

    methods: {
        renderNodes() {
            return {
                [BLOCKS.EMBEDDED_ASSET]: customEmbeddedAsset
            }
        }
    }
}
</script>
