
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
 
/**
 * konversi dari angka ke bentuk rupiah
 * @param  {[integer]} angka 
 * @return {[string]}        
 */
 function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return rev2.split('').reverse().join('');
}

/**
 * konversi dari format rupiah ke bentuk angka
 * @param  {[string]} rp [description]
 * @return {[integer]}    [description]
 */
function toAngka(rp){
	return parseInt(rp.replace(/,.*|\D/g,''),10)
}
