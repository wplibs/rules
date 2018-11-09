<?php

namespace WPLibs\Rules\Operator;

use Ruler\Context;

class Starts_With extends \Ruler\Operator\StartsWith {
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
