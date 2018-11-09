<?php
/**
 * content of the discussions widget
 */

use Elgg\Database\Clauses\OrderByClause;

/* @var $widget ElggWidget */
$widget = elgg_extract('entity', $vars);
$group = $widget->getOwnerEntity();
	
$topic_count = (int) $widget->topic_count;
if ($topic_count < 1) {
	$topic_count = 4;
}

// show discussion listing
$content = elgg_list_entities([
	'type' => 'object',
	'subtype' => 'discussion',
	'container_guid' => $group->guid,
	'order_by' => new OrderByClause('e.last_action', 'desc'),
	'limit' => $topic_count,
	'pagination' => false,
]);
if (empty($content)) {
	$content = elgg_echo('discussion:none');
} else {
	$content .= elgg_format_element('div', ['class' => 'elgg-widget-more'], elgg_view('output/url', [
		'text' => elgg_echo('discussions_tools:widgets:discussion:more'),
		'href' => elgg_generate_url('collection:object:discussion:group', [
			'guid' => $group->guid,
		]),
		'is_trusted' => true,
	]));
}

echo $content;
