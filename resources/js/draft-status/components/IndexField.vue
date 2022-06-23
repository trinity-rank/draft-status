<template>
    <publish-indicator
        :draft="isDraft"
        :scheduled="isScheduled"
        :published="isPublished"
    />
</template>

<script>
import PublishIndicator from './PublishIndicator'

export default {
    components: { PublishIndicator },
    props: ['resourceName', 'field'],

    computed: {
        isDraft() {
            return this.field.value == 0
        },

        isScheduled() {
            let fields
            if (this.field.value == 0) {
                return false
            }

            fields = this.$attrs.resource
                ? this.$attrs.resource.fields
                : this.$parent.$children[0].resource.fields

            for (const i in fields) {
                if (fields[i].attribute == 'publish_at') {
                    var publish_at = this.$attrs.resource
                        ? new Date(fields[i].value + ' GMT').getTime()
                        : new Date(fields[i].value).getTime()

                    var date = new Date().getTime()

                    if (publish_at > date) {
                        this.field.value = 2
                        return true
                    }
                    return false
                }
            }

            return true
        },

        isPublished() {
            return this.field.value == 1
        }
    }
}
</script>
