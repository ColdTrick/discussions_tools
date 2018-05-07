<?php

return [
	
	// group tool option descriptions
	'forum:group_tool_option:description' => "Allow the group members to start a discussion in a simple forum format.",

	// discussion status
	'discussions_tools:discussion:confirm:open' => "Are you sure you wish to reopen this topic?",
	'discussions_tools:discussion:confirm:close' => "Are you sure you wish to close this topic?",
	
	// widgets
	// quick start discussion
	'widgets:start_discussion:name' => "Start a discussion",
	'widgets:start_discussion:description' => "Quickly start a discussion is a selected group",
	
	'discussions_tools:widgets:start_discussion:login_required' => "In order to use this widget you need to be logged in",
	'discussions_tools:widgets:start_discussion:membership_required' => "You must be a member of at least one group in order to use this widget. You can find interesting groups %shere%s.",
	'discussions_tools:widgets:start_discussion:not_enabled' => "Non of your groups have discussions enabled.",
	
	'discussions_tools:forms:discussion:quick_start:group' => "Select a group for this discussion",
	'discussions_tools:forms:discussion:quick_start:group:required' => "Please select a group",
	
	// latest discussions (index, dashboard)
	'widgets:discussion:name' => "Latest discussions",
	'widgets:discussion:description' => "Shows the latest discussions",
	'discussions_tools:widgets:discussion:settings:group_only' => "Only show discussions from groups you are member of",
	'discussions_tools:widgets:discussion:more' => "View more discussions",
	
	// latest discussions (group)
	'discussions_tools:widgets:group_forum_topics:description' => "Show the latest discussions",
	
	// actions
	// discussion toggle status
	'discussions_tools:action:discussions:toggle_status:success:open' => "The topic was successfully reopened",
	'discussions_tools:action:discussions:toggle_status:success:close' => "The topic was successfully closed",
];
