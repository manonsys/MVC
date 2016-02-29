/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function delAlert(){
    var buttonsDel = $('button[name="buttonDelete[]"]');
    buttonsDel.on('click', function() {
        var index = buttonsDel.index( this );
        var ident = "newItemGroup[" + index + "]";
        (ident).remove();
    });
}