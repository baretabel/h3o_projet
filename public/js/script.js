$(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    
    $(".next").click(function(){
    
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
                
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });
    
    $(".previous").click(function(){
    
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
    
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
        //show the previous fieldset
        previous_fs.show();
    
                //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
    
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });
    
    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });
    
    $(".submit").click(function(){
        return false;
    })
    
    
});

function verif() {
    var acteur=$("#act").val();
    var role=$("#role").val();
    
    if ( acteur != '' &&  role != '') {
        $("#n-act").replaceWith('<div id="n-act" style="color:skyblue"><i class="fas fa-plus fa-2x" onclick="nouv()"></i></div>');
    }
    
}
function valid_act(){
    
        $("#btn-act2").removeClass("inv");
        $("#btn-act1").addClass("inv");
    
}
function valid_res(){
    if ($("div").hasClass("flexible_c") && $("div").hasClass("flexible_m")) {
        $("#btn-res2").removeClass("inv");
        $("#btn-res1").addClass("inv");
    }
        
    

}
function nouv() {
    var acteur=$("#act").val();
    var role=$("#role").val();
    $("#l-act").append('<div class="flexible"><p class="nom">'+acteur+'</p><p class="role">'+role+'</p></div>');
    $("#act").val('');
        $("#role").val('');
        $("#n-act").replaceWith('<div id="n-act"><i class="fas fa-plus fa-2x"></i></div>');
    valid_act();
}

function verif_c() {
    var competence=$("#competence").val();
    
    if (  competence != '' ) {
        $("#n-comp").replaceWith('<div id="n-comp" style="color:skyblue"><i class="fas fa-plus fa-2x" onclick="nouv_c()"></i></div>');
    }
    
}
function nouv_c() {
    var competence=$("#competence").val();
    $("#l-comp").append('<div class="flexible_c"><p class="competence">'+competence+'</p></div>');
    $("#competence").val('');
    $("#n-comp").replaceWith('<div id="n-comp"><i class="fas fa-plus fa-2x"></i></div>');
    valid_res();
}
function verif_m() {
    var materiel=$("#materiel").val();
    
    if (  materiel != '' ) {
        $("#n-mat").replaceWith('<div id="n-mat" style="color:skyblue"><i class="fas fa-plus fa-2x" onclick="nouv_m()"></i></div>');
    }
    
}
function nouv_m() {
    var materiel=$("#materiel").val();
    $("#l-mat").append('<div class="flexible_m"><p class="materiel">'+materiel+'</p></div>');
    $("#materiel").val('');
    $("#n-mat").replaceWith('<div id="n-mat"><i class="fas fa-plus fa-2x"></i></div>');
    valid_res();
}
function valid_gen() {
    var categorie=$("#categorie").val();
    var contexte=$("#contexte").val();
    var nom= $("#nom").val();
    var but=$("#but").val();
    var objectif=$("#objectif").val();
    var livrable=$("#livrable").val();

    if ( categorie != '' &&  contexte != '' &&  but != '' &&  objectif != '' &&  livrable != '' && nom != ''){
        $("#btn-gen2").removeClass("inv");
        $("#btn-gen1").addClass("inv");
    }else{
        $("#btn-gen1").removeClass("inv");
        $("#btn-gen2").addClass("inv");
    }
}
function valid_per() {
    var debut=$("#debut").val();
    var fin=$("#fin").val();
    var public=$("#public").val();

    if ( debut != '' &&  fin != '' &&  public != '' ){
        $("#btn-per2").removeClass("inv");
        $("#btn-per1").addClass("inv");
    }else{
        $("#btn-per1").removeClass("inv");
        $("#btn-per2").addClass("inv");
    }
}
$('#btn-res2').click(function(){
    var debut=$("#debut").val();
    var fin=$("#fin").val();
    var public=$("#public").val();
    var categorie=$("#categorie").val();
    var contexte=$("#contexte").val();
    var but=$("#but").val();
    var objectif=$("#objectif").val();
    var livrable=$("#livrable").val();
    var nom= $("#nom").val();

    $.ajax({
        method: $("#msform").attr('method'),
        url: $("#msform").attr('action'),
        data: {
            categorie: categorie,
            nom: nom,
            contexte: contexte,
            but: but,
            objectif: objectif,
            livrable: livrable,
            debut: debut,
            fin: fin,
            public: public,
        }
    })
});
function ajout(){
    var debut=$("#debut").val();
    var fin=$("#fin").val();
    var public=$("#public").val();
    var categorie=$("#categorie").val();
    var contexte=$("#contexte").val();
    var but=$("#but").val();
    var objectif=$("#objectif").val();
    var livrable=$("#livrable").val();
    var nom= $("#nom").val();

    $.ajax({
        method: $("#msform").attr('method'),
        url: $("#msform").attr('action'),
        data: {
            _token: $("#csrf").val(),
            categorie: categorie,
            nom: nom,
            contexte: contexte,
            but: but,
            objectif: objectif,
            livrable: livrable,
            debut: debut,
            fin: fin,
            public: public,
        }
    })
    $(".flexible").each(function(){
       var acteur = $(this).find(".nom").text();
        var role=  $(this).find(".role").text();
            $.ajax({
                method: $("#msform").attr('method'),
                url: $("#r_act").attr('action'),
                data: {
                    _token: $("#csrf").val(),
                    acteur: acteur,
                    role: role,
                    
                }
            })
        
        
    });
    $(".flexible_c").each(function(){
        var competence = $(this).find(".competence").text();
             $.ajax({
                 method: $("#msform").attr('method'),
                 url: $("#r_comp").attr('action'),
                 data: {
                     _token: $("#csrf").val(),
                     competence: competence,
                     
                     
                 }
             })
         
         
     });
     $(".flexible_m").each(function(){
        var materiel = $(this).find(".materiel").text();
        $.ajax({
            method: $("#msform").attr('method'),
            url: $("#r_mat").attr('action'),
            data: {
                _token: $("#csrf").val(),
                materiel: materiel,
            }
        })
         
         
     });
     $(" input[type='checkbox']").each(function(){
         if ($(this).is(":checked")) {
            var localite_id = $(this).val();
            $.ajax({
                method: $("#msform").attr('method'),
                url: $("#r_terr").attr('action'),
                data: {
                    _token: $("#csrf").val(),
                    localite_id: localite_id,
                }
            })
        }
         
     });
}
