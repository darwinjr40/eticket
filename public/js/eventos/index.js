console.log('Hi!');

// alert('dasd');


var combos = document.querySelectorAll('#select-estado');
// console.log(combo);
// for (let combo of combos) {

// }

// var tables = document.querySelectorAll('#tabla');
// console.log(tables.length);
// for (let table of tables) {
//     const tBody = table.tBodies[0];
//     const rows = Array.from(tBody.rows);
//     const headerCells = table.tHead.rows[0].cells;
//     console.log(tBody);
//     console.log(rows);
//     console.log(headerCells);
//     for (let th of rows) {
//         const cellIndex = th.cellIndex;
//         console.log(cellIndex);
    
//     }
// }    


$(function() {
    $('#select-estado').on('change', onSelectProjectChange);
 });
 
//  $(function() {
//     $('#select-estado').on('change', onSelectProjectChange);
//  }); 

 function onSelectProjectChange(){
     alert('nais');
 }

//      var evento_id = $(this).val();
   
//      $.get('/tiendatopicos/public/api/eventos-api', function(data){  
//      // $.get(' http://193.123.99.38/v1/doctor/'+speciality_id, function(data){
//     //  $.get('/api/doctor/'+speciality_id, function(data){
//          console.log(data);  
         
//      });
//  }