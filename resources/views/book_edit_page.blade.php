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
                if( session('status') == "error"){
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

        <form method="post" action="{{ env('APP_URL') }}/books/edit/{{ $data['ISBN'] }}" class="m-5">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="ISBN">ISBN</label>
                <input type="text" class="form-control" name="ISBN" id="ISBN" placeholder="9783161484100" value="{{ $data['ISBN'] }}">
            </div>
            <div class="form-group">
                <label for="AuthNo">AuthNo</label>
                <input type="text" class="form-control" name="AuthNo" id="AuthNo" placeholder="1234" value="{{ $data['AuthNo'] }}">
            </div>
            <div class="form-group">
                <label for="Title">Title</label>
                <input type="text" class="form-control" name="Title" id="Title" placeholder="1234" value="{{ $data['Title'] }}">
            </div>
            <div class="form-group">
                <label for="Edition">Edition</label>
                <input type="text" class="form-control" name="Edition" id="Edition" placeholder="1234" value="{{ $data['Edition'] }}">
            </div>
            <div class="form-group">
                <label for="Category">Category</label>
                <input type="text" class="form-control" name="Category" id="Category" placeholder="1234" value="{{ $data['Category'] }}">
            </div>
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="number" class="form-control" name="Price" id="Price" placeholder="1234" value="{{ $data['Price'] }}">
            </div>
            <div class="form-group">
                <label for="Publisher_id">Publisher_id</label>
                <input type="text" class="form-control" name="Publisher_id" id="Publisher_id" placeholder="1234" value="{{ $data['Publisher_id'] }}">
            </div>
            <div class="form-group">
                <label for="maintain_staff_id">maintain_staff_id</label>
                <input type="text" class="form-control" name="maintain_staff_id" id="maintain_staff_id" placeholder="1234" value="{{ $data['maintain_staff_id'] }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </body>
</html>
