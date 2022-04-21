<template>
  <div>
    <span v-if="published" class="badge badge-success">PUBLISHED</span>
    <span v-if="draft" class="badge badge-primary">DRAFT</span>
    <span v-if="scheduled" class="badge badge-warning">SCHEDULED</span>
  </div>
</template>

<script>
export default {
  props: ['published', 'draft', 'scheduled'],
};
</script>

<style scoped>
.badge {
  display: inline-block;
  padding: 0.25em 0.4em;
  font-size: 75%;
  font-weight: 700;
  line-height: 1;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: 0.25rem;
  position: relative;
  bottom: 1px;
}

.badge.badge-primary {
  background-color: var(--primary);
  color: var(--white);
}

.badge.badge-success {
  background-color: var(--success);
  color: var(--white);
}

.badge.badge-warning {
  background-color: #d97706;
  color: var(--white);
}
</style>
