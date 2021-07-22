Nova.booting((Vue, router, store) => {
  Vue.component('index-draft-status', require('./draft-status/components/IndexField'))
  Vue.component('detail-draft-status', require('./draft-status/components/DetailField'))
  Vue.component('form-draft-status', require('./draft-status/components/FormField'))
  Vue.component('form-preview-button', require('./preview-button/components/FormField'))
})
