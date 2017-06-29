$(document).ready(function(){

    $('#add').click(function(){

        $('form').find('#add').before('<div class="form-group"><label class="col-md-2 control-label">Barcode(s)</label><div class="col-md-8"><input type="text" name="barcodes[]" class="form-control" placeholder="EAN-13:111111111"></div></div>');

    });



    $('body').on('click','#remove',function(){

        $(this).parent('div').remove();


    });


});
