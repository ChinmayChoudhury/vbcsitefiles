<?php 
	
	if (isset($_POST['preview'])) {
		$_SESSION['text'] = $_POST['content'];
	}
	
	
?>

	<title>Add post</title>
	<script src="https://cdn.tiny.cloud/1/gp0imis8m8mj2wq5dj4l0k8xwx39l8tg8309ey6onkkh5ntd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
 		tinymce.init({
	  		selector: "#contentarea",  // change this value according to your HTML
			menu: {
	    		file: { title: 'File', items: 'newdocument restoredraft | preview | print | fullpage ' },
	    		edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
	    		view: { title: 'View', items: '| visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
	    		insert: { title: 'Insert', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
			    format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat' },
	    		tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
	    		table: { title: 'Table', items: 'inserttable | cell row column | tableprops deletetable' },
	    		help: { title: 'Help', items: 'help' }
	  		},
			automatic_uploads: true,
			images_reuse_filename: true,
		  	plugins: "image imagetools media fullpage fullscreen code",
		  	images_upload_url: 'upload.php',
		  	height : 400,
		  	min_height: 400,

		  	preview_styles: 'font-size color',
  		});
	</script>



	<h3 class="justify-content-center mt-4">Add a new post</h3>
	
		<form class="mt-3" method="post" id="signinform">
			<div class="form-group row">
				<label for="title" class="col-md-6 col-lg-4 col-form-label text-lg-right text-md-center">Title:</label>
				<div class="col-md-5">
					<input type="text" class="form-control pill" id="title" name="title" placeholder="">
				</div>
			</div>
			<div class="form-group row">
				<label for="category" class="col-md-6 col-lg-4 col-form-label text-md-center text-lg-right">Category:</label>
				<div class="col-md-5">
					
					<select class="form-control pill" id="category" name="category">
							<!-- enter categories -->
					</select>
					<i class="fa fa-chevron-down"></i>
				</div>
			</div>
			<div class="form-group row">
				<label for="description" class="col-md-6 col-lg-4 col-form-label text-lg-right text-md-center">Blog excerpt:</label>
				<div class="col-md-5">
					<textarea class="form-control pill" name="description" id="description" placeholder="Give an excerpt for your blog." maxlength="" rows="5"></textarea>
				</div>
			</div>
			<!-- <div class="form-group row">
				<label for="content" class="col-md-6">Content:</label>
				<div class=""> -->
				<textarea id="contentarea" name="content" placeholder="Put your ideas here...">
					<?php echo (!empty($_SESSION['text']) ? htmlspecialchars($_SESSION['text']) : '' ); ?>

				</textarea>
			<!-- </div>	 -->
		</form>
	<div class="col-12 text-center mt-3">
		Preview your post before submitting.
	</div>
	<div class="col-12 text-center mt-3">                
		<button type="submit" form="signinform" name="preview" value="Preview" class="btn pill text-white black-bg">
			&nbsp;Preview&nbsp;
		</button>
		&nbsp;
		<button type="submit" form="signinform" name="savedraft" value="savedraft" class="btn pill text-white black-bg">
			&nbsp;Save as draft&nbsp;
		</button>
		&nbsp;
		<button type="submit" form="signinform" name="submit" value="submit" class="btn pill text-white black-bg">
			&nbsp;Submit&nbsp;
		</button>
	</div>
	<br>
	<h4 class="justify-content-center"> Your blog preview will be displayed below the line.</h4>
	<hr style="height:1px;border:none;color:#333;background-color:#333;width: 70%" />
    <?php
    	if (isset($_POST['preview'])) {
    		echo $_POST['content'];
    		unset($_POST['preview']);
    	}
    ?>
