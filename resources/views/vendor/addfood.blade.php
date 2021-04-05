<?php
use App\additem;
$companyId = additem::companyID();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Food</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">

    .file {

		  visibility: hidden;
		  position: absolute;
	}
  /* Style the tab */
.tab {
  float: left;
  border-right: 1px solid #ccc;
  background-color: ;
  width: 20%;
  height: auto;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 10px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: right;
  cursor: pointer;
  transition: 0.3s;
  font-size: 15px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #faba20;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #faba20;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 10px 30px;
  border-left: 1px solid #ccc;
  width: 80%;
  border-left: none;
  height: auto;
}

	</style>
</head>
<body>
	@include('layouts.app')
	<div class="container">
    <img src="image/foodbanner.jpg" alt="foodbanner" width="1110" height="100">
			<br>
      <br>

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

        @if (Session::has('success'))
          <div class="alert alert-success text-center">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          <p>{{ Session::get('success') }}</p>
          </div>
        @endif

      <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'menucat')" id="defaultOpen">Menu Category</button>
        <button class="tablinks" onclick="openCity(event, 'menu')">Menu</button>
        <button class="tablinks" onclick="openCity(event, 'additemcat')">Additional Items Category</button>
        <button class="tablinks" onclick="openCity(event, 'additem')">Additional Items</button>
      </div>


      <div class="tabcontent"  id="menucat">
          <h3>Create new menu category</h3>
          <div class="col-8">
            <div class="col-padding">
          <form method="POST" action="/addfood">
            @csrf  
              <div class="form-group">
                <label for="itemcat_name" class="form-label">Item Category :</label>
                <input type="text" id="itemcat_name" class="form-control" name="itemcat_name" placeholder="Ex:Sides,Drinks,Ala Carte">
              </div>
              <button type="submit" class="btn" style="background-color: #faba20;">Add Category</button>
            </form>
          </div>
            </div>
        </div>

		{{-- 		<div class="mb-3">
						  <button type="button" id="createCategory" class="btn btn-primary">Create Category</button>
						  <button type="button" id="addItem" class="btn btn-primary">Create Item</button>
     
            <button type="button" id="additionalmainItem" class="btn btn-primary">Additional Item Category</button>
            <button type="button" id="additionalItem" class="btn btn-primary">Additional Item</button>
              <div id="form3" style="display: none;">
                  <div class="container">
                    <div class="card mt-3">
                      <div class="card-header"><h2>Add Additional Item Category</h2></div>
                      <div class="card-body">
                      <form action="{{ url('addfood2') }}" method="POST">
                      @csrf

                      <table class="table table-bordered" id="dynamicAddRemove">  
                      <tr>
                      <th>Additional Category</th>
                      <th>Item Name</th>
                      <th>Action</th>
                      </tr>
                      <tr>  
                      <td><input type="text" name="moreFields[0][additemcat_name]" placeholder="Enter title" class="form-control" /></td>  
                      <td><select name="moreFields[0][item_id]" class="form-control">
                        <option selected>Select Item</option>
                        @foreach($itemlist as $row)
                        <option value="{{$row->id}}">{{$row->item_name}}</option>
                        @endforeach
                        </select>
                        <input type="text" name="moreFields[0][vendor_uniqid]" value="{{$companyId}}" hidden>
                      </td>

                      <td><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>  
                      </tr>  
                      </table> 
                      <button type="submit" class="btn btn-success">Save</button>
                      </form>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="container" id="form4" style="display:none;">
              <div class="card mt-3">
                  <div class="card-header"><h2>Add Additional Item</h2></div>
                    <div class="card-body">
                      <form action="{{ url('addfood3') }}" method="POST">
                      @csrf
                      <table class="table table-bordered" id="dynamicAddRemove2">  
                      <tr>
                      <th>Additional Item</th>
                      <th>Additional Item Price</th>
                      <th>Category Name</th>
                      <th>Action</th>
                      </tr>
                      <tr>  
                      <td><input type="text" name="moreFields[0][additem_name]" placeholder="Enter title" class="form-control" /></td>  
                      <td><input type="text" name="moreFields[0][additem_price]" placeholder="Enter Price" class="form-control" /></td>  
                      <td><select name="moreFields[0][additemcat_id]" class="form-control">
                        <option selected>Select Item</option>
                        @foreach($additionalItemCategory as $row)
                        <option value="{{$row->id}}">{{$row->additemcat_name}}</option>
                        @endforeach
                        </select>
                        <input type="text" name="moreFields[0][vendor_uniqid]" value="{{$companyId}}" hidden>
                      </td>

                      <td><button type="button" name="add" id="add-btn2" class="btn btn-success">Add More</button></td>  
                      </tr>  
                      </table> 
                      <button type="submit" class="btn btn-success">Save</button>
                      </form>
                      </div>
                </div>
            </div>

            
          </div> --}}


				

				

	{{-- 	<div class="mb-3"  id="form2" style="display:none;" >

			<form method="POST" action="/addfood1" enctype="multipart/form-data" >
				@csrf
				<div class="row">
					<div class="col-4">

						<label for="item_name" class="form-label">Item Name :</label>
						<input type="text" id="item_name" class="form-control" name="item_name" placeholder="Ex:Nasi Lemak,Nasi Goreng">
						<br>
						<label class="form-label" for="item_desc">Item Description : </label>
						<textarea class="form-control" name="item_desc" id="item_desc" rows="3" placeholder="Ex:Extra Spicy Dish,Indian Cuisine"></textarea>
						<br>
						<label for="item_price" class="form-label">Item Price :</label>
						<input type="text" class="form-control" name="item_price" id="currency-field" value="">
						<br>
					</div>
					<div class="col-4">
						<br>
						<input type="file" name="file[]" class="file" >
                        <div class="input-group my-1">
                          <input type="text" class="form-control" disabled placeholder="Upload Food Image" id="file" name="file[]">        
                            <div class="input-group-append">
                             <button type="button" class="browse btn btn-primary">Browse...</button>
                            </div>
                          </div>
                        <img src="image/food_default.png" id="preview" class="img-thumbnail" style="width: 150px; height: 150px;">
                        <br>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="form-check-input" name="item_deli"  id="item_deli" value="false">
   						 <label class="form-check-label" for="item_deli">Delivery</label>
   						 <br>
   						 <div class="deliveryForm">
   						 <label for="item_deliradius" class="form-label">Deliver Radius :</label>
   						 <input type="text" name="item_deliradius" placeholder="Delivery Radius in KM" id="item_deliradius" class="form-control">
   						 <br>
   						 <label for="currency-field" class="form-label">Delivery Price :</label>
						 <input type="text" class="form-control" name="item_deliprice" id="currency-field" value="" placeholder="Price Per KM">
   						 <br>
   						</div>
   						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="form-check-input" name="item_pickup" id="item_pickup" value="false">
   						 <label class="form-check-label" for="item_pickup">Pick Up</label>
   						 <br>
   						 <br>
   						 <label class="form-check-label" for="itemcat_name">Category :</label>
   						 <select id="itemcat_id" name="itemcat_id" class="form-control" searchable="Search here.." >
   						 	<option disabled selected>Select Your Category</option>
   						 	@foreach($itemcat as $row)
   						 	<option value="{{ $row->id }}">{{ $row->itemcat_name }}</option>
   						 	@endforeach				  
						</select>
            <input type="text" name="itemcat_name" id="itemcat_name" class="itemcat_name" value="" hidden>           
						<br>
						<button type="submit" class="btn-primary">Add Item</button>
					</div>
        </form>
        

				</div>
			 --}}
          
			{{-- </div>

			   <br>
				<h2>Added Food</h2>
				<br>
		

				@foreach($items as $itemcat_name => $categoryItems)
					<div class="row">
					
						<h3>Category : {{ $itemcat_name }}</h3>

						<table class="table">
							<tr>
								<th>Item Name</th>
								<th>Price</th>
								<th>Image</th>
								<th>Delivery</th>
								<th>PickUp</th>
                <th>Action</th>


							</tr>
           
							<tr>
                @foreach($categoryItems as $item)
								<td>{{ $item->item_name }}</td>
								<td>{{ $item->item_price }}</td>
								<td><img src="storage/upload/{{ $item->item_image }}" width="100" ></td>
								<td>{{ $item->item_deli }}</td>
								<td>{{ $item->item_pickup }}</td>
                <td><a href="itemdetails"><button type="button" name="viewdetails" id="viewdetails" class="btn btn-success">View Details</button> </a></td>
							</tr>
              @endforeach
        
						</table>
		
					
					</div>
				@endforeach
 --}}

