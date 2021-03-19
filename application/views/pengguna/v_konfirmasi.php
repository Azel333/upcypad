<script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="<SB-Mid-client-DFMm34jikUZAAOKN>">
</script>


<form action="<?= base_url('cart/konfirmasi'); ?>" method="post" class="form-horizontal">

	<div class="row offset-4" id="contain-produk">

		<div class="col-lg-6 mt-5">
		    <div class="card mt-5"  id="contain-left">
			    <div class="card-body">
			        <!--  Credit Card -->
			        <div id="pay-invoice">
			            <div class="card-body">
			                <div class="card-title">
			                    <h5 class="text-center">Silahkan Lakukan Pembayaran</h5>
			                </div>

		                	<hr>

			                    

			                    <div class="form-group card text-center bg-success text-white">
			                    	<hr>
			                    	<h1>Rp. <?= number_format($this->cart->total()) ?></h1>
			                    	<hr>
			                    </div>


			                    <div class="col-12 text-center">
									<div class="row">
								    	<div class="card-footer text-muted">
							                <button type="submit" value="upload" class="btn btn-outline-success" id="pay-button">Submit</button>
							            </div>
									</div>
								</div>

			            </div>
			        </div>
				</div>
			</div>
		</div>


	

</form>






<form id="payment-form" method="post" action="<?=base_url()?>/snap/finish">
      <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>
</form>
    
    


    <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      url: '<?= base_url(); ?>/snap/token',
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>
