<?php namespace Cviebrock\LaravelResources\Commands;

use Config;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;


class ImportCommand extends Command {

	/**
	 * Command name.
	 *
	 * @var string
	 */
	protected $name = 'resources:import';

	/**
	 * Command description.
	 *
	 * @var string
	 */
	protected $description = 'Populate the resources table with new data from the configuration files.';


	/**
	 * Run the command.
	 */
	public function fire() {

		$manager = $this->laravel['resources.resource'];

		$resources = array_dot(Config::get('resources::resources', []));
		dd($resources);

		foreach ($resources as $key => $class) {

			$resource = $manager->get($key);
			dd($resource);
		}
		//
		//		$resources->loadAll();
		//
		//		dd('foo');

		//		$force = $this->option('force');
		//		$defaultResources = $this->laravel['config']->get('resources::defaults');
		//		$existingResources = $settings->all();
		//
		//		$this->info('Importing resources' . ($force ? ' (with force)' : ''));
		//
		//		foreach ($defaultResources as $key => $data) {
		//
		//			if (array_key_exists($key, $existingResources) && !$force) {
		//				$this->comment('Skipping existing key "' . $key . '"');
		//			} else {
		//				$resources->set($key, $data['value'], $data['description']);
		//				$this->comment('Set key "' . $key . '" => "' . $data['value'] . '"');
		//			}
		//		}
		//
		//		$resources->forceReload();
		//
		//		$this->info('Resources successfully populated!');
	}


	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions() {

		return [
			['force', '-f', InputOption::VALUE_NONE, 'Overwrite existing keys with data from configuration files.'],
		];
	}
}
