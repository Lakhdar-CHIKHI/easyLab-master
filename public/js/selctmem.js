$(document).ready(function() {

    $('#date_debut').on('change', function() {
        //alert($(this).data('id_historique'));
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //  var id_user = $('.qte_act option:selected').val();
        var date_deb = $(this).val();


        //console.log(CSRF_TOKEN);
        $.ajax({
            /* the route pointing to the post function */
            url: 'date',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: { _token: CSRF_TOKEN, date_deb: date_deb },

            /* remind that 'data' is the response of the AjaxController */
            success: function(data) {

                $('#user').empty();

                $('#user').append($("<option/>", {
                    value: '',
                    text: ''

                }));
                $.each(data, function() {

                    $('#user').append($("<option/>", {
                        value: this.id,
                        text: this.name + ' ' + this.prenom

                    }));

                });


            }
        });
    });



    $('#create-contact').on('click', function() {
        //alert($(this).data('id_historique'));
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //  var id_user = $('.qte_act option:selected').val();


        //console.log(CSRF_TOKEN);

        $.getJSON('createpop', function(data) {

            $('#partenaireC').empty();

            $('#partenaireC').append($("<option/>", {
                value: '',
                text: ''

            }));
            $.each(data, function() {

                $('#partenaireC').append($("<option/>", {
                    value: this.id,
                    text: this.nom

                }));
            })


        });

    });

    $('#submit_cont').on('click', function() {
        //alert($(this).data('id_historique'));
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //  var id_user = $('.qte_act option:selected').val();

        //console.log(CSRF_TOKEN);
        nomC = $('#nomC').val();
        prenomC = $('#prenomC').val();
        adresse_mailC = $('#adresse_mailC').val();
        fonctionC = $('#fonctionC').val();

        partenaireC = $('#partenaireC option:selected').val();
        telC = $('#telC').val();
        var contact = [];
        $('#contact :selected').each(function(i) {
            contact[i] = $(this).val();
        });

        var contact2 = $('#contact2 :selected').val();
        var contact1 = $('#contact1 :selected').val();

        $.ajax({
            /* the route pointing to the post function */
            url: 'storepop',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {
                _token: CSRF_TOKEN,
                nom: nomC,
                prenom: prenomC,
                adresse_mail: adresse_mailC,
                fonction: fonctionC,
                partenaire: partenaireC,
                tel: telC
            },

            /* remind that 'data' is the response of the AjaxController */
            success: function(data) {


                swal("Succès", "le Contact a été ajouté avec success", "success");
                $('#contact').empty();

                $('#contact').append($("<option/>", {
                    value: '',
                    text: ''

                }));
                $.each(data, function() {
                    t = 0;
                    d = this.id;
                    $(contact).each(function(i) {
                        c = contact[i];
                        if (d == c) {
                            t = 1;
                        }

                    });

                    if (t == 0) {
                        $('#contact').append($("<option/>", {

                            value: this.id,
                            text: this.nom + this.prenom

                        }));
                    }
                    if (t == 1) {
                        $("#contact").append('<option selected value=' + this.id + '>' + this.nom + ' ' + this.prenom + '</option>');

                    }

                });

                $('#contact1').empty();

                $('#contact1').append($("<option/>", {
                    value: '',
                    text: ''

                }));
                $.each(data, function() {
                    t = 0;
                    d = this.id;
                    if (d == contact1) {
                        $("#contact1").append('<option selected value=' + this.id + '>' + this.nom + ' ' + this.prenom + '</option>');

                    } else {
                        $('#contact1').append($("<option/>", {

                            value: this.id,
                            text: this.nom + this.prenom

                        }));
                    }




                });

                $('#contact2').empty();

                $('#contact2').append($("<option/>", {
                    value: '',
                    text: ''

                }));
                $.each(data, function() {
                    t = 0;
                    d = this.id;
                    if (d == contact2) {
                        $("#contact2").append('<option selected value=' + this.id + '>' + this.nom + ' ' + this.prenom + '</option>');

                    } else {
                        $('#contact2').append($("<option/>", {

                            value: this.id,
                            text: this.nom + this.prenom

                        }));
                    }




                });


                $(':input', '#contform').not(':button, :submit, :reset, :hidden').val('')
                    .removeAttr('checked').removeAttr('selected');
                $("#modalForm .close").click();

            }
        });


    });




    $('#submit_part').on('click', function() {
        //alert($(this).data('id_historique'));
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //  var id_user = $('.qte_act option:selected').val();

        //console.log(CSRF_TOKEN);
        nomP = $('#nomP').val();
        typeP = $('#typeP').val();
        paysP = $('#paysP').val();
        villeP = $('#villeP').val();

        var form = new FormData;
        form.append('_token', CSRF_TOKEN);
        form.append('nom', nomP);
        form.append('type', typeP);
        form.append('pays', paysP);
        form.append('ville', villeP);
        form.append('img', $('#imgP')[0].files[0]);


        /*
        _token: CSRF_TOKEN,
                        nom: nomP,
                        type: typeP,
                        pays: paysP,
                        ville: villeP,
                        img: imgP */
        //imgP = $('#imgP').val();


        var part;
        part = $('#partenaireC option:selected').val();



        $.ajax({
            /* the route pointing to the post function */
            url: 'storepopP',
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            /* send the csrf-token and the input to the controller */
            data: form,

            /* remind that 'data' is the response of the AjaxController */
            success: function(data) {

                swal("Succès", "le Partenaire a été ajouté avec success", "success");

                $('#partenaireC').empty();

                $('#partenaireC').append($("<option/>", {
                    value: '',
                    text: ''

                }));
                $.each(data, function() {
                    t = 0;
                    d = this.id;
                    if (d == part) {
                        t = 1;
                    }

                    if (t == 0) {
                        $('#partenaireC').append($("<option/>", {

                            value: this.id,
                            text: this.nom

                        }));
                    }
                    if (t == 1) {
                        $("#partenaireC").append('<option selected value=' + this.id + '>' + this.nom + '</option>');

                    }

                });






                $(':input', '#partform').not(':button, :submit, :reset, :hidden').val('')
                    .removeAttr('checked').removeAttr('selected');
                $("#modalFormpart .close").click();
            }
        });


    });






});