<?php
/**
 * Auxiliary code samples from the Genesis Customizer Class Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// TYPE DECLARATIONS.
$foo = 'bar';

$foo = 1;

$foo = '1';

if ( 1 === $foo ) {
	echo 'Yay, it is the same value with the same type';
}

$foo = '1';

if ( 1 === (int) $foo ) {
	echo 'Type casting for the win!';
}

/**
 * Outputs "I am the one!" if 1 otherwise "I am not the one :(".
 *
 * @param int $maybe_one An integer that might be the number 1.
 */
function only_int( int $maybe_one ) {
	if ( 1 === $maybe_one ) {
		echo 'I am the one!';
	} else {
		echo 'I am not the one :(';
	}
}

// This will echo "I am the one!".
only_int( 1 );

// This will echo "I am not the one :(".
only_int( 2 );

// This will throw an error.
only_int( '1' );
