<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('backend/grid_index');?>
<script type="text/javascript">
    var timezone_list = <?=$timezone_list?>;
    var _grid = 'OPTIONS',
        _form1 = _grid + '_FORM1', // meta_description
        _form2 = _grid + '_FORM2', // meta_keywords
        _form3 = _grid + '_FORM3', // site_cache
        _form4 = _grid + '_FORM4', // site_cache_time
        _form5 = _grid + '_FORM5', // site_maintenance
        _form6 = _grid + '_FORM6', // site_maintenance_end_date
        _form7 = _grid + '_FORM7', // Google API Key
        _form8 = _grid + '_FORM8', // Favicon
        _form9 = _grid + '_FORM9', // Header
        _form10 = _grid + '_FORM10', // Recaptcha Site Key
        _form11 = _grid + '_FORM11', // Recaptcha Secret Key
        _form12 = _grid + '_FORM12', // Time Zone
        _form13 = _grid + '_FORM13', // Latitude
        _form14 = _grid + '_FORM14'; // Longitude
        
	new GridBuilder( _grid , {
        controller:'settings/general',
        fields: [
            {
                header: '<i class="fa fa-edit"></i>', 
                renderer:function(row) {
                    if (row.variable == 'meta_description') {
                        return A(_form1 + '.OnEdit(' + row.id + ')');
                    }
                    if (row.variable == 'meta_keywords') {
                        return A(_form2 + '.OnEdit(' + row.id + ')');
                    }
                    if (row.variable == 'site_cache') {
                        return A(_form3 + '.OnEdit(' + row.id + ')');
                    }
                    if (row.variable == 'site_cache_time') {
                        return A(_form4 + '.OnEdit(' + row.id + ')');
                    }
                    if (row.variable == 'site_maintenance') {
                        return A(_form5 + '.OnEdit(' + row.id + ')');
                    }
                    if (row.variable == 'site_maintenance_end_date') {
                        return A(_form6 + '.OnEdit(' + row.id + ')');
                    }
                    if (row.variable == 'google_map_api_key') {
                        return A(_form7 + '.OnEdit(' + row.id + ')');
                    }
                    if (row.variable == 'favicon') {
                        return UPLOAD(_form8 + '.OnUpload(' + row.id + ')', 'image', 'Upload Favicon');
                    }
                    if (row.variable == 'header') {
                        return UPLOAD(_form9 + '.OnUpload(' + row.id + ')', 'image', 'Upload Header');
                    }
                    if (row.variable == 'recaptcha_site_key') {
                        return A(_form10 + '.OnEdit(' + row.id + ')');
                    }
                    if (row.variable == 'recaptcha_secret_key') {
                        return A(_form11 + '.OnEdit(' + row.id + ')');
                    }
                    if (row.variable == 'timezone') {
                        return A(_form12 + '.OnEdit(' + row.id + ')');
                    }
                    if (row.variable == 'latitude') {
                        return A(_form13 + '.OnEdit(' + row.id + ')');
                    }
                    if (row.variable == 'longitude') {
                        return A(_form14 + '.OnEdit(' + row.id + ')');
                    }
                },
                exclude_excel : true,
                sorting: false
            },
            { 
                header: '<i class="fa fa-search-plus"></i>', 
                renderer:function(row) {
                    if (row.variable == 'favicon' || row.variable == 'header') {
                        var image = "'" + row.value + "'";
                        return row.value ? 
                            '<a title="Preview" onclick="preview(' + image + ')"  href="#"><i class="fa fa-search-plus"></i></a>' : '';
                    }
                },
                sorting: false
            },
    		{ header:'Setting Name', renderer: 'description' },
            { 
                header:'Setting Value', 
                renderer: function(row){
                    return row.value ? row.value : '';
                },
                sort_field:'value'
            }
    	],
        can_add: false,
        can_delete: false,
        can_restore: false,
        resize_column: 3,
        per_page: 50,
        per_page_options: [50, 100]
    });

    /**
     * meta_description
     */
    new FormBuilder( _form1 , {
        controller:'settings/general',
        fields: [
            { label:'Deskripsi Meta', name:'value', type:'textarea' }
        ]
    });

    /**
     * meta_keywords
     */
    new FormBuilder( _form2 , {
        controller:'settings/general',
        fields: [
            { label:'Kata Kunci Meta', name:'value', type:'textarea', placeholder:'separated by commas (,)' }
        ]
    });

    /**
     * site_cache
     */
    new FormBuilder( _form3 , {
        controller:'settings/general',
        fields: [
            { label:'Cache situs ?', name:'value', type:'select', datasource:DS.TrueFalse }
        ]
    });

    /**
     * site_cache_time
     */
    new FormBuilder( _form4 , {
        controller:'settings/general',
        fields: [
            { label:'Lama Cache Situs (menit)', name:'value', type:'number' }
        ]
    });

    /**
     * site_maintenance
     */
    new FormBuilder( _form5 , {
        controller:'settings/general',
        fields: [
            { label:'Pemeliharaan situs ?', name:'value', type:'select', datasource:DS.TrueFalse }
        ]
    });

    /**
     * site_maintenance_end_date
     */
    new FormBuilder( _form6 , {
        controller:'settings/general',
        fields: [
            { label:'Tanggal Berakhir Pemeliharaan Situs', name:'value', type:'date' }
        ]
    });

    /**
     * Google API Key
     */
    new FormBuilder( _form7 , {
        controller:'settings/general',
        fields: [
            { label:'Google API Key', name:'value' }
        ]
    });

    /**
     * Favicon
     */
    new FormBuilder( _form8 , {
        controller:'settings/general',
        fields: [
            { label:'Favicon', name:'value' }
        ]
    });

    /**
     * Header
     */
    new FormBuilder( _form9 , {
        controller:'settings/general',
        fields: [
            { label:'Header', name:'value' }
        ]
    });

    /**
     * Recaptcha Site Key
     */
    new FormBuilder( _form10 , {
        controller:'settings/general',
        fields: [
            { label:'Recaptcha Site Key', name:'value' }
        ]
    });

     /**
     * Recaptcha Secret Key
     */
    new FormBuilder( _form11 , {
        controller:'settings/general',
        fields: [
            { label:'Recaptcha Secret Key', name:'value' }
        ]
    });

    /**
     * Time Zone
     */
    new FormBuilder( _form12 , {
        controller:'settings/general',
        fields: [
            { label:'Time Zone', name:'value', type:'select', datasource:timezone_list }
        ]
    });

    /**
     * Latitude
     */
    new FormBuilder( _form13 , {
        controller:'settings/general',
        fields: [
            { label:'Latitude', name:'value' }
        ]
    });

    /**
     * Longitude
     */
    new FormBuilder( _form14 , {
        controller:'settings/general',
        fields: [
            { label:'Longitude', name:'value' }
        ]
    });

    /**
     * Preview Image
     */
    function preview(image) {
        $.magnificPopup.open({
          items: {
            src: '<?=base_url()?>media_library/images/' + image
          },
          type: 'image'
        });
    }

    var th = $('thead.thead').find('th')[3];
    $(th).attr('width', '30%');
</script>