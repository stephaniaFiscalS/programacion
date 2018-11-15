<?php
require_once("modeloAbstractoDB.php");

class Estado extends ModeloAbstractoDB {
	
	public $id_vehiculo;
	public $placa_vehiculo;
	public $modelo_vehiculo;
	public $marca_vehiculo;
	public $color_vehiculo;
	public $id_parking;
	public $id_habitante; 
		public $id_estado; //estado
		public $nombre_estado; //estado
		
		function __construct() {
			//$this->db_name = '';
		}
		public function consultar($id_vehiculo='') {
			if($id_vehiculo !=''):
				$this->query = "
				SELECT h.id_historico,p.nombre_persona,h.id_persona,v.placa_vehiculo,v.modelo_vehiculo,v.marca_vehiculo,v.color_vehiculo, k.numero_parking,e.nombre_estado
				FROM persona p,historico h,vehiculo v,parqueadero k,estado_parking e
				WHERE h.id_persona=p.id_persona and h.id_vehiculo=v.id_vehiculo and h.id_parking=k.id_parking and h.id_estado=e.id_estado";
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
			SELECT h.id_historico,p.nombre_persona,h.id_persona,v.placa_vehiculo,v.modelo_vehiculo,v.marca_vehiculo,v.color_vehiculo, k.numero_parking,e.nombre_estado
			FROM persona p,historico h,vehiculo v,parqueadero k,estado_parking e
			WHERE h.id_persona=p.id_persona and h.id_vehiculo=v.id_vehiculo and h.id_parking=k.id_parking and h.id_estado=e.id_estado
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