<?php
/**
 * Configure group specific discussions settings
 */

$group = elgg_extract('entity', $vars);
if (!($group instanceof ElggGroup) || !$group->canEdit()) {
	return;
}

if (!$group->isToolEnabled('forum')) {
	return;
}

$form_body = elgg_view_field([
	'#type' => 'checkbox',
	'#label' => elgg_echo('discussions_tools:groups:edit:enable_discussion_comment_notifications'),
	'name' => 'enable_discussion_comment_notifications',
	'checked' => $group->getPrivateSetting('enable_discussion_comment_notifications') !== '0',
	'switch' => true,
	'default' => 0,
	'value' => 1,
]);

$form_body .= '<div class="elgg-footer">';
$form_body .= elgg_view('input/hidden', ['name' => 'group_guid', 'value' => $group->guid]);
$form_body .= elgg_view('input/submit', ['value' => elgg_echo('save')]);
$form_body .= '</div>';

$content = elgg_view('input/form', ['action' => 'action/discussions_tools/groups/edit', 'body' => $form_body]);

echo elgg_view_module('info', elgg_echo('collection:object:discussion'), $content);