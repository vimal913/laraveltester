<html>
<head>
   <title>Ajax CSRF</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
   <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>
   <div id = 'data'></div>
    <form action="{{ route('csrf.store') }}" method="post" id="file-upload" enctype="multipart/form-data">
        {{-- @csrf --}}
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
            <input type="file" class="form-control" name="file[]" id="fileID">
        </div>
        <button type="submit" id="btn-submit" class="btn btn-primary">submit</button>
    </form>
</body>
</html>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#file-upload').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        console.log(formData);
        $('#file-input-error').text('');

        $.ajax({
            type:'POST',
            url: "{{ route('csrf.store') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response) {
                    this.reset();
                    alert(response.msg);
                }
            },
            error: function(response){
                $('#file-input-error').text(response.responseJSON.message);
            }
       });
    });
 </script>