<?php

namespace App\ValueObjects\MenuAdmin;

class LinkItem extends ItemAbstract
{
	/** @var string */
	protected $_routeName;

	/** @var array */
	protected $_parameters;

	/**
	 * LinkItem constructor.
	 * @param string $key
	 * @param string $routeName
	 * @param array $parameters
	 * @param array $attributes
	 */
	public function __construct(string $key, string $routeName, array $parameters = [], array $attributes = [])
	{
		$this->setKey($key)
			->setAttributes($attributes)
			->setRouteName($routeName)
			->setParameters($parameters);
	}

    /**
     * @return bool
     */
    public function hasAccess(): bool
    {
    }

	/**
	 * @param string $enclosingTag
	 * @return string
	 */
	public function render(string $enclosingTag = 'li'): string
	{
		return '<'.$enclosingTag.' id="'.$this->getKey().'" '.$this->attributeToString().'>
			<a href="'.route($this->getRouteName(), $this->getParameters()).'">'.$this->getTitle().'</a>
		</'.$enclosingTag.'>';
	}

	/**
	 * @return bool
	 */
	public function isEmpty(): bool
	{
		return false;
	}

	/**
	 * @return bool
	 */
	public function isActive(): bool
	{
		return route($this->getRouteName(), $this->getParameters())  == request()->url();
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->getAttributes('title', trans('navigation.sub_menu.' . $this->getKey()));
	}

	/**
	 * @return string
	 */
	public function getRouteName(): string
	{
		return $this->_routeName;
	}

	/**
	 * @param string $routeName
	 * @return LinkItem
	 */
	public function setRouteName(string $routeName): LinkItem
	{
		$this->_routeName = $routeName;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getParameters(): array
	{
		return $this->_parameters;
	}

	/**
	 * @param array $parameters
	 * @return LinkItem
	 */
	public function setParameters(array $parameters): LinkItem
	{
		$this->_parameters = $parameters;
		return $this;
	}
}
