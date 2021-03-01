function deleteData(id, url= '') 
{
    if(confirm('Are you sure delete file?')) {
        $.ajax({
            type : 'POST',
            dataType : 'json',
            url : url,
            data : {id, url},
            
            success : function (result) 
            {
                if (result.error === false) {

                    alert('Deleted successful!');
                    $('#remove_' + id).remove();
                } else {

                    alert('Falied please try again!');
                }
            }
        });
    }
}