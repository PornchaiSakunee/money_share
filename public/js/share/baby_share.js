/* ------------------------------------------------------------------------------
 *
 *  # Datatable sorting
 *
 *  Specific JS code additions for datatable_sorting.html page
 *
 *  Version: 1.0
 *  Latest update: Aug 1, 2015
 *
 * ---------------------------------------------------------------------------- */

$(function () {

  // Table setup
  // ------------------------------

  // Setting datatable defaults
  $.extend($.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{
      orderable: false,
      width: '100px',
      targets: [5]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
      search: '<span>Filter:</span> _INPUT_',
      searchPlaceholder: 'Type to filter...',
      lengthMenu: '<span>Show:</span> _MENU_',
      paginate: {
        'first': 'First',
        'last': 'Last',
        'next': '&rarr;',
        'previous': '&larr;'
      }
    },
    drawCallback: function () {
      $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function () {
      $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
  });


  // Default ordering example
  $('.datatable-sorting').DataTable();


  $('.select').select2();


  // Multi column ordering
  $('.datatable-multi-sorting').DataTable({
    columnDefs: [{
      targets: [0],
      orderData: [0, 1]
    }, {
      targets: [1],
      orderData: [1, 0]
    }, {
      targets: [4],
      orderData: [4, 0]
    }, {
      orderable: false,
      width: '100px',
      targets: [5]
    }]
  });


  // Complex headers with sorting
  $('.datatable-complex-header').DataTable({
    columnDefs: []
  });


  // Sequence control
  $('.datatable-sequence-control').dataTable({
    "aoColumns": [
      null,
      null,
      {
        "orderSequence": ["asc"]
      },
      {
        "orderSequence": ["desc", "asc", "asc"]
      },
      {
        "orderSequence": ["desc"]
      },
      null
    ]
  });



  // External table additions
  // ------------------------------

  // Enable Select2 select for the length option
  $('.dataTables_length select').select2({
    minimumResultsForSearch: Infinity,
    width: 'auto'
  });

  //select amphur
  $('#province_id').change(function (event) {

    selectamphur($(this).val());
    
  });

  $('#amphur_id').change(function (event) {
    selectdistrict($(this).val());
  });

});




function edit_babyshare(id) {
  $.ajax({
    url: APP_URL + '/baby_share/edit_get_babyshare',
    type: 'GET',
    dataType: 'json',
    data: {
      id: id
    },
    success: function (res) {
      console.log(res);
      $('#baby_share_id').val(res[0].bs_id);
      $('#bs_Fname').val(res[0].bs_Fname);
      $('#bs_Lname').val(res[0].bs_Lname);
      $('#bs_nickname').val(res[0].bs_nickname);
      $('#bs_address').val(res[0].address);
      $("#province_id").select2().val(res[0].province).trigger("change");
      $('#postcode').val(res[0].postcode);
      $('#email').val(res[0].bs_email);
      $('#phone_number').val(res[0].bs_phone);
      $('#line_id').val(res[0].bs_line_id);
      $('#bank_id').select2().val(res[0].bank_id).trigger("change");
      $('#bs_bank_number').val(res[0].bs_bank_number);
      $('#bs_note').val(res[0].bs_note);

      // set valude  amphur
      selectamphur(res[0].province,res[0].amphur);
      // / set valude  distric
      selectdistrict(res[0].amphur,res[0].district);
      // $("#district_id").select2().val(res[0].district).trigger("change");
      // setTimeout(function () {
      //   selectamphur(res[0].amphur);
      // }, 500);
      // setTimeout(function () {
      //   selectdistrict(res[0].district);
      // }, 1000);
      $('#modal_form_vertical').modal('show');
    }
  });

}

function selectamphur(province_id,amphur_id=null){
  $('#postcode').val("");
  // $('#district_id').html("");
  $.ajax({
    url: APP_URL + '/baby_share/get-amphur',
    type: 'GET',
    dataType: 'json',
    data: {
      id: province_id
    },
    success: function (res) {
      var html;
      for (var i = 0; i < res.length; i++) {
        if(res[i][0]  == amphur_id){
          html += '<option value="' + res[i][0] + '" selected>' + res[i][1];
        html += '</option>';
        }else{
        html += '<option value="' + res[i][0] + '">' + res[i][1];
        html += '</option>';
        }
      }

      $('#amphur_id').children('option').remove();
      $('#amphur_id').append(html);
      // $('#amphur_id').html(html);

    }
  });
}

function selectdistrict(amphur_id,district_id=null){
  $.ajax({
    url: APP_URL + '/baby_share/get-districts',
    type: 'GET',
    dataType: 'json',
    data: {
      id: amphur_id
    },
    success: function (res) {
      console.log(res);
      var html;
      for (var i = 0; i < res.length; i++) {
        if(res[i][0] == district_id){
          html += '<option value="' + res[i][0] + '" selected>' + res[i][1];
        html += '</option>';
        }else{
          html += '<option value="' + res[i][0] + '">' + res[i][1];
        html += '</option>';
        }
        
      }
      $('#district_id').children('option').remove();
      $('#district_id').append(html);
      // $('#district_id').html(html);
      $('#postcode').val(res[0][2]);
    }
  });
}