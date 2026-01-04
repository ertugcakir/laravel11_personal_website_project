(function($){

    "use strict";

    $(".inputtags").tagsinput('items');

    $(document).ready(function() {
        $('#example1').DataTable();
    });

    $('.icp_demo').iconpicker();

    $('.datepicker').datepicker({ format: "yyyy/mm/dd" });
    $('.timepicker').timepicker({
        icons:
        {
            up: 'fa fa-angle-up',
            down: 'fa fa-angle-down'
        }
    });

})(jQuery);

const {
	ClassicEditor,
    Heading,
	Essentials,
	Paragraph,
	Bold,
	Italic,
	Font,
    Link,
    List
} = CKEDITOR;
// Create a free account and get <YOUR_LICENSE_KEY>
// https://portal.ckeditor.com/checkout?plan=free
ClassicEditor
	.create( document.querySelector( '.editor' ), {
		licenseKey: 'GPL',
		plugins: [ Essentials, Heading, Paragraph, Bold, Italic, Font, Link, List ],
		toolbar: [
			'undo', 'redo', '|', 'heading' , '|' , 'bold', 'italic', '|',
			'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor',
            'link', 'bulletedList', 'numberedList',
		]
	} )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( error => {
		console.error( error );
	} );


    function permalink(str) {
      str = getSlug(str, {
        lang: "tr",
        uric: true
      })
      return writeToSefInput(str);
    }

    function writeToSefInput(text) {
        document.getElementById("slug").value=text;
    }
