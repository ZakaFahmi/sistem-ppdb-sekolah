<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('backend/grid_index');?>
<script type="text/javascript">
    var _grid = 'VIDEOS', _form = _grid + '_FORM';
	new GridBuilder( _grid , {
        controller:'media/videos',
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
    		{ header:'Judul', renderer:'post_title' },
         {
            header:'Video',
            renderer: function( row ) {
               var embed = '<div class="embed-responsive embed-responsive-16by9">';
      			embed += '<iframe class="embed-responsive-item" src="' + row.post_content + '" allowfullscreen></iframe>';
      			embed += '</div>';
               return embed;
            },
            exclude_excel: true,
            sorting: false
         }
    	]
    });

    new FormBuilder( _form , {
	    controller:'media/videos',
	    fields: [
            { label:'Judul', name:'post_title' },
            { label:'Embed Video URL', name:'post_content', type:'textarea' }
	    ]
  	});
</script>
