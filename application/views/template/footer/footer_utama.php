<script src="<?= base_url('assets/bootstrap-material-design/popper.js'); ?>"></script>

<script src="<?= base_url('assets/bootstrap-material-design/bootstrap-material-design.js'); ?>"></script>

<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

 <script>

  $('.form-check-input').on('click', function() {

      const menuId = $(this).data('menu');
      const roleId = $(this).data('role');

      $.ajax({
          url: "<?= base_url('admin/changeaccess'); ?>",
          type: 'post',
          data: {
              menuId: menuId,
              roleId: roleId
          },
          success: function() {
            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
          }
      });
  });

  </script>

  <script type="text/javascript">
    $(document).ready(function(){
        $('.add_cart').click(function(){
            var produk_id    = $(this).data("id");
            var produk_nama  = $(this).data("produknama");
            var produk_harga = $(this).data("produkharga");
            var quantity     = $('#id').val();
            $.ajax({
                url : "<?php echo base_url();?>cart/add_to_cart",
                method : "POST",
                data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: produk_harga, quantity: quantity},
                success: function(data){
                    $('#detail_cart').html(data);
                    $('#jumlah_cart').load("<?php echo base_url();?>cart/jumlah_cart");
                }
            });
        });

        $(document).on('click','.adds_cart',function(){
            var produk_id    = $(this).data("id");
            var produk_nama  = $(this).data("produknama");
            var produk_harga = $(this).data("produkharga");
            var quantity     = $('#id').val();
            $.ajax({
                url : "<?php echo base_url();?>cart/add_to_cart",
                method : "POST",
                data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: produk_harga, quantity: quantity},
                success :function(data){
                    $('#detail_cart').html(data);
                    $('#jumlah_cart').load("<?php echo base_url();?>cart/jumlah_cart");
                }
            });
        });

        $(document).on('click','.min_cart',function(){
            var produk_id    = $(this).data("id");
            var produk_nama  = $(this).data("produknama");
            var produk_harga = $(this).data("produkharga");
            var quantity     = $('#id2').val();
            $.ajax({
                url : "<?php echo base_url();?>cart/add_to_cart",
                method : "POST",
                data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: produk_harga, quantity: quantity},
                success :function(data){
                    $('#detail_cart').html(data);
                    $('#jumlah_cart').load("<?php echo base_url();?>cart/jumlah_cart");
                }
            });
        });
 
        // Load shopping cart
        $('#detail_cart').load("<?php echo base_url();?>cart/load_cart");
 
        //Hapus Item Cart
        $(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url : "<?php echo base_url();?>cart/hapus_cart",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cart').html(data);
                    $('#jumlah_cart').load("<?php echo base_url();?>cart/jumlah_cart");
                }
            });
        });
    });

  </script>
