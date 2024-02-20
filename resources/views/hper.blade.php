<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pertussis</title>

        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            
    </head>
    <body class="antialiased">
        <div id="table-section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <img src="{{ asset('images/wvmc.png') }}" class="align-left" width="130">
                </div>
                <div class="col-sm">
                    <div class="head-section text-center">
                        <h1>Perussis</h1>
                        <p>Case Investigation Form</p>
                    </div>
                </div>
                <div class="col-sm">
                    <img src="http://127.0.0.1:8000/images/doh.png" class="align-right" width="130" style="float: right;">
                </div>
            </div>
        </div>
      
      
       
        <div id="search-bar-wrapper">
            Search Here:
            <form action="" method="GET">
                <div class="form-group mt-1">
                  <input type="text" class="form-control" id="hpatcode" aria-describedby="hpatkey" placeholder="Enter Hospital Number">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="hpatkey" aria-describedby="hpatkey" placeholder="Enter Patient Number">
                </div>
                <div class="form-group mt-1">
                    <select class="form-select form-group" aria-label="Default select example">
                        <option selected>Filter by Services</option>
                        <option value="1">OPD</option>
                        <option value="2">Admission</option>
                        <option value="3">ER</option>
                      </select>
                </div>
                <div class="form-group mt-1">
                  <input type="text" class="form-control" id="patfirst" placeholder="Enter First Name">
                </div>
                <div class="form-group mt-1">
                    <input type="text" class="form-control" id="patlast" placeholder="Enter Last Name">
                </div>
                <div class="form-group mt-1">
                    <input type="text" class="form-control" id="patmiddle" placeholder="Enter Middle Name">
                </div>
                <div class="form-group mt-1 search-button">
                <button type="submit" id="search-form"  class="btn btn-primary"><i class="bi bi-search mr-1"></i>Search</button>
                </div>
              </form>
        </div>
        
        @php 
            $patient = DB::table('hperson')->skip(0)->take(100)->get(['hpatkey', 'hpatcode', 'patlast','patfirst','patmiddle']);
            $count = DB::table('hperson')->count();
            $numbers = range(100, 1000);

            echo '<pre>';
            print_r($count);
            echo '</pre>';
        @endphp
    
    
    <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    

    <div id="filter-table">
        <div class="add-button  mb-2 float-left">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-plus"></i> ADD PATIENT DETAILS HERE</button>
        </div>
        <select id="sort-by" class="">
            <option selected>Sort by</option>
            <option>Asc</option>
            <option>Desc</option>
            <option>Date</option>
            <option>Name</option>
        </select>
        <select id="max-data" class="">

            @foreach($numbers as $key)
            <option>{{ $key }}</option>
            @endforeach
            
        </select>
    </div>
    <table class="table shadow-lg p-3 mb-5 bg-white rounded">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Hospital Number</th>
            <th scope="col">Patient Number</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody id="table-body">

            @foreach($patient as $key => $patient_data)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $patient_data->hpatcode }}</td>
                <td>{{ $patient_data->hpatkey }}</td>
                <td>{{ $patient_data->patlast }}</td>
                <td>{{ $patient_data->patfirst }}</td>
                <td>{{ $patient_data->patmiddle }}</td>
                <td><button type="button" class="btn btn-success"><i class="bi bi-pen small mr-1"></i>Edit</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example" class="pagination-nav-wrapper">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
 
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Patient Details(Pertussis)</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">        
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('/form')
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- Scripts -->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let no_result = `<tr>
                                <td class="border" scope="row">No Result Found</td>
                                <td class="border" scope="row">No Result Found</td>
                                <td class="border" scope="row">No Result Found</td>
                                <td class="border" scope="row">No Result Found</td>
                                <td class="border" scope="row">No Result Found</td>
                                <td class="border" scope="row">No Result Found</td>
                                <td class="border" scope="row">No Result Found</td>
                            </tr>`;

        $(document).on('click change keypress keyup', 'button#search-form, #max-data', function(e) {
              e.preventDefault();
              //$('#search_person').html(searching_html);
                let hpatcode = $('#hpatcode').val();
                let patfirst = $('#patfirst').val();
                let patmiddle = $('#patmiddle').val();
                let patlast = $('#patlast').val();
                let search = true;
                let max_data = $('#max-data').val();

            $('.lds-spinner').show();
            $('div#table-section-wrapper').css('opacity','0.5');
            try {
                    $.ajax({
                        type: "POST",
                        url: "search/patient",
                        data: {
                            search: search,
                            hpatcode: hpatcode,
                            patfirst: patfirst,
                            patmiddle: patmiddle,
                            patlast: patlast,
                            max_data: max_data,
                        },
                        success: function(response) {

                            let table_body = '';
                            console.log(response.data);
                            if(response.data.length<=0){
                                $('#table-body').html(no_result);
                               // $('#search_person').html(search_html);
                            }else{
                                response.data.forEach((element,index) => {
                                table_body = table_body +
                                `<tr>
                                    <td class="border" scope="row">${ index + 1 }</td>
                                    <td class="border" scope="row">${ element.hpatkey }</td>
                                    <td class="border" scope="row">${ element.hpatcode }</td>
                                    <td class="border" scope="row">${ element.patfirst }</td>
                                    <td class="border" scope="row">${ element.patmiddle }</td>
                                    <td class="border" scope="row">${ element.patlast }</td>
                                    <td class="border" scope="row"><button type="button" class="btn btn-success"><i class="bi bi-pen small mr-1"></i>Edit</button></td>
                                </tr>`;
                                });
                                $('#table-body').html('');
                                $('#table-body').html(table_body);
                               // $('#search_person').html(search_html);
                            }
                            $('.lds-spinner').hide();
                            $('div#table-section-wrapper').css('opacity','1');
                        }
                    })
                } catch (err) {
                    console.log(err);

                    $('#search_person').html(search_html);
                }
        })
    })
