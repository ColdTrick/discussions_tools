<?php

namespace ColdTrick\DiscussionsTools;

use Elgg\WidgetDefinition;

class Widgets {
	
	/**
	 * Register the group_form_topics widget for groups
	 *
	 * @param \Elgg\Hook $hook 'handlers', 'widgets'
	 *
	 * @return void|\Elgg\WidgetDefinition[]
	 */
	public static function registerDiscussionWidget(\Elgg\Hook $hook) {
		
		$context = $hook->getParam('context');
		if ($context !== 'groups') {
			return;
		}
		
		$container = $hook->getParam('container');
		if (!$container instanceof \ElggGroup || !$container->isToolEnabled('forum')) {
			return;
		}
		
		$return_value = $hook->getValue();
		
		$return_value[] = WidgetDefinition::factory([
			'id' => 'group_forum_topics',
			'context' => ['groups'],
		]);
		
		return $return_value;
	}
}
