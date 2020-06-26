$(document).ready(function(){
    $('.datatables').DataTable({
        language: {
            url: "/assets/datatables/spanish.json",
        },
        responsive: true,
        ordering: false,
        ordering: false,
        dom: 'lfrtipB',
        "columnDefs": [
            { "searchable": false, "targets": [0,2,3,4,5,6,7,8,9,10,11,12,13,14] }
        ],
        lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "Todos"]],
        buttons:[
            {
                extend: 'excelHtml5',
                text:'<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar a Excel',
                className:'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text:'<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar a PDF',
                className:'btn btn-danger'
            }
        ]
    });  
    $('#select-jornada').change(function(){
        var fecha_jornada = $(this).val();
        window.location.href = urlBase + 'jugador/puntuacion/' + fecha_jornada;
    });    
});