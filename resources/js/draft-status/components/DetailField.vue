<template>
    <panel-item :field="field">
        <template slot="value">
            <publish-indicator :published="isPublished" :draft="isDraft" />
        </template>
    </panel-item>
</template>

<script>

import PublishIndicator from './PublishIndicator';

export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],

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
