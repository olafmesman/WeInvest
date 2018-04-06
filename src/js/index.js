import '@babel/polyfill';

import MdcInputModule from './modules/mdc-input';
import ExampleModule from './modules/example';

document.addEventListener('DOMContentLoaded', () => {

	if (document.querySelector('body')) {
		new ExampleModule();
	}

	const inputs = document.querySelectorAll('.mdc-text-field');

	for (const input of inputs) {
		const controller = new MdcInputModule(input);
		controller.bootstrap();
	}

});
