<?php
$folder_name= 'opload/';
if(!empty($_FILES)){
    $temp_file = $_FILES['file']['tmp_name'];
    $location= $folder_name.$_FILES['file']['name'];
    move_uploaded_file($temp_file,$location);
}



?>
<!doctype html>
<html>

<head>
	<title>A blank HTML5 page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="dropzone/dist/dropzone.js"></script>
	<link rel="stylesheet" type="text/css" href="dropzone/dist/dropzone.css">
	</script>

</head>

<body>

	<h1>Assistant</h1>

	<div id="catalog_assistant">Affichage ici</div>

	<script type="text/javascript">
		var $assistant_el;
		var step_count = 6;
		var current_step = 0;

		$(function() {


			// initial execution
			cat_assistant_init();


		});

		function cat_assistant_init() {

			console.log('init');

			$assistant_el = $('#catalog_assistant');
			current_step = 0;

			cat_assistant_goto_step('next');

		}

		function cat_assistant_goto_step(way) {

			if (way == 'next') {
				current_step++;
			} else {
				current_step--;
			}

			console.log('cat_assistant_next_step ' + current_step);

			switch (current_step) {

				case 1:
					cat_assistant_ask_optimized();
					break;
				case 2:
					cat_assistant_upload();
					break;
				case 3:
					cat_assistant_preview()
					break;
				case 4:
					cat_assistant_upload_pictures()
					break;
				case 5:
					cat_assistant_generate_file()
					break;
				case 6:
					cat_assistant_data_upload_file()
					break;

				default:
					alert("Not supported");
					break;

			}

		}

		function cat_assistant_ask_optimized() {

			// ask use if PDF is optimized
			$assistant_el.empty();

			$assistant_el.append('<h1>Étape 1</h1>');
			$assistant_el.append('<h2>Votre pdf es-il réduit?</h2>');

			// show navigation
			cat_assistant_show_navigation();
		}

		function cat_assistant_upload() {

			// upload PDF is optimized
			$assistant_el.empty();

			$assistant_el.append('<h1>Importer votre pdf</h1></br>');
			$assistant_el.append('<form action="/" class="dropzone" id="dropzoneForm"> <input name="file" type="file" multiple /> <button type="submit" class="btn btn-info" id="submit-all">Uploader </button></form>');

			$(document).ready(function() {
				Dropzone.options.dropzoneForm = {
					autoProcessQueue: false,
					maxFilesize: 5, // MB
					maxFiles: 1,
					acceptedFiles: ".pdf",
					init: function() {
						var submitButton = document.querySelector('#submit-all');
						myDropzone = this;
						submitButton.addEventListener("click", function() {
							mydropzone.processQueue();
						});

						this.on("complete", function() {
							if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
								var _this = this;
								_this.removeAllFiles();
							}

						});

					},
				};


			});

		}



		function cat_assistant_preview() {
			// preview PDF
			$assistant_el.empty();

			$assistant_el.append('<h1>Appeçu de fichier</h1></br>');
			cat_assistant_show_navigation()

		}

		function cat_assistant_upload_pictures() {
			// upload pictures 
			$assistant_el.empty();

			$assistant_el.append('<h1>Choisir emplacement fichier</h1>');
			cat_assistant_show_navigation()

		}

		function cat_assistant_generate_file() {
			// genertate  pdf 
			$assistant_el.empty();

			$assistant_el.append('<h1>5 eme etape</h1>');
			cat_assistant_show_navigation()

		}

		function cat_assistant_data_upload_file() {
			// genertate  pdf 
			$assistant_el.empty();

			$assistant_el.append('<h1>Votre catalogue est pret</h1>');
			cat_assistant_show_navigation()

		}

		function cat_assistant_show_navigation() {

			var $prev = $('<a class="cat_assistant_btn_prev" href="#prev">' + lang('fr', "PrÃ©cÃ©dent", 'en', "Previous") + '</a>').click(function() {
				cat_assistant_goto_step('prev');
			});

			var $next = $('<a class="cat_assistant_btn_next" href="#prev">' + lang('fr', "Suivant", 'en', "Next") + '</a>').click(function() {
				cat_assistant_goto_step('next');
			});

			$assistant_el.append($prev);
			$assistant_el.append('  ');
			$assistant_el.append($next);



		}

		// cat_assistant_

		//  temp funct
		var ws_lang = 'fr';

		function lang() {
			var dft_txt = '';

			for (var i = 0; i < arguments.length; i = i + 2) {
				var lang = arguments[i];
				var txt = arguments[i + 1];
				// keep first txt as default
				if (i == 0) dft_txt = txt;
				// check to see if it is current language
				if (lang == ws_lang) return txt;
			}

			return dft_txt;
		}
	</script>

</body>

</html>