<script setup lang="ts">
useHead({ title: 'Homepage' })

const version = useProperty('version')
</script>

<template layout>
	<section class="h-full w-full grid place-items-center">
		<div class="flex flex-col items-center">
			<p class="text-2xl text-gray-400 mb-1">Welcome to <span class="font-medium text-gray-200">Vertical Slices Laravel</span></p>
			<span class="text-gray-600 tracking-widest">PHP {{ version }}</span>
		</div>
	</section>
</template>
