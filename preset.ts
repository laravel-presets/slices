export default definePreset({
	name: 'slices',
	options: {
		// ...
	},
	handler: async() => {
		await extractTemplates()
		// ...
	},
})
