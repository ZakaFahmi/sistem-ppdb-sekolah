<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('backend/grid_index');?>
<script type="text/javascript">
    var _grid = 'AGENDA', _form = _grid + '_FORM';
	new GridBuilder( _grid , {
        controller:'blog/agenda',
        fields: [
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
            { header:'Judul', renderer:'quote_by' },
            { header:'Isi', renderer:'quote' },
            { header:'Tanggal', renderer:'tanggal' },
            { header:'Bulan', renderer:'bulan' },
            { header:'Tahun', renderer:'tahun' },
            { header:'Waktu', renderer:'waktu' },
            { header:'Tempat', renderer:'tempat' }
    	]
    });

    new FormBuilder( _form , {
	    controller:'blog/agenda',
	    fields: [
            { label:'Judul', placeholder:'Judul Agenda', name:'quote_by' },
            { label:'Isi', name:'quote', type:'textarea' },
            { label:'Tanggal', placeholder:'01', name:'tanggal' },
            { label:'Bulan', placeholder:'JAN', name:'bulan' },
            { label:'Tahun', placeholder:'2018', type:'number', name:'tahun' },
            { label:'Waktu', placeholder:'07:00 - 16:00 WIB', name:'waktu' },
            { label:'Tempat', placeholder:'Tempat', name:'tempat' }
	    ]
  	});
</script>