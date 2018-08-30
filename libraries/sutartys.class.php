<?php
/**
 * Sutarčių redagavimo klasė
 *
 * @author ISK
 */

class sutartys {

	private $uzsakymas_lentele = '';
	private $uzsakovas_lentele = '';
	private $sutarties_būsenos_lentele = '';
	private $papildomas_mokestis_lentele = '';
	private $adresas_lentele = '';
	private $klase_lentele = '';

	
	public function __construct() {
		$this->uzsakymas_lentele = 'užsakymas';
		$this->uzsakovas_lentele = 'užsakovas';
		$this->sutarties_būsenos_lentele = 'sutarties_būsenos';
		$this->papildomas_mokestis_lentele = 'papildomas_mokestis';
		$this->adresas_lentele = 'adresas';
		$this->klase_lentele = 'klasė';
	}
	
	/**
	 * Sutarčių sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getsutartysList($limit, $offset) {
		$query = "  SELECT `{$this->uzsakymas_lentele}`.`nr`,
						   `{$this->uzsakymas_lentele}`.`užsakymo_data`,
						   `{$this->uzsakymas_lentele}`.`pristatymo_data`,
						   `{$this->uzsakymas_lentele}`.`kaina`,
						   `{$this->sutarties_būsenos_lentele}`.`name` AS `būsena`,
						   `{$this->uzsakovas_lentele}`.`vardas` AS `užsakovo_vardas`,
						   `{$this->uzsakovas_lentele}`.`pavardė` AS `užsakovo_pavardė`
					FROM `{$this->uzsakymas_lentele}`
						LEFT JOIN `{$this->sutarties_būsenos_lentele}`
							ON `{$this->uzsakymas_lentele}`.`būsena`=`{$this->sutarties_būsenos_lentele}`.`id_sutarties_būsenos`
						LEFT JOIN `{$this->uzsakovas_lentele}`
							ON `{$this->uzsakymas_lentele}`.`fk_UŽSAKOVASasmens_kodas`=`{$this->uzsakovas_lentele}`.`asmens_kodas`";
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Sutarčių kiekio radimas
	 * @return type
	 */
	public function getsutartysListCount() {
		$query = "  SELECT COUNT(`nr`) as `kiekis`
					FROM `{$this->uzsakymas_lentele}`";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];

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
		
		$query = "  SELECT `nr`,
						   `{$this->uzsakovas_lentele}`.`vardas`,
						   `{$this->uzsakovas_lentele}`.`pavardė`,
						   `{$this->uzsakovas_lentele}`.`e_paštas`,
						   `užsakymo_data`
						FROM `{$this->uzsakymas_lentele}`
					INNER JOIN `{$this->uzsakovas_lentele}`
							ON `{$this->uzsakymas_lentele}`.`fk_UŽSAKOVASasmens_kodas`=`{$this->uzsakovas_lentele}`.`asmens_kodas`
					{$whereClauseString}
					GROUP BY `{$this->uzsakovas_lentele}`.`asmens_kodas`";
					


		$data = mysql::select($query);

		return $data;
	}
	
	/**
	 * Sutarties išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getsutartys($id) {
		$query = "  SELECT `{$this->uzsakymas_lentele}`.`nr`,
						   `{$this->uzsakymas_lentele}`.`užsakymo_data`,
						   `{$this->uzsakymas_lentele}`.`pristatymo_data`,
						   `{$this->uzsakymas_lentele}`.`kaina`,
						   `{$this->sutarties_būsenos_lentele}`.`name` AS `būsena`,
						   `{$this->uzsakovas_lentele}`.`vardas` AS `užsakovo_vardas`,
						   `{$this->uzsakovas_lentele}`.`pavardė` AS `užsakovo_pavardė`,
						   `{$this->adresas_lentele}`.`gatvė` AS `gatvė`,
						   `{$this->klase_lentele}`. `praba` AS `klasė`
					FROM `{$this->uzsakymas_lentele}`
						LEFT JOIN `{$this->sutarties_būsenos_lentele}`
							ON `{$this->uzsakymas_lentele}`.`būsena`=`{$this->sutarties_būsenos_lentele}`.`id_sutarties_būsenos`
						LEFT JOIN `{$this->uzsakovas_lentele}`
							ON `{$this->uzsakymas_lentele}`.`fk_UŽSAKOVASasmens_kodas`=`{$this->uzsakovas_lentele}`.`asmens_kodas`
						LEFT JOIN `{$this->adresas_lentele}`
							ON `{$this->uzsakymas_lentele}`.`fk_ADRESASid_ADRESAS`=`{$this->adresas_lentele}`.`id_ADRESAS`
						LEFT JOIN `{$this->klase_lentele}`
							ON `{$this->uzsakymas_lentele}`.`fk_KLASĖid`=`{$this->klase_lentele}`.`id`";

		$data = mysql::select($query);

		return $data[0];
	}
	
	/**
	 * Užsakytų papildomų paslaugų sąrašo išrinkimas
	 * @param type $orderId
	 * @return type
	 */
	public function getOrderedServices($orderId) {
		$query = "  SELECT *
					FROM `{$this->papildomas_mokestis_lentele}`
					WHERE `fk_sutartis`='{$orderId}'";
		$data = mysql::select($query);
		
		return $data;
	}
		/**
	 * Pavarų dėžių sąrašo išrinkimas
	 * @return type
	 */
	public function getGatveList() {
		$query = "  SELECT *
					FROM `{$this->adresas_lentele}`";
		$data = mysql::select($query);
		
		return $data;
	}
			/**
	 * Pavarų dėžių sąrašo išrinkimas
	 * @return type
	 */
	public function getKlaseList() {
		$query = "  SELECT *
					FROM `{$this->klase_lentele}`";
		$data = mysql::select($query);
		
		return $data;
	}
	
