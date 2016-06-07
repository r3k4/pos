<?php

namespace App\Repositories\Contracts;

interface SetupVariableRepoInterface
{

	public function getByVariable($variable);

	public function updateByVariable($variable, $value);

	public function deleteByVariable($variable);
 

}
