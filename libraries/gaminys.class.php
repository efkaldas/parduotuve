<?php
/**
 * Darbuotojų redagavimo klasė
 *
 * @author ISK
 */

class gaminys {
	
	private $gaminys_lentele = '';
	private $tipai_lentele = '';
	private $klase_lentele = '';
	private $uzsakymas_lentele = '';

	
	public function __construct() {
		$this->gaminys_lentele = 'gaminys';
		$this->tipai_lentele = 'tipai';
		$this->klase_lentele = 'klasė';
		$this->uzsakymas_lentele = 'užsakymas';
	}
	
	/**
	 * Darbuotojo išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getGaminys($id) {
		$query = "  SELECT `{$this->gaminys_lentele}`.`kodas`,
						   `{$this->gaminys_lentele}`.`pavadinimas`,
						   `{$this->tipai_lentele}`.`name` AS `tipai`
					FROM `{$this->gaminys_lentele}`
						LEFT JOIN `{$this->tipai_lentele}`
							ON `{$this->gaminys_lentele}`.`tipas`=`{$this->tipai_lentele}`.`id_tipai`";
		$data = mysql::select($query);

		return $data[0];
	}
	
	/**
	 * Darbuotojų sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getGaminysList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT `{$this->gaminys_lentele}`.`kodas`,
						   `{$this->gaminys_lentele}`.`pavadinimas`,
						   `{$this->tipai_lentele}`.`name` AS `tipai`
					FROM `{$this->gaminys_lentele}`
						LEFT JOIN `{$this->tipai_lentele}`
							ON `{$this->gaminys_lentele}`.`tipas`=`{$this->tipai_lentele}`.`id_tipai`" .$limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}

	public function getGaminysList2() {
		$query = "  SELECT `{$this->gaminys_lentele}`.`pavadinimas`
					FROM `{$this->gaminys_lentele}`";
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Darbuotojų kiekio radimas
	 * @return type
	 */
	public function getGaminysListCount() {
		$query = "  SELECT COUNT(`kodas`) as `kiekis`
					FROM `{$this->gaminys_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Darbuotojo šalinimas
	 * @param type $id
	 */
	public function deleteGaminys($id) {
		$query = "  DELETE FROM `{$this->gaminys_lentele}`
					WHERE `kodas`='{$id}'";
		mysql::query($query);
	}
	public function deleteTipai($contractId) {
		$query = "  DELETE FROM `{$this->tipai_lentele}`
					WHERE `tipas`='{$id}'";
		mysql::query($query);
	}
	
		/**
	 * Modelių išrinkimas pagal markę
	 * @param type $gamId
	 * @return type
	 */
	public function getGaminysbyTipas($gamId) {
		$query = "  SELECT *
					FROM `{$this->gaminys_lentele}`
					WHERE `tipas`='{$gamId}'";
		$data = mysql::select($query);
		
		return $data;
	}
	/**
	 * Darbuotojo atnaujinimas
	 * @param type $data
	 */
	public function updateGaminys($data) {
		$query = "  UPDATE `{$this->gaminys_lentele}`
					SET    `pavadinimas`='{$data['pavadinimas']}',
						   `tipas`='{$data['tipai']}'
					WHERE `kodas`='{$data['kodas']}'";
		mysql::query($query);
	}
		/**
	 * Kėbulo tipų sąrašo išrinkimas
	 * @return type
	 */
	public function getTipaiList() {
		$query = "  SELECT *
					FROM `{$this->tipai_lentele}`";
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Darbuotojo įrašymas
	 * @param type $data
	 */
	public function insertgaminys($data) {
		$query = "  INSERT INTO `{$this->gaminys_lentele}`
								(
									`kodas`,
									`pavadinimas`,
									`tipas`
								) 
								VALUES
								(
									'{$data['kodas']}',
									'{$data['pavadinimas']}',
									'{$data['tipai']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Sutarčių, į kurias įtrauktas darbuotojas, kiekio radimas
	 * @param type $id
	 * @return type
	 */
	public function getKlaseCount($id) {
		$query = "  SELECT COUNT({$this->klase_lentele}.`id`) AS `kiekis`
					FROM {$this->gaminys_lentele}
						INNER JOIN {$this->klase_lentele}
							ON {$this->gaminys_lentele}.`kodas`={$this->klase_lentele}.`fk_GAMINYSkodas`
					WHERE {$this->gaminys_lentele}.`kodas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
}