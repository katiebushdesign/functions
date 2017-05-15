<?php

function childIsActive($children, $id) {
	$activeChild = array_filter($children, function($child) use($id) {
		return $child->object_id == $id;
	});

	return $activeChild;
}