<?php

namespace ColdTrick\DiscussionsTools;

use Elgg\WidgetDefinition;

class Widgets {
	
	/**
	 * Set the title URL for the discussions_tools widgets
	 *
	 * @param \Elgg\Hook $hook 'entity:url', 'object'
	 *
	 * @return void|string
	 */
	public static function widgetURL(\Elgg\Hook $hook) {
		
		$return_value = $hook->getValue();
		if (!empty($return_value)) {
			// someone already set an url
			return;
		}
		
		$widget = $hook->getEntityParam();
		if (!$widget instanceof \ElggWidget) {
			return;
		}
		
		switch ($widget->handler) {
			case 'start_discussion':
				$owner = $widget->getOwnerEntity();
				if ($owner instanceof \ElggGroup) {
					$return_value = elgg_generate_url('add:object:discussion', [
						'guid' => $owner->guid,
					]);
				}
				break;
			case 'discussion':
				$return_value = elgg_generate_url('collection:object:discussion:all');
				break;
			case 'group_forum_topics':
				$page_owner = elgg_get_page_owner_entity();
				if ($page_owner instanceof \ElggGroup) {
					$return_value = elgg_generate_url('collection:object:discussion:group', [
						'guid' => $page_owner->guid,
					]);
				}
				break;
		}
		
		return $return_value;
	}
	
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
