<?php
    require_once("../modeloAbstractoDB.php");
	
    class Parqueadero extends ModeloAbstractoDB {
		public $id_vehiculo;
		public $placa_vehiculo;
		public $color_vehiculo;
		public $modelo_vehiculo;
		
		
		function __construct() {
			//$this->db_name = '';
		}
		public function consultar($id_vehiculo='') {
			if($id_vehiculo !=''):
				$this->query = "
				SELECT id_vehiculo, placa_vehiculo, modelo_vehiculo,marca_vehiculo,color_vehiculo
				FROM vehiculo
				WHERE id_vehiculo = '$id_vehiculo' order by id_vehiculo
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
			SELECT id_vehiculo, placa_vehiculo, modelo_vehiculo,marca_vehiculo,color_vehiculo
				FROM vehiculo
			";

			/*$this->query = "
			SELECT id_vehiculo, placa_vehiculo, m.color_vehiculo
			FROM tb_contrato as c inner join vehiculo as m
			ON (c.color_vehiculo = m.color_vehiculo) order by id_vehiculo
			";

			/*$this->query = "
			SELECT id_vehiculo, placa_vehiculo, color_vehiculo
			FROM tb_comuna as c 
			";*/
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		/*public function nuevo($datos=array()) {
			if(array_key_exists('id_vehiculo', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO vehiculo
					(id_vehiculo, placa_vehiculo, color_vehiculo)
					VALUES
					(NULL, '$placa_vehiculo', '$color_vehiculo')
					";
				$this->ejecutar_query_simple();
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE vehiculo
			SET placa_vehiculo='$placa_vehiculo',
			perso_apel='$perso_apel'
			WHERE id_vehiculo = '$id_vehiculo'
			";
			$this->ejecutar_query_simple();
		}
		
		public function borrar($id_vehiculo='') {
			$this->query = "
			DELETE FROM vehiculo
			WHERE id_vehiculo = '$id_vehiculo'
			";
			$this->ejecutar_query_simple();
		}
		
		function __destruct() {
			//unset($this);
		}*/
	}
?>