@php
$array_type = ['rhu-cho'=>'RHU/CHO', 'govhos' => 'Goverment Hospital', 'prihos'=>'Private Hospital','clinic' => 'clinic', 'govlab'=> 'Government Laboaratory', 
'prilab' => 'Private Laboratory', 'airseae'=>'Airport/Seaport'];

$array_site = ['sentinel' => 'Sentinel', 'non-sentinel' => 'Non-sintinel'];

@endphp

<form id="add-patient-details">
    <div class="form-row">
        <div class="form-group col-md-2">
            <small>ICD 10 Code</small>
            <input type="text" class="form-control" id="icdcode" name="icdcode" placeholder="ICD 10 Code" disabled>
        </div>
        <div class="form-group col-md-5">
            <small>Type</small>
            <select id="patienttype" class="form-control">
                <option selected>Select Type</option>
                @foreach ( $array_type as $key => $type_data)
                <option value="{{ $key }}">{{ $type_data }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-5">
            <small>Type of Site</small>
            <select id="patentsite" class="form-control">
                <option selected>Select Type</option>
                @foreach ( $array_site as $key => $type_data)
                <option value="{{ $key }}">{{ $type_data }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-12 label-patern">
        <p class="m-0">Patient Information</p>
        </div>
        <div class="form-group col-md-2">
            <small>Patient Number</small>
            <input type="text" class="form-control" id="patientnumber" name="patientnumber" placeholder="Patient Number">
        </div>
        <div class="form-group col-md-1">
            <small>EPID ID</small>
            <input type="text" class="form-control" id="epidID" name="epidID" placeholder="EPID ID">
        </div>
        <div class="form-group col-md-4">
            <small>Patient's First Name</small>
            <input type="text" class="form-control" id="patientfname" name="patientfname" placeholder="Patient's First Name">
        </div>
        <div class="form-group col-md-3">
            <small>Middle Name</small>
            <input type="text" class="form-control" id="patientmname" name="patientmname" placeholder="Middle Name">
        </div>
        <div class="form-group col-md-4">
            <small>Last Name</small>
            <input type="text" class="form-control" id="patientlname" name="patientlname" placeholder="Last Name">
        </div>

        <div class="form-group col-md-6">
            <small>Complete Current Address</small>
            <input type="text" class="form-control" id="patientlname" name="patientlname" placeholder="Complete Current Address">
        </div>
        <div class="form-group col-md-6">
            <small>Complete Permanent Address</small>
            <input type="text" class="form-control" id="patientlname" name="patientlname" placeholder="Complete Permanent Address">
        </div>
        <div class="form-group col-md-6">
            <small>Sex</small>
            <label class="checkbox-inline">
                <input type="checkbox" value="">Male
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" value="">Female
            </label>
        </div>

      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
      </div>
    </div>
    <div class="form-group">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group">
      <label for="inputAddress2">Address 2</label>
      <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text" class="form-control" id="inputZip">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <style>
.modal-dialog {
    max-width: 1024px;
    margin: 1.75rem auto;
}
.form-group.col-md-12.label-patern {
    background: #9d9d9d;
    padding: 2px 4px;
}
p.m-0 {
    font-size: 14px;
    color: white;
}
  </style>