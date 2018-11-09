<?php

namespace WPLibs\Rules\Operator;

use Ruler\Context;

class String_Does_Not_Contain extends \Ruler\Operator\StringDoesNotContain {
	/**
	 * Evaluate the operands.
	 *
	 * @param  Context $context Context with which to evaluate this Proposition.
	 * @return boolean
	 */
	public function evaluate( Context $context ) {
		return parent::evaluate( $context );
	}
}
