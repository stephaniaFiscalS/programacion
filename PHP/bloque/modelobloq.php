<?php
    require_once("../modeloAbstractoDB.php");
	
    class Bloque extends ModeloAbstractoDB {
		public $id_bloque;
		public $nombre_bloque;
		public $id_conjunto;
		
		function __construct() {
			//$this->db_name = '';
		}
		public function consultar($id_bloque='') {
			if($id_bloque !=''):
				$this->query = "
				SELECT id_bloque, nombre_bloque, id_conjunto
				FROM bloque
				WHERE id_bloque = '$id_bloque' order by id_bloque
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
			SELECT id_bloque, nombre_bloque, id_conjunto
			
			FROM bloque 
			";

			/*$this->query = "
			SELECT id_bloque, nombre_bloque, m.id_conjunto
			FROM tb_contrato as c inner join bloque as m
			ON (c.id_conjunto = m.id_conjunto) order by id_bloque
			";

			/*$this->query = "
			SELECT id_bloque, nombre_bloque, id_conjunto
			FROM tb_comuna as c 
			";*/
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		/*public function nuevo($datos=array()) {
			if(array_key_exists('id_bloque', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO bloque
					(id_bloque, nombre_bloque, id_conjunto)
					VALUES
					(NULL, '$nombre_bloque', '$id_conjunto')
					";
				$this->ejecutar_query_simple();
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE bloque
			SET nombre_bloque='$nombre_bloque',
			perso_apel='$perso_apel'
			WHERE id_bloque = '$id_bloque'
			";
			$this->ejecutar_query_simple();
		}
		
		public function borrar($id_bloque='') {
			$this->query = "
			DELETE FROM bloque
			WHERE id_bloque = '$id_bloque'
			";
			$this->ejecutar_query_simple();
		}
		
		function __destruct() {
			//unset($this);
		}*/
	}
?>