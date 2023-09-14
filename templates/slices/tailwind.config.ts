import { type Config } from 'tailwindcss'
import forms from '@tailwindcss/forms'

export default {
	content: [
		'./resources/**/*.blade.php',
		'./{resources,src}/**/*.{ts,vue}',
	],
	theme: {
		extend: {},
	},
	plugins: [
		forms,
	],
} satisfies Config
