$(document).ready(function(){
    $('.datatables').DataTable({
        language: {
            url: "/assets/datatables/spanish.json",
        },               
        ordering: false,
        searching: false,
        lengthChange: false
    });
})