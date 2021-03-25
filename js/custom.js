$(document).ready(function(){
  n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").value = d + "/" + m + "/" + y;
var currentTime = new Date();

var currentOffset = currentTime.getTimezoneOffset();

var ISTOffset = 330;   // IST offset UTC +5:30 

var ISTTime = new Date(currentTime.getTime() + (ISTOffset + currentOffset)*60000);

// ISTTime now represents the time in IST coordinates

var hoursIST = ISTTime.getHours()
var minutesIST = ISTTime.getMinutes()
document.getElementById("time").value = hoursIST + ":" + minutesIST;
function tick(){
var currentTime = new Date();

var currentOffset = currentTime.getTimezoneOffset();

var ISTOffset = 330;   // IST offset UTC +5:30 

var ISTTime = new Date(currentTime.getTime() + (ISTOffset + currentOffset)*60000);

// ISTTime now represents the time in IST coordinates

var hoursIST = ISTTime.getHours()
var minutesIST = ISTTime.getMinutes()
document.getElementById("time").value = hoursIST + ":" + minutesIST;
}
t = setInterval(tick,10000);


var id=1;
  $('#addrow').click(function(){
    id++;
    $('.item-row:last').after('<tr class="item-row"><td><a class="delete fl" href="javascript:;" title="Remove row">X</a><span><input type="text" autocomplete="off" class="form-control in autocomplete_txt" id="pn_'+id+'" name="pn[]" placeholder="Name" required></span></td><td><input type="text" autocomplete="off" class="form-control cost" value="" placeholder="Unit Cost" id="uc_'+id+'" name="uc[]" required></td><td><input type="number" autocomplete="off" class="form-control qty" value="" placeholder="Qty" id="qt_'+id+'" name="qt[]" required></td><td><input type="text" autocomplete="off" class="form-control price" value="" placeholder="Price" id="pr_'+id+'" name="pr[]" required></td></tr>');
    bind();
  })
bind() ;
 function bind(){
  $('body').on('keyup change blur','.cost',update_price);
  $('body').on('keyup change blur','.qty',update_price);
  $('body').on('keyup change blur','#dp',update_total);
  $('body').on('keyup change blur','#gtot',update_da);
  $('body').on('keyup change blur','#ap',update_da);
    // $('.cost').keyup(update_price);
    // $('.qty').keyup(update_price);
  }

  function update_da(){
    $('#dueamount').val(Number($('#gtot').val())-Number($('#ap').val()));
  }


function  update_price(){
     var row =  $(this).parents('.item-row');
     var cost =  row.find('.cost').val();
     var qty =  row.find('.qty').val();
     row.find('.price').val(Number(qty) * Number(cost));
     update_total()
  }
function update_total(){
  var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];


  var dp=$('#dp').val();
  var quantity=0;
  var total = 0 ; 
  $('.price').each(function(i){
    price =  $(this).val();
      if(price > 0){
        total += Number(price);
      }
  })
  $('.qty').each(function(j){
    qw= $(this).val();
    if(qw>0){
      quantity+=Number(qw);
    }
  })
 $('#tot').val(total);
  $('#total').html(total);

  
  var totalp=(total*(Number(dp))/100);
  total=total-totalp;
  $('#gtot').val(total);
  $('#totnos').val(quantity);
  $('#da').val(totalp);

}
  $('body').on('click','.delete',function(){

    $(this).parents('.item-row').remove();
    update_total() ;
    
  })


})


$(document).on('focus','.autocomplete_txt',function(){
  function update_total(){
  
  var dp=$('#dp').val();
  var quantity=0;
  var total = 0 ; 
  $('.price').each(function(i){
    price =  $(this).val();
      if(price > 0){
        total += Number(price);
      }
  })
  $('.qty').each(function(j){
    qw= $(this).val();
    if(qw>0){
      quantity+=Number(qw);
    }
  })
 $('#tot').val(total);
  $('#total').html(total);

  
  var totalp=(total*(Number(dp))/100);
  total=total-totalp;
  $('#gtot').val(total);
  $('#totnos').val(quantity);
  $('#da').val(totalp);


}
  
  $(this).autocomplete({
    source: function( request, response ) {
      $.ajax({
        url : 'ajax.php',
        dataType: "json",
        method: 'post',
        data: {
           name_startsWith: request.term,
        },
         success: function( data ) {
           response( $.map( data, function( item ) {
            var code = item.split("|");
            return {
              label: code[0],
              value: code[0],
              data : item
            }
          }));
        }
      });
    },
    autoFocus: true,          
    minLength: 0,
    select: function( event, ui ) {
      var names = ui.item.data.split("|");            
      id_arr = $(this).attr('id');
        id = id_arr.split("_");
        element_id = id[id.length-1];
     
      
      $('#uc_'+element_id).val(names[1]);
      $('#qt_'+element_id).val(1);
      $('#pr_'+element_id).val( 1*names[1] );
      $('#pn_'+element_id).val(names[0]);

      update_total();
    }           
  });
});

  
    
