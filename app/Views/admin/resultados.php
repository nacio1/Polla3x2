<?= $this->extend('templates/layout') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="<?= base_url('admin') ?>" style = "margin-top: -1rem; margin-left: -1rem" class="btn">
    <i class="fas fa-arrow-left"></i>
</a>
<form action="<?= base_url('admin/actualizar-puntos') ?>" method="POST" style="max-width: 300px" id="resultados-form">              
    <div class="col-12">
        <div class="form-group" >
            <select class="form-control" style="min-width: 130px;" name="valida" id="valida">
                <option value="1va_ejemplar" valida_pts="1va_pts" num_ejemplares="1va_ejemplares" valida_retirados="1va_retirados">1ra valida</option>
                <option value="2va_ejemplar" valida_pts="2va_pts" num_ejemplares="2va_ejemplares" valida_retirados="2va_retirados">2da valida</option>
                <option value="3va_ejemplar" valida_pts="3va_pts" num_ejemplares="3va_ejemplares" valida_retirados="3va_retirados">3ra valida</option>
                <option value="4va_ejemplar" valida_pts="4va_pts" num_ejemplares="4va_ejemplares" valida_retirados="4va_retirados">4ta valida</option>
                <option value="5va_ejemplar" valida_pts="5va_pts" num_ejemplares="5va_ejemplares" valida_retirados="5va_retirados">5ta valida</option>
                <option value="6va_ejemplar" valida_pts="6va_pts" num_ejemplares="6va_ejemplares" valida_retirados="6va_retirados">6ta valida</option>
            </select>
        </div>
        <input type="hidden" name="valida_pts" id="valida_pts" value="1va_pts">
        <input type="hidden" name="num_ejemplares" id="num_ejemplares" value="1va_ejemplares">
        <input type="hidden" name="valida_retirados" id="valida_retirados" value="1va_retirados">
    
        <div class="row">
            <div class="col-4">
                <div class="form-group ">
                    <label for="1ro">1ro:</label>
                    <input type="text" class="form-control" name="1ro" id="1ro">
                    <label for="1ro_puntos">Pts</label>
                    <select class="form-control" name="1ro_pts">            
                        <option value="5" selected>5</option>
                        <option value="5">5</option>
                        <option value="3">3</option>
                        <option value="1">1</option>            
                    </select>   
                </div>
            </div>
            <div class="col-4">
                <div class="form-group ">
                    <label for="2do" style="width: 27.25px;">2do:</label>
                    <input type="text" class="form-control" name="2do" id="2do">
                    <label for="2do_puntos">Pts</label>
                    <select class="form-control" name="2do_pts">            
                        <option value="3" selected>3</option>
                        <option value="5">5</option>
                        <option value="3">3</option>
                        <option value="1">1</option>            
                    </select>   
                </div>
            </div>
            <div class="col-4">
                <div class="form-group ">
                    <label for="3ro">3ro:</label>
                    <input type="text" class="form-control" name="3ro" id="3ro">
                    <label for="3ro_puntos">Pts</label>
                    <select class="form-control" name="3ro_pts">            
                        <option value="1" selected>1</option>
                        <option value="5">5</option>
                        <option value="3">3</option>
                        <option value="1">1</option>            
                    </select>   
                </div>
            </div>                     
        </div>
    
        <div class="form-goup text-center my-3 col-12" style="padding-left: 0">
            <button class="btn btn-danger">Enviar</button>
        </div>
    </div>             
</form> 
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
$(document).ready(function(){
    $('#valida').change(function(){
        var valida_pts = $(this).children("option:selected").attr("valida_pts");   
        var num_ejemplares = $(this).children('option:selected').attr('num_ejemplares');           
        var valida_retirados = $(this).children('option:selected').attr('valida_retirados');    
        $('#valida_pts').val(valida_pts);       
        $('#num_ejemplares').val(num_ejemplares);        
        $('#valida_retirados').val(valida_retirados);
    });
    $('#resultados-form').validate({
        submitHandler: function(form) {
            var valida = $('#valida option:selected').html();
            var primero = $('#1ro').val();
            var segundo = $('#2do').val();
            var tercero = $('#3ro').val();                         
            Swal.fire({
                title: valida,
                html: '<b> ' + primero + ' - ' + segundo + ' - ' + tercero + '</b>',
                icon: 'question',
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if(result.value) {                        
                    form.submit();                      
                }
            })
        },
        onclick: false,
        rules: {
            '1ro': {
                required: true,
                digits: true
            },
            '2do': {
                required: true,
                digits: true
            },
            '3ro': {
                required: true,
                digits: true
            },
            '1ro_pts': 'required',
            '2do_pts': 'required',
            '3ro_pts': 'required'
        }
    });
});    
</script>    
<?= $this->endSection() ?>