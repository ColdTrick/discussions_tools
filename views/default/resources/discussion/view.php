<?php
/**
 * ColdTrick
 * - added icon before title to show discussion status (closed)
 */

$guid = elgg_extract('guid', $vars);

elgg_entity_gatekeeper($guid, 'object', 'discussion');

$topic = get_entity($guid);

elgg_push_entity_breadcrumbs($topic, false);

$content = elgg_view_entity($topic, [
	'full_view' => true,
	'show_responses' => true,
]);

$title = '';
if ($topic->status === 'closed') {
	$title .= elgg_format_element('span', [
		'title' => elgg_echo('discussion:topic:closed:title'),
		'class' => 'mrs',
	], elgg_view_icon('lock-closed'));
}
$title .= $topic->getDisplayName();

$params = [
	'content' => $content,
	'title' => $title,
	'sidebar' => elgg_view('discussion/sidebar'),
	'filter' => '',
];
$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);
