<?php

/*--------------------------------------------------------*\
	Ajax Modules
\*--------------------------------------------------------*/

$types = ['blog'];

foreach ($types as $ajax) {
	include_once $ajax . '.php';
}
