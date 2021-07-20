<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    
    <link rel="stylesheet" href="style.css">
    
    <!-- date picker -->
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    
    <style>
        body{
            background-color: #ffff;
        }
        thead{    
            font-size: 18px;
            color: #fff;
            line-height: 1.4;
            padding-top: 18px;
            padding-bottom: 18px;
            background-color: #6c7ae0;
        }
        thead tr th:nth-child(1){
            border-top-left-radius: 12px;   
        }
        
        thead tr th:nth-child(6){
            border-top-right-radius: 12px;   
        }
        td{
            border: 1px solid rgb(223, 221, 221);
            font-weight: 500 !important;
            color: rgb(158, 150, 150);
        }
        #input-date{
            padding: 8px !important;
        }
        .btn-filter{
            margin-top: 22px !important;
        }
        </style>
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content mt-4 mb-3 d-flex justify-content-between align-items-center" >
                    <div class="export">
                        <a class="btn btn-success" href="#" onclick="$(this).find('form').submit()">Export To Excel
                            <form action="{{route('barang.export.excel')}}" method="POST">
                            @csrf
                            <input type="hidden" name="date_start" class="form-control" value="{{ request()->get('date_start') }}">
                            <input type="hidden" name="date_end" class="form-control" value="{{ request()->get('date_end') }}">
                            </form>
                        </a>
                    </div>
                    <div class="filter">
                        <form action="{{route('barang.filter')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                                        <input placeholder="Select date" type="date" id="input-date" name="date_start" class="form-control">
                                        <label for="example">Tgl Mulai..</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                                        <input placeholder="Select date" type="date" id="input-date" name="date_end" class="form-control">
                                        <label for="example">Tgl Akhir..</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-primary btn-filter">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table my-3 table-striped">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $barang => $brg )    
                            <tr>
                                <td scope="row">{{$barang + 1}}</td>
                                <td>{{$brg->nama_barang }}</td>
                                <td>{{$brg->kategori }}</td>
                                <td>{{$brg->harga }}</td>
                                <td>{{$brg->stok }}</td>
                                <td>{{$brg->created_at->isoFormat('D-MMMM-Y')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- date picker -->
    
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    
   
</body>
</html>





