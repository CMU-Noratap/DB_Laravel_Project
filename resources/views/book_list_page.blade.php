<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LMS</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Swal -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
        
    </head>
    <body>

        <?php
            #Show Dialog When Redirect
            if(session('status')){
                if( session('status') == "success"){
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Success',
                                icon: 'success',
                                showConfirmButton: false // Hide the OK button
                            
                            });
                        </script>
                    ";
                }else if( session('status') == "error"){
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Error',
                                html: \"".session('msg')."\",
                                icon: 'error', // Change 'success' to 'error'
                                showConfirmButton: false // Hide the OK button
                                
                            });
                        </script>
                    ";
                }
            }
        ?>

        <div  class="container m-5">
            <h2>Books List</h2>
            <hr>

            <div class='row'>

            @foreach ($data as $book)
                <form method="POST" action="{{ url('/books/delete/' . $book['ISBN']) }}">
                    @csrf
                    @method('DELETE')
                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Book Title: {{ $book['Title'] }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">ISBN: {{ $book['ISBN'] }}</h6>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Maiores maxime harum quisquam iure officiis? Eveniet autem nisi ipsam sapiente,
                                magni in, praesentium quae veniam dolorem sed repellat mollitia saepe culpa.
                            </p>
                            <a href="{{ url('/books/edit/' . $book['ISBN']) }}" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
            @endforeach

            </div>

            <a href="{{ env('APP_URL') }}/books/add" class="btn btn-success">Add Book</a>
        </div>
    </body>
</html>
