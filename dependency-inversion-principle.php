<?php

// Higher layer - interface dictator
// If an application wants to utilize a module, it must conform to all of its required interfaces.
namespace Zarganwar\Patterns\Di\Application\Module;


class Module
{

	// In DIP, my module dictates what the infrastructure must provide.
	public function __construct(private readonly Repository $repository) {}

	public function run(): void
	{
		$this->repository->lowerLayerMustImplementThisMethod();
	}
}

interface Repository {

	public function save(array $user) : void;

	public function getById(int $id) : array;

	public function lowerLayerMustImplementThisMethod();
}



// ------------------------------------------------------
// Lower layer - must provide implementations for interfaces dictated by the higher layer
namespace Zarganwar\Patterns\Di\Infrastructure;


use Zarganwar\Patterns\Di\Application\Module\Module;
use Zarganwar\Patterns\Di\Application\Module\Repository;

class DatabaseRepository implements Repository
{

	public function save(array $user): void
	{
		// save to database
	}


	public function getById(int $id): array
	{
		// get from database
		return ['id' => 1, 'name' => 'Zarganwar'];
	}


	public function lowerLayerMustImplementThisMethod(): void
	{
		// OK, I'll implement this method
	}

}


// ------------------------------------------------------
new Module(new DatabaseRepository());
