<?php
/**
 * Created by PhpStorm.
 * User: daryakiryanova
 * Date: 09.11.16
 * Time: 22:17
 */

namespace Yandex\Fotki;

use Yandex\Common\AbstractServiceClient;

class FotkiClient extends AbstractServiceClient
{
	protected $serviceDomain = 'api-fotki.yandex.ru/api/users/';
	
	protected $serviceScheme = parent::HTTP_SCHEME;
	
	public function __construct()
	{
		
	}
}