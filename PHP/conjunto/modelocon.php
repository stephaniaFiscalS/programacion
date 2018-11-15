 <?php
    require_once("../modeloAbstractoDB.php");
	
    class Conjunto extends ModeloAbstractoDB {
		public $id_conjunto;
		public $nombre_conjunto;
		public $direc_conjunto;
		public $id_ciudad;
		
		function __construct() {
			//$this->db_name = '';
		}
		public function consultar($id_conjunto='') {
			if($id_conjunto !=''):
				$this->query = "
				SELECT id_conjunto, nombre_conjunto, direc_conjunto, id_ciudad
				FROM conjunto
				WHERE id_conjunto = '$id_conjunto' order by id_conjunto
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
			SELECT id_conjunto, nombre_conjunto, direc_conjunto, id_ciudad
			
			FROM conjunto 
			
			";

			/*$this->query = "
			SELECT id_conjunto, nombre_conjunto, m.direc_conjunto
			FROM tb_contrato as c inner join conjunto as m
			ON (c.direc_conjunto = m.direc_conjunto) order by id_conjunto
			";

			/*$this->query = "
			SELECT id_conjunto, nombre_conjunto, direc_conjunto
			FROM tb_comuna as c 
			";*/
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		/*public function nuevo($datos=array()) {
			if(array_key_exists('id_conjunto', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO conjunto
					(id_conjunto, nombre_conjunto, direc_conjunto)
					VALUES
					(NULL, '$nombre_conjunto', '$direc_conjunto')
					";
				$this->ejecutar_query_simple();
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE conjunto
			SET nombre_conjunto='$nombre_conjunto',
			perso_apel='$perso_apel'
			WHERE id_conjunto = '$id_conjunto'
			";
			$this->ejecutar_query_simple();
		}
		
		public function borrar($id_conjunto='') {
			$this->query = "
			DELETE FROM conjunto
			WHERE id_conjunto = '$id_conjunto'
			";
			$this->ejecutar_query_simple();
		}
		
		function __destruct() {
			//unset($this);
		}*/
	}
?>