	/**
	 * Sutarties atnaujinimas
	 * @param type $data
	 */
	public function updatesutartys($data) {
		$query = "  UPDATE `{$this->uzsakymas_lentele}`
					SET    `užsakymo_data`='{$data['užsakymo_data']}',
						   `pristatymo_data`='{$data['pristatymo_data']}',
						   `kaina`='{$data['kaina']}',
						   `būsena`='{$data['sutarties_būsenos']}',
						   `fk_UŽSAKOVASasmens_kodas`='{$data['užsakovas']}',
						   `fk_ADRESASid_ADRESAS`='{$data['adresas']}',
						   `fk_KLASĖid`='{$data['klasė']}'
					WHERE `nr`='{$data['nr']}'";
		mysql::query($query);
	}
	
	/**
	 * Sutarties įrašymas
	 * @param type $data
	 */
	public function insertsutartys($data) {
		$query = "  INSERT INTO `{$this->uzsakymas_lentele}`
								(
									`nr`,
									`užsakymo_data`,
									`pristatymo_data`,
									`kaina`,
									`būsena`,
									`fk_UŽSAKOVASasmens_kodas`,
									`fk_ADRESASid_ADRESAS`,
									`fk_KLASĖid`
								)
								VALUES
								(
									'{$data['nr']}',
									'{$data['užsakymo_data']}',
									'{$data['pristatymo_data']}',
									'{$data['kaina']}',
									'{$data['sutarties_būsenos']}',
									'{$data['užsakovas']}',
									'{$data['adresas']}',
									'{$data['klasė']}'
								)";
		mysql::query($query);
	}
	
	
	/**
	 * Sutarties šalinimas
	 * @param type $id
	 */
	public function deleteSutartys($id) {
		$query = "  DELETE FROM `{$this->uzsakymas_lentele}`
					WHERE `nr`='{$id}'";
		mysql::query($query);
	}
	
	/**
	 * Užsakytų papildomų paslaugų šalinimas
	 * @param type $sutartysId
	 */
	public function deleteOrderedServices($sutartysId) {
		$query = "  DELETE FROM `{$this->papildomas_mokestis_lentele}`
					WHERE `fk_UŽSAKYMASnr`='{$sutartysId}'";
		mysql::query($query);
	}
	
	/**
	 * Užsakytų papildomų paslaugų atnaujinimas
	 * @param type $data
	 */
	public function updateOrderedServices($data) {
		$this->deleteOrderedServices($data['nr']);
		
		if(isset($data['paslaugos']) && sizeof($data['paslaugos']) > 0) {
			foreach($data['paslaugos'] as $key=>$val) {
				$tmp = explode(":", $val);
				$serviceId = $tmp[0];
				$price = $tmp[1];
				$date_from = $tmp[2];
				$query = "  INSERT INTO `{$this->papildomas_mokestis_lentele}`
										(
											`fk_sutartis`,
											`fk_kaina_galioja_nuo`,
											`fk_paslauga`,
											`kiekis`,
											`kaina`
										)
										VALUES
										(
											'{$data['nr']}',
											'{$date_from}',
											'{$serviceId}',
											'{$data['kiekiai'][$key]}',
											'{$price}'
										)";
					mysql::query($query);
			}
		}
	}
	
