$('#selectAllBoxes').click(function(event){
	if(this.checked){
		$('.checkBoxes').each(function(){
		this.checked = true;
	});
	}else{
		$('.checkBoxes').each(function(){
		this.checked = false;
	});
	}
});



$(document).ready(function(){
	$('#addPost').bootstrapValidator({
		container: '#messages',
		feedbackIcons:{
			valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields:{
			title:{
				validators:{
					notEmpty:{
						message: ' The title is required and cannot be empty'
					},
				 stringLength: {
                        max: 100,
                        message: 'The title must be less than 100 characters long'
                    },
                }
            },
			post_category_id:{
				validators:{
					notEmpty:{
						message: ' Please select some category'
					},	
				}
			},
            status: {
                validators: {
                    notEmpty: {
                        message: 'Please select some post status'
                    },
                }
            },
            image: {
                validators: {
                    notEmpty: {
                        message: 'Please select some post image'
                    },
                }
            },
            post_tags: {
                validators: {
                    notEmpty: {
                        message: 'Enter atleast one post tag'
                    },
                }
            },
            content: {
                validators: {
                    notEmpty: {
                        message: 'You cannot have a post with empty content'
                    }
                }
            } 	
        }
    })
}); 


$(document).ready(function(){
	$('#editPost').bootstrapValidator({
		feedbackIcons:{
			valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields:{
			title:{
				validators:{
					notEmpty:{
						message: ' The title is required and cannot be empty'
					},
				 stringLength: {
                        max: 100,
                        message: 'The title must be less than 100 characters long'
                    },
                }
            },
			post_category_id:{
				validators:{
					notEmpty:{
						message: ' Please select some category'
					},	
				}
			},
            status: {
                validators: {
                    notEmpty: {
                        message: 'Please select some post status'
                    },
                }
            },
            post_tags: {
                validators: {
                    notEmpty: {
                        message: 'Enter atleast one post tag'
                    },
                }
            },
            content: {
                validators: {
                    notEmpty: {
                        message: 'You cannot have a post with empty content'
                    }
                }
            } 	
        }
    })
}); 


$(document).ready(function(){
	$('#addUser').bootstrapValidator({
		feedbackIcons:{
			valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields:{
			firstname:{
				validators:{
					notEmpty:{
						message: ' The firstname is required and cannot be empty'
					},
                }
            },
			lastname:{
				validators:{
					notEmpty:{
						message: ' The lastname is required and cannot be empty'
					},	
				}
			},
            email: {
                validators: {
                    notEmpty: {
                        message: 'Enter an appropriate email'
                    },
                }
            },
            role: {
                validators: {
                    notEmpty: {
                        message: 'Please select some user role'
                    },
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Please enter a strong password'
                    },
                }
            },
			confirm_password: {
                validators: {
                    notEmpty: {
                        message: 'Enter the same password as above'
                    },
                }
            },
			image: {
                validators: {
                    notEmpty: {
                        message: 'Choose a face for us to recognize you'
                    },
                }
            }
        }
    })
}); 

$(document).ready(function(){
	$('#editUser').bootstrapValidator({
		feedbackIcons:{
			valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields:{
			firstname:{
				validators:{
					notEmpty:{
						message: ' The firstname is required and cannot be empty'
					},
                }
            },
			lastname:{
				validators:{
					notEmpty:{
						message: ' The lastname is required and cannot be empty'
					},	
				}
			},
            email: {
                validators: {
                    notEmpty: {
                        message: 'Enter an appropriate email'
                    },
                }
            },
            role: {
                validators: {
                    notEmpty: {
                        message: 'Please select some user role'
                    },
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Please enter a strong password'
                    },
                }
            },
			confirm_password: {
                validators: {
                    notEmpty: {
                        message: 'Enter the same password as above'
                    },
                }
            }
        }
    })
}); 

function loadUsersOnline(){
	$.get("functions.php?onlineusers=result",function(data){
		$('.usersonline').text(data);
	});
}




setInterval(function(){
	loadUsersOnline();
},500);


