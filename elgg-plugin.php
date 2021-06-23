<?php

use ColdTrick\DiscussionsTools\Upgrades\MigrateDiscussionGroupSettings;

return [
	'plugin' => [
		'version' => '4.2',
		'dependencies' => [
			'discussions' => [
				'position' => 'after',
			],
		],
	],
	'hooks' => [
		'entity:url' => [
			'object' => [
				'ColdTrick\DiscussionsTools\Widgets::widgetURL' => [],
			],
		],
		'get' => [
			'subscriptions' => [
				'ColdTrick\DiscussionsTools\Notifications::getDiscussionCommentSubscribers' => [],
				'Elgg\Discussions\Notifications::addGroupSubscribersToCommentOnDiscussionSubscriptions' => ['unregister' => true],
			],
		],
		'group_tool_widgets' => [
			'widget_manager' => [
				'ColdTrick\DiscussionsTools\Plugins\WidgetManager::groupToolWidgets' => [],
			],
		],
		'handlers' => [
			'widgets' => [
				'ColdTrick\DiscussionsTools\Widgets::registerDiscussionWidget' => [],
			],
		],
	],
	'upgrades' => [
		MigrateDiscussionGroupSettings::class,
	],
	'view_extensions' => [
		'groups/edit/settings' => [
			'discussions_tools/groups/settings' => [],
		],
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
