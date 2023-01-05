<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Ajax Post Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
     
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel 9 Ajax Post Request Example - ItSolutionStuff.com
        </div>
        <div class="card-body">
  
            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="4">
                        List Of Posts
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#postModal">
                          Create Post
                        </button>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Body</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><img class="img-thumbnail" width="70" height="75"src="@if(!empty($post->file)){{url('/uploads/'.$post->file)}} @else {{url('/uploads/company.jpg')}} @endif" alt=""></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                </tr>
                @endforeach
            </table>
  
        </div>
    </div>
</div>
  
<!-- Modal -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" id="file-upload">
  
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
    
            <div class="mb-3">
                <label for="titleID" class="form-label">Title:</label>
                <input type="text" id="titleID" name="name" class="form-control" placeholder="Name">
            </div>
  
            <div class="mb-3">
                <label for="bodyID" class="form-label">Body:</label>
                <textarea name="body" class="form-control" id="bodyID"></textarea>
            </div>
            <div class="mb-3">
                <label for="fileID" class="form-label">IMage:</label>
                <input type="file" class="form-control" name="file" id="fileID">
            </div>
     
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success btn-submit">Submit</button>
            </div>
    
        </form>
      </div>
    </div>
  </div>
</div>
     
</body>
  
<script type="text/javascript">
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    $('#file-upload').submit(function(e) {
    // $(".btn-submit").click(function(e){
        // e.preventDefault();
        let formData = new FormData(this);
    //  alert("hi");
        // var title = $("#titleID").val();
        // var body = $("#bodyID").val();
        // var file = $("#fileID").val();
        // alert(formData);
     
        $.ajax({
           type:'POST',
           url:"{{ route('posts.store') }}",
           data: formData,
           dataType: 'JSON',
           success:function(data){
                if($.isEmptyObject(data.error)){
                    // alert(data.success);
                    alert("hi");
                    // console.log()
                    location.reload();
                }else{
                    printErrorMsg(data.error);
                }
           }
        });
    
    });
  
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
  
</script>
  
</html>