<?php
/**
 * Created by PhpStorm.
 * User: daryakiryanova
 * Date: 10.11.16
 * Time: 22:50
 */

namespace Yandex\Fotki\Models;

/**
 * Class Photo
 * @package Yandex\Fotki\Models
 */
class Photo
{
	/**
	 * @var string
	 */
	private $dateCreated;
	/**
	 * @var string
	 */
	private $datePublished;
	/**
	 * @var string
	 */
	private $dateUpdated;
	/**
	 * @var string
	 */
	private $dateEdited;
	/**
	 * @var string
	 */
	private $title;
	/**
	 * @var string
	 */
	private $summary;
	/**
	 * @var string
	 */
	private $author;
	/**
	 * @var boolean
	 */
	private $disableComments;
	/**
	 * @var integer
	 */
	private $id;
	/**
	 * @var boolean
	 */
	private $hideOriginal;
	/**
	 * @var boolean
	 */
	private $xxx;
	/**
	 * @var array
	 */
	private $tags;
	/**
	 * @var string
	 */
	private $access;
	/**
	 * @var string
	 */
	private $imgHref;
	/**
	 * @var string
	 */
	private $linkAlbum;
	/**
	 * @var string
	 */
	private $linkEditMedia;
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
	private $linkEdit;
	
	/**
	 * @return string
	 */
	public function getDateCreated()
	{
		return $this->dateCreated;
	}
	
	/**
	 * @param string $dateCreated
	 */
	public function setDateCreated($dateCreated)
	{
		$this->dateCreated = $dateCreated;
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
	 * @return boolean
	 */
	public function isDisableComments()
	{
		return $this->disableComments;
	}
	
	/**
	 * @param boolean $disableComments
	 */
	public function setDisableComments($disableComments)
	{
		$this->disableComments = $disableComments;
	}
	
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
	 * @return boolean
	 */
	public function isHideOriginal()
	{
		return $this->hideOriginal;
	}
	
	/**
	 * @param boolean $hideOriginal
	 */
	public function setHideOriginal($hideOriginal)
	{
		$this->hideOriginal = $hideOriginal;
	}
	
	/**
	 * @return boolean
	 */
	public function isXxx()
	{
		return $this->xxx;
	}
	
	/**
	 * @param boolean $xxx
	 */
	public function setXxx($xxx)
	{
		$this->xxx = $xxx;
	}
	
	/**
	 * @return array
	 */
	public function getTags()
	{
		return $this->tags;
	}
	
	/**
	 * @param array $tags
	 */
	public function setTags($tags)
	{
		$this->tags = $tags;
	}
	
	/**
	 * @return string
	 */
	public function getAccess()
	{
		return $this->access;
	}
	
	/**
	 * @param string $access
	 */
	public function setAccess($access)
	{
		$this->access = $access;
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
	
	/**
	 * @return mixed
	 */
	public function getLinkAlbum()
	{
		return $this->linkAlbum;
	}
	
	/**
	 * @param mixed $linkAlbum
	 */
	public function setLinkAlbum($linkAlbum)
	{
		$this->linkAlbum = $linkAlbum;
	}
	
	/**
	 * @return mixed
	 */
	public function getLinkEditMedia()
	{
		return $this->linkEditMedia;
	}
	
	/**
	 * @param mixed $linkEditMedia
	 */
	public function setLinkEditMedia($linkEditMedia)
	{
		$this->linkEditMedia = $linkEditMedia;
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
}