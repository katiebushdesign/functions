<?php

/*--------------------------------------------------------*\
	Modulate ACF Color Picker 
\*--------------------------------------------------------*/

function my_acf_input_admin_footer() { ?>
	<script type="text/javascript">
	(function($) {
		acf.add_filter('color_picker_args', function(args, $field) {
			args.palettes = [
				'#96ca4f',
				'#f58021',
				'#9f0d40',
				'#3ca5d5',
				'#007db6',
				'#ffffff',
				'#f8f8f8',
				'#797d82',
				'#a8afb7',
				'#333333',
				'#d7d8d6',
				'#000014',
			]
			return args;
		});
	})(jQuery);	
	</script>
<?php }

add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');



