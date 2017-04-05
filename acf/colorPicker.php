<?php

/*--------------------------------------------------------*\
	Modulate ACF Color Picker 
\*--------------------------------------------------------*/

function my_acf_input_admin_footer() { ?>
	<script type="text/javascript">
	(function($) {

	acf.add_filter('color_picker_args', function(args, $field) {
		
		// do something to args
		args.palettes = [
			'#e62f2c',
			'#840029',
			'#7094aa',
			'#003b4c',
			'#9ddae6',
			'#6a2469',
			'#ff8300',
			'#82bc00',
			'#ffffff',
			'#d1d1ce',
			'#303c42',
			'#f2f2f2',
		]
		
		// return
		return args;
	});

		
	})(jQuery);	
	</script>
<?php }

add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');