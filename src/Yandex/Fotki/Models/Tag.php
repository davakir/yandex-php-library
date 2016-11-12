<?php
/**
 * Created by PhpStorm.
 * User: daryakiryanova
 * Date: 10.11.16
 * Time: 22:50
 */

namespace Yandex\Fotki\Models;

/**
 * Class Tag
 * @package Yandex\Fotki\Models
 */
class Tag
{
	/**
	 * @var
	 */
	private $id;
	/**
	 * @var
	 */
	private $title;
	/**
	 * @var
	 */
	private $author;
	/**
	 * @var
	 */
	private $dateUpdated;
	/**
	 * @var
	 */
	private $imageCount;
	/**
	 * @var
	 */
	private $linkEdit;
	/**
	 * @var
	 */
	private $linkSelf;
	/**
	 * @var
	 */
	private $linkAlternate;
	/**
	 * @var
	 */
	private $linkPhotos;
	
	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}
	
	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}
	
	/**
	 * @param mixed $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	/**
	 * @return mixed
	 */
	public function getAuthor()
	{
		return $this->author;
	}
	
	/**
	 * @param mixed $author
	 */
	public function setAuthor($author)
	{
		$this->author = $author;
	}
	
	/**
	 * @return mixed
	 */
	public function getDateUpdated()
	{
		return $this->dateUpdated;
	}
	
	/**
	 * @param mixed $dateUpdated
	 */
	public function setDateUpdated($dateUpdated)
	{
		$this->dateUpdated = $dateUpdated;
	}
	
	/**
	 * @return mixed
	 */
	public function getImageCount()
	{
		return $this->imageCount;
	}
	
	/**
	 * @param mixed $imageCount
	 */
	public function setImageCount($imageCount)
	{
		$this->imageCount = $imageCount;
	}
	
	/**
	 * @return mixed
	 */
	public function getLinkEdit()
	{
		return $this->linkEdit;
	}
	
	/**
	 * @param mixed $linkEdit
	 */
	public function setLinkEdit($linkEdit)
	{
		$this->linkEdit = $linkEdit;
	}
	
	/**
	 * @return mixed
	 */
	public function getLinkSelf()
	{
		return $this->linkSelf;
	}
	
	/**
	 * @param mixed $linkSelf
	 */
	public function setLinkSelf($linkSelf)
	{
		$this->linkSelf = $linkSelf;
	}
	
	/**
	 * @return mixed
	 */
	public function getLinkAlternate()
	{
		return $this->linkAlternate;
	}
	
	/**
	 * @param mixed $linkAlternate
	 */
	public function setLinkAlternate($linkAlternate)
	{
		$this->linkAlternate = $linkAlternate;
	}
	
	/**
	 * @return mixed
	 */
	public function getLinkPhotos()
	{
		return $this->linkPhotos;
	}
	
	/**
	 * @param mixed $linkPhotos
	 */
	public function setLinkPhotos($linkPhotos)
	{
		$this->linkPhotos = $linkPhotos;
	}
}