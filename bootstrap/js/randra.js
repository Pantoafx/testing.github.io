$(function(){
  $(document).ready(function(){
    /*$( "#tgl_pinjam" ).datepicker({
      inline: true;
      $("#tgl_pinjam").datepicker().val();
    });
    $( "#tgl_kembali" ).datepicker({
      inline: true
    });*/
    var date = new Date();

    $("#tgl_project").datepicker({
        dateFormat: "yy-mm-dd",
        defaultDate: date,
        onSelect: function () {
            selectedDate = $.datepicker.formatDate("yy-mm-dd", $(this).datepicker('getDate'));
        }
    });

    $("#tgl_bts").datepicker({
        dateFormat: "yy-mm-dd",
        defaultDate: date,
        onSelect: function () {
            selectedDate = $.datepicker.formatDate("yy-mm-dd", $(this).datepicker('getDate'));
        }
    });
    
    // $("#tgl_kembali").datepicker({
    //     dateFormat: "yy-mm-dd",
    //     defaultDate: date,
    //     onSelect: function () {
    //         selectedDate = $.datepicker.formatDate("yy-mm-dd", $(this).datepicker('getDate'));
    //     }
    // });
    
  });
});
