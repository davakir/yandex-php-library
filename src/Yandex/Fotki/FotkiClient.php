<?php
/**
 * Created by PhpStorm.
 * User: daryakiryanova
 * Date: 09.11.16
 * Time: 22:17
 */

namespace Yandex\Fotki;

use GuzzleHttp\Client;
use Yandex\Common\AbstractServiceClient;
use Yandex\Common\HttpMethod;
use Yandex\Fotki\Models\Album;
use Yandex\Fotki\Models\Photo;
use Yandex\Fotki\Models\Tag;

/**
 * All photo links (from img href or cover link for album) are being saved
 * without image size suffix.
 *
 * It's done to give users chance to choose it by himself,
 * because maybe some want to use cover image with XXS size,
 * but another want to use L or bigger.
 *
 * The same situation with references for photos.
 * Documentation is here https://tech.yandex.ru/fotki/doc/concepts/scheme-docpage/
 *
 * Class FotkiClient
 * @package Yandex\Fotki
 */
class FotkiClient extends AbstractServiceClient
{
	/**
	 * @var string
	 */
	protected $serviceDomain = 'api-fotki.yandex.ru';
	/**
	 * @var string
	 */
	protected $userInfoLocation = 'api/users/';
	/**
	 * @var string
	 */
	protected $serviceScheme = parent::HTTP_SCHEME;
	/**
	 * @var bool
	 */
	protected $needAuth;
	
	/**
	 * @var string
	 */
	private $login;
	
	/**
	 * Data types for getting service document from Yandex.Fotki
	 */
	const JSON_TYPE = 'json';
	const XML_TYPE = 'xml';
	
	/**
	 * Locations for getting necessary data from Yandex.Fotki
	 */
	const SERVICE_DOC = '/';
	const ALBUM_PATH = '/album/';
	const ALBUMS_PATH = '/albums/';
	const PHOTO_PATH = '/photo/';
	const PHOTOS_PATH = '/photos/';
	
	public function __construct($login, $needAuth = false)
	{
		$this->login = $login;
		$this->needAuth = $needAuth;
	}
	
	/**
	 * Функция, используя переданный конструктору логин пользователя,
	 * обращается к сервису Яндекс.Фотки и получает информацию об альбомах пользователя.
	 * Далее вычленяется информация по каждому альбому.
	 * Возвращается массив объектов с полученными данными данными.
	 *
	 * @return array|string
	 */
	public function getAlbums()
	{
		$url = $this->userInfoLocation . $this->login . self::ALBUMS_PATH . '?' .
			\GuzzleHttp\Psr7\build_query(['format' => self::JSON_TYPE]);
		
		try
		{
			$response = $this->sendRequest(HttpMethod::GET, $url);
			
			if ($response->getStatusCode() == 200)
				$responseData = $response->getBody();
			else
				return 'Unexpected HTTP status: ' . $response->getStatusCode() . ' ' .
					$response->getReasonPhrase();
		}
		catch (\Exception $e)
		{
			return 'Error: ' . $e->getMessage();
		}
		
		$result = $this->processAlbums(json_decode($responseData, true));
		
		return $result;
	}
	
	/**
	 * @param $albumId
	 * @return string|Album
	 */
	public function getAlbum($albumId)
	{
		$url = $this->userInfoLocation . $this->login .
			self::ALBUM_PATH . $albumId . '/?' .
			\GuzzleHttp\Psr7\build_query(['format' => self::JSON_TYPE]);
		
		try
		{
			$response = $this->sendRequest(HttpMethod::GET, $url);
			
			if ($response->getStatusCode() == 200)
				$responseData = $response->getBody();
			else
				return 'Unexpected HTTP status: ' . $response->getStatusCode() . ' ' .
					$response->getReasonPhrase();
		}
		catch (\Exception $e)
		{
			return 'Error: ' . $e->getMessage();
		}
		
		$result = $this->processAlbum(json_decode($responseData, true));
		
		return $result;
	}
	
	/**
	 * Возвращает информацию обо всех фотографих альбома.
	 *
	 * @param $album integer
	 * @param $fetchTagsInfo boolean
	 * @return array|string
	 */
	public function getAlbumPhotos($album, $fetchTagsInfo = false)
	{
		$url = $this->userInfoLocation . $this->login . self::ALBUM_PATH .
			$album . self::PHOTOS_PATH . '?' .
			\GuzzleHttp\Psr7\build_query(['format' => self::JSON_TYPE]);
		
		try
		{
			$response = $this->sendRequest(HttpMethod::GET, $url);
			
			if ($response->getStatusCode() == 200)
				$responseData = $response->getBody();
			else
				return 'Unexpected HTTP status: ' . $response->getStatusCode() . ' ' .
				$response->getReasonPhrase();
		}
		catch (\Exception $e)
		{
			return 'Error: ' . $e->getMessage();
		}
		
		$result = $this->processAlbumPhotos(json_decode($responseData, true), $fetchTagsInfo);
		
		return $result;
	}
	
	/**
	 * Возвращает информацию о фотографии по переданному ее id.
	 *
	 * @param $photoId integer
	 * @param $fetchTagsInfo boolean
	 * @return string|Photo
	 */
	public function getPhoto($photoId, $fetchTagsInfo = false)
	{
		$url = $this->userInfoLocation . $this->login . self::PHOTO_PATH . $photoId . '?' .
			\GuzzleHttp\Psr7\build_query(['format' => self::JSON_TYPE]);
		
		try
		{
			$response = $this->sendRequest(HttpMethod::GET, $url);
			
			if ($response->getStatusCode() == 200)
				$responseData = $response->getBody();
			else
				return 'Unexpected HTTP status: ' . $response->getStatusCode() . ' ' .
				$response->getReasonPhrase();
		}
		catch (\Exception $e)
		{
			return 'Error: ' . $e->getMessage();
		}
		
		$result = $this->processPhoto(json_decode($responseData, true), $fetchTagsInfo);
		
		return $result;
	}
	
