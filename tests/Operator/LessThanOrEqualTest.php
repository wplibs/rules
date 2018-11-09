<?php

use Ruler\Context;
use Ruler\Variable;
use WPLibs\Rules\Operator\Less_Than_Or_Equal;

class LessThanOrEqualTest extends \WP_UnitTestCase {

	public function testInterface() {
		$op = new Less_Than_Or_Equal( new Variable( 'a', 1 ), new Variable( 'b', 2 ) );
		$this->assertInstanceOf( 'Ruler\Proposition', $op );
	}

	public function testConstructorAndEvaluation() {
		$context = new Context();

		$op = new Less_Than_Or_Equal( new Variable( 'a', 1 ), new Variable( 'b', 2 ) );
		$this->assertTrue( $op->evaluate( $context ) );

		$context['a'] = 2;
		$this->assertTrue( $op->evaluate( $context ) );

		$context['a'] = 3;
		$context['b'] = function () {
			return 3;
		};
		$this->assertTrue( $op->evaluate( $context ) );

		$context['a'] = 2;
		$this->assertTrue( $op->evaluate( $context ) );
	}
}
