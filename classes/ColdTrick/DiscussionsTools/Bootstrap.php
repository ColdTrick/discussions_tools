<?php

namespace ColdTrick\DiscussionsTools;

use Elgg\DefaultPluginBootstrap;

class Bootstrap extends DefaultPluginBootstrap {
	
	/**
	 * {@inheritDoc}
	 */
	public function init() {
		
		// plugin hooks
		$hooks = $this->elgg()->hooks;
		$hooks->registerHandler('register', 'menu:entity', __NAMESPACE__ . '\EntityMenu::discussionStatus');
		$hooks->registerHandler('entity:url', 'object', __NAMESPACE__ . '\WidgetManager::widgetURL');
		$hooks->registerHandler('group_tool_widgets', 'widget_manager', __NAMESPACE__ . '\WidgetManager::groupToolWidgets');
		$hooks->registerHandler('handlers', 'widgets', __NAMESPACE__ . '\Widgets::registerDiscussionWidget');
	}
}
