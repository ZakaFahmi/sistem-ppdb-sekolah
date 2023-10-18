<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('backend/grid_index');?>
<script type="text/javascript">
    DS.Majors = <?=$majors_dropdown;?>;
    var _grid = 'QUOTAS', _form = _grid + '_FORM';
    var _grid_fields = [];
    _grid_fields.push(
        {
            header: '<input type="checkbox" class="check-all">', 
            renderer:function(row) {
                return CHECKBOX(row.id, 'id');
            },
            exclude_excel : true,
            sorting: false
        },
        { 
            header: '<i class="fa fa-edit"></i>', 
            renderer:function(row) {
                return A(_form + '.OnEdit(' + row.id + ')', 'Edit');
            },
            exclude_excel : true,
            sorting: false
        },
        { header:'Tahun', renderer:'year' }
    );
    if (parseInt(_SCHOOL_LEVEL) == 3 || parseInt(_SCHOOL_LEVEL) == 4 || parseInt(_SCHOOL_LEVEL) == 5) {
        _grid_fields.push(
            { header:'Program Keahlian', renderer:'major' }
        );
    }
    _grid_fields.push(
        { header:'Kuota', renderer:'quota' }
    );
	new GridBuilder( _grid , {
        controller:'admission/quotas',
        fields: _grid_fields
    });

    // New Form Builder
    var _form_fields = [];
    _form_fields.push(
        { label:'Tahun', name:'year' }
    );
    if (parseInt(_SCHOOL_LEVEL) == 3 || parseInt(_SCHOOL_LEVEL) == 4 || parseInt(_SCHOOL_LEVEL) == 5) {
        _form_fields.push(
            { label:'Program Keahlian', name:'major_id', type:'select', datasource:DS.Majors }
        );
    }
    _form_fields.push(
        { label:'Kuota', name:'quota', type:'number' }
    );
    new FormBuilder( _form , {
	    controller:'admission/quotas',
	    fields: _form_fields
  	});
</script>