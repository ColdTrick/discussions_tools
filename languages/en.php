<?php

return [
	
	// group tool option descriptions
	'forum:group_tool_option:description' => "Allow the group members to start a discussion in a simple forum format.",

	// widgets
	// quick start discussion
	'widgets:start_discussion:name' => "Start a discussion",
	'widgets:start_discussion:description' => "Quickly start a discussion is a selected group",
	
	'discussions_tools:widgets:start_discussion:login_required' => "In order to use this widget you need to be logged in",
	'discussions_tools:widgets:start_discussion:membership_required' => "You must be a member of at least one group in order to use this widget. You can find interesting groups %shere%s.",
	'discussions_tools:widgets:start_discussion:not_enabled' => "Non of your groups have discussions enabled.",
	
	'discussions_tools:forms:discussion:quick_start:group' => "Select a group for this discussion",
	'discussions_tools:forms:discussion:quick_start:group:required' => "Please select a group",
	
	// groups setting
	'discussions_tools:groups:edit:enable_discussion_comment_notifications' => "Send group members notifications about discussion replies",
	
	// latest discussions (index, dashboard)
	'widgets:discussion:name' => "Latest discussions",
	'widgets:discussion:description' => "Shows the latest discussions",
	'discussions_tools:widgets:discussion:settings:group_only' => "Only show discussions from groups you are member of",
	'discussions_tools:widgets:discussion:more' => "View more discussions",
	
	// latest discussions (group)
	'widgets:group_forum_topics:name' => "Discussions",
	'widgets:group_forum_topics:description' => "Show the latest discussions",
	
	// Upgrades
	'discussions_tools:upgrade:2021062301:title' => "Migrate group discussion notification settings",
	'discussions_tools:upgrade:2021062301:description' => "The discussion notification settings need to be stored in a new location",
];
