<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
        <script type="text/javascript" src="lightbox2-master\src\js\lightbox.js"></script>
        <link rel="stylesheet" href="lightbox2-master\src\css\lightbox.css">
        <title>Repository</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container" style="text-align:center;"><h2>File Repository</h2></div>
        <div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4" style="text-align:justify;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu est justo. Cras ut neque in justo maximus euismod ac eu leo. Pellentesque pulvinar tortor quis nibh faucibus, vel fringilla ipsum facilisis. Nam scelerisque, dolor vitae tempor placerat, nibh purus consectetur massa, vitae placerat lacus augue tincidunt magna. Aliquam erat felis, aliquet pulvinar enim at, volutpat tempus libero. Maecenas ut ullamcorper sem. Cras dapibus augue eu orci efficitur pretium. Nulla ut ipsum quis augue tristique ultrices ut at ex.
                <hr>
                </div>
            <div class="col-sm-4"></div>
        </div>
        </div>
            <div class="container">
                <div class="container col-sm-4">
                    <form action="/upload" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <h4>Upload your file(s):</h4>
                    <br>
                    <input type="file" class="form-control-file" name="files" multiple>
                    <br>
                    <input type="submit" class="btn btn-success" name="submit" value="submit Files!">
                    </form>
                </div>
                <div>
                    <div class="container col-sm-8">
                        {!!$response!!}
                        <br>
                        {!!$pages!!}</center>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
