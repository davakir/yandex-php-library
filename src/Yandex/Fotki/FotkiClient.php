<?php

namespace Yandex\Fotki;

use Yandex\Common\AbstractServiceClient;
use Yandex\Common\HttpMethod;
use Yandex\Fotki\ImageSizes;
use Yandex\Fotki\Fotki\Models\Album;

/**
 * Created by PhpStorm.
 * User: daryakiryanova
 * Date: 09.11.16
 * Time: 22:17
 *
 * Class FotkiClient
 * @package Yandex\Fotki
 */
class FotkiClient extends AbstractServiceClient
{
	/**
	 * @var string
	 */
	protected $_serviceDomain = 'api-fotki.yandex.ru/api/users/';
	
	/**
	 * @var string
	 */
	protected $_serviceScheme = parent::HTTP_SCHEME;
	
	/**
	 * @var string
	 */
	private $__login;
	
	/**
	 * Data types for getting service document from Yandex.Fotki
	 */
	const JSON_TYPE = 'json';
	const XML_TYPE = 'xml';
	
	/**
	 * Locations for getting neccessary data from Yandex.Fotki
	 */
	const SERVICE_DOC = '/';
	const ALBUM_PATH = '/album/';
	const ALBUMS_PATH = '/albums/';
	const PHOTO_PATH = '/photo/';
	const PHOTOS_PATH = '/photos/';
	
	public function __construct($login)
	{
		$this->__login = $login;
	}
	
	/**
	 * Функция, используя переданный конструктору логин пользователя,
	 * обращается к сервису Яндекс.Фотки и получает информацию об альбомах пользователя.
	 * Далее вычленяется информация по каждому альбому.
	 * Возвращается массив объектов с полученными данными данными.
	 *
	 * @return array
	 */
	public function getAlbums()
	{
		$url = $this->_serviceDomain . $this->__login . self::ALBUMS_PATH . '?' .
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
		
		$result = $this->processAlbums(\GuzzleHttp\json_decode($responseData));
		
		return $result;
	}
	
	/**
	 * Возвращает информацию обо всех фотографих альбома
	 *
	 * @param int $album
	 * @return array|string
	 */
	public function getPhotosForAlbum($album)
	{
		// формирую ссылку, на которую будет обращение
		$host = self::API_URL . $this->login . self::ALBUM_PATH . $album . self::PHOTOS_PATH;
		
		// формирую запрос
		$request = new \HTTP_Request2($host, \HTTP_Request2::METHOD_GET);
		
		// получаю ответ|ошибку от сервиса
		try {
			$response = $request->send();
			if (200 == $response->getStatus())
			{
				$response = $response->getBody();
			}
			else
			{
				return 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
				$response->getReasonPhrase();
			}
		}
		catch (\HTTP_Request2_Exception $e)
		{
			return 'Error: ' . $e->getMessage();
		}
		
		// преобразовываю ответ в SimpleXMLElement
		$photos = new \SimpleXMLElement($response);
		
		$result = [];
		foreach ($photos->entry as $photo)
		{
			// id альбома
			$id = explode(':',$photo->id);
			$id = array_pop($id);
//
//			// владелец альбома
//			$author = $photo->author->name;
//
//			// название фотографии
//			$title = $photo->title;
//
//			// ссылка на фотографию
//			$link = $photo->content->attributes()->src;
			
			$result[] = $id;
		}
		
		return $result;
	}
	
	/**
	 * Возвращает информацию о фотографии по переданному ее id.
	 * Второй параметр $size - это размер фотографии, он может быть от
	 * XXXS (50x50) до XXXL (960x1280).
	 * Ссылка, на которую будет запрос к яндексу, может быть передана
	 * либо сформирована внутри функции.
	 *
	 * @param $photoId
	 * @param string $size
	 * @return string
	 */
	public function getPhoto($photoId, $size = 'orig', $host = null)
	{
		// формирую ссылку, на которую будет обращение
		if (!$host)
		{
			$host = self::API_URL . $this->login . self::PHOTO_PATH . $photoId . '/';
		}
		
		// формирую запрос
		$request = new \HTTP_Request2($host, \HTTP_Request2::METHOD_GET);
		
		// получаю ответ|ошибку от сервиса
		try {
			$response = $request->send();
			if (200 == $response->getStatus())
			{
				$response = $response->getBody();
			}
			else
			{
				return 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
				$response->getReasonPhrase();
			}
		}
		catch (\HTTP_Request2_Exception $e)
		{
			return 'Error: ' . $e->getMessage();
		}
		
		// преобразовываю ответ в SimpleXMLElement
		$photo = new \SimpleXMLElement($response);
		$photo->registerXPathNamespace('f', 'yandex:fotki');
		
		// id фотографии
		$id = explode(':',$photo->id);
		$id = array_pop($id);
		
		// владелец фотографии
		$author = $photo->author->name->__toString();
		
		// ссылка на фотографию
		$link = '';
		foreach ($photo->xpath('//f:img') as $linkInfo)
		{
			if ($linkInfo->attributes()->size == $size)
			{
				$link = $linkInfo->attributes()->href->__toString();
			}
		}
		
		$result = [
			'photo_id' => $id,
			'author' => $author,
			'link' => $link,
		];
		
		return $result;
	}
	
	/**
	 * @param array $data
	 * @return array
	 */
	private function processAlbums(array $data)
	{
		$result = [];
		foreach ($data['entries'] as $rawAlbum)
		{
			$album = new Album();
			$album->setDateEdited($rawAlbum['edited']);
			$album->setDateUpdated($rawAlbum['updated']);
			$album->setLinkAlternate($rawAlbum['links']['alternate']);
			$album->setLinkCover($rawAlbum['links']['cover']);
			$album->setLinkEdit($rawAlbum['links']['edit']);
			$album->setLinkPhotos($rawAlbum['links']['photos']);
			$album->setLinkSelf($rawAlbum['links']['self']);
			
			
			
			$album->setAuthorName($rawAlbum['author']);
			
		}
		
		return $result;
	}
}