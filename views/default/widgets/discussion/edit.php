<?php
/**
 * widget settings for the discussions widget
 */

/* @var $widget ElggWidget */
$widget = elgg_extract('entity', $vars);

if (elgg_in_context('dashboard')) {
	echo elgg_view_field([
		'#type' => 'select',
		'#label' => elgg_echo('discussions_tools:widgets:discussion:settings:group_only'),
		'name' => 'params[group_only]',
		'value' => $widget->group_only,
		'options_values' => [
			'no' => elgg_echo('option:no'),
			'yes' => elgg_echo('option:yes'),
		],
	]);
}

echo elgg_view('object/widget/edit/num_display', [
	'entity' => $widget,
	'name' => 'discussion_count',
	'default' => 5,
]);
