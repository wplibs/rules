<?php

use Ruler\Context;
use Ruler\Variable;
use WPLibs\Rules\Operator\Greater_Than;

class GreaterThanTest extends \WP_UnitTestCase {

	public function testInterface() {
		$varA = new Variable( 'a', 1 );
		$varB = new Variable( 'b', 2 );

		$op = new Greater_Than( $varA, $varB );
		$this->assertInstanceOf( 'Ruler\Proposition', $op );
	}

	public function testConstructorAndEvaluation() {
		$varA    = new Variable( 'a', 1 );
		$varB    = new Variable( 'b', 2 );
		$context = new Context();

		$op = new Greater_Than( $varA, $varB );
		$this->assertFalse( $op->evaluate( $context ) );

		$context['a'] = 2;
		$this->assertFalse( $op->evaluate( $context ) );

		$context['a'] = 3;
		$context['b'] = function () {
			return 0;
		};
		$this->assertTrue( $op->evaluate( $context ) );
	}
}
