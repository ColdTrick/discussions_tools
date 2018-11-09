<?php
/**
 * content of the discussions widget
 */

use Elgg\Database\Clauses\OrderByClause;

/* @var $widget ElggWidget */
$widget = elgg_extract('entity', $vars);

$discussion_count = (int) $widget->discussion_count;
if ($discussion_count < 1) {
	$discussion_count = 5;
}

$options = [
	'type' => 'object',
	'subtype' => 'discussion',
	'limit' => $discussion_count,
	'order_by' => new OrderByClause('e.last_action', 'desc'),
	'pagination' => false,
];

if ($widget->group_only == 'yes') {
	$owner = $widget->getOwnerEntity();
	$groups = $owner->getGroups(['limit' => false]);
	
	if (!empty($groups)) {
		
		$group_guids = [];
		foreach ($groups as $group) {
			$group_guids[] = $group->getGUID();
		}
		$options['container_guids'] = $group_guids;
	}
}

$content = elgg_list_entities($options);
if (empty($content)) {
	$content = elgg_echo('discussion:none');
} else {
	$content .= elgg_format_element('div', ['class' => 'elgg-widget-more'], elgg_view('output/url', [
		'text' => elgg_echo('discussions_tools:widgets:discussion:more'),
		'href' => elgg_generate_url('collection:object:discussion:all'),
		'is_trusted' => true,
	]));
}

// view listing of discussions
echo $content;
