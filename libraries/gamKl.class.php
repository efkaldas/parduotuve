<?php
/**
 * Automobilių redagavimo klasė
 *
 * @author ISK
 */

class gamKl {

	private $klase_lentele = '';
	private $užsakymas_lentele = '';
	private $metalas_lentele = '';
	private $užsegimas_lentele = '';
	private $pynimas_lentele = '';
	private $grupė_lentele = '';
	private $gaminys_lentele = '';
	
	public function __construct() {
		$this->klase_lentele = 'klasė';
		$this->užsakymas_lentele = 'užsakymas';
		$this->metalas_lentele = 'metalas';
		$this->užsegimas_lentele = 'užsegimas';		
		$this->pynimas_lentele = 'pynimas';
		$this->grupė_lentele = 'grupė';
		$this->gaminys_lentele = 'gaminys';
	}
	
	/**
	 * Automobilio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getGam($id) {
		$query = "  SELECT `{$this->klase_lentele}`.`id`,
						   `{$this->klase_lentele}`.`praba`,
						   `{$this->klase_lentele}`.`dydis`,
						   `{$this->klase_lentele}`.`storis`,
						   `{$this->klase_lentele}`.`svoris`,
						   `{$this->klase_lentele}`.`atributai`,
						   `{$this->metalas_lentele}`.`name` AS `metalo_tipas`,
						   `{$this->užsegimas_lentele}`.`name` AS `užsegimo_tipas`,
						   `{$this->pynimas_lentele}`.`name` AS `pynimo_tipas`,
						   `{$this->grupė_lentele}`.`pavadinimas` AS `grupė`,
						   `{$this->gaminys_lentele}`.`pavadinimas` AS `gaminys`
					FROM `{$this->klase_lentele}`
						LEFT JOIN `{$this->metalas_lentele}`
							ON `{$this->klase_lentele}`.`metalo_tipas`=`{$this->metalas_lentele}`.`id_metalas`
						LEFT JOIN `{$this->užsegimas_lentele}`
							ON `{$this->klase_lentele}`.`užsegimo_tipas`=`{$this->užsegimas_lentele}`.`id_užsegimas`
						LEFT JOIN `{$this->pynimas_lentele}`
							ON `{$this->klase_lentele}`.`pynimo_tipas`=`{$this->pynimas_lentele}`.`id_pynimas`
						LEFT JOIN `{$this->grupė_lentele}`
							ON `{$this->klase_lentele}`.`fk_GRUPĖid_GRUPĖ`=`{$this->grupė_lentele}`.`id_GRUPĖ`
						LEFT JOIN `{$this->gaminys_lentele}`
							ON `{$this->klase_lentele}`.`fk_GAMINYSkodas`=`{$this->gaminys_lentele}`.`kodas`";
							
							
					
		$data = mysql::select($query);
		
		return $data[0];
	}
	public function asd($dateFrom, $dateTo) {
		$whereClauseString = "";
		if(!empty($dateFrom)) {
			$whereClauseString .= " WHERE `{$this->užsakymas_lentele}`.`užsakymo_data`>='{$dateFrom}'";
			if(!empty($dateTo)) {
				$whereClauseString .= " AND `{$this->užsakymas_lentele}`.`užsakymo_data`<='{$dateTo}'";
			}
		} else {
			if(!empty($dateTo)) {
				$whereClauseString .= " WHERE `{$this->užsakymas_lentele}`.`užsakymo_data`<='{$dateTo}'";
			}
		}
		
		$query = "  SELECT `id`,
						   `{$this->gaminys_lentele}`.`pavadinimas`,
						   `praba` AS `uzsakyta`
					FROM `{$this->klase_lentele}`
					INNER JOIN `{$this->gaminys_lentele}`
							ON `{$this->klase_lentele}`.`fk_GAMINYSkodas`=`{$this->gaminys_lentele}`.`kodas`
						INNER JOIN `{$this->užsakymas_lentele}`
							ON `{$this->klase_lentele}`.`id`=`{$this->užsakymas_lentele}`.`fk_KLASĖid`
					{$whereClauseString}
					GROUP BY `{$this->klase_lentele}`.`id`";
					


		$data = mysql::select($query);

		return $data;
	}
	
	/**
	 * Automobilio atnaujinimas
	 * @param type $data
	 */
	public function updateGam($data) {
		$query = "  UPDATE `{$this->klase_lentele}`
					SET    `praba`='{$data['praba']}',
						   `dydis`='{$data['dydis']}',
						   `storis`='{$data['storis']}',
						   `svoris`='{$data['svoris']}',
						   `atributai`='{$data['atributai']}',
						   `metalo_tipas`='{$data['metalas']}',
						   `užsegimo_tipas`='{$data['užsegimas']}',
						   `pynimo_tipas`='{$data['pynimas']}',
						   `fk_GRUPĖid_GRUPĖ`='{$data['grupė']}',
						   `fk_GAMINYSkodas`='{$data['gaminys']}'
					WHERE `id`='{$data['id']}'";
		mysql::query($query);
	}

