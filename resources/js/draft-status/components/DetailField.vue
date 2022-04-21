<template>
    <panel-item :field="field">
        <template slot="value">
            <publish-indicator :draft="isDraft" :scheduled="isScheduled" :published="isPublished" />
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
        isDraft() {
            return this.field.value == 0;
        },

        isScheduled() {
            if(this.field.value == 0) {
                return false; 
            }
            
            for( const i in this.$attrs.resource.fields ){
                if( this.$attrs.resource.fields[i].attribute == "publish_at" ) {
                    var publish_at = new Date(this.$attrs.resource.fields[i].value + " GMT").getTime();
                    var date = new Date().getTime();

                    if(publish_at > date) {
                        this.field.value = 2;
                        return true;
                    }
                }
            }
            
            return false;
        },

        isPublished() {
            return this.field.value == 1;
        },
    },
};
</script>
