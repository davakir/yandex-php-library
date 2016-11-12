<?php
/**
 * Created by PhpStorm.
 * User: daryakiryanova
 * Date: 10.11.16
 * Time: 22:49
 */

namespace Yandex\Fotki\Models;

/**
 * Класс, описывающий состав полей ресурса "Альбом", получаемого в сервисном документе.
 *
 * Class Album
 * @package Yandex\Fotki\Models
 */
class Album
{
	/**
	 * @var integer
	 */
	private $id;
	/**
	 * @var string
	 */
	private $dateEdited;
	/**
	 * @var string
	 */
	private $dateUpdated;
	/**
	 * @var string
	 */
	private $datePublished;
	/**
	 * @var string
	 */
	private $linkEdit;
	/**
	 * @var string
	 */
	private $linkSelf;
	/**
	 * @var string
	 */
	private $linkAlternate;
	/**
	 * @var string
	 */
	private $linkCover;
	/**
	 * @var string
	 */
	private $linkPhotos;
	/**
	 * @var string
	 */
	private $linkYmapsml;
	/**
	 * Link for cover photo
	 * @var string
	 */
	private $imgHref;
	/**
	 * @var string
	 */
	private $author;
	/**
	 * @var integer
	 */
	private $imageCount;
	/**
	 * @var string
	 */
	private $title;
	/**
	 * @var string
	 */
	private $summary;
	
	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}
	
	/**
	 * @return string
	 */
	public function getDateEdited()
	{
		return $this->dateEdited;
	}
	
	/**
	 * @param string $dateEdited
	 */
	public function setDateEdited($dateEdited)
	{
		$this->dateEdited = $dateEdited;
	}
	
	/**
	 * @return string
	 */
	public function getDateUpdated()
	{
		return $this->dateUpdated;
	}
	
	/**
	 * @param string $dateUpdated
	 */
	public function setDateUpdated($dateUpdated)
	{
		$this->dateUpdated = $dateUpdated;
	}
	
	/**
	 * @return string
	 */
	public function getDatePublished()
	{
		return $this->datePublished;
	}
	
	/**
	 * @param string $datePublished
	 */
	public function setDatePublished($datePublished)
	{
		$this->datePublished = $datePublished;
	}
	
	/**
	 * @return string
	 */
	public function getLinkEdit()
	{
		return $this->linkEdit;
	}
	
	/**
	 * @param string $linkEdit
	 */
	public function setLinkEdit($linkEdit)
	{
		$this->linkEdit = $linkEdit;
	}
	
	/**
	 * @return string
	 */
	public function getLinkSelf()
	{
		return $this->linkSelf;
	}
	
	/**
	 * @param string $linkSelf
	 */
	public function setLinkSelf($linkSelf)
	{
		$this->linkSelf = $linkSelf;
	}
	
	/**
	 * @return string
	 */
	public function getLinkAlternate()
	{
		return $this->linkAlternate;
	}
	
	/**
	 * @param string $linkAlternate
	 */
	public function setLinkAlternate($linkAlternate)
	{
		$this->linkAlternate = $linkAlternate;
	}
	
	/**
	 * @return string
	 */
	public function getLinkCover()
	{
		return $this->linkCover;
	}
	
	/**
	 * @param string $linkCover
	 */
	public function setLinkCover($linkCover)
	{
		$this->linkCover = $linkCover;
	}
	
	/**
	 * @return string
	 */
	public function getLinkPhotos()
	{
		return $this->linkPhotos;
	}
	
	/**
	 * @param string $linkPhotos
	 */
	public function setLinkPhotos($linkPhotos)
	{
		$this->linkPhotos = $linkPhotos;
	}
	
	/**
	 * @return string
	 */
	public function getLinkYmapsml()
	{
		return $this->linkYmapsml;
	}
	
	/**
	 * @param string $linkYmapsml
	 */
	public function setLinkYmapsml($linkYmapsml)
	{
		$this->linkYmapsml = $linkYmapsml;
	}
	
	/**
	 * @return string
	 */
	public function getAuthor()
	{
		return $this->author;
	}
	
	/**
	 * @param string $author
	 */
	public function setAuthor($author)
	{
		$this->author = $author;
	}
	
	/**
	 * @return int
	 */
	public function getImageCount()
	{
		return $this->imageCount;
	}
	
	/**
	 * @param int $imageCount
	 */
	public function setImageCount($imageCount)
	{
		$this->imageCount = $imageCount;
	}
	
	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}
	
	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	/**
	 * @return string
	 */
	public function getSummary()
	{
		return $this->summary;
	}
	
	/**
	 * @param string $summary
	 */
	public function setSummary($summary)
	{
		$this->summary = $summary;
	}
	
	/**
	 * @return string
	 */
	public function getImgHref()
	{
		return $this->imgHref;
	}
	
	/**
	 * @param string $imgHref
	 */
	public function setImgHref($imgHref)
	{
		$this->imgHref = $imgHref;
	}
}