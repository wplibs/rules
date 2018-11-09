<?php

use Ruler\Context;
use Ruler\Variable;
use WPLibs\Rules\Operator\Greater_Than_Or_Equal;

class GreaterThanOrEqualTest extends \WP_UnitTestCase {

	public function testInterface() {
		$varA = new Variable( 'a', 1 );
		$varB = new Variable( 'b', 2 );

		$op = new Greater_Than_Or_Equal( $varA, $varB );
		$this->assertInstanceOf( 'Ruler\Proposition', $op );
	}

	public function testConstructorAndEvaluation() {
		$varA    = new Variable( 'a', 1 );
		$varB    = new Variable( 'b', 2 );
		$context = new Context();

		$op = new Greater_Than_Or_Equal( $varA, $varB );
		$this->assertFalse( $op->evaluate( $context ) );

		$context['a'] = 2;
		$this->assertTrue( $op->evaluate( $context ) );

		$context['a'] = 3;
		$context['b'] = function () {
			return 3;
		};
		$this->assertTrue( $op->evaluate( $context ) );

		$context['4'] = 3;
		$this->assertTrue( $op->evaluate( $context ) );
	}
}
