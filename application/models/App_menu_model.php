<?php defined('BASEPATH') OR exit('No direct script access allowed');

class App_menu_model extends CI_Model {

	public static $pk = 'id';

	public static $table = 'app_menus';

	public function get_menus()
	{
		return $this->db->select('*')->order_by('module_id', 'ASC')->order_by('parent_id', 'ASC')->get(self::$table);
	}

	public function get_modules()
	{
		return $this->db->select('*')->order_by('id', 'ASC')->get('app_modules');
	}

	public function nested_menus($parent_id = 0)
	{
		$menu = [];
		$this->db->select('*');
		$this->db->where('parent_id', $parent_id);
		$this->db->order_by('urutan', 'ASC');
		$this->db->order_by('nama_menu', 'ASC');
		$query = $this->db->get(self::$table);
		foreach ($query->result() as $row) {
			$menu[] = [
				'id' => $row->id,
				'nama_menu' => $row->nama_menu,
				'alamat_url' => $row->alamat_url,
				'module_id' => $row->module_id,
				'children' => $this->nested_menus($row->id),
			];
		}
		return $menu;
	}

	public function save_menu_position($parent_id, $children) {
		if ( ! is_null($children) ) {
			$i = 1;
			foreach ($children as $key => $value) {
				$id = $children[$key]['id'];
				$dataset = [
					'parent_id' => $parent_id,
					'urutan' => $i
				];
				$this->db->where(self::$pk, $id)->update(self::$table, $dataset);
				if (isset($children[$key]['children'][0])) {
					$this->save_menu_position($id, $children[$key]['children']);
				}
				$i++;
			}
		}
	}

	public function get_all_menus()
	{
		$this->db->order_by('parent_id ASC, urutan ASC');
        	$query = $this->db->get('app_menus');
        	return $query->result_array();
	}

	public function build_tree($elements, $parent_id = 0)
	{
        	$branch = [];
		foreach ($elements as $element)
		{
            		if ((int)$element['parent_id'] === (int)$parent_id)
			{
                		$children = $this->build_tree($elements, $element['id']);
                		if ($children)
				{
                    			$element['children'] = $children;
                		}
                		$branch[] = $element;
            		}
        	}
        	return $branch;
	}
}