	/**
	 * Automobilio įrašymas
	 * @param type $data
	 */
	public function insertGam($data) {
		$query = "  INSERT INTO `{$this->klase_lentele}` 
								(
									`id`,
									`praba`,
									`dydis`,
									`storis`,
									`svoris`,
									`atributai`,
									`metalo_tipas`,
									`užsegimo_tipas`,
									`pynimo_tipas`,
									`fk_GRUPĖid_GRUPĖ`,
									`fk_GAMINYSkodas`
								) 
								VALUES
								(
									'{$data['id']}',
									'{$data['praba']}',
									'{$data['dydis']}',
									'{$data['storis']}',
									'{$data['svoris']}',
									'{$data['atributai']}',
									'{$data['metalas']}',
									'{$data['užsegimas']}',
									'{$data['pynimas']}',
									'{$data['grupė']}',
									'{$data['gaminys']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Automobilių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getGamList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT `{$this->klase_lentele}`.`id`,
						   `{$this->klase_lentele}`.`praba`,
						   `{$this->klase_lentele}`.`dydis`,
						   `{$this->klase_lentele}`.`storis`,
						   `{$this->klase_lentele}`.`svoris`,
						   `{$this->klase_lentele}`.`atributai`,
						   `{$this->metalas_lentele}`.`name` AS `metalo_tipas`,
						   `{$this->užsegimas_lentele}`.`name` AS `užsegimo_tipas`,
						   `{$this->pynimas_lentele}`.`name` AS `pynimo_tipas`,
						   `{$this->grupė_lentele}`.`pavadinimas` AS `grupė`,
						   `{$this->gaminys_lentele}`.`pavadinimas` AS `gaminys`
					FROM `{$this->klase_lentele}`
						LEFT JOIN `{$this->metalas_lentele}`
							ON `{$this->klase_lentele}`.`metalo_tipas`=`{$this->metalas_lentele}`.`id_metalas`
						LEFT JOIN `{$this->užsegimas_lentele}`
							ON `{$this->klase_lentele}`.`užsegimo_tipas`=`{$this->užsegimas_lentele}`.`id_užsegimas`
						LEFT JOIN `{$this->pynimas_lentele}`
							ON `{$this->klase_lentele}`.`pynimo_tipas`=`{$this->pynimas_lentele}`.`id_pynimas`
						LEFT JOIN `{$this->grupė_lentele}`
							ON `{$this->klase_lentele}`.`fk_GRUPĖid_GRUPĖ`=`{$this->grupė_lentele}`.`id_GRUPĖ`
						LEFT JOIN `{$this->gaminys_lentele}`
							ON `{$this->klase_lentele}`.`fk_GAMINYSkodas`=`{$this->gaminys_lentele}`.`kodas`" .$limitOffsetString;
							
							
					
		$data = mysql::select($query);
		return $data;
	}

	/**
	 * Automobilių kiekio radimas
	 * @return type
	 */
	public function getGamListCount() {
		$query = "  SELECT COUNT(`id`) as `kiekis`
					FROM `{$this->klase_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	/**
	 * Automobilio šalinimas
	 * @param type $id
	 */
	public function deleteGam($id) {
		$query = "  DELETE FROM `{$this->klase_lentele}`
					WHERE `id`='{$id}'";
		mysql::query($query);
	}
	
	/**
	 * Sutačių, į kurias įtrauktas automobilis, kiekio radimas
	 * @param type $id
	 * @return type
	 */
	public function getsutartysCountOfGam($id) {
		$query = "  SELECT COUNT(`{$this->užsakymas_lentele}`.`nr`) AS `kiekis`
					FROM `{$this->klase_lentele}`
						INNER JOIN `{$this->užsakymas_lentele}`
							ON `{$this->klase_lentele}`.`id`=`{$this->užsakymas_lentele}`.`fk_KLASĖid`
					WHERE `{$this->klase_lentele}`.`id`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Pavarų dėžių sąrašo išrinkimas
	 * @return type
	 */
	public function getMetalasList() {
		$query = "  SELECT *
					FROM `{$this->metalas_lentele}`";
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Degalų tipo sąrašo išrinkimas
	 * @return type
	 */
	public function getUzsegimasList() {
		$query = "  SELECT *
					FROM `{$this->užsegimas_lentele}`";
		$data = mysql::select($query);
		
		return $data;
	}
	/**
	 * Degalų tipo sąrašo išrinkimas
	 * @return type
	 */
	public function getGaminysList() {
		$query = "  SELECT `{$this->gaminys_lentele}`.`pavadinimas` AS `gaminys`
					FROM `{$this->gaminys_lentele}`";
		$data = mysql::select($query);
		
		return $data;
	}
		/**
	 * Degalų tipo sąrašo išrinkimas
	 * @return type
	 */
	public function getGrupeList() {
		$query = "  SELECT *
					FROM `{$this->grupė_lentele}`";
		$data = mysql::select($query);
		
		return $data;
	}
	/**
	 * Kėbulo tipų sąrašo išrinkimas
	 * @return type
	 */
	public function getPynimasList() {
		$query = "  SELECT *
					FROM `{$this->pynimas_lentele}`";
		$data = mysql::select($query);
		
		return $data;
	}


	/**
	 * Automobilio būsenų sąrašo išrinkimas
	 * @return type
	 */
	public function getgamKltateList() {
		$query = "  SELECT *
					FROM `{$this->auto_busenos_lentele}`";
		$data = mysql::select($query);
		
		return $data;
	}
	
}