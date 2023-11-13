import { defineConfig } from 'vite'
import { resolve } from 'path'

export default defineConfig({
	root: '',
	base: '/build/',
	build: {
		outDir: resolve('./build'),
		emptyOutDir: true,
		manifest: true,
		target: 'es2018',
		rollupOptions: {
			input: {
				main: resolve('./assets/js/index.js'),
				styles: resolve('./assets/scss/index.scss'),
			},
		},
		minify: true,
		write: true
	},

	server: {
		cors: true,
		strictPort: true,
		port: 3000,
		https: false,
		hmr: {
			host: 'localhost',
		},
	},
})