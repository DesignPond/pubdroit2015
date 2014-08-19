// -------------------------------
// Demos
// -------------------------------
$(document).ready(
  function() {
    $('.popovers').popover({container: 'body', trigger: 'hover', placement: 'top'}); //bootstrap's popover
    $('.tooltips').tooltip(); //bootstrap's tooltip

    try {
        //Set nicescroll on notifications
        $(".scrollthis").niceScroll({horizrailenabled:false});
        $('.dropdown').on('shown.bs.dropdown', function () {
            $(".scrollthis").getNiceScroll().resize();
            $(".scrollthis").getNiceScroll().show();
        });
        $('.dropdown').on('hide.bs.dropdown', function ()  {
            $(".scrollthis").getNiceScroll().hide();
        });

        $(window).scroll(function(){
            $(".scrollthis").getNiceScroll().resize();
        });
    } catch(e) {}

    prettyPrint(); //Apply Code Prettifier

    $('.toggle').toggles({on:true});
    
});

$(function() {

	var base_url = location.protocol + "//" + location.host+"/";
	
	//Parsley Form Validation
    //While the JS is not usually required in Parsley, we will be modifying
    //the default classes so it plays well with Bootstrap

    // event form
    $('.validate-form').parsley({
        successClass: 'has-success',
        errorClass: 'has-error',
        errors: {
            classHandler: function(el) {
                return $(el).closest('.form-group');
            },
            errorsWrapper: '<ul class=\"help-block list-unstyled\"></ul>',
            errorElem: '<li></li>'
        }
    });

    $('.validate-form-email').parsley({
        successClass: 'has-success',
        errorClass: 'has-error',
        errors: {
            classHandler: function(el) {
                return $(el).closest('.form-group');
            },
            errorsWrapper: '<ul class=\"help-block list-unstyled\"></ul>',
            errorElem: '<li></li>'
        }
    });
    
    $('.validate-form-attestation').parsley({
        successClass: 'has-success',
        errorClass: 'has-error',
        errors: {
            classHandler: function(el) {
                return $(el).closest('.form-group');
            },
            errorsWrapper: '<ul class=\"help-block list-unstyled\"></ul>',
            errorElem: '<li></li>'
        }
    });    

	$( ".uploadBtn" ).change(function() {
		
		var file   = $(this).val();
		var parent = $(this).closest('form');
		var input  = parent.find(".uploadFile");
		
		input.val(file);
		input.show();

	});
	
	$( ".sortable" ).sortable();
	$( ".sortable" ).disableSelection();
	 
	$('body').on('click','.deleteAction',function(event){
		
		var $this   = $(this);
		var action  = $this.data('action');
        var message = '';

        if($this.hasClass('deleteConfirm'))
        {
            var livraison = $this.closest('ul').find('input[name="livraison"]').val();
            message += ( livraison ? 'Attention!! Cette adresse est l\'adresse de livraison!' : '');
        }
		
		var answer = confirm('Voulez-vous vraiment supprimer : '+ action +' ? ' + message);

	    if (answer){
			return true;
	    }

	    return false;

	});
	
    $('.edit_text').editable( base_url + 'admin/pubdroit/event/pivot', { 
         submit    : 'OK',
         indicator : 'Sauvegarde...',
         cssclass  : 'edit_form_text',
         tooltip   : 'Click to edit...',
		 submitdata : function(value, settings) {
		 	 var column    = $(this).data('column');
		 	 var id        = $(this).data('id');
		 	 var table     = $(this).data('table');
		 	 var event_id  = $(this).data('event_id');
			 return {column: column , id : id, table : table, event_id : event_id};
	   	 }
    });  

    $('#multi-select2').multiSelect({
	      selectableHeader: "<strong>Disponibles</strong>",
		  selectionHeader : "<strong>Sélectionnées</strong>"
    });

    $('#multi-select3').multiSelect({
	      selectableHeader: "<strong>Disponibles</strong>",
		  selectionHeader : "<strong>Sélectionnées</strong>"
    });
    
	$('body').on("click", ".open-DialogModal", function () {
	
	     var title  = $(this).data('title');
	     var column = $(this).data('column');
	     
	     $(".modal-title span").text( title );
	     $("#valuename").text( title );
	     $("#whatColumn").val(column);
	});

    // change column like username or password for user
	$('body').on('click','#changeColumnBtn', function(event){		
		// Prevent form submit
		event.preventDefault();
		$('#alert-error').hide();

		// Serialize form data
		var newname = $("#newValue").val();
		var column  = $("#whatColumn").val();
		var user_id = $("#userid").val();

		$.ajax({
			 type     : 'post',
			 dataType : "json",
			 data     : { user_id : user_id , newname : newname , column : column },
			 success  : function(result) 
			 {
				// The inscription is deleted, we refresh the inscription div with new infos
				if(result.result == true)
                {
                    // Update the username
                    if(column == 'username'){
                        $('#username').text(newname);
                    }

                    // When username is changed dismiss modal and show alert box
                    $('#changeColumn').modal('hide');

                    $('.container-message').find('#message').text('La mise à jour a été effectué');
                    $('.container-message').show(500).delay(1500).hide(500);
					//window.location.href = base_url + 'admin/users/' + user_id; // redirect if we want

	            }
	            else
	            {  
	                // alert('problem');  // Something went wrong alert the debbuging infos
	                $('#alert-error').show();
                }
			 },
			 url: base_url + 'admin/users/changeColumn'
		});	
			
	});
	
	if($('#UsernameEmail')) {
		
		$container = $('#inputUsername');
		var email  = $('#UsernameEmail').val();	
			
		$container.val(email);	
	}
	
	$('#UsernameEmail').blur(function (){
		
		$this      = $(this);
		$container = $('#inputUsername');
		
		var email = $this.val();
		
		$container.val(email);
		
	});

});

// -------------------------------
// Theme Settings
// -------------------------------

// Fixed Header

if($.cookie('fixed-header') === 'navbar-static-top') {
    $('#fixedheader').toggles();
} else {
    $('#fixedheader').toggles({on:true});
}

$('.dropdown-menu').on('click', function(e){
    if($(this).hasClass('dropdown-menu-form')){
        e.stopPropagation();
    }
});

$('#fixedheader').on('toggle', function (e, active) {
    $('header').toggleClass('navbar-fixed-top navbar-static-top');
    $('body').toggleClass('static-header');
    rightbarTopPos();
    if (active) {
        $.removeCookie('fixed-header');
    } else {
        $.cookie('fixed-header', 'navbar-static-top');
    }
});

jQuery(document).ready(function() {

	$('.redactor').redactor({
			minHeight: 100 
	});
	
	$.datepicker.regional['fr-CH'] = {
		closeText: 'Fermer',
		prevText: '&#x3c;Préc',
		nextText: 'Suiv&#x3e;',
		currentText: 'Courant',
		dateFormat: "yy-mm-dd",
		monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
		monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun','Jul','Aoû','Sep','Oct','Nov','Déc'],
		dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
		dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
		dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
		weekHeader: 'Sm',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	
	$.datepicker.setDefaults($.datepicker.regional['fr-CH']);

	$( "#dateDebut" ).datepicker();
    $( "#dateFin" ).datepicker();
    $( "#dateDelai" ).datepicker();
    
    $( ".datePicker" ).datepicker();
    
    $(".toggle_in").hide();
    
    // Toggle section of admin event
	$(".colloque_section").click(function(){
		var myelement = $(this).attr("rel")
		$(myelement).slideToggle("slow");
		$(".toggle:visible").not(myelement).hide();	
	});
	    

});