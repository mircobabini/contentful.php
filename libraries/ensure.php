<?php
/*!
 * Ensure Test Suite
 *
 * Copyright 2013, Mirco Babini <mirkolofio@gmail.com>
 * Licensed under the GPL Version 2 license.
 * http://www.opensource.org/licenses/GPL-2.0
 * 
 * 0.0.1
 */

/**
 * @param bool|mixed $if
 * @param string|function $then
 * @param string|function $else
 * @param bool $elsedie
 * @return bool
 */
function ensure ($if, $then = '', $else = '', $elsedie = false) {
	$bt = debug_backtrace ();
	$verbose = "{$bt[0]['file']}:{$bt[0]['line']}";

	if (!!$if) {
		if (is_string ($then)) {
			if ($then !== false) {
				echo "OK - $verbose $then" . PHP_EOL;
			}
		} else {
			$then ();
		}
		
		return true;
	} else {
		if (is_string ($else)) {
			if ($else !== false) {
				echo "ERROR - $verbose $else" . PHP_EOL;
			}
		} else {
			$else ();
		}
		
		if ($elsedie) {
			die;
		} else {
			return false;
		}
	}
}
/**
 * @param bool|mixed $if
 * @param string|function $then
 * @param string|function $else
 * @param bool $elsedie
 * @return bool
 */
function ensure_not ($if, $then = 'OK', $else = 'ERROR', $elsedie = false) {
	return ensure (!$if);
}
