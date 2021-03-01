// function getData(id, url= '') 
// {
//     $('#productDetails').on('shown.bs.modal', function (){
//         $('.portfolio-link').click(function(){
//             var id = $(this).attr('onclick');
//             alert(id);
//         });
//     });
// }

// $(document).ready(function(){
//     $('.portfolio-link').click(function(){
//         var id = $(this).attr('layid');
//         alert(id);
//     });
// });

function getData(id, url= '') 
{
   $.ajax({
       type: 'POST',
       dataType: 'json',
       url: url,
       data: {id, url},
       success: function(string) {    
            $('#productDetails').on('shown.bs.modal', function (){
                $('#Name').html(string.name);
                $('#Menuname').html('Dòng: ' + string.menu_name);
                $('#Image').attr('src', string.image);
                $('#Description').html(string.description);
                $('#Content').html(string.content);
                var price = parseInt(string.price);
                $('#Price').html('Giá: ' +  price.toLocaleString());
                var sale = parseInt(string.sale);
                if (sale == 0)
                {
                    $('#Sale').html('Sale: 0');
                }
                else 
                {
                    $('#Sale').html('Sale: ' + sale.toLocaleString());
                }
                $('#Link').attr('href', 'gio-hang.html?id=' + string.id);
            });
       }
   });
}

function cart()
{
    $('#formCart').removeClass('d-none');
}