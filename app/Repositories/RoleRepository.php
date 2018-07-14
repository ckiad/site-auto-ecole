<?php

namespace App\Repositories;

use App\Role;

class  RoleRepository implements RoleRepositoryInterface
{

    protected $role;

    public function __construct(Role $role)
	{
		$this->role = $role;
	}

	public function save(Role $role,$idformation, Array $inputs)
	{
		$role->label = $inputs['slug'];	
		$role->save();
	}

	public function getPaginate($n)
	{
		return $this->role->paginate($n);
	}

	public function store(Array $inputs)
	{
		$role = new $this->role;		
		$role->en_ligne = 0;

		$this->save($role, $inputs);

		return $role;
	}

	public function getById($id)
	{
		return $this->role->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}