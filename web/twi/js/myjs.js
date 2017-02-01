/** For radio button di kandidat baru*/
$("#ref2").keyup(function(){
    $("#ref1").val($("#ref2").val());
    $("#ref1").prop('checked', true);
}); 

$("#ref2").focus(function(){
    
    $("#ref1").prop('checked', true);
}); 
/** For radio button di kandidat baru*/