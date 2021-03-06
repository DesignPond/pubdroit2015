// -------------------------------
// Initialize Data Tables
// -------------------------------

var base_url = location.protocol + "//" + location.host+"/";

$(document).ready(
  function() {
  	
  	TableTools.DEFAULTS.aButtons = [ "xls" ];


  /**
   * Sort function for dates Y/m/d
   */

  jQuery.extend( jQuery.fn.dataTableExt.oSort, {
      "date-uk-pre": function ( a ) {
          var ukDatea = a.split('/');
          return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
      },
      "date-uk-asc": function ( a, b ) {
          return ((a < b) ? -1 : ((a > b) ? 1 : 0));
      },
      "date-uk-desc": function ( a, b ) {
          return ((a < b) ? 1 : ((a > b) ? -1 : 0));
      }
  });

  /**
   * Sort function for inscription number - get only number after / and sort naturally
   */

  jQuery.extend( jQuery.fn.dataTableExt.oSort, {
      "sort-number-pre": function ( a ) {
          var res = a.split('/');
          return parseInt(res[1]);
      },
      "sort-number-asc": function ( a, b ) {
          return ((a < b) ? -1 : ((a > b) ? 1 : 0));
      },
      "sort-number-desc": function ( a, b ) {
          return ((a < b) ? 1 : ((a > b) ? -1 : 0));
      }
  });

    $('.datatables').dataTable({
        "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ inscriptions par page",
            "sInfo"    : "Affiché _END_ sur un total de _TOTAL_",
            "sSearch"  : "",
            "oPaginate": {
		        "sNext"     : "Suivant",
		        "sPrevious" : "Précédent",
		        "sFirst"    : "Première page",
		        "sLast"     : "Dernière page"
		     }
        },
        'aoColumnDefs': [{'bSortable': false, 'aTargets': [0] }],
		"aoColumns": [
			    /* uid */        null,
			    /* no */         { "sType": "sort-number" },
			    /* date */       null,
			    /* civilité */   null,
			    /* prenom */     null,
			    /* nom */        null,
			    /* email */      { "bVisible": false },
			    /* entreprise */ null,
			    /* profession */ { "bVisible": false },
			    /* adresse */    null,
			    /* npa */        null,
			    /* ville */      null,
			    /* canton */     { "bVisible": false },
			    /* pays */       { "bVisible": false }
		]
    });
    
    $('.users_table').dataTable({
        "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "bPaginate": true,
        "bStateSave": true,
        "sProcessing":"Recherche...",
        "bProcessing": true,
        "bServerSide": true,
        'aoColumnDefs': [{'bSortable': false, 'aTargets': [4] },{'bSortable': false, 'aTargets': [5] }],
        "iDisplayLength": "10",
        "sAjaxSource": base_url + "admin/getAllUser",
        "oLanguage": {
            "sLengthMenu": "_MENU_ resultat par page",
            "sInfo"    : "Total de _TOTAL_ utilisateurs, affichés _START_ à _END_",
            "sInfoEmpty": 'Aucune entrée',
            "sEmptyTable": "Aucune correspondance n'a été trouvé",
            "sSearch"  : "",
            "oPaginate": {
		        "sNext"     : "Suivant",
		        "sPrevious" : "Précédent",
		        "sFirst"    : "Première page",
		        "sLast"     : "Dernière page"
		    }
        }
    });
    
    $('.adresse_table').dataTable({
        "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "bPaginate": true,
        "sProcessing":"Recherche...",
        "bProcessing": true,
        "bStateSave": true,
        "bServerSide": true,
        'aoColumnDefs': [{'bSortable': false, 'aTargets': [5] }],
        "iDisplayLength": "10",
        "sAjaxSource": base_url + "admin/getAllAdresse",
        "oLanguage": {
            "sLengthMenu": "_MENU_ resultat par page",
            "sInfo"    : "Total de _TOTAL_ adresses, affichés _START_ à _END_",
            "sInfoEmpty": 'Aucune entrée',
            "sEmptyTable": "Aucune correspondance n'a été trouvé",
            "sSearch"  : "",
            "oPaginate": {
		        "sNext"     : "Suivant",
		        "sPrevious" : "Précédent",
		        "sFirst"    : "Première page",
		        "sLast"     : "Dernière page"
		     }
        }
    });
            
    $('.search_table').dataTable({
        "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "bPaginate": true,
        "bStateSave": true,
        "iDisplayLength": 10,
        "oLanguage": {
            "sLengthMenu": "_MENU_ resultat par page",
            "sInfo"    : "Total de _TOTAL_ resultats, affichés _START_ à _END_",
            "sInfoEmpty": 'Aucune entrée',
            "sEmptyTable": "Aucune correspondance n'a été trouvé",
            "sSearch"  : "",
            "oPaginate": {
		        "sNext"     : "Suivant",
		        "sPrevious" : "Précédent",
		        "sFirst"    : "Première page",
		        "sLast"     : "Dernière page"
		     }
        }
    });
            
    $('.arrets_table').dataTable({
        "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "bPaginate": true,
        "bAutoWidth": false,
        "bStateSave": true, 
        "iDisplayLength": 10,
        "oLanguage": {
            "sLengthMenu": "_MENU_ resultat par page",
            "sInfo"    : "Total de _TOTAL_ arrêts, affichés _START_ à _END_",
            "sSearch"  : "",
            "oPaginate": {
		        "sNext"     : "Suivant",
		        "sPrevious" : "Précédent",
		        "sFirst"    : "Première page",
		        "sLast"     : "Dernière page"
		     }
        },
        "aoColumns" : [
            { sWidth: '15%' },
            { sWidth: '10%' , "sType": "date-uk"},
            { sWidth: '32%' },
            { sWidth: '20%' },
            { sWidth: '17%' },
            { sWidth: '6%' }
        ] 
    });
            
    $('.analyse_table').dataTable({
        "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "bPaginate": true,
        "bAutoWidth": false,
        "bStateSave": true, 
        "iDisplayLength": 10,
        "oLanguage": {
            "sLengthMenu": "_MENU_ resultat par page",
            "sInfo"    : "Total de _TOTAL_ arrêts, affichés _START_ à _END_",
            "sSearch"  : "",
            "oPaginate": {
		        "sNext"     : "Suivant",
		        "sPrevious" : "Précédent",
		        "sFirst"    : "Première page",
		        "sLast"     : "Dernière page"
		     }
        },
        "aoColumns" : [
            { sWidth: '15%' },
            { sWidth: '10%' , "sType": "date-uk"},
            { sWidth: '32%' },
            { sWidth: '20%' },
            { sWidth: '6%' }
        ] 
    });
    
    $('.dataTables_filter input').addClass('form-control').attr('placeholder','Rechercher...');
    $('.dataTables_length select').addClass('form-control');
    
    console.log( base_url + "admin/getAllAdresse");
    
});

// -------------------------------
// Show/Hide columns of tables
// -------------------------------   
    
function fnShowHide( iCol )
{
	/* Get the DataTables object again - this is not a recreation, just a get of the object */
	var oTable = $('#inscriptionsTable').dataTable();
	
	var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
	oTable.fnSetColumnVis( iCol, bVis ? false : true );
}