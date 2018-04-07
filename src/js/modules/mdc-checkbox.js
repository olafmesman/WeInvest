import { MDCCheckbox } from '@material/checkbox';

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
export default class MdcCheckboxModule {

	/**
	 * @constructor
	 */
	constructor (checkbox) {
		this.checkbox = checkbox;
	}

	/**
	 * @description
	 * bootstraps the module ready to run
	 *
	 */
	bootstrap () {
		new MDCCheckbox(this.checkbox);
	}
}
