new DataTable('#datatableExcelExport', {
    buttons: [
        'copy', 'pdf',
        {
            extend: 'excel',
            text: 'Export Excel',
            filename: 'Mintal Faculty Schedules',
            title: 'Mintal Faculty Schedules',
            
        }
    ],
    order: [],
    layout: {
        topStart: 'buttons'
    },
    responsive: true,
});

new DataTable('#datatableCustomExcelExport', {
    buttons: [
        'colvis','copy', 'pdf',
        {
            extend: 'excel',
            text: 'Export Excel',
            filename: 'Mintal Faculty Schedules',
            title: 'Mintal Faculty Schedules',
            exportOptions: {
                columns: ':not(:last-child)',
            }
        },
    ],
    order: [],
    layout: {
        topStart: 'buttons'
    },
    columnDefs: [
        {
            targets: -1,
            visible: false
        }
    ],
    responsive: true,
});