<?php namespace entity;

class Boulanger
{
	// properties

	private $id;
	private $nom;
	private $nb_vendu;

	// getters

	public function get_id(){ return $this->id; }
	public function get_nom(){ return $this->nom; }
	public function get_nb_vendu(){ return $this->nb_vendu; }

	// setters

	public function set_id($value){ $this->id = $value; }
	public function set_nom($value){ $this->nom = $value; }
	public function set_nb_vendu($value){ $this->nb_vendu = $value; }

	// methods

	public function properties(){ return get_object_vars($this); }
	public function properties_names(){ return array_keys(get_object_vars($this)); }
	public function to_string() { return "nom : $this->id, nom : $this->nom, nb_vendu : $this->nb_vendu"; }
}

?>