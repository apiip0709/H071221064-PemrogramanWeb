$(document).ready( function () {
    $('#tableProduk').DataTable({
        "columnDefs": [
            { "targets": 0 },
            { "targets": 1 },
            { "targets": 2 },
            { "targets": 3 }
        ]
    });
});

$(document).ready( function () {
    $('#tableKaryawan').DataTable({
        "columnDefs": [
            { "targets": 0 },
            { "targets": 1 },
            { "targets": 2 },
            { "targets": 3 },
            { "targets": 4 }
        ]
    });
});

$(document).ready( function () {
    $('#tableKantor').DataTable({
        "columnDefs": [
            { "targets": 0 },
            { "targets": 1 },
            { "targets": 2 },
            { "targets": 3 },
            { "targets": 4 },
            { "targets": 5 }
        ]
    });
});