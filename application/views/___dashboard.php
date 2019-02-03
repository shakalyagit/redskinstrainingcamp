<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header content-header1">
				<h1>Manage Employee</h1>
				<div class="breadcrumb topright">
					<button data-toggle="control-sidebar" class="btn btn-outline green btn-sm opo addressEdit opened btn-circle mcfr addcatbtn active pad2_10 view" onclick="window.location.href='<?php echo base_url(); ?>employee/add'"><i style="font-size: 16px;" class="fa fa-plus-circle"></i> Add Employee</button>

					
				</div>
				<?php if($this->session->flashdata('success_msg')) { ?>
          <div class="alert alert-info text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><?php echo $this->session->flashdata('success_msg'); ?></strong> 
          </div>
        <?php } ?>
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
										<option value="19">&nbsp;&nbsp;Employee Name A to Z</option>
										<option value="91">&nbsp;&nbsp;Employee Name Z to A</option>
									</optgroup>				
                  				</select>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
							
								<select id="employee_id" onchange="getData('0',$('#status').val(),$('#per_page').val(),this.value)" id="employeeid"  class="fs_input select2">
                 
				                   <option  value="0">All Employees</option>
				                        <?php 
				                        foreach($EmployeeList2 as $row) { ?>
				                            <option value="<?php echo $row->employee_id; ?>" ><?php echo $row->employee_code; ?> - <?php echo $row->first_name; ?> <?php echo $row->last_name; ?></option>';
				                        <?php } ?>
				                  </select> 
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12 col-sm-12 col-xs-12 margintop10">
						<div class="table-responsive" id="postList">
							<!-- <?php $this->load->view('superadmin/employee_list_ajax'); ?> -->
						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->
			<div class="clearfix"></div>
		</div>