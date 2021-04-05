<!DOCTYPE html>
<html>
<head>
	<title>Vendor</title>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<style type="text/css">
		.file {
		 visibility: hidden;
		 position: absolute;
		}
	</style>
</head>
<body>
	@include('layouts.app')

	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Company Register</div>

                <div class="card-body">
                    <form method="POST" action="/companyreg"  enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group row">
                            <label for="vendor_cmpyname" class="col-md-4 col-form-label text-md-right">{{ __('Company Name :') }}</label>

                            <div class="col-md-6">
                                <input id="vendor_cmpyname" type="text" class="form-control"  name="vendor_cmpyname" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vendor_pic" class="col-md-4 col-form-label text-md-right">{{ __('Person In Charge : ') }}</label>

                            <div class="col-md-6">
                                <input id="vendor_pic" type="text" class="form-control" name="vendor_pic" value="" required>

                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vendor_addr" class="col-md-4 col-form-label text-md-right">{{ __('Address :') }}</label>

                            <div class="col-md-6">
                                <input id="vendor_addr" type="text" class="form-control" name="vendor_addr" placeholder="Line 1" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vendor_city" class="col-md-4 col-form-label text-md-right"> </label>

                            <div class="col-sm-3">
                                <input id="vendor_city" type="text" class="form-control" name="vendor_city" placeholder="City" required >                          
                            </div>
                            <div class="col-sm-3">
                                <input id="vendor_postcode" type="text" class="form-control" name="vendor_postcode" placeholder="Postal Code" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vendor_state" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="vendor_state" type="text" class="form-control" name="vendor_state" placeholder="State" required> --}}
                                <select id="vendor_state" name="vendor_state" class="form-control"  required>
                                	<option selected disabled>Select Your State</option>
									<option value="Johor">Johor</option>
									<option value="Kedah">Kedah</option>
									<option value="Kelantan">Kelantan</option>
									<option value="Kuala Lumpur">Kuala Lumpur</option>
									<option value="Labuan">Labuan</option>
									<option value="Malacca">Malacca</option>
									<option value="Negeri Sembilan">Negeri Sembilan</option>
									<option value="Pahang">Pahang</option>
									<option value="Perak">Perak</option>
									<option value="Perlis">Perlis</option>
									<option value="Penang">Penang</option>
									<option value="Sabah">Sabah</option>
									<option value="Sarawak">Sarawak</option>
									<option value="Selangor">Selangor</option>
									<option value="Terengganu">Terengganu</option>
								</select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vendor_contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact No :') }}</label>

                            <div class="col-md-6">
                                <input id="vendor_contact" type="text" class="form-control" name="vendor_contact" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vendor_ssm" class="col-md-4 col-form-label text-md-right">{{ __('SSM No :') }}</label>

                            <div class="col-md-6">
                                <input id="vendor_ssm" type="text" class="form-control" name="vendor_ssm" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Logo :') }}</label>

                            <div class="col-md-6">
		                      <input type="file" name="file[]" class="file" >

		                        <div class="input-group my-1">
		                          <input type="text" class="form-control" disabled placeholder="Upload Logo" id="file" name="file[]">        
		                            <div class="input-group-append">
		                             <button type="button" class="browse btn btn-primary">Browse...</button>
		                            </div>
		                          </div>
		                        <img src="image/default-logo.png" id="preview" class="img-thumbnail" style="width: 150px; height: 150px;">
		                   </div>
                        </div>

                        <div class="form-group row">
                            <label for="vendor_url" class="col-md-4 col-form-label text-md-right">{{ __('Website URL :') }}</label>

                            <div class="col-md-6">
                                <input id="vendor_url" type="text" class="form-control" name="vendor_url" required>
                               {{--  <input id="vendor_logo_url" type="text" class="form-control" name="vendor_logo_url" value="/storage/upload/"> --}}
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
}); 
</script>
</body>
</html>