<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('backend/grid_index');?>
<script type="text/javascript">
    var _grid = 'TESTIMONI', _form = _grid + '_FORM';
    new GridBuilder( _grid , {
        controller:'blog/testimoni',
        fields: [
            { 
                header: '<i class="fa fa-edit"></i>', 
                renderer:function(row) {
                    return A(_form + '.OnEdit(' + row.id + ')', 'Edit');
                },
                exclude_excel : true,
                sorting: false
            },
            { 
                header: '<i class="fa fa-file-image-o"></i>', 
                renderer:function(row) {
                    return UPLOAD(_form + '.OnUpload(' + row.id + ')', 'image', 'Upload Image');
                },
                exclude_excel : true,
                sorting: false
            },
            { 
                header: '<i class="fa fa-search-plus"></i>', 
                renderer:function(row) {
                    var image = "'" + row.image + "'";
                    return row.image ? 
                        '<a title="Preview" onclick="preview(' + image + ')"  href="#"><i class="fa fa-search-plus"></i></a>' : '';
                },
                exclude_excel : true,
                sorting: false
            },
            { header:'Nama', renderer:'caption' },
            { header:'Deskripsi', renderer:'deskripsi' },
            { header:'Jabatan/Kelas', renderer:'status' }
        ],
        resize_column: 5
    });

    new FormBuilder( _form , {
        controller:'blog/testimoni',
        fields: [
            { label:'Nama', name:'caption' },
            { label:'Deskripsi<br>Untuk enter gunakan < br >', name:'deskripsi', type:'textarea' },
            { label:'Jabatan/Kelas', name:'status' }
        ]
    });

    function preview(image) {
        $.magnificPopup.open({
          items: {
            src: _BASE_URL + 'media_library/testimoni/' + image
          },
          type: 'image'
        });
    }
</script>