</script>
   
    <style>
  body {
    font-family: 'Poppins', sans-serif;
}
.form-group.mt-1.search-button {
    width: 99.3% !important;
    /* float: right; */
    text-align: right;
}
select#sort-by, select#max-data {
    background: unset;
    border: 1px solid #b81615;
    color: #b81615;
    font-size: 14px;
    margin-bottom: 8px;
    padding: 7px;
    float: right;
    margin-left: 10px;
}
div#search-bar-wrapper .form-group {
    display: inline-block;
    width: 450px;
    margin: 3px;
}
select.form-select.form-group {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    line-height: 1.5;
    color: #495057;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
}
div#search-bar-wrapper .form-group {
    display: inline-block;
}
div#search-bar-wrapper {
    background: white;
    padding: 10px;
    margin: 10px 0;
}
.container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 1430px;
    margin-bottom: 25px;
}
nav.pagination-nav-wrapper {
    float: right;
}
body.antialiased {
    width: 100%;
    max-width: 1400px;
    margin: auto;
    padding: 35px 0;
    background: linear-gradient(to right, #440808, white);
}
table.table.shadow-lg.p-3.mb-5.bg-white.rounded {
    background: gray;
    font-size: 14px;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
    background-color: #440808;
    color: white;
    padding: 10px;
}
.text-center {
    text-align: center!important;
    line-height: 1;
    color: white;
    font-weight: 700;
    margin-top: 22px;
}
button.btn {
    background: #B81615;
    border-color: #B81615;
}
button.btn:hover {
    background-color: white;
    color: #B81615;
    border: 2px solid #B81615;
}
a.page-link {
    background: #B81615;
    color: white;
    /* border-color: #440808; */
}
a.page-link:hover {
    background: #B81615;
    color: white;
}
nav.pagination-nav-wrapper {
    position: fixed;
    bottom: 0;
    left: 42%;
    right: 45%;
    height: 49px;
}
.table td, .table th {
    padding: 6px;
}
.lds-spinner {
  color: official;
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-spinner div {
  transform-origin: 40px 40px;
  animation: lds-spinner 1.2s linear infinite;
}
.lds-spinner div:after {
    content: " ";
    display: block;
    position: absolute;
    top: -31px;
    left: 37px;
    width: 9px;
    height: 21px;
    border-radius: 20%;
    background: #440808;
}
.lds-spinner div:nth-child(1) {
  transform: rotate(0deg);
  animation-delay: -1.1s;
}
.lds-spinner div:nth-child(2) {
  transform: rotate(30deg);
  animation-delay: -1s;
}
.lds-spinner div:nth-child(3) {
  transform: rotate(60deg);
  animation-delay: -0.9s;
}
.lds-spinner div:nth-child(4) {
  transform: rotate(90deg);
  animation-delay: -0.8s;
}
.lds-spinner div:nth-child(5) {
  transform: rotate(120deg);
  animation-delay: -0.7s;
}
.lds-spinner div:nth-child(6) {
  transform: rotate(150deg);
  animation-delay: -0.6s;
}
.lds-spinner div:nth-child(7) {
  transform: rotate(180deg);
  animation-delay: -0.5s;
}
.lds-spinner div:nth-child(8) {
  transform: rotate(210deg);
  animation-delay: -0.4s;
}
.lds-spinner div:nth-child(9) {
  transform: rotate(240deg);
  animation-delay: -0.3s;
}
.lds-spinner div:nth-child(10) {
  transform: rotate(270deg);
  animation-delay: -0.2s;
}
.lds-spinner div:nth-child(11) {
  transform: rotate(300deg);
  animation-delay: -0.1s;
}
.lds-spinner div:nth-child(12) {
  transform: rotate(330deg);
  animation-delay: 0s;
}
.lds-spinner {
    position: absolute;
    left: 50%;
    top: 80%;
    display:none;
}
@keyframes lds-spinner {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}

    </style>
    </body>
</html>
