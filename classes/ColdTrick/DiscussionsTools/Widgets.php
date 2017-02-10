<?php

namespace ColdTrick\DiscussionsTools;

use Elgg\WidgetDefinition;

class Widgets {
	
	/**
	 * Register the group_form_topics widget for groups
	 *
	 * @param string                   $hook         the name of the hook
	 * @param string                   $type         the type of the hook
	 * @param \Elgg\WidgetDefinition[] $return_value current return value
	 * @param array                    $params       supplied params
	 *
	 * @return void|\Elgg\WidgetDefinition[]
	 */
	public static function registerDiscussionWidget($hook, $type, $return_value, $params) {
		
		if (elgg_extract('context', $params) !== 'groups') {
			return;
		}
		
		$container = elgg_extract('container', $params);
		if (($container instanceof \ElggGroup) && ($container->forum_enable === 'no')) {
			return;
		}
		
		$return_value[] = WidgetDefinition::factory([
			'id' => 'group_forum_topics',
			'name' => elgg_echo('discussion:group'),
			'description' => elgg_echo('discussions_tools:widgets:group_forum_topics:description'),
			'context' => ['groups'],
		]);
		
		return $return_value;
	}
}
