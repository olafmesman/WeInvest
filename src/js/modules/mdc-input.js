import { MDCTextField } from '@material/textfield';

/**
 * @class MdcInputModule
 *
 * @description
 * Adds the MDC initialization to the component
 *
 * @example
 * new MdcInputModule();
 *
 */
export default class MdcInputModule {

	/**
	 * @constructor
	 */
	constructor (input) {
		this.textField = input;
	}

	/**
	 * @description
	 * bootstraps the module ready to run
	 *
	 */
	bootstrap () {
		new MDCTextField(this.textField);
	}
}
