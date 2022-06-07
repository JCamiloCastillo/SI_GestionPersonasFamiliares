$(function() 
{
		Fixed_Header();
});


function Fixed_Header()
{
    $('.User_Table thead').css({'position': 'absolute'});
    $('.User_Table tbody tr:eq("2") td').each(function(index,e){
        $('.User_Table thead tr th:eq("'+index+'")').css({'width' : $(this).outerWidth() +"px" });
    });
    var Header_Height = $('.User_Table thead').outerHeight();
    $('.User_Table thead').css({'margin-top' : "-"+Header_Height+"px"});
    $('.User_Table').css({'margin-top' : Header_Height+"px"});
}