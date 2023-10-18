<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('backend/grid_index');?>
<script type="text/javascript">
    DS.AchievementTypes = {
        '1': 'Sains',
        '2': 'Seni',
        '3': 'Olahraga',
        '4': 'Lain-lain'
    };

    DS.AchievementLevels = {
        '1': 'Sekolah',
        '2': 'Kecamatan',
        '3': 'Kabupaten',
        '4': 'Propinsi',
        '5': 'Nasional',
        '6': 'Internasional'
    };

    var _grid = 'NILAICBT', _form = _grid + '_FORM';
	new GridBuilder( _grid , {
        controller:'nilaicbt',
        fields: [
            { header:'Sem', renderer:'XSemester' },  
            { header:'TP', renderer:'XSetId' },  
            { header:'Tanggal Ujian', renderer:'XTgl' },            
            { header:'Kelas', renderer:'XNamaKelas' },          
            { header:'Mata Pelajaran', renderer:'XKodeMapel' },         
            { header:'Kode Ujian', renderer:'XKodeUjian' },
            { header:'Token', renderer:'XTokenUjian' },
            { header:'Jumlah Soal', renderer:'XJumSoal' },
            { header:'Nilai', renderer:'XTotalNilai' }
    	]
    });

    new FormBuilder( _form , {
	    controller:'nilaicbt',
	    fields: [
            { label:'Jenis', name:'type', type:'select', datasource:DS.AchievementTypes },
            { label:'Tingkat', name:'level', type:'select', datasource:DS.AchievementLevels },
            { label:'Tahun', name:'year' },
            { label:'Penyelenggara', name:'organizer' },
            { label:'Nama Prestasi', name:'XTgl', type:'textarea' }
	    ]
  	});
</script>