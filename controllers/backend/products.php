<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
    {
        parent::__construct();   
        $this->load->model('products_model','datamodel'); 
    }
	   
	public function index()
	{
		$data['title']='List Of Products';	
		$data['array_products'] = $this->datamodel->get_products();
		$this->mytemplate->loadBackend('products',$data);
	}

	public function form($mode,$id='')
	{
		$data['title']=($mode=='insert')? 'Add Products' : 'Update Products';				
		$data['products'] = ($mode=='update') ? $this->datamodel->get_products_by_id($id) : '';
		$this->mytemplate->loadBackend('frmproducts',$data);	
	}
	
	// fungsi pencarian
    function cari() {
	   $data['title']='List Of Products';
       $data['array_products']=$this->datamodel->caridata();
	   //proses penyelasan relay untuk menngakse fungsi Caridata() yang berada di product_model.php
       $this->mytemplate->loadBackend('products',$data);
	   // proses meload kembali /menampilkan data yang baru sesuai hasil pencarian


}
	//
	
	
	public function process($mode,$id='')
	{
		
		if(($mode=='insert') || ($mode=='update'))
		{
			$result = ($mode=='insert') ? $this->datamodel->insert_entry() : $this->datamodel->update_entry();
		}else if($mode=='delete'){
			$result = $this->datamodel->hapus($id);			
		}	
		if ($result) redirect(site_url('backend/products'),'location');
	}
	
	private function dependensi($id)
	{
		return $this->datamodel->cek_dependensi($id);
	}
	
	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

