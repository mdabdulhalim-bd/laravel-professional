<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="{{ asset('assets/parsley.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      toastr.options = {
              "closeButton": true,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-bottom-center",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }

  </script>

  </head>
  <body>
    <div class="container">
    
        <div class="row">
           
            <div class="col-md-6 mt-5 offset-3 ">
                <h2 class="text-center">Create Post</h2>

                {{-- Validation error  --}}

             @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
             @endif

              {{-- Alert message for usere  --}}
             
              {{-- @if(Session::has('alert-success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Saved!</strong> {{ session::get('alert-success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif --}}

              {{-- form  --}}

                <form id="form" style="margin-top: 30px" enctype="multipart/form-data" method="POST" action="{{ route('posts.store')}}">
                  @csrf
                  {{-- <input type="hidden" name="_token" value="{{ csrf_token()}}"> --}}
                    <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control" name="title" placeholder="Title here" value ="{{old('title')}}">
                    </div>
                    <div class="mb-3">
                      <label for="title" class="form-label">Description</label>
                      <textarea class="form-control" placeholder="Write your message here" name="description">
                        {{old('description')}}
                      </textarea>
                    </div>

                    <div class="mb-3">
                        <label>Publish</label>
                        <select class="form-select" name="is_publish">
                            <option value="" selected disabled>Choose Option</option>
                            <option @selected(old('is_publish') == 1) value="1">Yes</option>
                            <option @selected(old('is_publish') == 0) value="0">No</option>
                          </select>
                      </div>

                      <div class="mb-3">
                        <label>Active</label>
                        <select class="form-select" name="is_active">
                            <option value="" selected disabled>Choose Option</option>
                            <option @selected(old('is_active') == 1) value="1">Yes</option>
                            <option @selected(old('is_active') == 0) value="0">No</option>
                          </select>
                      </div>

                      <div class="mb-3">
                        <label for="file">File Upload</label>
                        <input type="file" class="form-control-file form-control" id="file" name="file">
                      </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
       
        {{-- <a href="/test-02" class="btn btn-danger">Go</a> --}}
        {{-- <a href="{{ url('/test-01') }}" class="btn btn-danger">Go</a> --}}

        {{-- <a href="{{ route('test.1') }}" class="btn btn-danger">Go</a> --}}
    </div>


  
{{-- bootstrap  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      $('#form').parsley();
    </script>
 {{-- parsley js  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" ></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script>
         @if(Session::has('alert-success'))
              toastr["success"]("{{ Session::get('alert-success') }}");
          @endif

          @if(Session::has('alert-update'))
            toastr["info"]("{{ Session::get('alert-update') }}");
         @endif
    </script>
  </body>
</html>