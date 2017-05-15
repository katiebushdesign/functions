<?php

function isColumnRow($column__size, $columns__int) {
	if (((int)str_replace('column--', '', $column__size) % $columns__int === 0)) {
		return true;
	}

	else {
		return false;
	}
}