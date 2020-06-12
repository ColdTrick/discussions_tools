<?php
/**
 * Save group discussion tools settings
 */

$group_guid = (int) get_input('group_guid');

if (empty($group_guid)) {
	return elgg_error_response(elgg_echo('error:missing_data'));
}

elgg_entity_gatekeeper($group_guid, 'group');
$group = get_entity($group_guid);
if (!$group->canEdit()) {
	return elgg_error_response(elgg_echo('actionunauthorized'));
}

$group->setPrivateSetting('enable_discussion_comment_notifications', (int) get_input('enable_discussion_comment_notifications'));

return elgg_ok_response('', elgg_echo('save:success'), $group->getURL());
