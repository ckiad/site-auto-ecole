<?php

namespace App\Repositories;

use App\Tranche;
use App\Formation;
use Illuminate\Database\Query\Builder;

class  TrancheRepository implements TrancheRepositoryInterface
{

    protected $tranche;

    public function __construct(Tranche $tranche)
	{
		$this->tranche = $tranche;
	}

	public function getFormation($id)
	{
		return Formation::find($id);
	}

	public function getTranchesFormation($id){
		$formation = Formation::find($id);
		return $formation->tranches()->get();
	}

	public function getResteMontantAPayerFormation($id)
	{
		$formation = $this->getFormation($id);
		$tranches = $this->getTranchesFormation($id);
		$cumulMontantTranche=0;
		foreach($tranches as $tranche)
		{
			$cumulMontantTranche = $cumulMontantTranche+$tranche->montant;
		}
		return $formation->montant - $cumulMontantTranche;
	}

	public function canAddTrancheFormation($id)
	{
		$formation = $this->getFormation($id);
		$tranches = $this->getTranchesFormation($id);
		$cumulMontantTranche = 0;
		foreach($tranches as $tranche)
		{
			$cumulMontantTranche = $cumulMontantTranche+$tranche->montant;
		}
		if($formation->montant > $cumulMontantTranche) return 1;
		return 0;
	}

	public function montantTrancheFormationIsValid($id, $montant)
	{
		$resteAPayer = $this->getResteMontantAPayerFormation($id);
		if($resteAPayer >= $montant) return 1;
		return 0;
	}

	public function save(Array $inputs)
	{
		$formation_id = $inputs['id'];
		
		$formation = $this->getFormation($formation_id);
		//dd("ici".$formation_id);
		
		$numero_ordre_tranche1 = 1;
		$montant_tranche1 = $inputs['montantTranche1'];
		if(is_numeric($montant_tranche1) == true)
		{
			$tranche1 = new Tranche;
			$tranche1->numero_ordre = $numero_ordre_tranche1;
			$tranche1->montant = floatval($montant_tranche1);

			$tranche1 = $formation->tranches()->save($tranche1);
		}
		$numero_ordre_tranche2 = 2;
		$montant_tranche2 = $inputs['montantTranche2'];
		if(is_numeric($montant_tranche2) == true)
		{
			$tranche2 = new Tranche;
			$tranche2->numero_ordre = $numero_ordre_tranche2;
			$tranche2->montant = floatval($montant_tranche2);

			$tranche2 = $formation->tranches()->save($tranche2);
		}
		$numero_ordre_tranche3 = 3;
		$montant_tranche3 = $inputs['montantTranche3'];
		if(is_numeric($montant_tranche3) == true)
		{
			$tranche3 = new Tranche;
			$tranche3->numero_ordre = $numero_ordre_tranche3;
			$tranche3->montant = floatval($montant_tranche3);

			$tranche3 = $formation->tranches()->save($tranche3);
		}

	}

	public function getTranche($id)
	{
		return Tranche::find($id);
	}

	public function getFormationTranche($idTranche)
	{
		return $this->getTranche($idTranche)->formation()->get();
	}

	public function supprimTranche($id)
	{
		
	}

	public function getTrancheFormationNumero($id, $numero)
	{
		$trouve = 0;
		$tranches = $this->getTranchesFormation($id);
		foreach($tranches as $tranche)
		{
			if($tranche->numero_ordre == $numero)
			{
				$trouve = 1;
				return $tranche;
			}
		}
		if($trouve == 0)
		{
			return null;
		}
	}





	public function getPaginate($n)
	{
		
	}

	public function store(Array $inputs)
	{
		return $this->save($inputs);
	}

	public function getById($id)
	{
		return Tranche::find($id);
	}

	public function update($id, Array $inputs)
	{
		
	}

	public function destroy($id)
	{
		$this->getTranche($id)->delete();
	}

}