	/**
	 * Sutarties būsenų sąrašo išrinkimas
	 * @return type
	 */
	public function getBusenos() {
		$query = "  SELECT *
					FROM `{$this->sutarties_būsenos_lentele}`";
		$data = mysql::select($query);
		
		return $data;
	}
	
	
	/**
	 * Paslaugos kainų įtraukimo į užsakymus kiekio radimas
	 * @param type $serviceId
	 * @param type $validFrom
	 * @return type
	 */
	public function getPricesCountOfOrderedServices($serviceId, $validFrom) {
		$query = "  SELECT COUNT(`{$this->papildomas_mokestis_lentele}`.`fk_paslauga`) AS `kiekis`
					FROM `{$this->paslaugu_kainos_lentele}`
						INNER JOIN `{$this->papildomas_mokestis_lentele}`
							ON `{$this->paslaugu_kainos_lentele}`.`fk_paslauga`=`{$this->papildomas_mokestis_lentele}`.`fk_paslauga` AND `{$this->paslaugu_kainos_lentele}`.`galioja_nuo`=`{$this->papildomas_mokestis_lentele}`.`fk_kaina_galioja_nuo`
					WHERE `{$this->paslaugu_kainos_lentele}`.`fk_paslauga`='{$serviceId}' AND `{$this->paslaugu_kainos_lentele}`.`galioja_nuo`='{$validFrom}'";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}

/*	public function getklientaiutartys($dateFrom, $dateTo) {
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
		
		$query = "  SELECT ``,
						   `pavadinimas`,
						   sum(`kiekis`) AS `uzsakyta`,
						   sum(`kiekis`*`{$this->uzsakytos_paslaugos_lentele}`.`kaina`) AS `bendra_suma`
					FROM `{$this->paslaugos_lentele}`
						INNER JOIN `{$this->uzsakytos_paslaugos_lentele}`
							ON `{$this->paslaugos_lentele}`.`id`=`{$this->uzsakytos_paslaugos_lentele}`.`fk_paslauga`
						INNER JOIN `{$this->sutartys_lentele}`
							ON `{$this->uzsakytos_paslaugos_lentele}`.`fk_sutartis`=`{$this->sutartys_lentele}`.`nr`
					{$whereClauseString}
					GROUP BY `{$this->paslaugos_lentele}`.`id` ORDER BY `bendra_suma` DESC";


		$data = mysql::select($query);

		return $data;
	}*/
	
	public function getSumPriceOfsutartys($dateFrom, $dateTo) {
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
		
		$query = "  SELECT sum(`{$this->uzsakymas_lentele}`.`kaina`) AS `nuomos_suma`
					FROM `{$this->uzsakymas_lentele}`
					{$whereClauseString}";
		$data = mysql::select($query);

		return $data;
	}

	public function getSumPriceOfOrderedServices($dateFrom, $dateTo) {
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
		
		$query = "  SELECT sum(`{$this->papildomas_mokestis_lentele}`.`kiekis` * `{$this->papildomas_mokestis_lentele}`.`kaina`) AS `paslaugu_suma`
					FROM `{$this->uzsakymas_lentele}`
						INNER JOIN `{$this->papildomas_mokestis_lentele}`
							ON `{$this->uzsakymas_lentele}`.`nr`=`{$this->papildomas_mokestis_lentele}`.`fk_sutartis`
					{$whereClauseString}";
		$data = mysql::select($query);

		return $data;
	}
	
	public function getDelayedgamKl($dateFrom, $dateTo) {
		$whereClauseString = "";
		if(!empty($dateFrom)) {
			$whereClauseString .= " AND `{$this->uzsakymas_lentele}`.`sutarties_data`>='{$dateFrom}'";
			if(!empty($dateTo)) {
				$whereClauseString .= " AND `{$this->uzsakymas_lentele}`.`sutarties_data`<='{$dateTo}'";
			}
		} else {
			if(!empty($dateTo)) {
				$whereClauseString .= " AND `{$this->uzsakymas_lentele}`.`sutarties_data`<='{$dateTo}'";
			}
		}
		
		$query = "  SELECT `nr`,
						   `sutarties_data`,
						   `planuojama_grazinimo_data_laikas`,
						   IF(`faktine_grazinimo_data_laikas`='0000-00-00 00:00:00', 'negrąžinta', `faktine_grazinimo_data_laikas`) AS `grazinta`,
						   `{$this->uzsakovas_lentele}`.`vardas`,
						   `{$this->uzsakovas_lentele}`.`pavardė`
					FROM `{$this->uzsakymas_lentele}`
						INNER JOIN `{$this->uzsakovas_lentele}`
							ON `{$this->uzsakymas_lentele}`.`fk_užsakovas`=`{$this->uzsakovas_lentele}`.`asmens_kodas`
					WHERE (DATEDIFF(`faktine_grazinimo_data_laikas`, `planuojama_grazinimo_data_laikas`) >= 1 OR
						(`faktine_grazinimo_data_laikas` = '0000-00-00 00:00:00' AND DATEDIFF(NOW(), `planuojama_grazinimo_data_laikas`) >= 1))
					{$whereClauseString}";
		$data = mysql::select($query);

		return $data;
	}
	
}