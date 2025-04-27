<template>
  <div>
    <button @click="toggle" class="p-2 bg-blue-500 text-white w-full text-left">
      {{ isOpen ? "Hide" : "Show" }} Details
    </button>
    <div v-if="isOpen" class="p-4 border border-blue-200 mt-2">
      Here are some expandable details.
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isOpen: false,
    };
  },
  methods: {
    toggle() {
      this.isOpen = !this.isOpen;
    },
  },
};
</script>

<style scoped>
/* Optional scoped styles */
</style>
