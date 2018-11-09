<?php

namespace WPLibs\Rules\Operator;

use Ruler\Context;
use Ruler\Proposition;
use Ruler\Operator\VariableOperator;

class Is_Empty extends VariableOperator implements Proposition {
	/**
	 * Evaluate the operands.
	 *
	 * @param  Context $context Context with which to evaluate this Proposition.
	 * @return boolean
	 */
	public function evaluate( Context $context ) {
		/* @var \Ruler\Variable $left */
		list( $left ) = $this->getOperands();

		$value = $left->prepareValue( $context )->getValue();

		if ( is_null( $value ) ) {
			return true;
		}

		if ( is_string( $value ) ) {
			return trim( $value ) === '';
		}

		if ( $value instanceof \Countable ) {
			return count( $value ) === 0;
		}

		return empty( $value );
	}

	/**
	 * Gets the operand cardinality.
	 *
	 * @return string
	 */
	protected function getOperandCardinality() {
		return static::UNARY;
	}
}
