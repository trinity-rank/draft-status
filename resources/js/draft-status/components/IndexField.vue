<template>
    <publish-indicator :published="isPublished" :draft="isDraft" />
</template>

<script>
import PublishIndicator from './PublishIndicator';

export default {
    components: { PublishIndicator },
    props: ['resourceName', 'field'],
    computed: {
        isPublished() {
            return this.field.value == 1;
        },

        isDraft() {
            return this.field.value == 0;
        },
    },
};
</script>
