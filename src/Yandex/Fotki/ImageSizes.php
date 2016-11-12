<?php
/**
 * Created by PhpStorm.
 * User: daryakiryanova
 * Date: 10.11.16
 * Time: 23:00
 */

namespace Yandex\Fotki;

/**
 * Image sizes described in document
 * https://tech.yandex.ru/fotki/doc/appendices/photo-storage-docpage/
 *
 * Class ImageSizes
 * @package Yandex\Fotki
 */
class ImageSizes
{
	const XXXS_SIZE = 'XXXS';
	const XXS_SIZE = 'XXS';
	const XS_SIZE = 'XS';
	const S_SIZE = 'S';
	const M_SIZE = 'M';
	const L_SIZE = 'L';
	const XL_SIZE = 'XL';
	const XXL_SIZE = 'XXL';
	const XXXL_SIZE = 'XXXL';
	const ORIG_SIZE = 'orig';
	
	public $widthHeight = [
		self::XXXS_SIZE => [
			'width' => 50,
			'height' => 50
		],
		self::XXS_SIZE => [
			'width' => 75,
			'height' => 75
		],
		self::XS_SIZE => [
			'width' => 100,
			'height' => 67
		],
		self::S_SIZE => [
			'width' => 150,
			'height' => 101
		],
		self::M_SIZE => [
			'width' => 300,
			'height' => 202
		],
		self::L_SIZE => [
			'width' => 500,
			'height' => 336
		],
		self::XL_SIZE => [
			'width' => 800,
			'height' => 537
		],
		self::XXL_SIZE => [
			'width' => 1024,
			'height' => 688
		],
		self::XXXL_SIZE => [
			'width' => 1280,
			'height' => 860
		],
	];
}