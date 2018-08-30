<?php
/**
 * Klientų redagavimo klasė
 *
 * @author ISK
 */

class klientai {
	
	private $uzsakovas_lentele = '';
	private $uzsakymas_lentele = '';
	
	public function __construct() {
		$this->uzsakovas_lentele = 'užsakovas';
		$this->uzsakymas_lentele = 'užsakymas';
	}
	
	/**
	 * Kliento išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getklientai($id) {
		$query = "  SELECT *
					FROM `{$this->uzsakovas_lentele}`
					WHERE `asmens_kodas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Klientų sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getklientaiList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT *
					FROM `{$this->uzsakovas_lentele}`" . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Klientų kiekio radimas
	 * @return type
	 */
	public function getklientaiListCount() {
		$query = "  SELECT COUNT(`asmens_kodas`) as `kiekis`
					FROM `{$this->uzsakovas_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
	/**
	 * Kliento šalinimas
	 * @param type $id
	 */
	public function deleteklientai($id) {
		$query = "  DELETE FROM `{$this->uzsakovas_lentele}`
					WHERE `asmens_kodas`='{$id}'";
		mysql::query($query);
	}
	public function ataskaita($dateFrom, $dateTo) {
		$whereClauseString = "";
		if(!empty($dateFrom)) {
			$whereClauseString .= " WHERE `{$this->uzsakymas_lentele}`.`užsakymo_data`>='{$dateFrom}'";
			if(!empty($dateTo)) {
				$whereClauseString .= " AND `{$this->uzsakymas_lentele}`.`užsakymo_data`<='{$dateTo}'";
			}
		} else {
			if(!empty($dateTo)) {
				$whereClauseString .= " WHERE `{$this->uzsakymas_lentele}`.`užsakymo_data`<='{$dateTo}'";
			}
		}
		
		$query = "  SELECT `asmens_kodas`,
						   `vardas`,
						   `pavardė`,
						   `e_paštas`,
						   `{$this->uzsakymas_lentele}`.`užsakymo_data`
						FROM `{$this->uzsakovas_lentele}`
					INNER JOIN `{$this->uzsakymas_lentele}`
							ON `{$this->uzsakovas_lentele}`.`asmens_kodas`=`{$this->uzsakymas_lentele}`.`fk_UŽSAKOVASasmens_kodas`
					INNER JOIN `{$this->uzsakymas_lentele}`
							ON `{$this->klase_lentele}`.`fk_GAMINYSkodas`=`{$this->gaminys_lentele}`.`kodas`
					{$whereClauseString}
					GROUP BY `{$this->uzsakovas_lentele}`.`asmens_kodas`";
					


		$data = mysql::select($query);

		return $data;
	}
	
	/**
	 * Kliento atnaujinimas
	 * @param type $data
	 */
	public function updateklientai($data) {
		$query = "  UPDATE `{$this->uzsakovas_lentele}`
					SET    `vardas`='{$data['vardas']}',
						   `pavardė`='{$data['pavardė']}',
						   `gimimo_dara`='{$data['gimimo_dara']}',
						   `telefonas`='{$data['telefonas']}',
						   `e_paštas`='{$data['e_paštas']}',
						   `miestas`='{$data['miestas']}',
						   `adresas`='{$data['adresas']}',
						   `pašto_kodas`='{$data['pašto_kodas']}'
					WHERE `asmens_kodas`='{$data['asmens_kodas']}'";
		mysql::query($query);
	}
	
	/**
	 * Kliento įrašymas
	 * @param type $data
	 */
	public function insertklientai($data) {
		$query = "  INSERT INTO `{$this->uzsakovas_lentele}`
								(
									`asmens_kodas`,
									`vardas`,
									`pavardė`,
									`gimimo_dara`,
									`telefonas`,
									`e_paštas`,
									`miestas`,
									`adresas`,
									`pašto_kodas`
								)
								VALUES
								(
									'{$data['asmens_kodas']}',
									'{$data['vardas']}',
									'{$data['pavardė']}',
									'{$data['gimimo_dara']}',
									'{$data['telefonas']}',
									'{$data['e_paštas']}',
									'{$data['miestas']}',
									'{$data['adresas']}',
									'{$data['pašto_kodas']}'
								)";
		mysql::query($query);
	}
	
	/**
	 * Sutarčių, į kurias įtrauktas klientas, kiekio radimas
	 * @param type $id
	 * @return type
	 */
	public function getsutartysCountOfklientai($id) {
		$query = "  SELECT COUNT(`{$this->uzsakymas_lentele}`.`nr`) AS `kiekis`
					FROM `{$this->uzsakovas_lentele}`
						INNER JOIN `{$this->uzsakymas_lentele}`
							ON `{$this->uzsakovas_lentele}`.`asmens_kodas`=`{$this->uzsakymas_lentele}`.`fk_UŽSAKOVASasmens_kodas`
					WHERE `{$this->uzsakovas_lentele}`.`asmens_kodas`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
}