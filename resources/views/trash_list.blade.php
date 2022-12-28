<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .content{
            box-shadow: 0px 5px 5px 0px grey;
            padding: 37px;

            border-radius: 12px;
        }
    </style>
</head>
<body>
    <div class="container mt-2">
        <div class="content">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left text-center">
                        <h2>Laravel 9 CRUD</h2>
                    </div>
                    <div class="pull-right mb-2 d-flex justify-content-between">
                        <a class="btn btn-success" href="{{ route('companies.index') }}"> Back</a>
                        <a class="btn btn-secondary" href="{{ route('companies.trash') }}">Restore</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center bg-info text-white">
                        <th>S.No</th>
                        <th>Company Name</th>
                        <th>Company Email</th>
                        <th>Company Address</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->address }}</td>
                            <td class="text-center">
                                <form action="{{ route('companies.destroy',$company->id) }}" method="Post">

                                    <a class="btn btn-primary" href="{{ route('companies.restore',$company->id) }}">Restore</a>
                                    
                                    <a class="btn btn-danger" onclick="deleteCompany({{$company->id}})"><i class="fa-solid fa-trash-can"></i></a>
                                   
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center ">{!! $companies->links() !!}</div>
            
        </div>
    </div>
    <script>
        function deleteCompany(id){
            if(confirm('Are sure want to delete ?')){
                window.location.href='{{url("/delete-componies-permanently")}}/'+id;
            }
        }
    </script>
</body>
</html>