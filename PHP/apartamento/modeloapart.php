<?php
    require_once("../modeloAbstractoDB.php");
	
    class Apartamento extends ModeloAbstractoDB {
		public $id_apto;
		public $nombre_apto;
		public $id_habitante;
		public $id_bloque;
		
		function __construct() {
			//$this->db_name = '';
		}
		public function consultar($id_apto='') {
			if($id_apto !=''):
				$this->query = "
				SELECT id_apto, nombre_apto, id_habitante, id_bloque
				FROM apartamento
				WHERE id_apto = '$id_apto' order by id_apto
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}
		
		public function lista() {
			$this->query = "
			SELECT id_apto, nombre_apto, id_habitante, id_bloque
			
			FROM apartamento
			";

			/*$this->query = "
			SELECT id_apto, nombre_apto, m.id_habitante
			FROM tb_contrato as c inner join apartamento as m
			ON (c.id_habitante = m.id_habitante) order by id_apto
			";

			/*$this->query = "
			SELECT id_apto, nombre_apto, id_habitante
			FROM tb_comuna as c 
			";*/
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		/*public function nuevo($datos=array()) {
			if(array_key_exists('id_apto', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO apartamento
					(id_apto, nombre_apto, id_habitante)
					VALUES
					(NULL, '$nombre_apto', '$id_habitante')
					";
				$this->ejecutar_query_simple();
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE apartamento
			SET nombre_apto='$nombre_apto',
			perso_apel='$perso_apel'
			WHERE id_apto = '$id_apto'
			";
			$this->ejecutar_query_simple();
		}
		
		public function borrar($id_apto='') {
			$this->query = "
			DELETE FROM apartamento
			WHERE id_apto = '$id_apto'
			";
			$this->ejecutar_query_simple();
		}
		
		function __destruct() {
			//unset($this);
		}*/
	}
?>