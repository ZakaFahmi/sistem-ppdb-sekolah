<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('backend/grid_index');?>
<script type="text/javascript">
	var _grid = 'INBOX', _form = _grid + '_FORM';
    new GridBuilder( _grid , {
        controller:'blog/messages',
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
					header: '<i class="fa fa-envelope-o"></i>',
					renderer:function(row) {
						 return A(_form + '.OnEdit(' + row.id + ')', 'Reply', '<i class="fa fa-envelope-o"></i>');
					},
					exclude_excel : true,
					sorting: false
			  },
            { header:'Pengirim', renderer:'comment_author' },
            { header:'Pesan', renderer:'comment_content' },
            { header:'Email', renderer:'comment_email' },
            { header:'Tanggal Kirim', renderer:'created_at' }
        ],
        can_add:false
    });

	 new FormBuilder( _form , {
	    controller:'blog/messages',
	    fields: [
		 	{ label:'Subject', name:'comment_subject' },
         { label:'Reply', name:'comment_reply', type: 'textarea' }
	    ]
  	});
</script>
