
$(document).ready(function(){
  $('.table').css('width', '100%');
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
  //Click en edit modal button
  $('.edit-button').on('click', function() {
    //Seleccionar padre tr de la jugada seleccionada
    $tr = $(this).closest('tr');

    //Almacenar los hijos de tr(td) en un array
    var data = $tr.children('td').map(function(){
      if($(this).text().includes('(')) {
        return $(this).text().substr(0, $(this).text().indexOf('('));
      }else{
        return $(this).text();
      }           
    }).get();

    var jugada_id = $('.datatables').DataTable().row($tr).data()[1];

    //Asignar valores a editar-modal   
    $('#jugada_id').val(jugada_id);
    $('#1va_ejemplar').val(data[1]);
    $('#2va_ejemplar').val(data[2]);
    $('#3va_ejemplar').val(data[3]);
    $('#4va_ejemplar').val(data[4]);
    $('#5va_ejemplar').val(data[5]);
    $('#6va_ejemplar').val(data[6]);
  });

  $('.guardar-button').on('click', function(e) {
    e.preventDefault();
    var data = $('#editar-form').serialize();
    
    $.ajax({  
        url: urlBase + "jugador/jugar/editarJugada",  
        method:"POST",  
        data:data,         
        success:function(data){  
            if(data == 1) {
              Swal.fire({
                title: 'Jugada actualizada',
                text: 'Tu jugada ha sido actualizada',
                icon: 'success'
              }).then(function() {
                window.location.href = urlBase + "jugador/mis-jugadas";
              });              
            }else{
              Swal.fire(
                data,
                '',
                'error'
              )
            } 
        }  
    });  
  });    


  
});  
