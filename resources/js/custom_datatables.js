
DataTable.Buttons.defaults.dom.button.className = 'btn btn-light-maroon';

new DataTable('#datatablesForm', {
    order: [],
    responsive: true,
    search: {
        boundary: true
    },
});

$(document).ready(function() {
    let tableElement = $('#datatablesDefault');
    let exportFilename = tableElement.data('export-filename') || 'Mintal Faculty Schedules';
    let exportTitle = tableElement.data('export-title') || 'Mintal Faculty Schedules';

    let table = new DataTable('#datatablesDefault', {
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    let column = this;
                    let title = column.footer().textContent;

                    // Create input element
                    let input = document.createElement('input');
                    input.placeholder = title;
                    column.footer().replaceChildren(input);

                    // Event listener for user input
                    input.addEventListener('keyup', () => {
                        if (column.search() !== input.value) {
                            column.search(input.value).draw();
                        }
                    });
                });
        },
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'colvis', 'copy', 'pdf',
            {
                extend: 'excel',
                text: 'Excel',
                filename: exportFilename,
                title: exportTitle,
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
        ],
        order: [],
        layout: {
            topStart: ['pageLength', 'buttons']
        },
        responsive: true,
    });

    table.buttons().container().appendTo('#datatablesDefault_wrapper .col-md-6:eq(0)');
});

new DataTable('#datatableSchedule', {
    initComplete: function () {
        this.api()
            .columns()
            .every(function () {
                let column = this;
                let title = column.footer().textContent;

                // Create input element
                let input = document.createElement('input');
                input.placeholder = title;
                column.footer().replaceChildren(input);

                // Event listener for user input
                input.addEventListener('keyup', () => {
                    if (column.search() !== this.value) {
                        column.search(input.value).draw();
                    }
                });
            });
    },
    rowGroup: {
        dataSrc: 0
    },
    lengthMenu: [
        [10, 25, 50, -1],
        ['10 rows', '25 rows', '50 rows', 'Show all']
    ],
    buttons: [
        'colvis', 'copy', 'pdf',
        {
            extend: 'excel',
            text: 'Excel',
            filename: 'Mintal Faculty Schedules',
            title: 'Mintal Faculty Schedules',
            exportOptions: {
                columns: ':not(:last-child)',
            }
        },
    ],
    order: [],
    layout: {
        topStart: ['pageLength', 'buttons']
    },
    columnDefs: [{
        targets: [-2],
        visible: false
    }],
    responsive: true,
});

new DataTable('#datatableModal', {
    buttons: ['colvis'],
    lengthMenu: [
        [10, 25, 50, -1],
        ['10 rows', '25 rows', '50 rows', 'Show all']
    ],
    order: [],
    layout: {
        topStart: ['pageLength', 'buttons']
    },
    columnDefs: [{
        targets: [2, 3, 4],
        visible: false
    }],
    responsive: true,
});

var table = $('#example').DataTable({
    order: [],
    buttons: ['copy', 'excel', 'print'],
    search: {
        boundary: true
    }
});

table.buttons().container()
    .appendTo('#example_wrapper .col-md-6:eq(0)');