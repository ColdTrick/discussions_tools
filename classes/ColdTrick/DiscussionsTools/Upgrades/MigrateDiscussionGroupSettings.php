<?php

namespace ColdTrick\DiscussionsTools\Upgrades;

use Elgg\Upgrade\AsynchronousUpgrade;
use Elgg\Upgrade\Result;

class MigrateDiscussionGroupSettings implements AsynchronousUpgrade {

	/**
	 * {@inheritDoc}
	 */
	public function getVersion(): int {
		return 2021062301;
	}

	/**
	 * {@inheritDoc}
	 */
	public function needsIncrementOffset(): bool {
		return false;
	}

	/**
	 * {@inheritDoc}
	 */
	public function shouldBeSkipped(): bool {
		return empty($this->countItems());
	}

	/**
	 * {@inheritDoc}
	 */
	public function countItems(): int {
		return elgg_count_entities($this->getOptions());
	}

	/**
	 * {@inheritDoc}
	 */
	public function run(Result $result, $offset): Result {
		
		$groups = elgg_get_entities($this->getOptions([
			'offset' => $offset,
		]));
		
		/* @var $group \ElggGroup */
		foreach ($groups as $group) {
			$group_result = $group->setPluginSetting('discussions_tools', 'enable_discussion_comment_notifications', (bool) $group->getPrivateSetting('enable_discussion_comment_notifications'));
			$group_result &= $group->removePrivateSetting('enable_discussion_comment_notifications');
			
			if ($group_result) {
				$result->addSuccesses();
			} else {
				$result->addFailures();
			}
		}
		
		return $result;
	}
	
	/**
	 * Options for elgg_get_entities()
	 *
	 * @param array $options additional options
	 *
	 * @return array
	 * @see elgg_get_entities()
	 */
	protected function getOptions(array $options = []): array {
		$defaults = [
			'type' => 'group',
			'limit' => 50,
			'batch' => true,
			'batch_inc_offset' => $this->needsIncrementOffset(),
			'private_setting_names' => [
				'enable_discussion_comment_notifications',
			],
		];
		
		return array_merge($defaults, $options);
	}
}
