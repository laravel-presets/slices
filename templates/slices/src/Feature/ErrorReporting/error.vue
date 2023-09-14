<script setup lang="ts">
const $props = defineProps<{
	status: number
	eventId: string
}>()

const title = computed(() => match($props.status, {
	404: 'Page not found.',
	403: 'Forbidden.',
	401: 'Unauthorized.',
	500: 'Oops.',
	503: 'Maintenance in progress',
	default: 'Oops.',
}))

const description = computed(() => match($props.status, {
	503: 'Please check back soon.',
	404: 'Sorry, the page you are looking for could not be found.',
	403: 'Sorry, you are forbidden from accessing this page.',
	401: 'Sorry, you are not authorized to access this page.',
	500: 'Sorry, something happened. Try again later.',
	default: 'Sorry, something happened. Try again later.',
}))

const canGoBackHome = computed(() => ![503].includes($props.status))

// In case of server error, the page refreshes every 2 minutes,
// so we can avoid being stuck on the oops page for a day.
if ([503, 500].includes($props.status)) {
	useIntervalFn(() => router.reload(), 60 * 1000)
}

useHead({
	title: () => title.value.replace(/\.$/, ''),
})

const { copied, copy } = useClipboard({ copiedDuring: 2500 })
const showEventId = computed(() => $props.eventId && [503, 500].includes($props.status))
</script>

<template layout="default">
	<div class="h-dynamic flex flex-col bg-jetfly-cream-200 pb-12 pt-16">
		<main class="mx-auto flex w-full max-w-7xl grow flex-col justify-center px-4 sm:px-6 lg:px-8">
			<div class="pb-16 pt-10">
				<div class="text-center">
					<p class="text-lg font-semibold uppercase tracking-wide text-jetfly-taupe-500" v-text="status" />
					<h1 v-if="title" class="mt-2 text-4xl font-extrabold tracking-tight text-jetfly-black sm:text-5xl" v-text="title" />
					<p v-if="description" class="mt-2 text-lg text-jetfly-grey-500" v-text="description" />
					<div class="mt-12 flex items-center justify-center">
						<router-link
							v-if="canGoBackHome"
							class="group inline-flex items-center gap-x-2 px-4"
							:href="route('index')"
						>
							<i-heroicons-arrow-left-20-solid class="h-4 w-4 transition group-hover:-translate-x-1" />
							Go back home
						</router-link>
					</div>
				</div>
			</div>
			<!-- Event ID -->
			<div v-if="showEventId" class="text-jetfly-gray/50 absolute inset-x-0 bottom-10 mt-2 flex flex-col items-center justify-center text-sm">
				<div>Share this code with us: </div>
				<button class="font-medium" @click="copy(eventId)" v-text="eventId" />
			</div>
		</main>
	</div>
</template>

<style lang="postcss">
html, body, #app {
	@apply h-full;
}
</style>
