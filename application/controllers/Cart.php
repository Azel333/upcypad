<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Cart extends CI_Controller{
     
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->library('Template');
        is_logged_admin();
    }
 
    function index(){
        $data['data']=$this->cart_model->get_all_produk();
        $data['contain'] = $this->cart->contents();
        $this->template->template_utama('pengguna/v_cart',$data);
    }
 
    function add_to_cart(){ //fungsi Add To Cart
        $data = array(
            'id' => $this->input->post('produk_id'), 
            'name' => $this->input->post('produk_nama'), 
            'price' => $this->input->post('produk_harga'), 
            'qty' => $this->input->post('quantity'), 
        );
        $this->cart->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
    }
 
    function show_cart(){ //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$items['name'].'</td>
                    <td>'.number_format($items['price']).'</td>
                    <td class="tb_qty">
                        <input type="number" name="quantity2" id="id2" value="-1" class="quantity form-control" hidden="">
                        <button id="'.$items['rowid'].'" class="min_cart text-center btn-sm btn" data-id="'.$items['id'].'" data-produknama="'.$items['name'].'" data-produkharga="'.$items['price'].'">-</button>
                        <input type="number" name="quantity['.$no.']" id="id3" value="'.$items['qty'].'" class="quantity form-control" hidden="">'.$items['qty'].'
                        <input type="number" name="quantity3" id="id" value="1" class="quantity form-control" hidden="">
                        <button id="'.$items['rowid'].'" class="adds_cart text-center btn-sm btn" data-id="'.$items['id'].'" data-produknama="'.$items['name'].'" data-produkharga="'.$items['price'].'">+</button>
                    </td>
                    <td>'.number_format($items['subtotal']).'</td>
                    <td>
                              <button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-secondary">Batal</button>
                          <input type="text" name="id'.$items['id'].'" class="form-control" id="inputCity" value="'.$items['id'].'" hidden="">
                    </td>
                    <td>

                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'.$items['id'].'">
                                  Detail
                              </button>
                    </td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
            </tr>
        ';
        return $output;

    }
 
    function load_cart(){ //load data cart
        echo $this->show_cart();
    }
 
    function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }

    function shopping_cart(){

        $data['produk'] = $this->db->get('produk')->result_array();
        $data['data']=$this->cart_model->get_all_produk();
        $data['contain'] = $this->cart->contents();
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'trim|required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim');

        $qty = $this->input->post('quantity[]');
        $produk_id = $this->input->post('id_produk[]');
        $warna = $this->input->post('warna_produk[]');
        $ukuran = $this->input->post('ukuran_produk[]');
         

        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('role_id') == 2)
            {
                if ($this->form_validation->run() == false) {
                $this->template->template_utama('pengguna/v_shopping_cart',$data);
                }else{
                    redirect('cart/konfirmasi');
                }
            }
            else
            {
                if ($this->form_validation->run() == false) {
                $this->template->template_pengunjung('pengguna/v_shopping_cart',$data);
                }else{
                    redirect('cart/konfirmasi');
            }
        }
        }else{
            $data['array_qty'] =implode("-", $qty); 
            $data['array_produk_id'] =implode("-", $produk_id); 
            $data['array_warna'] =implode("-", $warna);
            $data['array_ukuran'] =implode("-", $ukuran);

            $data['transaksi'] = array( 
                'id_produk' => $data['array_produk_id'], 
                'invoice' => $this->input->post('invoice'), 
                'warna_produk' => $data['array_warna'], 
                'ukuran_produk' => $data['array_ukuran'], 
                'jumlah_beli' => $data['array_qty'], 
                'tanggal_transaksi' => date('Y-m-d'), 
                'status_pembayaran' => '0',
                'status_konfirmasi' => '0',
                'status_pengiriman' => '0', 
                'kurir' => $this->input->post('kurir')
            );
            $data['pembeli'] = array(
                'invoice' => $this->input->post('invoice'), 
                'nama_depan' => $this->input->post('nama_depan'), 
                'nama_belakang' => $this->input->post('nama_belakang'), 
                'alamat' => $this->input->post('alamat'), 
                'kota' => $this->input->post('kota'), 
                'kode_pos' => $this->input->post('kode_pos'), 
                'no_hp' => $this->input->post('no_hp')
            );
            $this->db->insert('transaksi',$data['transaksi']);
            $this->db->insert('data_pembelian',$data['pembeli']);

            redirect('cart/konfirmasi');
        }

       

        
        
    }

    function jumlah_cart(){

            $data['contain'] = $this->cart->contents();
            $this->load->view('pengguna/v_jumlah_cart', $data);
        
    }

    function konfirmasi(){
        $data['title'] = 'Kontak';
        $data['data']=$this->cart_model->get_all_produk();
        $data['contain'] = $this->cart->contents();

        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'trim|required');
        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('role_id') == 2)
            {
                $this->template->template_utama('pengguna/v_konfirmasi', $data);
            }
            else
            {
                $this->template->template_pengunjung('pengguna/v_konfirmasi', $data);
        }
        }else{
            $invoice = $this->input->post('kode_invoice');
            $data['invoice'] = array(
                    'status_pembayaran' => '1'
                );
                $this->db->where('invoice', $invoice);
                $this->db->update('transaksi', $data['invoice']);

        }
    }
}