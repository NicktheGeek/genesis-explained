<?php
/**
 * Auxiliary code samples from the Genesis Filters with Arrays Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// WHAT IS AN ARRAY?
$array_1      = array(
	'key1' => 'value1',
	'key2' => 'value2',
);
$array_2      = array( 'value1', 'value2' );
$array_2[]    = 'value3';
$array_2['3'] = 'value4';

$array_3 = [
	'value1',
	'value2',
];

$array_4   = [];
$array_4[] = 'value1';

$array_1 = array(
	'odd'  => array( 1, 3, 5 ),
	'even' => array( 2, 4, 6 ),
);

// ADDING TO AN ARRAY.
