<?php
/* Comment form validation on same page*/
function comment_validation_init() {
	if(is_product() && comments_open() ) { ?>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery.validate.min.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('#commentform').validate({
					rules: {
						author: {
							required: true,
							minlength: 2
						},
						email: {
							required: true,
							email: true
						},
						comment: {
							required: true,
							minlength: 20
						}
					},
					messages: {
						author: "Vui lòng điền tên của bạn",
						email: "Vui lòng điền email chính xác",
						comment: "Vui lòng điền nhận xét nhiều hơn 20 ký tự"
					},
					errorElement: "div",
					errorPlacement: function(error, element) {
						element.after(error);
					}
				});
			});
		</script>
	<?php } // end if
}
add_action('wp_footer', 'comment_validation_init');
