<?php

use ColdTrick\DiscussionsTools\Bootstrap;

return [
	'bootstrap' => Bootstrap::class,
	'actions' => [
		'discussions/toggle_status' => [],
		'discussions_tools/groups/edit' => [],
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
