<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <!-- jquery-->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery-2.2.4.min.js" type="text/javascript"></script>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar"><?php if ($this->uri->segment(1) != 'sambutan-kepala-sekolah') { ?>
                            <div class="thumbnail">
                                <img src="<?=base_url('media_library/images/').$this->session->userdata('headmaster_photo');?>" alt="..." style="width: 100%">
                                <div class="caption">
                                    <h3 align="center"><?=$this->session->userdata('headmaster')?></h3>
                                    <p align="center">
                                        <a href="<?=site_url('sambutan-kepala-sekolah');?>" class="view-all-accent-btn btn-sm" role="button">Baca Sambutan</a>
                                    </p>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="form-group has-feedback">
                                <input onkeydown="if (event.keyCode == 13) { subscriber(); return false; }" type="text" class="form-control" id="subscriber" placeholder="Berlangganan" autocomplete="off">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <?php $query = get_post_categories(); if ($query->num_rows() > 0) { ?>
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Kategori</h3>
                                    <ul class="sidebar-categories">
                                        <?php foreach($query->result() as $row) { ?>
                                        <li><a href="<?=site_url('category/'.$row->slug);?>" title="<?=$row->description;?>"><?=$row->category;?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                            <?php } ?>
                            <?php
                                $query = get_popular_posts(5); if ($query->num_rows() > 0) {
                                    $posts = [];
                                    foreach ($query->result() as $post) {
                                        array_push($posts, $post);
                                    }
                                ?>
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Tulisan Populer</h3>
                                    <div class="sidebar-latest-research-area">
                                        <ul>
                                        <?php if (count(array_slice($posts, 0, 1)) > 0) { ?>
                                                <?php foreach(array_slice($posts, 0, 1) as $row) { ?>
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><img src="<?=base_url('media_library/posts/thumbnail/'.$row->post_image)?>" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4><?=indo_date($row->created_at)?></h4>
                                                    <p> <a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></p>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (count(array_slice($posts, 1)) > 0) { ?>
                                            <?php foreach(array_slice($posts, 1) as $row) { ?>
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><img src="<?=base_url('media_library/posts/thumbnail/'.$row->post_image)?>" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4><?=indo_date($row->created_at)?></h4>
                                                    <p><a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></p>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php $query = get_archive_year(); if ($query->num_rows() > 0) { ?>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <?php $idx = 0; foreach($query->result() as $row) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading_<?=$row->year?>">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#archive_<?=$row->year?>" aria-expanded="true" aria-controls="archive_<?=$row->year?>">Arsip <?=$row->year?></a>
                                        </h4>
                                    </div>
                                    <div id="archive_<?=$row->year?>" class="panel-collapse collapse <?=$idx==0?'in':''?>" role="tabpanel" aria-labelledby="heading_<?=$row->year?>">
                                        <div class="list-group">
                                            <?php $archives = get_archives($row->year); if ($archives->num_rows() > 0) { ?>
                                                <?php foreach($archives->result() as $archive) { ?>
                                                    <a href="<?=site_url('archives/'.$row->year.'/'.$archive->code)?>" class="list-group-item"><?=bulan($archive->code)?> (<?=$archive->count?>)</a>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php $idx++; } ?>
                        </div>
                        <?php } ?>
                            <?php $query = get_active_question(); if ($query) { ?>
                        <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Jajak Pendapat</h3>
                                    <div class="sidebar-latest-research-area">
                                <p><?=$query->question?></p>
                                <?php $options = get_answers($query->id); foreach($options->result() as $option) { ?>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="answer_id" id="answer_id" id="answer_id_<?=$option->id?>" value="<?=$option->id?>">
                                    <?=$option->answer?>
                                  </label>
                                </div>
                                <?php } ?>
                                <div class="btn-group">
                                    <button type="submit" onclick="polling(); return false;" class="btn btn-success btn-sm"><i class="fa fa-send"></i> SUBMIT</button>
                                    <a href="<?=site_url('hasil-jajak-pendapat')?>" class="btn btn-sm btn-warning"><i class="fa fa-bar-chart"></i> LIHAT HASIL</a>      
                                </div>          
                            </div>
                        </div>
                        <?php } ?>

                            
                        </div>
                        <?php $query = get_links(); if ($query->num_rows() > 0) { ?>
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">TAUTAN</h3>
                                    <ul class="product-tags">
                                        <?php foreach($query->result() as $row) { ?>
                                        <li><a href="<?=$row->url;?>" title="<?=$row->title;?>" target="<?=$row->target;?>"><?=$row->title;?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>