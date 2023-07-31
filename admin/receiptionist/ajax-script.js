// ajax script for getting state data
   $(document).on('change','#rtype', function(){
      var RoomType = $(this).val();
      if(RoomType){
          $.ajax({
              type:'POST',
              url:'backend-script.php',
              data:{'RoomType':RoomType},
              success:function(result){
                  $('#rno').html(result);
                 
              }
          }); 
      }else{
          $('#rno').html('<option value="">Room Number</option>');
         $('#price').html('Price'); 
      }
  });

    // ajax script for getting  city data
   $(document).on('change','#rno', function(){
      var RoomNumber = $(this).val();
      if(RoomNumber){
          $.ajax({
              type:'POST',
              url:'backend-script.php',
              data:{'RoomNumber':RoomNumber},
              
          }); 
      }else{
          $('#rno').html('<option value="">Room Number</option>');
          
      }
  });
  
  function fetch_price(val) {
    $.ajax({
        type: 'post',
        url: 'backend-script.php',
        data: {
            room_id: val,
            room_price: ''
        },
        success: function (response) {
            $('#price').html(response);
            var days = document.getElementById('staying_day').innerHTML;
            $('#total_price').html(response*days);
        }
    });
}