<?php namespace Cviebrock\LaravelResources;

use Cviebrock\LaravelResources\Contracts\ResourceDescriptor;


abstract class Descriptor implements ResourceDescriptor {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $description = '';

	/**
	 * @var array
	 */
	protected $seedValues = [];

	/**
	 * @var
	 */
	private $key;


	public function __construct($key) {
		$this->key = $key;
	}


	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}


	/**
	 * @return array
	 */
	public function getSeedValues() {
		return $this->seedValues;
	}


	/**
	 * Transform the native value into a format suitable for storage.
	 *
	 * @param $value mixed
	 * @return string
	 */
	public function toStorage($value) {
		return serialize($value);
	}


	/**
	 * Transform the value from the stored value to a native value.
	 *
	 * @param $value string
	 * @return mixed
	 */
	public function fromStorage($value) {
		return unserialize($value);
	}


	/**
	 * @return mixed
	 */
	public function getName() {
		if (!$this->name) {
			throw (new ResourceDescriptorNameNotDefinedException)->setReference(get_called_class());
		}
	}
}
