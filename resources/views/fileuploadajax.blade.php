<!DOCTYPE html>
<html>
<head>
    <title>Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
       
<div class="container">
         
    <div class="panel panel-primary card mt-5">
    
        <div class="panel-heading text-center mt-4">
            <h2> Upload File using Ajax</h2>
        </div>
   
        <div class="panel-body card-body">
           
            <form action="{{ route('file.store') }}" method="POST" id="file-upload" enctype="multipart/form-data">
                {{-- @csrf --}}
        
                <div class="mb-3">
                    <label class="form-label" for="inputFile">Select File:</label>
                    <input 
                        type="file" 
                        name="file" 
                        id="inputFile"
                        class="form-control">
                    <span class="text-danger" id="file-input-error"></span>
                </div>
         
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            
            </form>
        
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
        e.preventDefault();
        let formData = new FormData(this);
        $('#file-input-error').text('');

        $.ajax({
            type:'POST',
            url: "{{ route('file.store') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response) {
                    this.reset();
                    alert('File has been uploaded successfully');
                }
            },
            error: function(response){
                $('#file-input-error').text(response.responseJSON.message);
            }
       });
    });
      
</script>
      
</html>