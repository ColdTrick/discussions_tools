<?php

namespace ColdTrick\DiscussionsTools;

use Elgg\DefaultPluginBootstrap;

class Bootstrap extends DefaultPluginBootstrap {
	
	/**
	 * {@inheritDoc}
	 */
	public function init() {
		
		elgg_extend_view('groups/edit', 'discussions_tools/groups/edit');
		
		// plugin hooks
		$hooks = $this->elgg()->hooks;
		
		$hooks->registerHandler('check_discussions_subscription', 'content_subscriptions', __NAMESPACE__ . '\Notifications::checkDiscussionsNotificationsLogic');
		$hooks->registerHandler('entity:url', 'object', __NAMESPACE__ . '\WidgetManager::widgetURL');
		$hooks->registerHandler('get', 'subscriptions', __NAMESPACE__ . '\Notifications::getDiscussionCommentSubscribers');
		$hooks->registerHandler('group_tool_widgets', 'widget_manager', __NAMESPACE__ . '\WidgetManager::groupToolWidgets');
		$hooks->registerHandler('handlers', 'widgets', __NAMESPACE__ . '\Widgets::registerDiscussionWidget');
		$hooks->registerHandler('register', 'menu:entity', __NAMESPACE__ . '\EntityMenu::discussionStatus');
	}
	
	public function ready() {
		// we use a custom hook to check if this is needed
		elgg_unregister_plugin_hook_handler('get', 'subscriptions', 'discussion_get_subscriptions');
	}
}
