function itemRemoveReload(i,a){
	if(confirm("Bạn muốn xóa bản ghi này ?")){ console.log(a);
		sys_preLoadSubmit();
		$.ajax({
	        url:a,
	        method:'get',
	        data: {icode:i},
	        dataType:'json',
	        success:function(data){ console.log(data);
	          sys_preLoadDestroy();
	          alert(data.error)
	          location.reload();
	        }
	    });
	}
}

function itemRemoveDir(i,a,u){
	if(confirm("Bạn muốn xóa bản ghi này ?")){ console.log(a);
		sys_preLoadSubmit();
		$.ajax({
	        url:a,
	        method:'get',
	        data: {icode:i},
	        dataType:'json',
	        success:function(data){ console.log(data);
	          sys_preLoadDestroy();
	          alert(data.error);
		      if(typeof data =='object' && data.code==200){
		          location.href = u;
		      }else{
		      	location.reload();
		      }
	        }
	    });
	}
}

function itemSubmitForm(id,url1,url2=null){
	$.ajax({
	        url:url1,
	        method:'post',
	        data: $('#'+id).serialize() ,
	        dataType:'json',
	        success:function(data){ console.log(data);
	          sys_preLoadDestroy();
	          //alert(data.error)
	          //location.reload();
	          if(typeof data=='object' && data.code=='200'){
	          	alert('Success');
	          	if(url2!=null){
	          		location.href = url2;
	          	}else{
	          		$('#'+id).trigger("reset");
	          	}
	          }else{
	          	alert('Error');
	          	location.reload();
	          }
	        }
	    });
}

function itemSubmitForm1(id,url1,){
	$.ajax({
	        url:url1,
	        method:'post',
	        data: $('#'+id).serialize() ,
	        dataType:'json',
	        success:function(data){ console.log(data);
	          sys_preLoadDestroy();
	          $('#'+id).trigger("reset");

	          $('.modal-contact-view').modal('toggle');
	          $('.modal-contact-confirm').modal();
	        }
	    });
}

function itemSubmitForm2(id,url1,){
	$.ajax({
	        url:url1,
	        method:'post',
	        data: $('#'+id).serialize() ,
	        dataType:'text',
	        success:function(data){ console.log(data);
	          sys_preLoadDestroy();
	          $('#'+id).trigger("reset");

	          $('.modal-contact-confirm').modal();
	        }
	    });
}