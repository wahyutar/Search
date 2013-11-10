<?php
class Products_model extends CI_Model {

    var $ProductName  = '';
    var $ProductID = '';
	
	
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_products()
    {
        $query = $this->db->get('products');
        return $query->result();
    }
	//menampilkan produk berdasar ProdukID
    function get_products_by_id($id)
    {
        $this->db->where('ProductID',$id);
        $query = $this->db->get('products');
        return $query->row();
    }


		function caridata(){
		$CategoryID = $this->input->POST ('CategoryID');
		$ProductName = $this->input->POST ('ProductName');
		// penyelarasan antara data dari input dengan nama field dalam database
		$this->db->like('CategoryID', $CategoryID);
		$this->db->like('ProductName', $ProductName);
		// proses pencarian dengan query like
		
		$query = $this->db->get ('products');
		return $query->result(); 
		//pengembalian nilai yang dicari untuk dikirim ke product.php controlleruntuk kemudian ditampilkan 
	}

	



	// fungsi untuk mengupdate data
    function update_entry()
    {
        $this->ProductName  = $this->input->post('ProductName',true); 
        $this->SupplierID   = $this->input->post('SupplierID',true);         
        return $this->db->update('products', $this, array('ProductID' => $this->input->post('id',true)));
    }
	// fungsi menghapus data 
    function hapus($id)
    {
        $this->db->where('ProductID',$id);
        return $this->db->delete('products');
    }
	
	
    function insert_entry()
    {
        $this->ProductName  = $this->input->post('ProductName',true); 
        $this->SupplierID   = $this->input->post('SupplierID',true);         
        return $this->db->insert('products', $this);
    }

    function cek_dependensi($id)
    {
        $this->db->where('ProductID',$id);
        $query = $this->db->count_all('products');
        return ($query==0) ? true : false;
    }
}