	protected function getClient()
	{
		if (is_null($this->client))
		{
			$defaultOptions = [
				'base_uri' => $this->getServiceUrl(),
				'headers' => [
					'Host' => $this->getServiceDomain(),
					'User-Agent' => $this->getUserAgent(),
					'Accept' => '*/*'
				]
			];
			if ($this->needAuth)
			{
				$defaultOptions['headers']['Authorization'] = 'OAuth ' . $this->getAccessToken();
			}
			if ($this->getProxy())
			{
				$defaultOptions['proxy'] = $this->getProxy();
			}
			if ($this->getDebug())
			{
				$defaultOptions['debug'] = $this->getDebug();
			}
			$this->client = new Client($defaultOptions);
		}
		
		return $this->client;
	}
	
	/**
	 * @param array $data
	 * @return array
	 */
	private function processAlbums(array $data)
	{
		$result = [];
		foreach ($data['entries'] as $rawAlbum)
			$result[] = $this->processAlbum($rawAlbum);
		
		return $result;
	}
	
	/**
	 * @param array $rawAlbum
	 * @return Album
	 */
	private function processAlbum(array $rawAlbum)
	{
		$album = new Album();
		$album->setAuthor($rawAlbum['author']);
		$album->setTitle($rawAlbum['title']);
		$album->setSummary($rawAlbum['summary'] ? $rawAlbum['summary'] : '');
		$album->setImageCount($rawAlbum['imageCount']);
		$album->setDateEdited($rawAlbum['edited']);
		$album->setDateUpdated($rawAlbum['updated']);
		$album->setDatePublished($rawAlbum['published']);
		$album->setLinkAlternate($rawAlbum['links']['alternate']);
		$album->setLinkCover($rawAlbum['links']['cover']);
		$album->setLinkEdit($rawAlbum['links']['edit']);
		$album->setLinkPhotos($rawAlbum['links']['photos']);
		$album->setLinkSelf($rawAlbum['links']['self']);
		$album->setLinkYmapsml($rawAlbum['links']['ymapsml']);
		
		$id = explode(':', $rawAlbum['id']);
		$album->setId(end($id));
		
		$imgHref = end($rawAlbum['img'])['href'];
		$album->setImgHref(substr($imgHref, 0, strrpos($imgHref, '_') + 1));
		
		return $album;
	}
	
	/**
	 * @param $data array
	 * @param $fetchTagsInfo boolean
	 * @return array
	 */
	private function processAlbumPhotos(array $data, $fetchTagsInfo)
	{
		$result = [];
		foreach ($data['entries'] as $rawPhoto)
			$result[] = $this->processPhoto($rawPhoto, $fetchTagsInfo);
		
		return $result;
	}
	
	/**
	 * @param $rawPhoto array
	 * @param $fetchTagsInfo boolean
	 * @return Photo
	 */
	private function processPhoto(array $rawPhoto, $fetchTagsInfo)
	{
		$photo = new Photo();
		$photo->setDateCreated($rawPhoto['created']);
		$photo->setDateEdited($rawPhoto['edited']);
		$photo->setDatePublished($rawPhoto['published']);
		$photo->setDateUpdated($rawPhoto['updated']);
		$photo->setDisableComments($rawPhoto['disableComments']);
		$photo->setTitle($rawPhoto['title']);
		$photo->setSummary($rawPhoto['summary']);
		$photo->setAccess($rawPhoto['access']);
		$photo->setAuthor($rawPhoto['author']);
		$photo->setXxx($rawPhoto['xxx']);
		$photo->setHideOriginal($rawPhoto['hideOriginal']);
		$photo->setLinkAlbum($rawPhoto['links']['album']);
		$photo->setLinkAlternate($rawPhoto['links']['alternate']);
		$photo->setLinkEdit($rawPhoto['links']['edit']);
		$photo->setLinkEditMedia($rawPhoto['links']['editMedia']);
		$photo->setLinkSelf($rawPhoto['links']['self']);
		
		$id = explode(':', $rawPhoto['id']);
		$photo->setId(end($id));
		
		if ($fetchTagsInfo)
			$photo->setTags($this->processTags($rawPhoto['tags']));
		else
			$photo->setTags($rawPhoto['tags']);
		
		$imgHref = end($rawPhoto['img'])['href'];
		$photo->setImgHref(substr($imgHref, 0, strrpos($imgHref, '_') + 1));
		
		return $photo;
	}
	
	/**
	 * @param array $data
	 * @return array
	 */
	private function processTags(array $data)
	{
		$result = [];
		
		foreach ($data as $rawTag)
			$result[] = $this->processTag($rawTag);
		
		return $result;
	}
	
	/**
	 * @param array $rawTag
	 * @return Tag
	 */
	private function processTag(array $rawTag)
	{
		$tag = new Tag();
		
		$tag->setId($rawTag['id']);
		$tag->setAuthor($rawTag['author']);
		$tag->setTitle($rawTag['title']);
		$tag->setDateUpdated($rawTag['updated']);
		$tag->setImageCount($rawTag['imageCount']);
		$tag->setLinkEdit($rawTag['links']['edit']);
		$tag->setLinkPhotos($rawTag['links']['photos']);
		$tag->setLinkAlternate($rawTag['links']['alternate']);
		$tag->setLinkSelf($rawTag['links']['self']);
		
		return $tag;
	}
}