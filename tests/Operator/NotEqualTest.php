<?php

use Ruler\Context;
use Ruler\Variable;
use WPLibs\Rules\Operator\Not_Equal;

class NotEqualTest extends \WP_UnitTestCase {

	public function testInterface() {
		$varA = new Variable( 'a', 1 );
		$varB = new Variable( 'b', 2 );

		$op = new Not_Equal( $varA, $varB );
		$this->assertInstanceOf( 'Ruler\Proposition', $op );
	}

	public function testConstructorAndEvaluation() {
		$varA    = new Variable( 'a', 1 );
		$varB    = new Variable( 'b', 2 );
		$context = new Context();

		$op = new Not_Equal( $varA, $varB );
		$this->assertTrue( $op->evaluate( $context ) );

		$context['a'] = 2;
		$this->assertFalse( $op->evaluate( $context ) );

		$context['a'] = 3;
		$context['b'] = function () {
			return 3;
		};
		$this->assertFalse( $op->evaluate( $context ) );

		// String
		$context['a'] = 'same';
		$context['b'] = 'same';
		$this->assertFalse( $op->evaluate( $context ) );

		$context['a'] = 'same';
		$context['b'] = 'sAme';
		$this->assertTrue( $op->evaluate( $context ) );

		// Number
		$context['a'] = 0;
		$context['b'] = '0';
		$this->assertFalse( $op->evaluate( $context ) );

		// Boolean
		$context['a'] = false;
		$context['b'] = 0;
		$this->assertFalse( $op->evaluate( $context ) );

		$context['a'] = true;
		$context['b'] = 1;
		$this->assertFalse( $op->evaluate( $context ) );

		$context['a'] = false;
		$context['b'] = 1;
		$this->assertTrue( $op->evaluate( $context ) );
	}
}
