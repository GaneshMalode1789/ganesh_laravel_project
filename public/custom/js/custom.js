$(document).on('shown.bs.modal', function(e) {
    $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
});