<script type="text/javascript">
var ImportExport = function () {
    return{
        handleimportHistory : function(id,url) {
	    	$('#'+id).DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            "pagingType": 'full_numbers',
            'bFilter': false,
            "bPaginate": false,
            "bInfo" : false,
            'ajax': {
                'url':url,
                'data': function(data){
                    var csrfName = $('.txt_csrfname').attr('name');
                    var csrfHash = $('.txt_csrfname').val();
                    return {
                        data: data,
                        [csrfName]: csrfHash,
                    };
            },
            dataSrc: function(data){
                    $('.txt_csrfname').val(data.token);
                    return data.aaData;
                }
            },
            drawCallback: function( settings ){
               $('.datetime').removeClass('sorting_asc');
               feather.replace();
            },
            'columns': [
                { data: 'date_time' },
                { data: 'file_name' },
                { data: 'employee' },
                { data: 'status' }
            ],
            columnDefs: [
                { orderable: false, targets: [ 0,1,2,3 ] }
            ],
            order: [[0, 'asc']],
        	});   
        },
        handleFormTab : function(){
            $('ul.import-ul li a').click(function(){
                if($('input[name=chooseFile]').val()=='' || $('.chooseFile-err').is(':empty')==false){
                    return false;
                }
            });
        },
        handleMappingSelectBox : function(){
            $('#RoleAccess tbody').on('change','select[name*="mapping_name"]',function(){
                var selectedOptions = $('select[name*="mapping_name"] option:selected');
                $('select[name*="mapping_name"] option').removeAttr('disabled');
                selectedOptions.each(function() {
                    var value = this.value;
                    if (value != ''){           
                        var id = $(this).parent('select').attr('id');
                        var options = $('select:not(#' + id + ') option[value=' + value + ']');
                        options.attr('disabled', 'true');
                    }
                });
            });
        },
        handleMappingForm : function(){
            $('#RoleAccess tbody').find('select.mapping_select').each(function(){
                var selected = $(this).val();
                var currentElement = this;
                if(selected!=''){
                    $('#RoleAccess tbody').find('select.mapping_select').each(function(){
                        if(this!=currentElement){
                            $(this).children('option[value='+selected+']').prop('disabled',true);
                        }
                    });
                }
            });
        },
    };
}();
</script>