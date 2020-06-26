$(document).ready(function(){
    $('.datatables').DataTable({
        language: {
            url: "/assets/datatables/spanish.json",
        },
        "columnDefs": [
          {
            "targets": [ 1 ],
            "visible": false,
            "searchable": false
          }          
        ],        
        ordering: false,
        searching: false,
        lengthChange: false
    });
})