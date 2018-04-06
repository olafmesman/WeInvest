import { MDCTextField } from '@material/button';

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
export default class MdcButtonModule {

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
