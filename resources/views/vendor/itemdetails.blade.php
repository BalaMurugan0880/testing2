<!DOCTYPE html>
<html>
<head>
	<title>Item Details</title>
</head>
<body>
	@include('layouts.app')
<div class="container-fluid">

	 @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
           @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
      @endif

		  <button type="button" id="showItem" class="btn btn-primary">Item List</button>
	 	  <button type="button" id="showaddItem" class="btn btn-primary">Additional Item List</button>
	
		<div id="itemtable" class="row py-5" style="display:none;">
					
 

			<table class="table table-bordered table-striped table-hover table-responsive">
					<tr>
			
						<th>Item Category</th>
						<th>Item Name</th>
						<th>Description</th>
						<th>Price</th>
						<th>Image</th>
						<th>Delivery</th>
						<th>Pick Up</th>
						<th>Delivery Radius</th>
						<th>Delivery Price(Per KM)</th>
        				<th>Action</th>


					</tr>
					
           			@foreach($data as $row)
           			<form method="POST" action="/itemdetails">
           				@csrf
					<tr>
						<input type="text" class="form-control" name="item_id" value="{{ $row->id }}" hidden>
						<td>{{ $row->itemcat_name}}</td>	
						<td><input type="text" class="form-control" name="item_name" value="{{ $row->item_name }}"></td>
						<td><input type="text" class="form-control" name="item_desc" value="{{ $row->item_desc }}"></td>
						<td><input type="text" class="form-control" name="item_price" value="{{ $row->item_price }}"></td>
						<td><img src="storage/upload/{{ $row->item_image }}"  class="img-thumbnail" style="width: 100px; height: 100px;"></td>
						<td><input type="checkbox" class="form-control" id="item_deli" name="item_deli" {{ ($row->item_deli=="true")? "checked" : "" }}   value="{{ $row->item_deli }}">Delivery</td>
						<td><input type="checkbox" class="form-control" id="item_pickup" name="item_pickup" {{ ($row->item_pickup=="true")? "checked" : "" }} value="{{ $row->item_pickup }}">Pick Up</td>
						<td><input type="text" class="form-control" name="item_deliradius" value="{{ $row->item_deliradius }}"></td>
						<td><input type="text" class="form-control" name="item_deliprice" value="{{ $row->item_deliprice }}"></td>
	               		<td style='white-space: nowrap'><button type="submit" name="update" class="btn btn-success">Update</button>&nbsp;<button type="submit" name="delete" class="btn btn-danger">Delete</button></td>

					</tr>
					</form>
        			@endforeach
        	
			</table>
		
		</div>


		<div id="additemTable" class="row py-5" style="display:none;">
					
 

			<table class="table table-bordered table-striped table-hover table-responsive">
					<tr>
			
						<th>Additional Item Name</th>
						<th>Price</th>
        				<th>Action</th>


					</tr>
					
           			@foreach($data1 as $row)
           			<form method="POST" action="/itemdetails">
           				@csrf
					<tr>
						<input type="text" class="form-control" name="additem_id" value="{{ $row->id }}" hidden>
						<td><input type="text" class="form-control" name="additem_name" value="{{ $row->additem_name}}"></td>	
						<td><input type="text" class="form-control" name="additem_price" value="{{ $row->additem_price }}"></td>
	               		<td style='white-space: nowrap'><button type="submit" name="update" class="btn btn-success">Update</button>&nbsp;<button type="submit" name="delete" class="btn btn-danger">Delete</button></td>

					</tr>
					</form>
        			@endforeach
        	
			</table>
		
		</div>

</div>

<script type="text/javascript">
	
	function SetRadiobuttonValue()
{
    var selected = document.getElementById('item_deli').value;

    if(selected == "true"){
        document.getElementById("item_deli").checked = true;
    }else{
        document.getElementById("item_deli").checked = false;
    }
}
</script>

<script type="text/javascript">
	var button = document.getElementById('showItem');
	var button1 = document.getElementById('showaddItem');


button.onclick = function() {
    var div = document.getElementById('itemtable');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
};

button1.onclick = function() {
    var div = document.getElementById('additemTable');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
};
</script>

</body>
</html>