	<?php
    require_once("modeloAbstractoDB.php");
session_start();  
	
    class Persona extends ModeloAbstractoDB {
		public $id_persona;
		public $nombre_persona;
		public $edad_persona;
		public $tdoc_persona;
		public $doc_persona;
		public $tel_persona;
		public $email_persona;
		public $usuario_persona;
		public $id_rol;
		
		function __construct() {
			//$this->db_name = '';
		}
		public function consultar($id_persona='') {
			if($id_persona !=''):
				$this->query = "
				SELECT id_persona, nombre_persona, edad_persona, tdoc_persona, doc_persona, tel_persona, email_persona, usuario_persona, id_rol
				FROM persona
				WHERE id_persona = '$id_persona' AND id_rol = '4' order by id_persona
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}
		
		public function lista($id_persona='') {
			$this->query = "
			SELECT id_persona, nombre_persona, edad_persona, tdoc_persona, doc_persona, tel_persona, email_persona, usuario_persona, id_rol
			
			FROM persona 
			WHERE id_persona = $_SESSION[id_persona] and id_rol = '4' order by id_persona
			";

			/*$this->query = "
			SELECT id_persona, nombre_persona, m.edad_persona
			FROM tb_contrato as c inner join persona as m
			ON (c.edad_persona = m.edad_persona) order by id_persona
			";

			/*$this->query = "
			SELECT id_persona, nombre_persona, edad_persona
			FROM tb_comuna as c 
			";*/
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		/*public function nuevo($datos=array()) {
			if(array_key_exists('id_persona', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO persona
					(id_persona, nombre_persona, edad_persona)
					VALUES
					(NULL, '$nombre_persona', '$edad_persona')
					";
				$this->ejecutar_query_simple();
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE persona
			SET nombre_persona='$nombre_persona',
			perso_apel='$perso_apel'
			WHERE id_persona = '$id_persona'
			";
			$this->ejecutar_query_simple();
		}
		
		public function borrar($id_persona='') {
			$this->query = "
			DELETE FROM persona
			WHERE id_persona = '$id_persona'
			";
			$this->ejecutar_query_simple();
		}
		
		function __destruct() {
			//unset($this);
		}*/
	}
?>