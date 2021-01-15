<?php




?>
<!doctype html>
<html>

<head>
	<title>A blank HTML5 page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

			$assistant_el.append('<h1>√âtape 1</h1>');
			$assistant_el.append('<h2>Votre pdf es-il r√©duit?</h2>');

			// show navigation
			cat_assistant_show_navigation();
		}

		function cat_assistant_upload() {

			// upload PDF is optimized
			$assistant_el.empty();

			$assistant_el.append('<h1>Importer votre pdf</h1></br>');
			$assistant_el.append('<input type="file" id="mypdf" />');
			$assistant_el.append('<button onclick="getFileInfo()">ok </button> ');


			// show navigation
			cat_assistant_show_navigation();

			// transfer pdf
			// check PDF size
			// ...
			// ...
			//...
		}
        // file uploaded info
		function getFileInfo() {
			var uploaded_file = document.getElementById('mypdf');
			var type =  uploaded_file.value;
			var size= uploaded_file.size;
			// verify file type
			if( type.match(/\.pdf/)){
				// verify file size
				if (size < 500){
					

				}
				else
				alert('Votre fichier dÈpasse 500 Go');

			}
			else
			alert('Veuillez tÈlÈcharger un fichier pdf');
		}

		function cat_assistant_preview() {
			// preview PDF
			$assistant_el.empty();

			$assistant_el.append('<h1>AppeÁu de fichier</h1></br>');
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

			var $prev = $('<a class="cat_assistant_btn_prev" href="#prev">' + lang('fr', "Pr√©c√©dent", 'en', "Previous") + '</a>').click(function() {
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