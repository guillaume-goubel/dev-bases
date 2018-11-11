<?php

$fields = [
	['name' => 'title'],
	['name' => 'description'],
	['name' => 'age'],
	['name' => 'category', 'type' => 'select', 'options' => ['A', 'B', 'C', 'D']],
];

foreach ($fields as $field) {
	
	if (!isset($field['type']) || 'input' === $field['type']) {
		echo '<label>'.$field['name'].'</label>';
		echo '<input type="text" name="'.$field['name'].'">';
		continue;
	}

	if ('select' === $field['type']) {
		echo '<label>'.$field['name'].'</label>';
		echo '<select name="'.$field['name'].'">';
		foreach ($field['options'] as $option) {
			echo '<option>'.$option.'</option>';
		}
		echo '</select>';
		continue;
	}

}
