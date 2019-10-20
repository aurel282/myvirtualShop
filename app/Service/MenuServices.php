<?php

namespace App\Service;

use App\ValueObjects\MenuAdmin\{LinkItem, Menu, SectionItem};

class MenuServices
{
	/** @var Menu */
	protected $_menu;

	/**
	 * @param array $config
	 * @return $this
	 */
	public function generateMenu(array $config)
	{
		$this->_menu = new Menu();

		$homeItem = $config[0];
		unset($config[0]);

		$homeSection = new SectionItem('home', $homeItem);
		$homeSection = $homeSection->showEvenIfEmpty();

		$this->_menu->addSection($homeSection);

		foreach($config as $item)
		{
			$section = new SectionItem($item['key'], $item['attributes'] ?? []);
			$section = $this->handleItem($section, $item);

			$this->_menu->addSection($section);
		}

		return $this;
	}

	/**
	 * Return the html menu
	 * @return string
	 */
	public function render(string $enclosingTag = 'ul', string $linkEnclosing = 'li', array $attributes = [])
	{
		return $this->_menu->render($enclosingTag, $linkEnclosing, $attributes);
	}

	protected function handleItem(SectionItem $sectionItem, array $item): SectionItem
	{
		if(isset($item['links']))
		{
			foreach($item['links'] as $link)
			{
				$sectionItem->addLink(
					new LinkItem($link['key'], $link['route'], $link['params'] ?? [], $link['attributes'] ?? [])
				);
			}
		}

		if(isset($item['section']))
		{
			foreach($item['section'] as $section)
			{
				$sectionItem->addSubSection($this->generateSections($section));
			}
		}

		return $sectionItem;
	}

	protected function generateSections(array $sectionData): SectionItem
	{
		$section = new SectionItem($sectionData['key'], $sectionData['attributes'] ?? []);
		$section = $this->handleItem($section, $sectionData);

		return $section;
	}
}
