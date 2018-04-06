import '@babel/polyfill';

import MdcInputModule from './modules/mdc-input';
//import MdcButtonModule from './modules/mdc-button';
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
	//
	//const buttons = document.querySelectorAll('.mdc-button');
	//
	//for (const button of buttons) {
	//	const controller = new MdcButtonModule(button);
	//	controller.bootstrap();
	//}

});