<script type="text/javascript">
var i = 0;
$("#add-btn2").click(function(){
++i;
$("#dynamicAddRemove2").append('<tr><td><input type="text" name="moreFields['+i+'][additem_name]" placeholder="Enter title" class="form-control" /></td><td><input type="text" name="moreFields['+i+'][additem_price]" placeholder="Enter Price" class="form-control" /></td><td><select name="moreFields['+i+'][additemcat_id]" class="form-control"><option selected>Select Item</option>@foreach($additionalItemCategory as $row)<option value="{{$row->id}}">{{$row->additemcat_name}}</option>@endforeach</select><input type="text" name="moreFields['+i+'][vendor_uniqid]" value="{{$companyId}}" hidden></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
});
$(document).on('click', '.remove-tr', function(){  
$(this).parents('tr').remove();
});  
</script>

<script type="text/javascript">
var i = 0;
$("#add-btn").click(function(){
++i;
$("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields['+i+'][additemcat_name]" placeholder="Enter title" class="form-control" /></td><td><select name="moreFields['+i+'][item_id]" class="form-control"><option selected>Select Item</option>@foreach($itemlist as $row)<option value="{{$row->id}}">{{$row->item_name}}</option>@endforeach</select><input type="text" name="moreFields['+i+'][vendor_uniqid]" value="{{$companyId}}" hidden></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
});
$(document).on('click', '.remove-tr', function(){  
$(this).parents('tr').remove();
});  
</script>

<script>
$('#itemcat_id').on('change', function() {
  $('.itemcat_name').val( $('option:selected',this).text() );
})
.change();
</script>
	<script type="text/javascript">
		$(".deliveryForm").hide();
$("#item_deli").click(function() {
    if($(this).is(":checked")) {
        $(".deliveryForm").show(300);
    } else {
        $(".deliveryForm").hide(200);
    }
});


	</script>

<script type="text/javascript">


$("#item_deli").on('change', function() {
  if ($(this).is(':checked')) {
    $(this).attr('value', 'true');
  } else {
    $(this).attr('value', 'false');
  }
  
});

$("#item_pickup").on('change', function() {
  if ($(this).is(':checked')) {
    $(this).attr('value', 'true');
  } else {
    $(this).attr('value', 'false');
  }
  
});
</script>

<script>
var button = document.getElementById('createCategory');

button.onclick = function() {
    var div = document.getElementById('form1');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
};


var button2 = document.getElementById('addItem');

button2.onclick = function() {
    var div = document.getElementById('form2');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
};


var button3 = document.getElementById('additionalmainItem');

button3.onclick = function() {
    var div = document.getElementById('form3');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
};

var button4 = document.getElementById('additionalItem');

button4.onclick = function() {
    var div = document.getElementById('form4');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
};

</script>

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
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>