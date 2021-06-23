<?php

namespace ColdTrick\DiscussionsTools\Plugins;

class WidgetManager {
	
	/**
	 * Add or remove widgets based on the group tool option
	 *
	 * @param \Elgg\Hook $hook 'group_tool_widgets', 'widget_manager'
	 *
	 * @return void|array
	 */
	public static function groupToolWidgets(\Elgg\Hook $hook) {
		
		$entity = $hook->getEntityParam();
		if (!$entity instanceof \ElggGroup) {
			return;
		}
		
		$return_value = $hook->getValue();
		if (!is_array($return_value)) {
			return;
		}
		
		// check different group tools for which we supply widgets
		if ($entity->isToolEnabled('forum')) {
			$return_value['enable'][] = 'group_forum_topics';
		} else {
			$return_value['disable'][] = 'group_forum_topics';
			$return_value['disable'][] = 'start_discussion';
		}
		
		return $return_value;
	}
}
