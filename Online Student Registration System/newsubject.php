<?php
require_once("includes/initialize.php");
include 'header.php';
?>
<div class="container">
<?php
if (isset($_POST['savecourse'])){

	if ($_POST['subjcode'] == "" OR $_POST['subjdesc'] == "" OR $_POST['unit'] == "") {
		message("All field is required!","error");
		check_message();
	}else{
		

		$subj = new Subject();
		$subjcode   	= $_POST['subjcode'];
		$subjdesc	 	= $_POST['subjdesc'];
		$unit 			= $_POST['unit'];
		$pre 			= $_POST['pre'];
		$course 		= $_POST['course'];
		$ay 			= $_POST['ay'];
		$Semester 		= $_POST['Semester'];
	
			$subj->SUBJ_CODE		 = $subjcode;
			$subj->SUBJ_DESCRIPTION  = $subjdesc;
			$subj->UNIT 			 = $unit;
			$subj->PRE_REQUISITE 	 = $pre;
			$subj->COURSE_ID 		 = $course;
			$subj->AY 				 = $ay;
			$subj->SEMESTER 		 = $Semester;


			 $istrue = $subj->create(); 
			 if ($istrue == 1){
			 	
			 	message("New Subject created successfully!","success");
			 	redirect('listofsubject.php');
			 }
	}		 
	 

		
	
}elseif (isset($_POST['saveandnewcourse'])) {
	if ($_POST['subjcode'] == "" OR $_POST['subjdesc'] == "" OR $_POST['unit'] == "") {
		message("All field is required!","error");
		check_message();
	}else{
		

		$subj = new Subject();
		$subjcode   	= $_POST['subjcode'];
		$subjdesc	 	= $_POST['subjdesc'];
		$unit 			= $_POST['unit'];
		$pre 			= $_POST['pre'];
		$course 		= $_POST['course'];
		$ay 			= $_POST['ay'];
		$Semester 		= $_POST['Semester'];
	
			$subj->SUBJ_CODE		 = $subjcode;
			$subj->SUBJ_DESCRIPTION  = $subjdesc;
			$subj->UNIT 			 = $unit;
			$subj->PRE_REQUISITE 	 = $pre;
			$subj->COURSE_ID 		 = $course;
			$subj->AY 				 = $ay;
			$subj->SEMESTER 		 = $Semester;


			 $istrue = $subj->create(); 
			 if ($istrue == 1){
			 	
			 	message("New Subject created successfully!","success");
		
			 }
}
}

?>		
		
		 
		        <form class="form-horizontal well span4" action="#.php" method="POST">

					<fieldset>
						<legend>New Subject</legend>
															

							<div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "subjcode">Subject Code</label>

				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="subjcode" name="subjcode" placeholder=
													  "Subject Code" type="text" value="">
				              </div>
				            </div>
				          </div>

				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "subjdesc">Subject Description</label>

				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="subjdesc" name="subjdesc" placeholder=
													  "Subject Description" type="text" value="">
				              </div>
				            </div>
				          </div>

				           <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "unit">No of units</label>

				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="unit" name="unit" placeholder=
													  "No of units" type="number" value="">
				              </div>
				            </div>
				          </div>
				           <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "pre">Prerequisite</label>

				              <div class="col-md-8">
				                 <input class="form-control input-sm" id="pre" name="pre" placeholder=
													  "Prerequisite" type="text" value="">
				              </div>
				            </div>
				          </div>
				           <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "course">Course</label>

				              <div class="col-md-8">
				               <select class="form-control input-sm" name="course" id="course">
				                  	<?php
				                  	$course = new Course();
				                  	$cur = $course->listOfcourse();	
				                  	foreach ($cur as $course) {
				                  		echo '<option value="'. $course->COURSE_ID.'">'.$course->COURSE_NAME.' '.$course->COURSE_LEVEL .'- Major : '.$course->COURSE_MAJOR .'</option>';
				                  	}

				                  	?>
										
									</select>	
				              </div>
				            </div>
				          </div>

				          <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "ay">Academic Year</label>

				              <div class="col-md-8">
				                <select class="form-control input-sm" name="ay" id="ay">
									<option value="2013-2014">2013-2014</option>
									<option value="2014-2015">2014-2015</option>
									<option value="2015-2016">2015-2016</option>
									<option value="2016-2017">2016-2017</option>
									<option value="2017-2018">2017-2018</option>
									<option value="2018-2019">2018-2019</option>
									<option value="2019-2020">2019-2020</option>	
								</select>	
				              </div>
				            </div>
				          </div>
						  <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "Semester">Semester</label>

				              <div class="col-md-8">
				                 <select class="form-control input-sm" name="Semester" id="Semester">
									<option value="First">First</option>
									<option value="Second">Second</option>	
									<option value="Summer">Summer</option>	
								</select>
				              </div>
				            </div>
				          </div>
						
						 <div class="form-group">
				            <div class="col-md-8">
				              <label class="col-md-4 control-label" for=
				              "idno"></label>

				              <div class="col-md-8">
				                <button class="btn btn-default" name="savecourse" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
				               <button class="btn btn-default" name="saveandnewcourse" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save and Add new</button>
				              </div>
				            </div>
				          </div>

							
					</fieldset>	

									
				</form>
				</div><!--End of container-->
			

<?php include("footer.php") ?>



