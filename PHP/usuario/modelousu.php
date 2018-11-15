<?php
require_once("../modeloAbstractoDB.php");

class Usuario extends ModeloAbstractoDB {
	public $id_habitante;
	public $nombre_habitante;
	public $apellido_habitante;
	public $edad_habitante;
	public $tipo_doc;
	public $num_doc;
	public $telefono_habitante;
	public $email_habitante;
	public $id_rol;

	function __construct() {
			//$this->db_name = '';
	}
	public function consultar($id_habitante='') {
		if($id_habitante !=''):
			$this->query = "
			SELECT id_habitante, nombre_habitante, apellido_habitante, edad_habitante, tipo_doc, num_doc, telefono_habitante, email_habitante, id_rol
			FROM habitante
			WHERE id_habitante = '$id_habitante' order by id_habitante
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
		$this->query="SELECT p.id_persona, p.nombre_persona, p.edad_persona, p.tdoc_persona, p.doc_persona, p.tel_persona, p.email_persona, p.last_session, p.usuario_persona, p.id_rol, r.nombre_rol 
			FROM persona p, rol r
			WHERE r.id_rol=1 and p.id_rol=1 ";

			/*$this->query = "
			SELECT id_habitante, nombre_habitante, m.apellido_habitante
			FROM tb_contrato as c inner join habitante as m
			ON (c.apellido_habitante = m.apellido_habitante) order by id_habitante
			";

			/*$this->query = "
			SELECT id_habitante, nombre_habitante, apellido_habitante
			FROM tb_comuna as c 
			";*/
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		/*public function nuevo($datos=array()) {
			if(array_key_exists('id_habitante', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO habitante
					(id_habitante, nombre_habitante, apellido_habitante)
					VALUES
					(NULL, '$nombre_habitante', '$apellido_habitante')
					";
				$this->ejecutar_query_simple();
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE habitante
			SET nombre_habitante='$nombre_habitante',
			perso_apel='$perso_apel'
			WHERE id_habitante = '$id_habitante'
			";
			$this->ejecutar_query_simple();
		}
		
		public function borrar($id_habitante='') {
			$this->query = "
			DELETE FROM habitante
			WHERE id_habitante = '$id_habitante'
			";
			$this->ejecutar_query_simple();
		}
		
		function __destruct() {
			//unset($this);
		}*/
	}
	?>