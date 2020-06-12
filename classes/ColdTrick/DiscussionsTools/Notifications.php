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
		
		if ($container->getPrivateSetting('enable_discussion_comment_notifications') === '0') {
			return;
		}
		
		return discussion_get_subscriptions($hook);
	}
	
	/**
	 * Check the content subscription logic for discussions
	 *
	 * @param \Elgg\Hook $hook 'check_discussions_subscription', 'content_subscriptions'
	 *
	 * @return void|array
	 */
	public static function checkDiscussionsNotificationsLogic(\Elgg\Hook $hook) {
		
		$discussion = $hook->getEntityParam();
		if (!$discussion instanceof \ElggDiscussion) {
			return;
		}
		
		$group = $discussion->getContainerEntity();
		if (!$group instanceof \ElggGroup) {
			return;
		}
		
		if ($group->getPrivateSetting('enable_discussion_comment_notifications') === '0') {
			return false;
		}
	}
}
