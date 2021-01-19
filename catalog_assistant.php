<?php
define('WS_CHAR_ENCODING', "ISO");
ini_set('default_charset', 'ISO-8859-1');

$cat_assistant_dir = 'upload/upload-catalog/';
$cat_assistant_versions = array_diff(scandir($cat_assistant_dir), array('..', '.'));
$temp = $cat_assistant_versions;
foreach ($temp as $version) {
	if (is_dir($cat_assistant_dir . $version)) {
		unset($cat_assistant_versions[$version]);
	}
}
var_dump($cat_assistant_versions);

?>
<!doctype html>
<html>

<head>
	<meta charset="ISO-8859-1">
	<title>A blank HTML5 page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="dropzone/dist/min/dropzone.min.js"></script>
	<link rel="stylesheet" type="text/css" href="dropzone/dist/min/dropzone.min.css">
	</script>

</head>

<body>

	<h1>Assistant</h1>

	<div id="catalog_assistant">Affichage ici</div>

	<script type="text/javascript">
		var $assistant_el;
		var step_count = 6;
		var current_step = 0;
		var upload_url = "catalog_assistant.php";

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

			$assistant_el.append('<h1>' + lang('fr', "Étape 1 ", 'en', "Step 1") + '</h1>');
			$assistant_el.append('<h2>' + lang('fr', "Votre pdf est-il réduit?", 'en', "Is your pdf reduced?") + '</h2>');

			// show navigation
			cat_assistant_show_navigation();
		}

		function cat_assistant_upload() {

			// upload PDF is optimized
			$assistant_el.empty();
			$assistant_el.append('<h1>' + lang('fr', "Étape 2 ", 'en', "Step 2") + '</h1>');
			$assistant_el.append('<h2>' + lang('fr', "Importez votre pdf", 'en', "Import your pdf") + '</h2>');

			// $assistant_el.append('<form action="upload.php" class="dropzone" id="dropzoneForm"> <input name="file" type="file" multiple /> <button type="submit" class="btn btn-info" id="submit-all">Uploader </button></form>');

			$assistant_el.append('<form action="url" class="dropzone" id="dropzoneForm">Drop here</form><button type="submit" class="btn btn-info" id="submit-all">Uploader </button>');


			// Dropzone.options.dropzoneForm = {
			// 	autoProcessQueue: false,
			// 	maxFilesize: 5, // MB
			// 	maxFiles: 1,
			// 	acceptedFiles: ".pdf",
			// 	init: function() {
			// 		var submitButton = document.querySelector('#submit-all');
			// 		myDropzone = this;
			// 		submitButton.addEventListener("click", function() {
			// 			mydropzone.processQueue();
			// 		});

			// 		this.on("complete", function() {
			// 			if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
			// 				var _this = this;
			// 				_this.removeAllFiles();
			// 			}

			// 		});

			// 	},
			// };

			// show navigation
			cat_assistant_show_navigation();


		}



		function cat_assistant_preview() {
			// preview PDF
			$assistant_el.empty();
			$assistant_el.append('<h1>' + lang('fr', "Étape 3 ", 'en', "Step 3") + '</h1>');
			$assistant_el.append('<h2>' + lang('fr', "Aperçu de fichier", 'en', "File overview") + '</h2>');

			cat_assistant_show_navigation()

		}

		function cat_assistant_upload_pictures() {
			// upload pictures 
			$assistant_el.empty();
			$assistant_el.append('<h1>' + lang('fr', "Étape 4 ", 'en', "Step 4") + '</h1>');
			$assistant_el.append('<h2>' + lang('fr', "Choisir emplacement fichier", 'en', "Choose file location") + '</h2>');


			cat_assistant_show_navigation()

		}

		function cat_assistant_generate_file() {
			// genertate  pdf 
			$assistant_el.empty();
			$assistant_el.append('<h1>' + lang('fr', "Étape 5 ", 'en', "Step 5") + '</h1>');
			$assistant_el.append('<h2>' + lang('fr', "Instruction", 'en', "Instruction") + '</h2>');

			cat_assistant_show_navigation()

		}

		function cat_assistant_data_upload_file() {
			// genertate  pdf 
			$assistant_el.empty();
			$assistant_el.append('<h1>' + lang('fr', "Étape 6 ", 'en', "Step 6") + '</h1>');
			$assistant_el.append('<h2>' + lang('fr', "Votre catalogue est prêt", 'en', "Your catalog is ready") + '</h2>');

			cat_assistant_show_navigation()

		}

		function cat_assistant_show_navigation() {

			var $prev = $('<a class="cat_assistant_btn_prev" href="#prev">' + lang('fr', "Précédent", 'en', "Previous") + '</a>').click(function() {
				cat_assistant_goto_step('prev');
			});

			var $next = $('<a class="cat_assistant_btn_next" href="#prev">' + lang('fr', "Suivant", 'en', "Next") + '</a>').click(function() {
				cat_assistant_goto_step('next');
			});

			$assistant_el.append($prev);
			$assistant_el.append('    ');
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