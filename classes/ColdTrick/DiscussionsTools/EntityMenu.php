<?php

namespace ColdTrick\DiscussionsTools;

class EntityMenu {
	
	/**
	 * Add quick status change items
	 *
	 * @param \Elgg\Hook $hook 'register', 'menu:entity'
	 *
	 * @return void|\ElggMenuItem[]
	 */
	public static function discussionStatus(\Elgg\Hook $hook) {
		
		$entity = $hook->getEntityParam();
		if (!$entity instanceof \ElggDiscussion || !$entity->canEdit()) {
			return;
		}
		
		$return_value = $hook->getValue();
		
		// add menu items
		$return_value[] = \ElggMenuItem::factory([
			'name' => 'status_change_open',
			'text' => elgg_echo('open'),
			'icon' => 'unlock',
			'confirm' => elgg_echo('discussions_tools:discussion:confirm:open'),
			'href' => elgg_generate_action_url('discussions/toggle_status', [
				'guid' => $entity->guid,
			]),
			'priority' => 200,
			'item_class' => ($entity->status === 'closed') ? '' : 'hidden',
			'data-toggle' => 'status-change-close',
		]);
		$return_value[] = \ElggMenuItem::factory([
			'name' => 'status_change_close',
			'text' => elgg_echo('close'),
			'icon' => 'lock',
			'confirm' => elgg_echo('discussions_tools:discussion:confirm:close'),
			'href' => elgg_generate_action_url('discussions/toggle_status', [
				'guid' => $entity->guid,
			]),
			'priority' => 201,
			'item_class' => ($entity->status === 'closed') ? 'hidden' : '',
			'data-toggle' => 'status-change-open',
		]);
		
		return $return_value;
	}
}
