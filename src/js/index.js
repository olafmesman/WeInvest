import '@babel/polyfill';

import MdcInputModule from './modules/mdc-input';
import MdcSliderModule from './modules/mdc-slider';
import MdcCheckboxModule from './modules/mdc-checkbox';

document.addEventListener('DOMContentLoaded', () => {

	const inputs = document.querySelectorAll('.mdc-text-field');

	for (const input of inputs) {
		const controller = new MdcInputModule(input);
		controller.bootstrap();
	}

	const sliders = document.querySelectorAll('.slider-input-block-container__wrap');

	for (const slider of sliders) {
		const controller = new MdcSliderModule(slider);
		controller.bootstrap();
	}

	const checkboxes = document.querySelectorAll('.mdc-checkbox');

	for (const checkbox of checkboxes) {
		const controller = new MdcCheckboxModule(checkbox);
		controller.bootstrap();
	}

});
