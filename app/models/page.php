<?php

class Page extends Model{

	protected $table       = 'tb_pages';
	protected $singular    = 'Page';
	protected $primary_key = 'id';

	public function load_by_name($name){
		$data = $this->db
			->select('*')
			->from($this->table)
			->where(array('name'=>$name))
			->get_field($this->primary_key);

		$this->fill($data);
	}

}