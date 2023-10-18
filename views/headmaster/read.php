<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('backend/grid_index');?>
<script type="text/javascript">
    var _grid = 'HEADMASTER', _form = _grid + '_FORM';
    new GridBuilder( _grid , {
        controller:'blog/headmaster',
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
            { header:'Nama', renderer:'deskripsi' },
            { header:'Jabatan', renderer:'caption' },
            { header:'E-Mail', renderer:'email' },
            { header:'Facebook', renderer:'facebook' },
            { header:'Instagram', renderer:'instagram' },
            { header:'Twitter', renderer:'twitter' }
        ],
        resize_column: 5
    });

    new FormBuilder( _form , {
        controller:'blog/headmaster',
        fields: [
            { label:'Nama', name:'deskripsi' },
            { label:'Jabatan', name:'caption' },
            { label:'E-Mail', name:'email' },
            { label:'Facebook', name:'facebook' },
            { label:'Instagram', name:'instagram' },
            { label:'Twitter', name:'twitter' }
        ]
    });

    function preview(image) {
        $.magnificPopup.open({
          items: {
            src: _BASE_URL + 'media_library/headmaster/' + image
          },
          type: 'image'
        });
    }
</script>