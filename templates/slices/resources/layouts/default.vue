<script setup lang="ts">
useHead({
	titleTemplate: (title) => `${title || 'Unknown page'} — @@Namespace`,
})
</script>

<template>
	<slot />
</template>
