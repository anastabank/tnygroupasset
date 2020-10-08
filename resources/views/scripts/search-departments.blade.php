<script>
    $(function() {
        var cardTitle = $('#card_title');
        var departmentsTable = $('#departments_table');
        var resultsContainer = $('#search_results');
        var departmentsCount = $('#departments_count');
        var clearSearchTrigger = $('.clear-search');
        var searchform = $('#search_departments');
        var searchformInput = $('#departments_search_box');
        var departmentPagination = $('#departments_pagination');
        var searchSubmit = $('#search_trigger');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        searchform.submit(function(e) {
            e.preventDefault();
            resultsContainer.html('');
            departmentsTable.hide();
            clearSearchTrigger.show();
            let noResulsHtml = '<tr>' +
                                '<td>{!! trans("departmentsmanagement.search.no-results") !!}</td>' +
                                '<td></td>' +
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-sm hidden-xs"></td>' +
                                '<td class="hidden-sm hidden-xs hidden-md"></td>' +
                                '<td class="hidden-sm hidden-xs hidden-md"></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>';

            $.ajax({
                type:'POST',
                url: "{{ route('search-departments') }}",
                data: searchform.serialize(),
                success: function (result) {
                    let jsonData = JSON.parse(result);
                    if (jsonData.length != 0) {
                        $.each(jsonData, function(index, val) {
                            let rolesHtml = '';
                            let roleClass = '';
                            let showCellHtml = '<a class="btn btn-sm btn-success btn-block" href="departments/' + val.id + '" data-toggle="tooltip" title="{{ trans("departmentsmanagement.tooltips.show") }}">{!! trans("departmentsmanagement.buttons.show") !!}</a>';
                            let editCellHtml = '<a class="btn btn-sm btn-info btn-block" href="departments/' + val.id + '/edit" data-toggle="tooltip" title="{{ trans("departmentsmanagement.tooltips.edit") }}">{!! trans("departmentsmanagement.buttons.edit") !!}</a>';
                            let deleteCellHtml = '<form method="POST" action="/departments/'+ val.id +'" accept-charset="UTF-8" data-toggle="tooltip" title="Delete">' +
                                    '{!! Form::hidden("_method", "DELETE") !!}' +
                                    '{!! csrf_field() !!}' +
                                    '<button class="btn btn-danger btn-sm" type="button" style="width: 100%;" data-toggle="modal" data-target="#confirmDelete" data-title="Delete department" data-message="{!! trans("departmentsmanagement.modals.delete_department_message", ["department" => "'+val.name+'"]) !!}">' +
                                        '{!! trans("departmentsmanagement.buttons.delete") !!}' +
                                    '</button>' +
                                '</form>';                
                            resultsContainer.append('<tr>' +
                                '<td>' + val.id + '</td>' +
                                '<td>' + val.dname + '</td>' +
                                '<td class="hidden-sm hidden-xs hidden-md">' + val.created_at + '</td>' +
                                '<td class="hidden-sm hidden-xs hidden-md">' + val.updated_at + '</td>' +
                                '<td>' + deleteCellHtml + '</td>' +
                                '<td>' + showCellHtml + '</td>' +
                                '<td>' + editCellHtml + '</td>' +
                            '</tr>');
                        });
                    } else {
                        resultsContainer.append(noResulsHtml);
                    };
                    departmentsCount.html(jsonData.length + " {!! trans('departmentsmanagement.search.found-footer') !!}");
                    departmentPagination.hide();
                    cardTitle.html("{!! trans('departmentsmanagement.search.title') !!}");
                },
                error: function (response, status, error) {
                    if (response.status === 422) {
                        resultsContainer.append(noResulsHtml);
                        departmentsCount.html(0 + " {!! trans('departmentsmanagement.search.found-footer') !!}");
                        departmentPagination.hide();
                        cardTitle.html("{!! trans('departmentsmanagement.search.title') !!}");
                    };
                },
            });
        });
        searchSubmit.click(function(event) {
            event.preventDefault();
            searchform.submit();
        });
        searchformInput.keyup(function(event) {
            if ($('#department_search_box').val() != '') {
                clearSearchTrigger.show();
            } else {
                clearSearchTrigger.hide();
                resultsContainer.html('');
                departmentsTable.show();
                cardTitle.html("{!! trans('departmentsmanagement.showing-all-departments') !!}");
                departmentPagination.show();
                departmentsCount.html(" ");
            };
        });
        clearSearchTrigger.click(function(e) {
            e.preventDefault();
            clearSearchTrigger.hide();
            departmentsTable.show();
            resultsContainer.html('');
            searchformInput.val('');
            cardTitle.html("{!! trans('departmentsmanagement.showing-all-departments') !!}");
            departmentPagination.show();
            departmentsCount.html(" ");
        });
    });
</script>
