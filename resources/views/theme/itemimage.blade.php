<div class="row" style="margin-top: 20px;">
<?php
// dd($getitemimages);
foreach ($getitemimages as $itemimage) {

?>
<div class="col-md-6 col-lg-3 dataid{{$itemimage->id}}" id="table-image">
    <div class="card">
        <img class="img-fluid" src='{!! asset("images/item/".$itemimage->image) !!}' style="max-height: 255px; min-height: 255px;" >
        <div class="card-body">
            <button type="button" onClick="EditDocument('{{$itemimage->id}}')" class="btn mb-2 btn-sm btn-primary">Edit</button>
            @if (env('Environment') == 'sendbox')
                <button type="button" class="btn mb-2 btn-sm btn-danger" onclick="myFunction()">Delete</button>
            @else
                <button type="submit" onclick="DeleteImage('{{$itemimage->id}}')" class="btn mb-2 btn-sm btn-danger">Delete</button>
            @endif
        </div>
    </div>
</div>
<?php
}
?>
</div>