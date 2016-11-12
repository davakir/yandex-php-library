<?php
/**
 * Created by PhpStorm.
 * User: daryakiryanova
 * Date: 09.11.16
 * Time: 21:16
 */

namespace Yandex\Tests\Fotki;

use Yandex\Fotki\Models\Album;
use Yandex\Tests\TestCase;
use Yandex\Fotki\FotkiClient;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;

class FotkiClientTest extends TestCase
{
	/**
	 * @var string
	 */
	protected $fixturesFolder = 'fixtures';
	
	public function testGetAlbums()
	{
		$testData = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/albums.json');
		
		$response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($testData));
		
		$guzzleHttpClientMock = $this->getMock('GuzzleHttp\Client', ['request']);
		$guzzleHttpClientMock->expects($this->any())
			->method('request')
			->will($this->returnValue($response));
		
		/**
		 * @var FotkiClient $fotkiClientMock
		 */
		$fotkiClientMock = $this->getMock('Yandex\Fotki\FotkiClient', ['getClient'], ['bella21abyss']);
		$fotkiClientMock->expects($this->any())
			->method('getClient')
			->will($this->returnValue($guzzleHttpClientMock));
		
		$result = $fotkiClientMock->getAlbums();
		/**
		 * @var $album Album
		 */
		foreach ($result as $album)
		{
			$author = $album->getAuthor();
			break;
		}
		$this->assertEquals(
			'bella21abyss',
			$author
		);
	}
	
	public function testGetPhoto()
	{
		$testData = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/photo.json');
		
		$response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($testData));
		
		$guzzleHttpClientMock = $this->getMock('GuzzleHttp\Client', ['request']);
		$guzzleHttpClientMock->expects($this->any())
			->method('request')
			->will($this->returnValue($response));
		
		/**
		 * @var FotkiClient $fotkiClientMock
		 */
		$fotkiClientMock = $this->getMock('Yandex\Fotki\FotkiClient', ['getClient'], ['gornoaleksandr']);
		$fotkiClientMock->expects($this->any())
			->method('getClient')
			->will($this->returnValue($guzzleHttpClientMock));
		
		$result = $fotkiClientMock->getPhoto(1460900);
		$this->assertEquals(
			'http://api-fotki.yandex.ru/api/users/gornoaleksandr/photo/1460900/?format=json',
			$result->getLinkSelf()
		);
	}
}