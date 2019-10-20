<?php

namespace App\ValueObjects\MenuAdmin;

use App\ValueObjects\AbstractObject;

abstract class ItemAbstract extends AbstractObject
{
	/** @var string  */
	protected $_key;

	/** @var array  */
	protected $_attributes;

	abstract public function hasAccess(): bool;

	abstract public function isEmpty(): bool;

	abstract public function isActive(): bool;

	abstract public function render(string $enclosingTags = 'li'): string;

	/**
	 * @return string
	 */
	public function getKey(): string
	{
		return $this->_key;
	}

	/**
	 * @param string $key
	 * @return SectionItem
	 */
	public function setKey(string $key): self
	{
		$this->_key = $key;
		return $this;
	}

	/**
	 * @param null $key
	 * @param null $default
	 * @return array|string|null
	 */
	public function getAttributes($key = null, $default = null)
	{
		if(is_null($key))
		{
			return $this->_attributes;
		}
		else
		{
			return $this->_attributes[$key] ?? $default;
		}
	}

	/**
	 * @return string
	 */
	public function attributeToString()
	{
		$attributes = $this->getAttributes();
		$attributes['class'] = $this->getAttributes('class', '') . ' ' . ($this->isActive() ? 'active focus' : '');
		$attribute = '';

		foreach($attributes as $key => $value)
		{
			if($key != 'title')
			{
				$attribute .= ' ' . $key . '="' . $value .'"';
			}

		}

		return $attribute;
	}

	/**
	 * @param array $attributes
	 * @return SectionItem
	 */
	public function setAttributes(array $attributes): self
	{
		$this->_attributes = $attributes;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->getAttributes('title');
	}
}
