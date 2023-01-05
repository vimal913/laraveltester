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
           
            <form method="POST" id="file-upload" enctype="multipart/form-data">
                
                {{-- @csrf --}}
                <div class="mb-3">
                    <label class="form-label" for="titleID">Name:</label>
                    <input type="text" id="titleID" name="nameID" class="form-control" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="emailID">Email:</label>
                    <input type="text" id="emailID" name="emailID" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genderID" id="male" value="male">
                        <label class="form-check-label" for="male">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="genderID" id="female" value="female">
                        <label class="form-check-label" for="female">
                          Female
                        </label>
                      </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Language:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="php" name="languageID[]" id="PHP">
                        <label class="form-check-label" for="PHP">
                          PHP
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="laravel" name="languageID[]" id="Laravel">
                        <label class="form-check-label" for="Laravel">
                          Laravel
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="nodejs" name="languageID[]" id="NodeJS" checked>
                        <label class="form-check-label" for="NodeJS">
                          NodeJS
                        </label>
                      </div>
                </div>
        
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
  $(document).ready(function(){
    $('#file-upload').submit(function(e) {
        e.preventDefault();
        // let formData = new FormData(this);
        console.log($(this).serialize());
        // alert(serialize(formData));
        // console.log(JSON.stringify(this));
        // let formData =$('form').serializeArray();
        // alert(formData);
        // console.log(formData);
    //     $('#file-input-error').text('');

    //     $.ajax({
    //         type:'POST',
    //         url: "{{ route('s.store') }}",
    //         data: formData,
    //         contentType: false,
    //         processData: false,
    //         error: function(response){
    //             $('#file-input-error').text(response.responseJSON.message);
    //         },
    //         success: (response) => {
    //             if (response) {
    //                 this.reset();
    //                 alert('Created successfully');
    //             }
    //         }
    //    });
    });
  });
    
      
</script>
      
</html>