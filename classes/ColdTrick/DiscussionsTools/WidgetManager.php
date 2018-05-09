<?php

namespace ColdTrick\DiscussionsTools;

class WidgetManager {
	
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
