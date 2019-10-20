<?php

namespace App\ValueObjects\MenuAdmin;

class Menu
{
	/**
	 * @var SectionItem[]
	 */
	protected $_sections;

	/**
	 * Menu constructor.
	 * @param SectionItem ...$sections
	 */
	public function __construct(SectionItem ...$sections)
	{
		$this->_sections = $sections;
	}

	/**
	 * @param SectionItem $section
	 */
	public function addSection(SectionItem $section)
	{
		$this->_sections[] = $section;
	}

	/**
	 * @return SectionItem[]
	 */
	public function getSections(): array
	{
		return array_filter(
			$this->_sections,
			function(SectionItem $item)
			{
				return $item->hasAccess() && (!$item->isEmpty() || $item->_showEvenIfEmpty);
			}
		);
	}

	/**
	 * @param string $enclosingTags
	 * @param string $linkEnclosingTag
	 * @param array $attributes
	 * @return string
	 */
	public function render(string $enclosingTags = 'ul', string $linkEnclosingTag = 'li', array $attributes = [])
	{
		$attr = '';
		foreach ($attributes as $key => $attribute)
		{
			$attr .= $key .'="'.$attribute.'" ';
		}

		$render = '<'.$enclosingTags.' ' . $attr .'>';

		foreach($this->getSections() as $section)
		{
			$render .= $section->render($enclosingTags, $linkEnclosingTag);
		}

		$render .= '</'.$enclosingTags.'>';

		return $render;
	}
}
