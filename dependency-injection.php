<?php

// Higher layer - slave of interfaces
namespace Zarganwar\Patterns\Di\Application\Module;

use Zarganwar\Patterns\Di\Infrastructure\Repository;

class Module
{

	// In DI, I depend only on what the infrastructure provides.
	public function __construct(private readonly Repository $repository) {}

	public function run(): void
	{
		// I can use only IRepository methods
		$this->repository->save(['id' => 1, 'name' => 'Zarganwar']);
	}
}



// ------------------------------------------------------
// Lower layer - director of interfaces and implementations
namespace Zarganwar\Patterns\Di\Infrastructure;

use Zarganwar\Patterns\Di\Application\Module\Module;

interface Repository {

	public function save(array $user) : void;

	public function getById(int $id) : array;
}


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

}



// ------------------------------------------------------
new Module(new DatabaseRepository());