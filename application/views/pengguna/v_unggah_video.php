<div id="container" class="container">
	<div id="body">
		<?php echo $this->session->flashdata('status_upload'); ?>
		<!-- <form id="upload_form" enctype="multipart/form-data" method="post" action="<?php echo base_url('pengguna/upload-video') ?>"> -->
		<!-- <?php echo form_open_multipart('pengguna/upload-video');?> -->
		<form id="upload_form" enctype="multipart/form-data">
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="video" id="fileku">
				<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
			</div>

			<div class="custom-file">
			<input type="number" name="f_du" id="f_du" size="5" /> seconds<br>
			</div>

			<div class="progress">
				  <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">
					<span id="status"></span>
				  </div>
			</div> 
			
			<div class="form-group">
				<button class="btn btn-raised btn-info btn-block" type="button" name="edit" onclick="uploadFile()">
												upload
											</button>
			</div>
   
		</form>
		<audio id="audio"></audio>
	</div>
</div>

<script>
// Code to get duration of audio /video file before upload - from: http://coursesweb.net/

//register canplaythrough event to #audio element to can get duration
var f_duration =0;  //store duration
document.getElementById('audio').addEventListener('canplaythrough', function(e){
  //add duration in the input field #f_du
  f_duration = Math.round(e.currentTarget.duration);
  document.getElementById('f_du').value = f_duration;
  URL.revokeObjectURL(obUrl);
});

//when select a file, create an ObjectURL with the file and add it in the #audio element
var obUrl;
document.getElementById('fileku').addEventListener('change', function(e){
  var file = e.currentTarget.files[0];
  //check file extension for audio/video type
  if(file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)){
    obUrl = URL.createObjectURL(file);
    document.getElementById('audio').setAttribute('src', obUrl);
  }
});

function uploadFile() {
	var file = document.getElementById("fileku").files[0];
	var duration = document.getElementById("f_du");
    var formdata = new FormData();
	formdata.append("video", file);
	formdata.append("f_du", duration);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressUpload, false);
    ajax.open("POST", "<?php echo base_url('pengguna/upload-video');?>", true);
    ajax.send(formdata);
}

function progressUpload(event){
    var percent = (event.loaded / event.total) * 100;
    document.getElementById("progress-bar").style.width = Math.round(percent)+'%';    
    document.getElementById("status").innerHTML = Math.round(percent)+"%";
	if(event.loaded==event.total){
		window.location.href = '<?php echo base_url('pengguna/unggah-video');?>';
	}
}
</script>