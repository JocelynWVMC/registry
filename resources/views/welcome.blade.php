<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     
    </head>
    <body class="antialiased">
        <div id="table-section-wrapper">
        <div class="head-section text-center">
            <h1>Perussis</h1>
            <p>Case Investigation Form</p>
        </div>
        <div class="add-button  mb-3">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-plus"></i> ADD PATIENT DETAILS HERE</button>
        </div>

       
        <form id="searchForm" class="mb-4">
            <input type="text" id="searchInput" name="query" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
          
        @php 
            $patient = DB::table('hperson')->skip(0)->take(10)->get(['hpatkey', 'hpatcode', 'patlast','patfirst','patmiddle']);
        @endphp

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
        <tbody>

            @foreach($patient as $key => $patient_data)

            @php
                // echo '<pre>';
                // print_r($patient_data);
                // echo '</pre>';
            @endphp

            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $patient_data->hpatkey }}</td>
                <td>{{ $patient_data->hpatcode }}</td>
                <td>{{ $patient_data->patlast }}</td>
                <td>{{ $patient_data->patfirst }}</td>
                <td>{{ $patient_data->patmiddle }}</td>
                <td><button type="button" class="btn btn-success"><i class="bi bi-pen small mr-1"></i>Edit</button></td>
            </tr>
            @endforeach

        

        </tbody>
    </table>
 
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Patient Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success">Save changes</button>
            </div>
        </div>
        </div>
    </div>
    </div>
<!-- Scripts -->
   
    <style>
  
    body.antialiased {
        width: 100%;
        max-width: 1240px;
        margin: auto;
        padding: 35px 0;
    }
    .table td, .table th {
    padding: 6px;
}
    </style>
    </body>
</html>
