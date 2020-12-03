
$(document).ready(function(){

    $("#current_pwd").keyup(function () {
            var current_pwd = $("current_pwd").val();
            $.ajax({
                type:'get',
                url:'/admin/chkPwd',
                data:{current_pwd:current_pwd},
                success:function (resp) {
                    alert(resp);
                 /*if(resp=="false"){
                     $("#chkPwd").html("<span style="color: red; "> Current Password entered is incorrect</span>");
                 }else if(resp=="true"){
                     $("#chkPwd").html("<span style="color: green; "> Current Password entered is correct</span>");
                 }*/
                },error:function (){
                    alert("Error");
                }
            });
    });

	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();

	$('select').select2();

	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true,
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

    // Add Degree Validation
    $("#add_degree").validate({
        rules:{
            degree_name:{
                required:true,
            },
            description:{
                required:true,
            },
            url:{
                required:true,
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });

    // Edit Degree Validation
    $("#edit_degree").validate({
        rules:{
            degree_name:{
                required:true,
            },
            description:{
                required:true,
            },
            url:{
                required:true,
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });

    // Add Past Paper Validation
    $("#add_paper").validate({
        rules:{
            degree_id:{
                required:true,
            },
            paper_name:{
                required:true,
            },
            paper_code:{
                required:true,
            },
            paper_year:{
                required:true,
            },
            image:{
                required:true,
            },
            file:{
                required:true,
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });

    $("#edit_paper").validate({
        rules:{
            degree_id:{
                required:true,
            },
            paper_name:{
                required:true,
            },
            paper_code:{
                required:true,
            },
            paper_year:{
                required:true,
            }
            //image:{
              //  required:true,
           // },
           // file:{
            //    required:true,
            //}
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });



    $("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
            new_pwd:{
                required: true,
                minlength:6,
                maxlength:20
            },
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	/*$("#delDegree").click(function () {
        if (confirm('Are you sure you want to delete this degree course?')){
            return true;
        }
            return false;
    });

    $("#delPaper").click(function () {
        if (confirm('Are you sure you want to delete this Past Paper?')){
            return true;
        }
        return false;
    });*/

    $(".deleteRecord").click(function(){
        var id =$(this).attr('rel');
        var deleteFunction =$(this).attr('rel1');
        swal({
                title: "Are you sure?",
                text: "This record will not be recoverable.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Delete the Record"
            },
            function () {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            });

    });



});
