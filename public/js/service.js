// function pilihNamaService() {
//     for(let i = 1; i < 100; i++){
//         let jenisService = document.querySelector(`#jenisService${i}`).value;
//         if(jenisService == 'Treatment') {
//             document.querySelector(`#hargaSatuanService${i}`).innerHTML = 40000;
//             document.querySelector(`#hargaSatuanService${i}`).value = 40000;
//             hargaSatuanService = 40000;
//         } else {
//             document.querySelector(`#hargaSatuanService${i}`).innerHTML = 50000;
//             document.querySelector(`#hargaSatuanService${i}`).value = 50000;
//             hargaSatuanService = 50000;
//         }
//     }
// }

// function cetakService(){
//     for(let i = 1; i < 100; i++){
//         document.querySelector(`#tesService${i}`).innerHTML = hargaSatuanService;
//         document.querySelector(`#totalService${i}`).value = hargaSatuanService;
//     }
// }
// let angkaService = 2;
// let angkaService2 = 2;
// let angkaService3 = 2;
// let angkaService4 = 2;
// let angkaService5 = 2;
// let angkaService6 = 2;

// $(document).ready(function(){ 
//     $("#tambahDataService").click(function(){ 
//       var jumlahService = parseInt($("#jumlah-form-service").val()); 
//       var nextformService = jumlahService + 1; 
      
//       $("#insert-form-service1").append(
//           `
//           <tr>
//           <td>
//               <div class="form-row align-items-center">
//                   <div class="col-auto my-1">
//                       <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
//                       <select class="custom-select mr-sm-2" id="jenisService${angkaService5++}" name="jenisService[]" onclick="pilihNamaService()" onchange="cetakService()">
//                           <option value="Treatment">Treatment</option>
//                           <option value="Spa">Spa</option>                        
//                       </select>
//                   </div>
//               </div>
//           </td>
//           <td id="hargaSatuanService${angkaService4++}">
//             <span>-</span>
//           </td>
//           <td>
//              <div class="form-row align-items-center">
//                  <div class="col-md my-1">
//                      <select class="custom-select mr-sm-2" id="jenisPelayanan" name="jenisPelayanan[]">
//                          <option id="Onsite" value="Onsite">Onsite</option>
//                          <option id="Dirumah" value="Dirumah">Dirumah</option>
//                      </select>
//                  </div>
//              </div>
//          </td>
//          <td>
//              <div class="form-row align-items-center">
//                  <div class="col-md my-1">
//                      <select class="custom-select mr-sm-2" id="jenisPesan" name="jenisPesan[]">
//                          <option id="Online" value="Online">Online</option>
//                          <option id="Offline" value="Offline">Offline</option>
//                      </select>
//                  </div>
//              </div>
//          </td>
//          <td>
//              <div class="form-row">
//                  <div class="row">
//                      <div class="col-10">
//                          <input type="number" class="form-control" id="diskon" name="diskon[]" min="1" value="1">
//                      </div>
//                  </div>
//              </div>
//          </td>
//           <td id="tesService${angkaService2++}">
//             <span>-</span>
//           </td>
//       </tr>
//       <input type="hidden" id="totalService${angkaService3++}" name="totalService[]" value="30000">
//       `
//       );
      
//       $("#jumlah-form-service").val(nextformService); 
//     });
// });
