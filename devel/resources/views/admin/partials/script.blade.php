<!-- jQuery 3 -->
<script src="{{ asset('admin/bower_components/jquery/dist/jquery.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#country').change(function () {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('dashboard/school/get-state-list')}}?country_id=" + countryID,
                    success: function (res) {
                        if (res) {
                            $("#state").empty();
                            $("#state").append('<option>Select</option>');
                            $.each(res, function (key, value) {
                                $("#state").append('<option value="' + key + '">' + value + '</option>');
                            });

                        } else {
                            $("#state").empty();
                        }
                    }
                });
            } else {
                $("#state").empty();
                $("#city").empty();
            }
        });
        $('#state').on('change', function () {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('dashboard/school/get-city-list')}}?state_id=" + stateID,
                    success: function (res) {
                        if (res) {
                            $("#city").empty();
                            $.each(res, function (key, value) {
                                $("#city").append('<option value="' + key + '">' + value + '</option>');
                            });

                        } else {
                            $("#city").empty();
                        }
                    }
                });
            } else {
                $("#city").empty();
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //AJAX SHOW SCHOOL
        var table = $('#school_datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('school.index') }}",
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
            ],
            columns: [
                {data: 'id', name: 'id', 'visible': false},
                {
                    class: 'details-control',
                    orderable: false,
                    data: null,
                    defaultContent: ''
                },
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'url', name: 'url'},
                {data: 'address', name: 'address'},
                {data: 'postcode', name: 'postcode'},
                {data: 'created_at', name: 'created_at',},
                {data: 'action', name: 'action', orderable: false},

            ],
            order: [[0, 'desc']],
        });

        // Add event listener for opening and closing details
        $('#school_datatable tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });

        //AJAX DELETE SCHOOL
        $('body').on('click', '#delete-school', function () {
            var school_id = $(this).data("id");
            console.log(school_id);
            confirm("Želáte si zmazať vybranú školu ?");
            $.ajax({
                type: "GET",
                url: "school/delete/" + school_id,
                success: function (data) {
                    var oTable = $('#school_datatable').dataTable();
                    oTable.fnDraw(false);
                    $('#message-success').html('<div class="alert alert-dismissible callout callout-success">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                        '<h4><i class="icon fa fa-check"></i> Výborne!</h4>Škola bola zmazaná</div>');

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //AJAX ADD SCHOOL
        $('#createSchool').click(function () {
            $('#btn-save').val("create-school");
            $('#school_id').val('');
            $('#schoolForm').trigger("reset");
            $('#schoolCrudModal').html("Vytvor nový záznam školy");
            $('#ajax-school').modal('show');
        });

        //AJAX EDIT SCHOOL
        $('body').on('click', '.edit-school', function () {
            var school_id = $(this).data('id');
            $.get('school/' + school_id + '/edit', function (data) {
                $('#schoolCrudModal').html("Uprav školu");
                $('#btn-save').val("edit-school");
                $('#ajax-school').modal('show');
                $('#school_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#url').val(data.url);
                $('#address').val(data.address);
                $('#postcode').val(data.postcode);
            })
        });

        //UPDATE BUTTON EVENT
        if ($("#schoolForm").length > 0) {
            $("#schoolForm").validate({
                submitHandler: function (form) {
                    var actionType = $('#btn-save').val();
                    $('#btn-save').html('Pridávam ...');

                    $.ajax({
                        data: $('#schoolForm').serialize(),
                        url: "{{ route('school.store') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            $('#schoolForm').trigger("reset");
                            $('#ajax-school').modal('hide');
                            $('#btn-save').html('Pridaj záznam');
                            var oTable = $('#school_datatable').dataTable();
                            oTable.fnDraw(false);
                            $('#message-success').html('<div class="alert alert-dismissible callout callout-success">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                                '<h4><i class="icon fa fa-check"></i> Success!</h4>Škola bola úspešne pridaná alebo upravená</div>');

                        },
                        error: function (data) {
                            var errors = data.responseText;

                            errors = JSON.parse(errors);
                            errors = errors.errors;
                            var string = '';

                            Object.keys(errors).forEach(function (item) {
                                errors[item].forEach(function (value) {
                                    string += value + '<br>';
                                })
                            });

                            $('#message-danger').html('   <div class="alert alert-dismissible callout callout-danger">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                                '<h4><i class="icon fa fa-check"></i>Chyba</h4>' + string +
                                '</div>');
                            $('#btn-save').html('Uprav záznam');
                        }
                    });
                }
            })
        }

        function format(d) {
            return '<table cellpadding="5" cellspacing="0" border="0" class="table-striped" style="padding-left:50px;">' +
                '<tr>' +
                '<td>Mesto: ' + d.city.name + '</td>' +
                '</tr>' +
                '</table>';
        }
    });
</script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //AJAX SHOW FEEDBACK
        var table = $('#feedback_datatable').DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            pageLength: 6,
            ajax: "{{ route('feedback.index') }}",
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
            ],
            columns: [
                {data: 'id', name: 'id', 'visible': false},
                {
                    data: 'photo',
                    name: 'photo',
                    orderable: false,
                    className: 'zoom',
                    render: function (photo) {
                        return '<img style="width:60px;" src="{{ asset('feedback') }}/' + photo + '">'
                    }
                },
                {data: 'student.name', name: 'student.name'},
                {data: 'rate', name: 'rate'},
                {
                    data: 'published',
                    name: 'published',
                    render: function (published) {
                        if(published == 0)
                            return '<div class="badge bg-red">Nepublikovaný</div>'
                        else return '<div class="badge bg-green">Publikovaný</div>'
                    }
                },
                {data: 'created_at', name: 'created_at',},
                {data: 'action', name: 'action', orderable: false},

            ],
            order: [[0, 'desc']],
        });

        //AJAX DELETE FEEDBACK
        $('body').on('click', '#delete-feedback', function () {
            var feedback_id = $(this).data("id");
            console.log(feedback_id);
            confirm("Želáte si zmazať vybrany feedback ?");
            $.ajax({
                type: "GET",
                url: "feedback/delete/" + feedback_id,
                success: function (data) {
                    var oTable = $('#feedback_datatable').dataTable();
                    oTable.fnDraw(false);
                    $('#message-success').html('<div class="alert alert-dismissible callout callout-success">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                        '<h4><i class="icon fa fa-check"></i> Výborne!</h4>Feedback bol zmazaný. </div>');

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });


    });
</script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //AJAX SHOW SCHOOL
        var table = $('#mobility_datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('mobility.index') }}",
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
            ],
            columns: [
                {data: 'id', name: 'id', 'visible': false},
                {data: 'name', name: 'name'},
                {data: 'school.name', name: 'school.name'},
                {data: 'type', name: 'type'},
                {data: 'start', name: 'start'},
                {data: 'end', name: 'end'},
                {data: 'created_at', name: 'created_at',},
                {data: 'action', name: 'action', orderable: false},

            ],
            order: [[0, 'desc']],
        });
        //SHOW MOBILITIES
        $(document).on('click', '.showItem', function (event) {
            var mobility_id = $(this).data('id');
            event.preventDefault();
            window.location = window.location + '/' + mobility_id;
        });

        //EDIT MOBILITIES
        $(document).on('click', '.edit-mobility', function (event) {
            var mobility_id = $(this).data('id');
            event.preventDefault();
            window.location = window.location + '/' + mobility_id+ '/edit';
        });

        //AJAX DELETE Mobility
        $('body').on('click', '#delete-mobility', function () {
            var mobility_id = $(this).data("id");

            confirm("Želáte si zmazať vybranú mobilitu ?");
            $.ajax({
                type: "GET",
                url: "mobility/delete/" + mobility_id,
                success: function (data) {
                    var oTable = $('#mobility_datatable').dataTable();
                    oTable.fnDraw(false);
                    $('#message-success').html('<div class="alert alert-dismissible callout callout-success">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                        '<h4><i class="icon fa fa-check"></i> Výborne!</h4>Mobilita bola zmazaná. </div>');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //ACTIVITY LOGS
        $('#logs_datatable').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            ajax: "{{ route('log.index') }}",
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8 ]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8 ]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8 ]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8 ]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8 ]
                    }
                },
            ],
            columns: [
                {data: 'id', name: 'id', 'visible': false},
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'user.email', name: 'email'},
                {data: 'subject', name: 'subject'},
                {data: 'url', name: 'url'},
                {data: 'method', name: 'method'},
                {data: 'ip', name: 'ip'},
                {data: 'agent', name: 'agent'},
                {data: 'created_at', name: 'created_at'},
            ],
            order: [[0, 'desc']],
        });
    });

</script>