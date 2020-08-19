// var container = document.getElementById('container');
//
// var div = document.getElementById('div');
//
// var image = document.createElement('img');
// image.src = "/../img/icon/like.png";
//
// photo.appendChild(image);
//
//
// // var compter = $('<a>');
// var counter = document.getElementById('counter');
// var i=0;
//
// image.addEventListener('click',
//     function(evt){
//         i = i+1
//         counter.textContent = i;
//
//     });
//
//
// var container2 = document.getElementById('container2');
//
// var div = document.getElementById('div');
//
// var image = document.createElement('img');
// image.src = "/../img/icon/dislike.png";
//
// photo2.appendChild(image);
//
//
//
// var counter2 = document.getElementById('counter');
// var i=0;
//
// image.addEventListener('click',
//     function(evt){
//         i = i-1
//         counter.textContent = i;
//
//     });


// $('#likeVideo').on('click', function(event) {
//     event.preventDefault();
//     var plateform = $('#plateform').val();
//     var _token = $('input[hidden]').attr('value');
//     $.ajax({
//         method: 'POST',
//         url: "/urlLike",
//         data: {
//             plateform,
//             _token
//         },
//         success: function (data) {
//             console.log(data);
//         }
//     })
//
// });

$(document).on('submit','#likeVideo', function(e){
    e.preventDefault();

    $.ajax({
        method:'POST',
        url:'/urlLike',  //ADD THE SLASH!
        data:{
            like_id: $('#likeVideo').val(),
            csrfmiddlewaretoken:$('input[name=csrfmiddlewaretoken]').val()
        },
        success:function(){
            alert('vous aimez');
        }
    })

});


// $(document).on('submit','#likeVideo', function(e){
//      e.preventDefault();
//     axios.post('/urllike/',
//         {'like_id': like_id})
//         .then(reponse => {
//         $('.load_qte').html(reponse.data);
// });

// function loadQuantites(taille_id,produit_id) {
//     axios.post('/panier/qte/check', {'taille_id': taille_id, 'produit_id': produit_id}).then(reponse => {
//         $('.load_qte').html(reponse.data);
//     })
// }


// $('.change_type').on('change',function () {
//     let type_id = this.value;
//     //alert(type_id);
//     loadTailles(type_id,produit_id);
//
// });
// function loadTailles(type_id,produit_id) {
//     axios.post('/backend/produits/select/size',{'type_id':type_id,'produit_id':produit_id})
//         .then(reponse=>{
//             $('.load_tailles').html(reponse.data);
//         });
// }
//
// $('.remove_size').on('click',function(e) {
//     e.preventDefault();
//     let produit_id = $(this).data('id_produit');
//     let taille_id = $(this).data('id_taille');
//     //console.log(produit_id,taille_id);
//     axios.post('/backend/produit/remove/size',{'produit_id':produit_id,'taille_id':taille_id}).then(reponse=>{
//         //alert(reponse.data);
//         // Ne plus afficher le tr qui contient le bouton > suppression de la ligne qui contient la taille
//
//         $(this).closest('tr').remove();
//         $('.remove_reponse').html(reponse.data);
//         $('.remove_reponse').show();
//
//     });
// });

// if ($('.change_size').length){
//
//     let taille_id = $('.change_size').val();
//     let produit_id = $('.change_size').data('produit_id');
//     loadQuantites(taille_id,produit_id);
//
// }
//
//
// $('.change_size').on('change',function () {
//
//     let taille_id = this.value;
//     let produit_id = $(this).data('produit_id');
//     loadQuantites(taille_id,produit_id);
//
// });
//
// function loadQuantites(taille_id,produit_id) {
//     axios.post('/panier/qte/check', {'taille_id': taille_id, 'produit_id': produit_id}).then(reponse => {
//         $('.load_qte').html(reponse.data);
//     })
