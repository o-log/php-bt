<?php

namespace OLOG\BT;

class MenuItem
{
	protected $text;
	protected $url;
	protected $children_arr;
	protected $icon;

	public function __construct($text, $url, $children_arr = null, $icon = '')
	{
		$this->setText($text);
		$this->setUrl($url);
		$this->setChildrenArr($children_arr);
		$this->setIcon($icon);
	}

	/**
	 * @return mixed
	 */
	public function getIcon()
	{
		return $this->children_arr;
	}

	/**
	 * @param mixed $icon
	 */
	public function setIcon($icon)
	{
		$this->icon = $icon;
	}

	/**
	 * @return mixed
	 */
	public function getChildrenArr()
	{
		return $this->children_arr;
	}

	/**
	 * @param mixed $children_arr
	 */
	public function setChildrenArr($children_arr)
	{
		$this->children_arr = $children_arr;
	}

	/**
	 * @return mixed
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * @param mixed $text
	 */
	public function setText($text)
	{
		$this->text = $text;
	}

	/**
	 * @return mixed
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @param mixed $url
	 */
	public function setUrl($url)
	{
		$this->url = $url;
	}


}