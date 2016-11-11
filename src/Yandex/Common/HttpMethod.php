<?php
/**
 * Created by PhpStorm.
 * User: daryakiryanova
 * Date: 10.11.16
 * Time: 22:13
 */

namespace Yandex\Common;

/**
 * Enum class contains http method as they're named
 *
 * Class HttpMethod
 * @package Yandex\Common
 */
class HttpMethod
{
	const GET = 'GET';
	const POST = 'POST';
	const HEAD = 'HEAD';
	const PUT = 'PUT';
	const DELETE = 'DELETE';
	const PATCH = 'PATCH';
	const MKCOL = 'MKCOL';
}