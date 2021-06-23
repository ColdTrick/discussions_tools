<?php
/**
 * Configure group specific discussions settings
 */

$group = elgg_extract('entity', $vars);

$checked = true;
if ($group instanceof ElggGroup) {
	$checked = (bool) $group->getPluginSetting('discussions_tools', 'enable_discussion_comment_notifications', true);
}

$content = elgg_view_field([
	'#type' => 'checkbox',
	'#label' => elgg_echo('discussions_tools:groups:edit:enable_discussion_comment_notifications'),
	'name' => 'settings[discussions_tools][enable_discussion_comment_notifications]',
	'checked' => $checked,
	'switch' => true,
	'default' => 0,
	'value' => 1,
]);

echo elgg_view_module('info', elgg_echo('collection:object:discussion'), $content);
