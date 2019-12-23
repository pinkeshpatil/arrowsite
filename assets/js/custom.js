var base_url = 'http://arrowsite.woddev.com/';

	function makeEditable(btnid, viewBlock, editBlock){		
		if($('#'+viewBlock).css('display') == 'block'){			
			$('#'+viewBlock).fadeOut(200);
			$('#'+editBlock).fadeIn(400);			
			$('#'+btnid).html('View');
			var editBox  = $("#"+editBlock);
			var firstInput = $(":input:not(input[type=button],input[type=submit],button):visible:first", editBox);
  			firstInput.focus();
		} else {	
			if(btnid == 'serviceinfoEditBtn'){
				$("#serviceinfo-update").css('display','none');
			}		
			$('#'+editBlock).fadeOut(200);
			$('#'+viewBlock).fadeIn(400);
			$('#'+btnid).html('Edit');
			if(btnid == 'bioEditBtn'){
				refreshBioInfo();
			}
		}		
	}

	function refreshBioInfo(){
		$.ajax({
		        url: base_url + "user/refreshBioInfo",
		   		type: "POST",		   		
		   		success: function(data) {
		   			$("#bio-view").html(data);
		      	}          
		});		
	}

	function refreshServicesInfo(){
		$.ajax({
		        url: base_url + "services/getservices",
		   		type: "POST",		   		
		   		success: function(data) {
		   			$("#serviceinfo-view").html(data);
		      	}          
		});		
	}

	function refreshPackagesInfo(){
		$.ajax({
		        url: base_url + "services/getpackages",
		   		type: "POST",		   		
		   		success: function(data) {
		   			$("#packagesinfo-view").html(data);
		      	}          
		});		
	}

	function refreshCategoriesInfo(){
		$.ajax({
		        url: base_url + "services/getcategories",
		   		type: "POST",		   		
		   		success: function(data) {
		   			$("#categoriesinfo-view").html(data);
		      	}          
		});		
	}

	function refreshCCPaymentInfo(){
		$.ajax({
		        url: base_url + "user/refreshCCPaymentInfo",
		   		type: "POST",		   		
		   		success: function(data) {
		   			$("#ccPaymentInfoBox").html(data);
		      	}          
		});		
	}
	
	function refreshPaypalPaymentInfo(){
		$.ajax({
		        url: base_url + "user/refreshPaypalPaymentInfo",
		   		type: "POST",		   		
		   		success: function(data) {
		   			$("#paypalPaymentInfoBox").html(data);
		      	}          
		});		
	}

	function refreshAboutInfo(){
		$.ajax({
		        url: base_url + "user/refreshAboutInfo",
		   		type: "POST",		   		
		   		success: function(data) {
		   			$("#aboutInfoBox").html(data);
		      	}          
		});		
	}

	function refreshInsuranceInfo(){
		$.ajax({
		        url: base_url + "user/refreshInsuranceInfo",
		   		type: "POST",		   		
		   		success: function(data) {
		   			$("#insuranceInfoBox").html(data);
		      	}          
		});		
	}

	function refreshEventInfo(){
		var event_id = $("#event_id").val();
		$.ajax({
		        url: base_url + "events/refreshEventInfo",
		   		type: "POST",
		   		data: {event_id : event_id},
		   		success: function(data) {
		   			$("#eventInfoBox").html(data);
		      	}          
		});		
	}

	function refreshEventPricing(){
		var event_id = $("#event_id").val();
		$.ajax({
		        url: base_url + "events/refreshEventPricing",
		   		type: "POST",
		   		data: {event_id : event_id},
		   		success: function(data) {
		   			$("#eventPricingBox").html(data);
		      	}          
		});		
	}

	function refreshEventMediaInfo(){
		var event_id = $("#event_id").val();
		$.ajax({
		        url: base_url + "events/refreshEventMediaInfo",
		   		type: "POST",
		   		data: {event_id : event_id},
		   		success: function(data) {
		   			$("#eventMediaInfoBox").html(data);
		      	}          
		});		
	}

	function closeBox(hidebox, emptybox){
		$(".loader").css('display','none');
	    $('#'+hidebox).css('display', 'none');
	    $('#'+emptybox).html('');
	}

	function getCalendar(url){
		$.ajax({
		    url:  base_url + "calendar/getCalendar",
		   	type: "POST",
		   	data:  { url:url },		   		
		   	success: function(data) {
		   		$(".calendarBox").html(data);
		    }          
		});
	}

	function getBusinessCalendar(url){
		$.ajax({
		    url:  base_url + "calendar/getBusinessCalendar",
		   	type: "POST",
		   	data:  { url:url },		   		
		   	success: function(data) {
		   		$(".calendarBox").html(data);
		    }          
		});
	}

	function refreshBusinessCCPaymentInfo(){
		$.ajax({
		        url: base_url + "dashboard/refreshBusinessCCPaymentInfo",
		   		type: "POST",		   		
		   		success: function(data) {
		   			$("#ccPaymentInfoBox").html(data);
		      	}          
		});	
	}

	function refreshBusinessPaypalPaymentInfo(){
		$.ajax({
		        url: base_url + "dashboard/refreshBusinessPaypalPaymentInfo",
		   		type: "POST",		   		
		   		success: function(data) {
		   			$("#paypalPaymentInfoBox").html(data);
		      	}          
		});		
	}

	function refreshBusinessAddressInfo(){
		$.ajax({
		        url: base_url + "services/refreshBusinessAddressInfo",
		   		type: "POST",		   		
		   		success: function(data) {
		   			$("#addressInfoBox").html(data);
		      	}          
		});		
	}

	function createFormData(image) {
	 	var formImage = new FormData();
	 	formImage.append('profile_img', image[0]);
	 	uploadFormData(formImage);
	}

	function uploadFormData(formData) {
	 	$(".profile-pic").attr('src', 'http://arrowsite.woddev.com/assets/images/loading.gif');
	 	$.ajax({
			 url: base_url + "user/getImagepath",
			 type: "POST",
			 data: formData,
			 contentType:false,
			 cache: false,
			 processData: false,
			 success: function(data){
			  	$("#uploaded_profile_img").val(data);			  	
			  	$(".profile-pic").attr('src', data);
			 }
		});
	}

	function PreviewImage(image) {
        var src = 'url: ';
        var oFReader = new FileReader();        
        oFReader.onload = function (oFREvent) {
            src += oFREvent.target.result;
        };
        oFReader.readAsDataURL(image);
        return src;
    };

