<?php
/**
 * Created by PhpStorm.
 * User: daryakiryanova
 * Date: 10.11.16
 * Time: 22:49
 */

namespace Yandex\Fotki\Fotki\Models;

/**
 * Класс, описывающий состав полей ресурса "Альбом", получаемого в сервисном документе.
 *
 * Class Album
 * @package Yandex\Fotki\Fotki\Models
 */
class Album
{
	private $id;
	
	private $dateEdited;
	
	private $dateUpdated;
	
	private $datePublished;
	
	private $linkEdit;
	
	private $linkSelf;
	
	private $linkAlternate;
	
	private $linkCover;
	
	private $linkPhotos;
	
	private $linkYmapsml;
	
	private $authorName;
	
	private $imageCount;
	
	private $title;
	
	private $summary;
	
	private $covers = [];
	
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
	public function getDateEdited()
	{
		return $this->dateEdited;
	}
	
	/**
	 * @param mixed $dateEdited
	 */
	public function setDateEdited($dateEdited)
	{
		$this->dateEdited = $dateEdited;
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
	public function getDatePublished()
	{
		return $this->datePublished;
	}
	
	/**
	 * @param mixed $datePublished
	 */
	public function setDatePublished($datePublished)
	{
		$this->datePublished = $datePublished;
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
	public function getLinkCover()
	{
		return $this->linkCover;
	}
	
	/**
	 * @param mixed $linkCover
	 */
	public function setLinkCover($linkCover)
	{
		$this->linkCover = $linkCover;
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
	
	/**
	 * @return mixed
	 */
	public function getLinkYmapsml()
	{
		return $this->linkYmapsml;
	}
	
	/**
	 * @param mixed $linkYmapsml
	 */
	public function setLinkYmapsml($linkYmapsml)
	{
		$this->linkYmapsml = $linkYmapsml;
	}
	
	/**
	 * @return mixed
	 */
	public function getAuthorName()
	{
		return $this->authorName;
	}
	
	/**
	 * @param mixed $authorName
	 */
	public function setAuthorName($authorName)
	{
		$this->authorName = $authorName;
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
	public function getSummary()
	{
		return $this->summary;
	}
	
	/**
	 * @param mixed $summary
	 */
	public function setSummary($summary)
	{
		$this->summary = $summary;
	}
	
	/**
	 * @return array
	 */
	public function getCovers()
	{
		return $this->covers;
	}
	
	/**
	 * @param array $covers
	 */
	public function setCovers($covers)
	{
		$this->covers = $covers;
	}
}