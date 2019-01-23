var test2 = "choix";
$(document).ready(function() {

    $('.btn_modifier').on('click', function() {
        //alert($(this).data('id_historique'));
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //  var id_user = $('.qte_act option:selected').val();
        var numero_mat = $(this).data('id_modifier');
        var cat_mat = $(this).data('id_modifierr');
        //alert(id_user);
        // alert(cat_mat);
        $('.libId' + numero_mat).val(numero_mat);
        $('.catId' + numero_mat).val(cat_mat);
        //console.log(CSRF_TOKEN);



    });

    $('.btn_historique').on('click', function() {
        //alert($(this).data('id_historique'));
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //  var id_user = $('.qte_act option:selected').val();
        var numero_mat = $(this).data('id_historique');
        //alert(id_user);
        // alert(numero_mat);
        //console.log(CSRF_TOKEN);
        $.ajax({
            /* the route pointing to the post function */
            url: 'materiels/historique',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: { _token: CSRF_TOKEN, numeroMat: numero_mat },

            /* remind that 'data' is the response of the AjaxController */
            success: function(data) {
                //console.log(data);
                $('.table_historique tr').remove();
                $(".table_historique").append(data);
            }
        });
    });

    $('.btn_affecter').on('click', function() {

        var id_materiel = $(this).data('id');

        if (test2 == "membre") {
            affecter_membre(id_materiel);
        } else if (test2 == "équipe") {
            affecter_equipe(id_materiel);
        } else {
            alert('il faut selectioner un choix');
        }
    });
    /*$('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });*/


    //$('.btn_affecter').on('click', function() {
    function affecter_membre(id_materiel) {
        // alert($(this).data('id'));
        //var v = $(this).data('id');
        //  alert($('.qte_act'+v+' option:selected').val()) ;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //  var id_user = $('.qte_act option:selected').val();
        //var numero_mat = $(this).data('id');
        var date = $('#datepicker' + id_materiel).val();
        var id_user = $('.qte_act' + id_materiel + ' option:selected').val();
        //alert(id_user);
        // alert(numero_mat);
        //console.log(CSRF_TOKEN);
        $.ajax({
            /* the route pointing to the post function */
            url: 'materiels/affectations/membre',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: { _token: CSRF_TOKEN, numeroMat: id_materiel, idUser: id_user, date_affectation: date },

            /* remind that 'data' is the response of the AjaxController */
            success: function(data) {
                //console.log(data);
                // $('.table_historique tr').remove();
                // $(".table_historique").append(data);
                location.reload();
            }
        });
    }
    //});

    //$('.btn_affecter2').on('click', function() {
    function affecter_equipe(id_materiel) {
        // alert($(this).data('id2'));
        //var v = $(this).data('id2');
        //  alert($('.qte_act2'+v+' option:selected').val()) ;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //  var id_user = $('.qte_act option:selected').val();
        //var numero_mat = $(this).data('id2');
        var date = $('#datepicker' + id_materiel).val();
        var id_user = $('.qte_act2' + id_materiel + ' option:selected').val();
        //alert(id_user);
        // alert(numero_mat);
        //console.log(CSRF_TOKEN);
        $.ajax({
            /* the route pointing to the post function */
            url: 'materiels/affectations/equipe',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: { _token: CSRF_TOKEN, numeroMat: id_materiel, idUser: id_user, date_affectation: date },

            /* remind that 'data' is the response of the AjaxController */
            success: function(data) {
                //console.log(data);
                // $('.table_historique tr').remove();
                // $(".table_historique").append(data);
                location.reload();
            }
        });
    }
    //});



    $('.sele2').on('change', function() {
        var test = "materiel";
        test = $(this).val();

        if (test == "materiel") {
            $('.mat').show('slow');
            $('.cat').hide('slow');
        } else if (test == "catégories") {
            $('.cat').show('slow');
            $('.mat').hide('slow');
        } else {
            $('.cat').hide('slow');
            $('.mat').hide('slow');
        }
    });

    $('.sele2_affecter').on('change', function() {
        test2 = "membre";
        test2 = $(this).val();

        if (test2 == "membre") {
            $('.membre').show('slow');
            $('.date_affecter').show('slow');
            $('.equipe').hide('slow');
        } else if (test2 == "équipe") {
            $('.equipe').show('slow');
            $('.date_affecter').show('slow');
            $('.membre').hide('slow');
        } else {
            $('.membre').hide('slow');
            $('.equipe').hide('slow');
            $('.date_affecter').hide('slow');
        }
    });
});