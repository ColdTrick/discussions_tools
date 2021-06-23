<?php

namespace ColdTrick\DiscussionsTools;

class Notifications {
	
	/**
	 * Check if the group subscribers should be added to the comment notification recipients
	 *
	 * @param \Elgg\Hook $hook 'get', 'subscriptions'
	 *
	 * @return void|array
	 */
	public static function getDiscussionCommentSubscribers(\Elgg\Hook $hook) {
		
		$event = $hook->getParam('event');
		if (!$event instanceof \Elgg\Notifications\SubscriptionNotificationEvent) {
			return;
		}
		
		if ($event->getAction() !== 'create') {
			return;
		}
		
		$comment = $event->getObject();
		if (!$comment instanceof \ElggComment) {
			return;
		}
		
		$discussion = $comment->getContainerEntity();
		if (!$discussion instanceof \ElggDiscussion) {
			return;
		}
		
		$container = $discussion->getContainerEntity();
		if (!$container instanceof \ElggGroup) {
			return;
		}
		
		if (!(bool) $container->getPluginSetting('discussions_tools', 'enable_discussion_comment_notifications', true)) {
			return;
		}
		
		return \Elgg\Discussions\Notifications::addGroupSubscribersToCommentOnDiscussionSubscriptions($hook);
	}
}
