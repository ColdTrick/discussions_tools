<?php

$group_selection_options = elgg_extract('groups', $vars);
$group_access_options = elgg_extract('access', $vars);
$selected_group = elgg_extract('container_guid', $vars, ELGG_ENTITIES_ANY_VALUE);

global $quick_start_form_count;
if (empty($quick_start_form_count)) {
	$quick_start_form_count = 1;
} else {
	$quick_start_form_count++;
}

elgg_require_js('discussions_tools/start_discussion');

// show a button to expend the form
echo elgg_view('output/url', [
	'text' => elgg_echo('discussion:add'),
	'icon' => 'plus',
	'href' => "#discussions-tools-discussion-quick-start-wrapper-{$quick_start_form_count}",
	'is_trusted' => true,
	'rel' => 'toggle',
	'class' => 'elgg-button elgg-button-action',
]);

// start the form
$form_data = '';

// group selector
$form_data .= elgg_view_field([
	'#type' => 'select',
	'#label' => elgg_echo('discussions_tools:forms:discussion:quick_start:group'),
	'name' => 'container_guid',
	'options_values' => $group_selection_options,
	'value' => $selected_group,
]);

// hidden group access selector
$form_data .= elgg_view_field([
	'#type' => 'select',
	'#label' => elgg_echo('access'),
	'#class' => 'hidden',
	'name' => 'access_id',
	'options_values' => $group_access_options,
]);

// title
$form_data .= elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('title'),
	'name' => 'title',
	'required' => true,
]);

// description
$form_data .= elgg_view_field([
	'#type' => 'plaintext',
	'#label' => elgg_echo('discussion:topic:description'),
	'name' => 'description',
	'required' => true,
]);

// tags
$form_data .= elgg_view_field([
	'#type' => 'tags',
	'#label' => elgg_echo('tags'),
	'name' => 'tags',
]);

// buttons / footer
$form_data .= elgg_view_field([
	'#type' => 'hidden',
	'name' => 'status',
	'value' => 'open',
]);

$form_data .= elgg_format_element('div', ['class' => 'elgg-foot elgg-form-footer'], elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('save'),
]));

// render wrapper
echo elgg_format_element('div', [
	'id' => "discussions-tools-discussion-quick-start-wrapper-{$quick_start_form_count}",
	'class' => 'hidden',
], $form_data);
