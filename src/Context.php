<?php

namespace WPLibs\Rules;

class Context extends \Ruler\Context {
	/**
	 * Create new context.
	 *
	 * @param  array $values The context values.
	 * @return static
	 */
	public static function create( $values ) {
		return new static( $values );
	}
}
