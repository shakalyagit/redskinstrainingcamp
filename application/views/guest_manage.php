<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header content-header1">
				<h1>Guest List</h1>
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="box-body mctopCC30">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="col-md-2 custom-padding-0">
							<label style="float: left; margin-top: 6px;">Show</label>
							<div class="input-group col-md-8" style="padding-left: 6px;">
								<select id="per_page" onchange="getData('0','99',this.value)" class="fs_input select2 FindSearchBy">
									<option value="5" <?=ROW_PER_PAGE==5?'selected':''?> >5</option><option value="10" <?=ROW_PER_PAGE==10?'selected':''?> >10</option><option value="15" <?=ROW_PER_PAGE==15?'selected':''?> >15</option><option value="20" <?=ROW_PER_PAGE==20?'selected':''?> >20</option>
								</select>
								<span class="input-group-addon" style="padding: 6px 4px;">/Page</span>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<select id="status" onchange="getData('0',this.value,$('#per_page').val(),$('#employee_id').val())" class="fs_input select2">
									
									
									<optgroup label="Sort By">
										<option value="19">&nbsp;&nbsp;Guest name A to Z</option>
										<option value="91">&nbsp;&nbsp;Guest name Z to A</option>
									</optgroup>				
                  				</select>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
							
								
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12 col-sm-12 col-xs-12 margintop10">
						<div class="table-responsive" id="postList">
							<?php $this->load->view('guest_list_ajax'); ?>
						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->
			<div class="clearfix"></div>
		</div>