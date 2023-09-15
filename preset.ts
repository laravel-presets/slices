/* eslint-disable no-alert */

export default definePreset({
	name: 'slices',
	options: {
		// ...
	},
	handler: async(opts) => {
		await prompt({
			title: 'ask some questions',
			name: 'namespace',
			text: 'What main namespace will be used?',
			default: 'App',
		})

		await applyNestedPreset({
			title: 'install Hybridly',
			preset: 'hybridly/preset',
		})

		await deletePaths({
			title: 'remove useless code',
			paths: ['app', 'tests', 'routes'],
		})

		await extractTemplates({
			title: 'extract templates',
			from: 'slices',
		})

		await editFiles({
			title: 'update composer.json',
			files: 'composer.json',
			operations: [
				{
					type: 'edit-json',
					delete: ['autoload.psr-4', 'autoload.files', 'scripts'],
				},
				{
					type: 'edit-json',
					merge: {
						autoload: {
							'psr-4': {
								[`${opts.prompts.namespace}\\`]: 'src/',
								'Infrastructure\\': 'src/Infrastructure/',
								'Support\\': 'src/Support/',
								'Database\\Seeders\\': 'database/seeders/',
							},
							'files': [
								'src/Support/functions.php',
							],
						},
						scripts: {
							'test': 'pest',
							'dep': 'set -o allexport && source ./.env && set +o allexport && vendor/bin/dep',
							'lint': 'php-cs-fixer fix --allow-risky=yes --dry-run',
							'lint:fix': 'php-cs-fixer fix --allow-risky=yes',
							'post-update-cmd': '@php artisan vendor:publish --tag=laravel-assets --ansi --force',
							'post-root-package-install': "@php -r \"file_exists('.env') || copy('.env.example', '.env');\"",
							'post-create-project-cmd': '@php artisan key:generate --ansi',
							'post-autoload-dump': [
								'Illuminate\\Foundation\\ComposerScripts::postAutoloadDump',
								'@php artisan package:discover --ansi',
								'([ $COMPOSER_DEV_MODE -eq 1 ] && composer autocomplete) || true',
							],
							'autocomplete': [
								'@php artisan ide-helper:eloquent || true',
								'@php artisan ide-helper:generate || true',
								'@php artisan ide-helper:meta || true',
								'@php artisan ide-helper:models -M || true',
							],
						},
					},
				},
			],
		})

		await editFiles({
			title: 'apply project name',
			files: ['resources/**/*.vue', 'src/**/*.php', 'tests/**/*.php', 'bootstrap/app.php'],
			operations: {
				type: 'replace-variables',
				variables: {
					Namespace: opts.prompts.namespace,
				},
			},
		})
	},
})
