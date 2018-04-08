import { MDCSlider } from '@material/slider';

/**
 * @class MdcSliderModule
 *
 * @description
 * Adds the MDC initialization to the component
 *
 * @example
 * new MdcSliderModule(slider);
 *
 */
export default class MdcSliderModule {

	/**
	 * @constructor
	 */
	constructor (slider) {
		this.slider = slider.querySelector('.mdc-slider');
		this.value = slider.querySelector('.value');

	}

	/**
	 * @description
	 * bootstraps the module ready to run
	 *
	 */
	bootstrap () {
		this.MDCSlider = new MDCSlider(this.slider);
		this.addEventListeners();
	}

	/**
	 * @description
	 * Adds event listeners to the slider component
	 *
	 */
	addEventListeners () {
		this.MDCSlider.listen('MDCSlider:change', () => this.updateValue());
	}

	/**
	 * @description
	 * updates the value of the value field in a slider
	 *
	 */
	updateValue () {
		this.value.innerHTML = this.slider.dataset.type === 'investment' ? this.investmentValues() : this.strengthValues();
	}

	investmentValues () {
		let val;

		switch (this.MDCSlider.value) {
			case (0) :
				val = '$25.000-$50.000';
				break;
			case (1) :
				val = '$50.000-$100.000';
				break;
			case (2) :
				val = '$100.000-$500.000';
				break;
			case (3) :
				val = '$500.000-$1.000.000';
				break;
			case (4) :
				val = '$1.000.000>';
				break;
		}

		return val;
	}

	strengthValues () {
		let val;

		switch (this.MDCSlider.value) {
			case (0) :
				val = 'Very Weak';
				break;
			case (1) :
				val = 'Weak';
				break;
			case (2) :
				val = 'Medium';
				break;
			case (3) :
				val = 'Strong';
				break;
			case (4) :
				val = 'Very Strong';
				break;
		}

		return val;
	}

}
