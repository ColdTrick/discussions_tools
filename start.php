<?php
/**
 * Main file of the plugin
 */

elgg_register_event_handler('init', 'system', 'discussions_tools_init');

/**
 * Called during system init
 *
 * @return void
 */
function discussions_tools_init() {
	
	// register plugin hooks
	elgg_register_plugin_hook_handler('register', 'menu:entity', '\ColdTrick\DiscussionsTools\EntityMenu::discussionStatus');
	elgg_register_plugin_hook_handler('entity:url', 'object', '\ColdTrick\DiscussionsTools\WidgetManager::widgetURL');
	elgg_register_plugin_hook_handler('group_tool_widgets', 'widget_manager', '\ColdTrick\DiscussionsTools\WidgetManager::groupToolWidgets');
	elgg_register_plugin_hook_handler('handlers', 'widgets', '\ColdTrick\DiscussionsTools\Widgets::registerDiscussionWidget');
}
