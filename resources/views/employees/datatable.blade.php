<div class="container">
    <div class="row">
        <div class="col-md-12">
            <input hidden id="employees__dt_data_route" value="{{$dataRoute??'/employees/data'}}" />
            <h3>Employees</h3> <a href="{{route('employees.create')}}" class="btn btn-info">Create new</a>
            <hr>
            <table id="employees__dt" class="table table-bordered table-condensed table-striped" >
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#employees__dt').DataTable({
            ajax: $('#employees__dt_data_route').val(),
            serverSide: true,
            processing: true,
            columns: [
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'company', name: 'company'},
                {data: 'actions', name: 'actions'},
            ],
        });
    });
</script>