$(document).ready(function() {	
	//$(function() {			
		$('.services-title').click(function(){
			$('.services-content').slideUp('fast');			
			if($(this).attr('id') == "coaching-title"){				
				$('#coaching-description').slideDown('slow');
			} else if($(this).attr('id') == "rehab-and-recovery-title"){
				$('#rehab-and-recovery-description').slideDown('slow');
			} else if($(this).attr('id') == "strength-training-title"){
				$('#strength-training-description').slideDown('slow');
			} else if($(this).attr('id') == "nutrition-title"){
				$('#nutrition-description').slideDown('slow');
			} else if($(this).attr('id') == "races-and-events-title"){
				$('#races-and-events-description').slideDown('slow');
			} else if($(this).attr('id') == "run-clubs-title"){
				$('#run-clubs-description').slideDown('slow');
			}
		});

		$('.tab-btn').click(function(){
			var tabs = ['tab-one', 'tab-two', 'tab-three', 'tab-four', 'tab-five', 'tab-six', 'tab-seven', 'tab-eight', 'tab-nine', 'tab-ten'];
			for(var i = 0; i < 10; i++){
				if($(this).hasClass(tabs[i])){
					$(this).parent().parent().parent().find('.tab-body').slideUp('fast');
					$(this).parent().parent().parent().find('.'+tabs[i]+'-body').slideDown('slow');
					$(this).parent().parent().parent().find('.tab-btn').parent().removeClass('active');		
					$(this).parent().parent().parent().find('.'+tabs[i]).parent().addClass('active');
				}
			}

		});

		$('#login-btn').click(function(){
			$('.register-panel-body').slideUp('fast');	
			$('.login-panel-body').slideDown('slow');
			$('#register-btn').parent().removeClass('active');		
			$('#login-btn').parent().addClass('active');		
			
		});

		$('#register-btn').click(function(){
			$('.login-panel-body').slideUp('fast');	
			$('.register-panel-body').slideDown('slow');		
			$('#register-btn').parent().addClass('active');		
			$('#login-btn').parent().removeClass('active');		
		});

		$("#updateUserBio").on('submit',(function(e) {
		  e.preventDefault();		  
		  $("#bioLoader").css('display','block');
		  $.ajax({
		        url: base_url + "user/updateUserBio",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#biomsg").fadeOut();
		    		$("#biomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#bioLoader").css('display','none');		   			
				    if(data == 'success') {
				    	refreshBioInfo();
				     	$("#biomsg").addClass('alert-success');
				     	$("#biomsg").html("Bio Updated Successfully!").fadeIn();				     	
				    } else if(data == 'error') {
				     	$("#biomsg").addClass('alert-danger');
				     	$("#biomsg").html("Bio Updation Fail!").fadeIn();				     	
				    } else {
					    $("#biomsg").addClass('alert-success');
					    $("#biomsg").html("Record Updated Successfully!").fadeIn();	
					    $(".profile-section").html('<img src="'+base_url+'assets/uploads/profile-images/'+data+'" width="180" class="img-responsive profile-pic"/>');
					    $("#profile_img").val('');
		    		}		    		
		    		$("#biomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#biomsg").html(e).fadeIn();
		      	}          
		    });
		}));

		$("#cc_number").on('keyup',(function(e) {
			var KeyID = e.keyCode;
			if(KeyID != 8){
				var ccnumber = $("#cc_number").val();
				var count = ccnumber.length;
				if(count == 4){
					$("#cc_number").val(ccnumber+' ');
				} else if(count == 9){
					$("#cc_number").val(ccnumber+' ');	
				} else if(count == 14){
					$("#cc_number").val(ccnumber+' ');	
				}
			}
		}));


		$("#updateCCInfo").on('submit',(function(e) {
		  e.preventDefault();
		  $("#ccinfoLoader").css('display','block');
		  $.ajax({
		        url: base_url + "user/updateCCInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#ccinfomsg").fadeOut();
		    		$("#ccinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#ccinfoLoader").css('display','none');
				    refreshCCPaymentInfo();
				    if(data == 'success') {
				     	$("#ccinfomsg").addClass('alert-success');
				     	$("#ccinfomsg").html("Payment Information Updated Successfully!").fadeIn();				     	
				    } else {
				     	$("#ccinfomsg").addClass('alert-danger');
				     	$("#ccinfomsg").html("Payment Information Updation Fail!").fadeIn();				     	
				    }		    		
		    		$("#ccinfomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#ccinfomsg").html(e).fadeIn();
		      	}          
		    });
		}));


		$("#updatePaypalInfo").on('submit',(function(e) {
		  e.preventDefault();
		  $("#paypalinfoLoader").css('display','block');
		  $.ajax({
		        url: base_url + "user/updatePaypalInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#paypalinfomsg").fadeOut();
		    		$("#paypalinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			refreshPaypalPaymentInfo();
		   			$("#paypalinfoLoader").css('display','none');
				    if(data == 'success') {
				     	$("#paypalinfomsg").addClass('alert-success');
				     	$("#paypalinfomsg").html("Paypal Information Updated Successfully!").fadeIn();				     	
				    } else {
				     	$("#paypalinfomsg").addClass('alert-danger');
				     	$("#paypalinfomsg").html("Paypal Information Updation Fail!").fadeIn();				     	
				    }		    		
		    		$("#paypalinfomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#paypalinfomsg").html(e).fadeIn();
		      	}          
		    });
		}));

		$("#updateAboutInfo").on('submit',(function(e) {
		  e.preventDefault();
		  $("#aboutLoader").css('display','block');
		  $.ajax({
		        url: base_url + "user/updateAboutInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#aboutmsg").fadeOut();
		    		$("#aboutmsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#aboutLoader").css('display','none');	
				    if(data == 'success') {
				    	refreshAboutInfo();
				     	$("#aboutmsg").addClass('alert-success');
				     	$("#aboutmsg").html("About Info Updated Successfully!").fadeIn();				     	
				    } else {
				     	$("#aboutmsg").addClass('alert-danger');
				     	$("#aboutmsg").html("About Info Updation Fail!").fadeIn();				     	
				    } 		    		
		    		$("#aboutmsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#aboutmsg").html(e).fadeIn();
		      	}          
		    });
		}));

		$("#updateInsuranceInfo").on('submit',(function(e) {
		  e.preventDefault();
		  $("#insuranceinfoLoader").css('display','block');
		  $.ajax({
		        url: base_url + "user/updateInsuranceInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#insuranceinfomsg").fadeOut();
		    		$("#insuranceinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#insuranceinfoLoader").css('display','none');		   			
				    if(data == 'success') {
				    	refreshInsuranceInfo();
				     	$("#insuranceinfomsg").addClass('alert-success');
				     	$("#insuranceinfomsg").html("Insurance Info Updated Successfully!").fadeIn();				     	
				    } else if(data == 'error') {
				     	$("#insuranceinfomsg").addClass('alert-danger');
				     	$("#insuranceinfomsg").html("Insurance Info Updation Fail!").fadeIn();				     	
				    } else {
					    $("#insuranceinfomsg").addClass('alert-success');
					    $("#insuranceinfomsg").html("Insurance Info Updated Successfully!").fadeIn();	
		    		}		    		
		    		$("#insuranceinfomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#insuranceinfomsg").html(e).fadeIn();
		      	}          
		    });
		}));


		$("#updateServiceInfo").on('submit',(function(e) {
		  e.preventDefault();
		  $("#serviceInfo_ajaxLoader").css('display','block');
		  $.ajax({
		        url: base_url + "services/updateServiceInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#serviceinfomsg").fadeOut();
		    		$("#serviceinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#serviceInfo_ajaxLoader").css('display','none');	
		   			//alert(data);	   			
				    if(data == 'success') {
				    	refreshServicesInfo();
				    	if($("#service-pricing-id").val() !== null){
				    		refreshPackagesInfo();
				    	}
				    	if($("#service-category-id").val() !== null){
				    		refreshCategoriesInfo();
				    	}
				     	$("#serviceinfomsg").addClass('alert-success');
				     	$("#serviceinfomsg").html("Service Added Successfully!").fadeIn();				     	
				     	$(".resetBtn").click();
				    } else if(data == 'error') {
				     	$("#serviceinfomsg").addClass('alert-danger');
				     	$("#serviceinfomsg").html("Service Adding Fail!").fadeIn();				     	
				    }		    		
		    		$("#serviceinfomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#serviceinfomsg").html(e).fadeIn();
		      	}          
		    });
		}));


		$('.editService').click(function(){
		    	var id = $(this).attr('id');
		    	$("#ajaxLoader").css('display','block');
		   		$.ajax({
					url: "services/getservice",
					type: "POST",
					data:  {serviceid: id},
					beforeSend : function() {
					    $("#serviceEditBox").css('display','none');
					},
					success: function(data) {
					   	//$("#serviceEditBox").css('display','block');
					   	$("#ajaxLoader").css('display','none');		   				
					   	//alert(data);	   			
						if(data != '') {
							$("#serviceinfoEditBtn").click();
							$("#serviceinfo-edit").css('display','none');
							$("#serviceinfo-update").css('display','block');
							$("#serviceinfo-update").html(data);
							
						}						
					},
					error: function(e) {
						//$("#serviceEditBox").css('display','block');	
					    $("#serviceinfo-update").html("<h1>Error getting data!</h1>");
					}          
				}); 	
		});

		$(document).on("submit", "#saveEditServiceForm" , function(e) {
		  e.preventDefault();
		  $("#ajaxLoader").css('display','block');
		  var service_id = $("#saveEditServiceForm #service_id").val();
		  var service_title = $("#saveEditServiceForm #service-title").val();
		  var service_description = $("#saveEditServiceForm #service-description").val();
		  $.ajax({
		        url: base_url + "services/updateServiceInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#updateserviceinfomsg").fadeOut();
		    		$("#updateserviceinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#ajaxLoader").css('display','none');	
		   			//alert(data);	   			
		   			refreshServicesInfo();
				    if(data == 'success') {				    	
				     	$("#updateserviceinfomsg").addClass('alert-success');
				     	$("#updateserviceinfomsg").html("Service Updated Successfully!").fadeIn();				     					     	
				     	var interval = setTimeout(function(){
				     		$("#serviceinfoEditBtn").click();
				     		clearInterval(interval);
				     	}, 2000);
				     	$("html, body").animate({ scrollTop: 0 }, "slow");
				    } else  {
				     	$("#updateserviceinfomsg").addClass('alert-danger');
				     	$("#updateserviceinfomsg").html("Service Updation Fail!").fadeIn();				     	
				    }		    		
		    		$("#updateserviceinfomsg").delay(1000).fadeOut(400);
		      	},
		     	error: function(e) {
		    		$("#updateserviceinfomsg").html(e).fadeIn();
		      	}          
		    });
		});


		$('#deleteServiceModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient = button.data('serviceid') // Extract info from data-* attributes
			var modal = $(this)
			modal.find('.modal-footer #deleteServiceID').val(recipient)
		});

		$("#deleteServiceBtn").click(function(){
				var serviceid = $("#deleteServiceID").val();
				//alert(userid);
				$("#ajaxLoader").css('display','block');
		   		$.ajax({
					url: "services/deleteservice",
					type: "POST",
					data:  {serviceid: serviceid},
					beforeSend : function() {
					    //$('#deleteLeadModal').hide();
					},
					success: function(data) {
					   	$("#ajaxLoader").css('display','none');		   				
					   	//alert(data);	   			
						if(data == 'success') {
							$('#deleteServiceModal').find('.modal-footer').css('display', 'none');
							$('#deleteServiceModal').find('.modal-body').html('<b style="color:red;">Record Deleted Successfully!</b>');
							window.setTimeout(function(){window.location.reload()}, 4000);
						} else{
							alert("Error deleting data!");
						}						
					},
					error: function(e) {
					    alert("<h1>Error deleting data!</h1>");
					}          
				}); 
		});


		$("#updatePackageInfo").on('submit',(function(e) {
		  e.preventDefault();
		  $("#packageInfo_ajaxLoader").css('display','block');
		  $.ajax({
		        url: base_url + "services/updatePackageInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#packageinfomsg").fadeOut();
		    		$("#packageinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#packageInfo_ajaxLoader").css('display','none');	
		   			//alert(data);	   			
				    if(data == 'success') {
				    	refreshPackagesInfo();
				     	$("#packageinfomsg").addClass('alert-success');
				     	$("#packageinfomsg").html("Package Added Successfully!").fadeIn();				     	
				     	$("#updatePackageInfo").trigger("reset");
				     	$("#package-title").focus();
				    } else if(data == 'error') {
				     	$("#packageinfomsg").addClass('alert-danger');
				     	$("#packageinfomsg").html("Package Adding Fail!").fadeIn();				     	
				    }		    		
		    		$("#packageinfomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#packageinfomsg").html(e).fadeIn();
		      	}          
		    });
		}));

		$('.editPackage').click(function(){
		    	var id = $(this).attr('id');
		    	$("#packageInfo_ajaxLoader").css('display','block');
		   		$.ajax({
					url: "services/getpackage",
					type: "POST",
					data:  {packageid: id},
					beforeSend : function() {
					    $("#packageEditBox").css('display','none');
					},
					success: function(data) {
					   	$("#packageEditBox").css('display','block');
					   	$("#packageInfo_ajaxLoader").css('display','none');		   				
					   	//alert(data);	   			
						if(data != '') {
							$("#saveEditPackageForm").html(data);
						}						
					},
					error: function(e) {
						$("#packageEditBox").css('display','block');	
					    $("#saveEditPackageForm").html("<h1>Error getting data!</h1>");
					}          
				}); 	
		});

		$("#saveEditPackageForm").on('submit',(function(e) {
		  e.preventDefault();
		  $("#ajaxLoader").css('display','block');
		  var package_id = $('#saveEditPackageForm #package_id').val();
		  var package_title = $('#saveEditPackageForm #package-title').val();
		  var package_cost = $('#saveEditPackageForm #package-cost').val();
		  $.ajax({
		        url: base_url + "services/updatePackageInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#updatepackageinfomsg").fadeOut();
		    		$("#updatepackageinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#ajaxLoader").css('display','none');	
		   			//alert(data);	   			
				    if(data == 'success') {
				    	$("#package_"+package_id).find('.package_title_div label').html(package_title);
				    	$("#package_"+package_id).find('.package_cost_div label').html(package_cost);
				     	$("#updatepackageinfomsg").addClass('alert-success');
				     	$("#updatepackageinfomsg").html("Package Updated Successfully!").fadeIn();				     	
				     	$("#packageEditBox").delay(1000).fadeOut(600);
				    } else if(data == 'error') {
				     	$("#updatepackageinfomsg").addClass('alert-danger');
				     	$("#updatepackageinfomsg").html("Package Updation Fail!").fadeIn();				     	
				    }		    		
		    		$("#updatepackageinfomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#updatepackageinfomsg").html(e).fadeIn();
		      	}          
		    });
		}));

		$('#deletePackageModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient = button.data('packageid') // Extract info from data-* attributes
			var modal = $(this)
			modal.find('.modal-footer #deletePackageID').val(recipient)
		});

		$("#deletePackageBtn").click(function(){
				var packageid = $("#deletePackageID").val();
				//alert(userid);
				$(".loader").css('display','block');
		   		$.ajax({
					url: "services/deletepackage",
					type: "POST",
					data:  {packageid: packageid},
					beforeSend : function() {
					    //$('#deleteLeadModal').hide();
					},
					success: function(data) {
					   	$(".loader").css('display','none');		   				
					   	//alert(data);	   			
						if(data == 'success') {
							$('#deletePackageModal').find('.modal-footer').css('display', 'none');
							$('#deletePackageModal').find('.modal-body').html('<b style="color:red;">Record Deleted Successfully!</b>');
							window.setTimeout(function(){window.location.reload()}, 4000);
						} else{
							alert("Error deleting data!");
						}						
					},
					error: function(e) {
					    alert("<h1>Error deleting data!</h1>");
					}          
				}); 
		});

		$("#updateCategoryInfo").on('submit',(function(e) {
		  e.preventDefault();
		  $("#categoryInfo_ajaxLoader").css('display','block');
		  $.ajax({
		        url: base_url + "services/updateCategoryInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#categoryinfomsg").fadeOut();
		    		$("#categoryinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#categoryInfo_ajaxLoader").css('display','none');	
		   			alert(data);	   			
				    if(data == 'success') {
				    	refreshCategoriesInfo();
				     	$("#categoryinfomsg").addClass('alert-success');
				     	$("#categoryinfomsg").html("Category Added Successfully!").fadeIn();				     	
				    } else if(data == 'error') {
				     	$("#categoryinfomsg").addClass('alert-danger');
				     	$("#categoryinfomsg").html("Category Adding Fail!").fadeIn();				     	
				    }		    		
		    		$("#categoryinfomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#categoryinfomsg").html(e).fadeIn();
		      	}          
		    });
		}));

		$('.editCategory').click(function(){
		    	var id = $(this).attr('id');
		    	$("#categoryInfo_ajaxLoader").css('display','block');
		   		$.ajax({
					url: "services/getcategory",
					type: "POST",
					data:  {categoryid: id},
					beforeSend : function() {
					    $("#categoryEditBox").css('display','none');
					},
					success: function(data) {
					   	$("#categoryEditBox").css('display','block');
					   	$("#categoryInfo_ajaxLoader").css('display','none');		   				
					   	//alert(data);	   			
						if(data != '') {
							$("#saveEditCategoryForm").html(data);
						}						
					},
					error: function(e) {
						$("#categoryEditBox").css('display','block');	
					    $("#saveEditCategoryForm").html("<h1>Error getting data!</h1>");
					}          
				}); 	
		});


		$("#saveEditCategoryForm").on('submit',(function(e) {
		  e.preventDefault();
		  $("#ajaxLoader").css('display','block');
		  var category_id = $('#saveEditCategoryForm #category_id').val();
		  var category_title = $('#saveEditCategoryForm #category-title').val();
		  var checked = false;
		  if($('#saveEditCategoryForm #category-active').is(':checked')){
		  	checked = true;
		  } else {
		  	checked = false;
		  }
		  $.ajax({
		        url: base_url + "services/updateCategoryInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#updatecategoryinfomsg").fadeOut();
		    		$("#updatecategoryinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#ajaxLoader").css('display','none');	
		   			//alert(data);	   			
				    if(data == 'success') {
				    	$("#category_"+category_id).find('.category_title_div label').html(category_title);
				    	if(checked == true){
				    		$("#category_"+category_id).find('.category_checkbox_div #category-active').prop('checked', true);
				    	} else {
				    		$("#category_"+category_id).find('.category_checkbox_div #category-active').removeAttr('checked');
				    	}
				     	$("#updatecategoryinfomsg").addClass('alert-success');
				     	$("#updatecategoryinfomsg").html("Category Updated Successfully!").fadeIn();				     	
				     	$("#categoryEditBox").delay(1000).fadeOut(600);
				    } else if(data == 'error') {
				     	$("#updatecategoryinfomsg").addClass('alert-danger');
				     	$("#updatecategoryinfomsg").html("Category Updation Fail!").fadeIn();				     	
				    }		    		
		    		$("#updatecategoryinfomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#updatecategoryinfomsg").html(e).fadeIn();
		      	}          
		    });
		}));

		$('#deleteCategoryModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient = button.data('categoryid') // Extract info from data-* attributes
			var modal = $(this)
			modal.find('.modal-footer #deleteCategoryID').val(recipient)
		});

		$("#deleteCategoryBtn").click(function(){
				var categoryid = $("#deleteCategoryID").val();
				$(".loader").css('display','block');
		   		$.ajax({
					url: "services/deletecategory",
					type: "POST",
					data:  {categoryid: categoryid},
					beforeSend : function() {
					    //$('#deleteLeadModal').hide();
					},
					success: function(data) {
					   	$(".loader").css('display','none');		   				
					   	//alert(data);	   			
						if(data == 'success') {
							$('#deleteCategoryModal').find('.modal-footer').css('display', 'none');
							$('#deleteCategoryModal').find('.modal-body').html('<b style="color:red;">Record Deleted Successfully!</b>');
							window.setTimeout(function(){window.location.reload()}, 4000);
						} else{
							alert("Error deleting data!");
						}						
					},
					error: function(e) {
					    alert("<h1>Error deleting data!</h1>");
					}          
				}); 
		});

		$(document).on("click", ".calendarBox .calendar_previous_url" , function(e) {
			e.preventDefault();			
			var url = $(this).find('a').attr('href');
			getCalendar(url);
			
		});

		$(document).on("click", ".calendarBox .calendar_next_url" , function(e) {
			e.preventDefault();			
			var url = $(this).find('a').attr('href');
			getCalendar(url);
		});

		$(document).on("click", ".calendarBox .business_calendar_previous_url" , function(e) {
			e.preventDefault();			
			var url = $(this).find('a').attr('href');
			getBusinessCalendar(url);
			
		});

		$(document).on("click", ".calendarBox .business_calendar_next_url" , function(e) {
			e.preventDefault();			
			var url = $(this).find('a').attr('href');
			getBusinessCalendar(url);
		});

		$("#updateEventInfo").on('submit',(function(e) {
		  e.preventDefault();
		  $("#eventInfo_ajaxLoader").css('display','block');
		  $.ajax({
		        url: base_url + "events/updateEventInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#eventinfomsg").fadeOut();
		    		$("#eventinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#eventInfo_ajaxLoader").css('display','none');	
		   			//alert(data);	   			
				    if(data == 'success') {
				    	refreshEventInfo();
				     	$("#eventinfomsg").addClass('alert-success');
				     	$("#eventinfomsg").html("Event Updated Successfully!").fadeIn();				     	
				    } else {
				     	$("#eventinfomsg").addClass('alert-danger');
				     	$("#eventinfomsg").html("Event Updation Fail!").fadeIn();				     	
				    }		    		
		    		$("#eventinfomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#eventinfomsg").html(e).fadeIn();
		      	}          
		    });
		}));

		$(document).on("click", "#eventmedia-edit .eventMediaEdit" , function(e) {
			e.preventDefault();			
			var img_id = $(this).attr('id');
			var id = img_id.replace("edit_", "");
			$("#media_id").val(id);
			$("#update_event_media").click();
		});

		$("#update_event_media").change(function(){
			$("#updateEventMediaForm").attr('style', 'display:block;');
		});


		$("#updateEventMedia").on('submit',(function(e) {
		  e.preventDefault();
		  $("#eventmediaLoader").css('display','block');
		  var img_id = $("#media_id").val();
		  $.ajax({
		        url: base_url + "events/updateEventMedia",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#eventmediamsg").fadeOut();
		    		$("#eventmediamsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#eventmediaLoader").css('display','none');	
		   			//alert(data);	   			
				    if(data != 'error') {
				    	refreshEventMediaInfo();
				    	$("#img_"+img_id).attr('src', base_url + 'assets/uploads/events-images/' + data);
				     	$("#eventmediamsg").addClass('alert-success');
				     	$("#eventmediamsg").html("Image Updated Successfully!").fadeIn();				     	
				    } else {
				     	$("#eventmediamsg").addClass('alert-danger');
				     	$("#eventmediamsg").html("Image Updation Fail!").fadeIn();				     	
				    }		    		
		    		$("#eventmediamsg").delay(5000).fadeOut(800);
		    		$("#updateEventMediaForm").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#eventmediamsg").html(e).fadeIn();
		      	}          
		    });
		}));

		$("#updateEventPricing").on('submit',(function(e) {
		  e.preventDefault();
		  $("#eventPricing_ajaxLoader").css('display','block');
		  $.ajax({
		        url: base_url + "events/updateEventPricing",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#eventpricingmsg").fadeOut();
		    		$("#eventpricingmsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#eventPricing_ajaxLoader").css('display','none');	
		   			//alert(data);	   			
				    if(data == 'success') {
				    	refreshEventPricing();
				     	$("#eventpricingmsg").addClass('alert-success');
				     	$("#eventpricingmsg").html("Fees Updated Successfully!").fadeIn();				     	
				    } else {
				     	$("#eventpricingmsg").addClass('alert-danger');
				     	$("#eventpricingmsg").html("Fees Updation Fail!").fadeIn();				     	
				    }		    		
		    		$("#eventpricingmsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#eventpricingmsg").html(e).fadeIn();
		      	}          
		    });
		}));

		$(".ratingBtn").click(function(){
			var rating = $(this).attr('id');
			var rating_id = rating.replace("rating_", "");
			$(".ratingBtn").removeClass('checked');
			for(var i = 1; i <= rating_id; i++){
				$("#rating_"+i).addClass('checked');
			}			
			$("#service_star_rating").val(rating_id);
		});

		$("#saveServiceReviewForm").on('submit',(function(e) {
		  e.preventDefault();
		  var service_review = $('#service-review').val();
		  if(service_review != ''){
			  $("#servicereview_ajaxLoader").css('display','block');
			  $.ajax({
			        url: base_url + "user_services/saveServiceReviewForm",
			   		type: "POST",
			   		data:  new FormData(this),
			   		contentType: false,
			        cache: false,
			   		processData:false,
			   		beforeSend : function() {
			    		$("#servicereviewmsg").fadeOut();
			    		$("#servicereviewmsg").attr('class', 'alert');
			   		},
			   		success: function(data) {
			   			$("#servicereview_ajaxLoader").css('display','none');	
			   			//alert(data);	   			
					    if(data == 'success') {
					     	$("#servicereviewmsg").addClass('alert-success');
					     	$("#servicereviewmsg").html("Review Submitted Successfully!").fadeIn();				     	
					    } else {
					     	$("#servicereviewmsg").addClass('alert-danger');
					     	$("#servicereviewmsg").html("Someting went wrong!").fadeIn();				     	
					    }		    		
			    		$("#servicereviewmsg").delay(5000).fadeOut(800);
			      	},
			     	error: function(e) {
			    		$("#servicereviewmsg").html(e).fadeIn();
			      	}          
			    });
			} else {
				$("#servicereviewmsg").addClass('alert-danger');
				$("#servicereviewmsg").html("Review should not empty!").fadeIn();				     	
			}
		}));

		$("#bookservicebtn").click(function(){
			if($("#user_loggedin").val() == "false"){
				alert('test');
			}
		});

		$("#saveServiceBookingForm").on('submit',(function(e) {
		  e.preventDefault();
		  if($("#user_loggedin").val() == "true"){
			  var service_booking_date = $('#service-booking-date').val();
			  if(service_booking_date != ''){
				  $("#servicebooking_ajaxLoader").css('display','block');
				  $.ajax({
				        url: base_url + "user_services/saveServiceBookingForm",
				   		type: "POST",
				   		data:  new FormData(this),
				   		contentType: false,
				        cache: false,
				   		processData:false,
				   		beforeSend : function() {
				    		$("#servicebookingmsg").fadeOut();
				    		$("#servicebookingmsg").attr('class', 'alert');
				   		},
				   		success: function(data) {
				   			$("#servicebooking_ajaxLoader").css('display','none');	
				   			//alert(data);	   			
						    if(data == 'success') {
						     	$("#servicebookingmsg").addClass('alert-success');
						     	$("#servicebookingmsg").html("Booking Submitted Successfully!").fadeIn();				     	
						    } else {
						     	$("#servicebookingmsg").addClass('alert-danger');
						     	$("#servicebookingmsg").html("Someting went wrong!").fadeIn();				     	
						    }		    		
				    		$("#servicebookingmsg").delay(5000).fadeOut(800);
				      	},
				     	error: function(e) {
				    		$("#servicebookingmsg").html(e).fadeIn();
				      	}          
				    });
				} else {
					$("#servicebookingmsg").addClass('alert-danger');
					$("#servicebookingmsg").html("Booking date not empty!").fadeIn();				     	
				}
			}
		}));

		$("#businessUpdateCCInfo").on('submit',(function(e) {
		  e.preventDefault();
		  $("#ccinfoLoader").css('display','block');
		  $.ajax({
		        url: base_url + "dashboard/businessUpdateCCInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#ccinfomsg").fadeOut();
		    		$("#ccinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			$("#ccinfoLoader").css('display','none');
				    refreshBusinessCCPaymentInfo();
				    if(data == 'success') {
				     	$("#ccinfomsg").addClass('alert-success');
				     	$("#ccinfomsg").html("Payment Information Updated Successfully!").fadeIn();				     	
				    } else {
				     	$("#ccinfomsg").addClass('alert-danger');
				     	$("#ccinfomsg").html("Payment Information Updation Fail!").fadeIn();				     	
				    }		    		
		    		$("#ccinfomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#ccinfomsg").html(e).fadeIn();
		      	}          
		    });
		}));


		$("#businessUpdatePaypalInfo").on('submit',(function(e) {
		  e.preventDefault();
		  $("#paypalinfoLoader").css('display','block');
		  $.ajax({
		        url: base_url + "dashboard/businessUpdatePaypalInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#paypalinfomsg").fadeOut();
		    		$("#paypalinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			refreshBusinessPaypalPaymentInfo();
		   			$("#paypalinfoLoader").css('display','none');
		   			//alert(data);
				    if(data == 'success') {
				     	$("#paypalinfomsg").addClass('alert-success');
				     	$("#paypalinfomsg").html("Paypal Information Updated Successfully!").fadeIn();				     	
				    } else {
				     	$("#paypalinfomsg").addClass('alert-danger');
				     	$("#paypalinfomsg").html("Paypal Information Updation Fail!").fadeIn();				     	
				    }		    		
		    		$("#paypalinfomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#paypalinfomsg").html(e).fadeIn();
		      	}          
		    });
		}));

		$("#updateBusinessAddressInfo").on('submit',(function(e) {
		  e.preventDefault();
		  $("#businessAddressInfo_ajaxLoader").css('display','block');
		  $.ajax({
		        url: base_url + "services/updateBusinessAddressInfo",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		        cache: false,
		   		processData:false,
		   		beforeSend : function() {
		    		$("#busniessAddressinfomsg").fadeOut();
		    		$("#busniessAddressinfomsg").attr('class', 'alert');
		   		},
		   		success: function(data) {
		   			refreshBusinessAddressInfo();
		   			$("#businessAddressInfo_ajaxLoader").css('display','none');
		   			//alert(data);
				    if(data == 'success') {
				     	$("#busniessAddressinfomsg").addClass('alert-success');
				     	$("#busniessAddressinfomsg").html("Address Information Updated Successfully!").fadeIn();				     	
				    } else {
				     	$("#busniessAddressinfomsg").addClass('alert-danger');
				     	$("#busniessAddressinfomsg").html("Address Information Updation Fail!").fadeIn();				     	
				    }		    		
		    		$("#busniessAddressinfomsg").delay(5000).fadeOut(800);
		      	},
		     	error: function(e) {
		    		$("#busniessAddressinfomsg").html(e).fadeIn();
		      	}          
		    });
		}));

		$("#drop-area").on('dragenter', function (e){
		  e.preventDefault();
		  $(this).css('background', '#BBD5B8');
		});

		$("#drop-area").on('dragover', function (e){
		  e.preventDefault();
		});

		$("#drop-area").on('drop', function (e){
		  $(this).css('background', 'none');
		  e.preventDefault();
		  var image = e.originalEvent.dataTransfer.files;
		  createFormData(image);
		});

		$("#profile_img").change(function(){
			createFormData(this.files);
		});

		$(".search-field").on('keyup', function (e){
			if (e.keyCode === 13) {
		    event.preventDefault();
		    $("#srarchForm").submit();
		  }
		});

});