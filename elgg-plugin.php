<?php

return [
	'actions' => [
		'discussions/toggle_status' => [],
	],
	'widgets' => [
		'start_discussion' => [
			'context' => ['index', 'dashboard', 'groups'],
		],
		'discussion' => [
			'context' => ['index', 'dashboard'],
			'multiple' => true,
		],
	],
];
