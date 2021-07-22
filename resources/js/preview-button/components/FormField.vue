<template>
    <div>
        <button
            ref="createNovaDraftButton"
            type="button"
            class="ml-3 btn btn-default btn-primary"
            id="create-draft-button"
            v-on:click="createDraft"
            v-if="!field.isDraft"
        >
            Preview
        </button>

        <input name="draft" type="hidden" v-value="draft"/>

    </div>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova';

export default {
    mixins: [FormField, HandlesValidationErrors],
    props: ['resource', 'resourceId', 'field'],

    data() {
        return {
            isDraft: false,
            draft: false,
            postId: this.resourceId,
            name: this.field.name
        };
    },
    fill(formData) {
        formData.append(this.field.attribute, this.value || '')
    },
    mounted() {
        if (!this.field.isDraft) {
            const positionDraftButton = this.actionButton.parentNode.querySelector('[id=create-draft-button]');
            if (positionDraftButton && positionDraftButton !== this.$refs.createNovaDraftButton) {
                this.actionButton.parentNode.removeChild(positionDraftButton);
            }
            this.actionButton.parentNode.append(this.$refs.createNovaDraftButton);
        }
    },

    methods: {
        fill(formData) {
            if (this.draft) {
                formData.append(this.field.attribute, this.draft);
            }
        },

        createDraft() {
            if( this.actionButton.getAttribute("dusk") == "create-button" ) {
                console.log("create")
            }
            else {
                console.log("update")




                var form_elements = document.forms[0].elements
                for(var i in form_elements) {
                    console.log( form_elements[i].value );
                }



            }
            this.draft = Date.now();
            this.$nextTick(() => {
                // this.actionButton.click();
                this.previewLink();
                this.draft = null;
            });
        },

        previewLink() {
            var previewLink = document
                .querySelector('.content')
                .querySelector(`[dusk="slug"]`)
                .closest('.flex')
                .querySelector('a')
                .href;
            
            // window.open(previewLink + '/preview','_blank');
        }
    },

    computed: {
        actionButton() {
            return document
                .querySelector('.content')
                .querySelector(`[dusk="${!!this.resourceId ? 'update-button' : 'create-button'}"]`);
        }
    },

};
</script>
