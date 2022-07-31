// // let namaProduk = document.querySelector('#namaProduk');
// // let hargaSatuan = document.querySelector('#hargaSatuan');
// // console.log(hargaSatuan);

// // namaProduk.addEventListener('click', function(e){
// //     if(e.target.value == 'Motruizer'){
// //         hargaSatuan.value = 30000;
// //         hargaSatuan.innerHTML = 30000;
// //         produk = 30000;
// //     } else if(e.target.value == 'Lotion'){
// //         hargaSatuan.value = 40000;
// //         hargaSatuan.innerHTML = 40000;
// //         produk = 40000;
// //     } else if(e.target.value == 'Scrube'){
// //         hargaSatuan.value = 50000;
// //         hargaSatuan.innerHTML = 50000;
// //         produk = 50000;
// //     }
// // });

// function pilihNamaProduk() {
//     for(let i = 1; i < 100; i++){
//         let namaProduk = document.querySelector(`#namaProduk${i}`).value;
//         // let hargaSatuan = document.querySelector('#hargaSatuan');
//         if(namaProduk == 'Motruizer'){
//             document.querySelector(`#hargaSatuan${i}`).innerHTML = 30000;
//             document.querySelector(`#hargaSatuan${i}`).value = 30000;
//             hargaSatuan = 30000;
//         } else if(namaProduk == 'Lotion') {
//             document.querySelector(`#hargaSatuan${i}`).innerHTML = 40000;
//             document.querySelector(`#hargaSatuan${i}`).value = 40000;
//             hargaSatuan = 40000;
//         } else if(namaProduk == 'Scrube') {
//             document.querySelector(`#hargaSatuan${i}`).innerHTML = 50000;
//             document.querySelector(`#hargaSatuan${i}`).value = 50000;
//             hargaSatuan = 50000;
//         }
//     }
// }

// function cetak(){
//     for(let i = 1; i < 100; i++){
//         let kuantitas = document.querySelector(`#kuantitas${i}`).value;
//         document.querySelector(`#tes${i}`).innerHTML = `Rp ` + kuantitas*hargaSatuan;
//         document.querySelector(`#total${i}`).value = kuantitas*hargaSatuan;
//     }
// }
// let angka = 2;
// let angka2 = 2;
// let angka3 = 2;
// let angka4 = 2;
// let angka5 = 2;
// // console.log(angka++);
// $(document).ready(function(){ // Ketika halaman sudah diload dan siap
//     $("#tambahData").click(function(){ // Ketika tombol Tambah Data Form di klik
//       var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
//       var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
      
//       // Kita akan menambahkan form dengan menggunakan append
//       // pada sebuah tag div yg kita beri id insert-form
//       $("#insert-form1").append(
//           `
//           <tr>
//           <td>
//               <div class="form-row align-items-center">
//                   <div class="col-auto my-1">
//                       <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
//                       <select class="custom-select mr-sm-2" id="namaProduk${angka5++}" name="namaProduk[] onclick="pilihNamaProduk()"">
//                           <option value="Motruizer">Motruizer</option>
//                           <option value="Lotion">Lotion</option>
//                           <option value="Scrube">Scrube</option>
//                       </select>
//                   </div>
//               </div>
//           </td>
//           <td>
//               <div class="form-row">
//                   <div class="row">
//                       <div class="col-6">
//                           <input type="number" class="form-control" id="kuantitas${angka++}" name="kuantitas[]" value="1" onchange="cetak()">
//                       </div>
//                   </div>
//               </div>
//           </td>
//           <td id="hargaSatuan${angka4++}">
//             <span>-</span>
//           </td>
//           <td id="tes${angka2++}">
//             -
//           </td>
//       </tr>
//       <input type="hidden" id="total${angka3++}" name="total[]" value="30000">
//       `
//       );
      
//       $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
//     });
// });
