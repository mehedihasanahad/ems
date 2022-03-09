@extends('admin.layout')

@section('inner-content')
    @section('style')
        <style>
            .margin-tb {
                margin-bottom: 10px; 
                float: right;
            }
        </style>
    @endsection
    <a class="btn btn-primary margin-tb" href="{{route('create_education', request()->id)}}">Create</a>
    <input type="hidden" id="currentemployeeId" name="current_employee_id" value="{{request()->id}}">
    <table id="table_id" class="table table-bordered display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Exam</th>
                <th>Passing Year</th>
                <th>Result</th>
                <th>Institution</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>

    @section('script')
        <script>
            $(document).ready( function () {
                const employeeId = document.getElementById("currentemployeeId").value;
                $('#table_id').DataTable({
                    processing: true,
                    serverSide: true,
                    "language": {
                        processing: '<img src="{{ asset('images/loader.gif') }}">' 
                    },
                    ajax: {
                        url: `/api/v1/education-list/${employeeId}`,
                    },
                    "columns": [
                        {'data': 'id', name: 'id'},
                        {'data': 'exam', name: 'exam'},
                        {'data': 'passing_year', name: 'passing_year'},
                        {'data': 'result', name: 'result'},
                        {'data': 'institution', name: 'institution'},
                        {'data': 'actions', name: 'actions'},
                    ]
                });
            });
            // delete education record
            function deleteEducation(e) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.get(`/api/v1/education_delete/${e.id}`).then(res => {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then(res => {
                                window.location.reload();
                            })
                        });
                    }
                })
            }
        </script>
    @endsection
@endsection