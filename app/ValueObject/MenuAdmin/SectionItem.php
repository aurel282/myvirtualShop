<?php

namespace App\ValueObject\MenuAdmin;

class SectionItem extends ItemAbstract
{
	/** @var array  */
	protected $_items = [];

	/** @var bool  */
	public $_showEvenIfEmpty = false;

	/**
	 * SectionItem constructor.
	 * @param string $key
	 * @param array $attributes
	 */
	public function __construct(string $key, array $attributes = [])
	{
		$this->setKey($key);
		$this->setAttributes($attributes);
	}

	/**
	 * @param LinkItem $linkItem
	 * @return SectionItem
	 */
	public function addLink(LinkItem $linkItem): SectionItem
	{
		$this->_items[] = $linkItem;
		return $this;
	}

	/**
	 * @param SectionItem $section
	 * @return SectionItem
	 */
	public function addSubSection(SectionItem $section): SectionItem
	{
		$this->_items[] = $section;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getItems(): array
	{
		return array_filter($this->_items, function(ItemAbstract $item) {
			return !$item->isEmpty();
		});
	}

	/**
	 * @param string $enclosingTag
	 * @param string $linkEnclosingTag
	 * @return string
	 */
	public function render(string $enclosingTag = 'ul', string $linkEnclosingTag = 'li'): string
	{
		$render =  '<'.$enclosingTag.' id="'.$this->getKey().'" ' . $this->attributeToString() . '>';
		$render .= '<span>'.$this->getTitle().'</span>';

		foreach($this->getItems() as $item)
		{
			$tag = $item instanceof LinkItem ? $linkEnclosingTag : $enclosingTag;
			$render .= $item->render($tag);
		}

		$render .= '</'.$enclosingTag.'>';

		return $render;
	}

	/**
	 * @return bool
	 */
	public function isEmpty(): bool
	{
		return empty($this->getItems());
	}

	/**
	 * @return bool
	 */
	public function isActive(): bool
	{
		foreach($this->getItems() as $item)
		{
			if($item->isActive())
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * @return bool
	 */
	public function hasAccess(): bool
	{
		return true;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->getAttributes('title', trans('navigation.main_menu.' . $this->getKey()));
	}

	/**
	 * @return SectionItem
	 */
	public function showEvenIfEmpty(): SectionItem
	{
		$this->_showEvenIfEmpty = true;
		return $this;
	}
}
