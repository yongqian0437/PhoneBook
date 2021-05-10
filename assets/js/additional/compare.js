$(document).ready(function(){

    $('#selection1').hide();
    $('#selection2').hide();
    $('#selection3').hide();
    $('#card0').hide();
    $('#card1').hide();
    $('#card2').hide();
    $('#card3').hide();
    $('#course_class_1').hide();
    $('#course_class_2').hide();
    $('#course_class_3').hide();

    $("#selection1").fadeIn(3000);
    $("#selection2").fadeIn(4500);
    $("#selection3").fadeIn(6000);
    $("#card0").fadeIn(1500);
    $("#card1").fadeIn(3000);
    $("#card2").fadeIn(4500);
    $("#card3").fadeIn(6000);
    
    //ajax for 1st courses dropdown
    $('#university_1, #level_1').change(function () {
        var uni1 = document.getElementById("university_1").value;
        var level1 = document.getElementById("level_1").value;

        if(uni1 != "" && level1 != ""){
            $('#course_class_1').show();

            $.ajax({
                url: base_url + "external/Compare/fetch_courses",
                method:"POST",
                data:{uni_id:$("#university_1").val(), course_level:$("#level_1").val()},
                success:function(data)
                {   
                 $('#course_1').html(data);
                }
            });
        }
    });

    //ajax for 2nd courses dropdown
    $('#university_2, #level_2').change(function () {
        var uni2 = document.getElementById("university_2").value;
        var level2 = document.getElementById("level_2").value;

        if(uni2 != "" && level2 != ""){
            $('#course_class_2').show();

            $.ajax({
                url: base_url + "external/Compare/fetch_courses",
                method:"POST",
                data:{uni_id:$("#university_2").val(), course_level:$("#level_2").val()},
                success:function(data)
                {
                 $('#course_2').html(data);
                }
            });
        }
    });

    //ajax for 3nd courses dropdown
    $('#university_3, #level_3').change(function () {
        var uni3 = document.getElementById("university_3").value;
        var level3 = document.getElementById("level_3").value;

        if(uni3 != "" && level3 != ""){
            $('#course_class_3').show();

            $.ajax({
                url: base_url + "external/Compare/fetch_courses",
                method:"POST",
                data:{uni_id:$("#university_3").val(), course_level:$("#level_3").val()},
                success:function(data)
                {
                 $('#course_3').html(data);
                }
            });
        }
    });

}); // end of ready function


function generateTable() {

    var course1 = document.getElementById("course_1").value;
    var course2 = document.getElementById("course_2").value;
    var course3 = document.getElementById("course_3").value;

    if(course1 != "" && course2 != "" && course3 != ""){

        $.ajax({
            url: base_url + "external/Compare/fetch_table",
            method:"POST",
            data:{ uni_id1:$("#university_1").val(), uni_id2:$("#university_2").val(), uni_id3:$("#university_3").val(), course_id1:$("#course_1").val(), course_id2:$("#course_2").val(), course_id3:$("#course_3").val()  },
            success:function(data)
            {
             $('#table_view').html(data);
            }
        });
    }
    else{
        swal({
            title: "Try Again",
            text: "Please fill in all information.",
            icon: "error",
            button: "OK",
        });
    }
} 

