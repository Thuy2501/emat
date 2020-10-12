function sys_ShowError(noti,type=1,time=0,list=[]){ //console.log('222')
  if(noti!=''){
    if(type==1){
      var show_error = noti.split('-');
      if(time- parseInt(show_error[1])<5){
        $.notify(list[show_error[0].charAt(1)],{
          className:"error",
          position:"top center"
        });
      }
    }else{
      $.notify(noti,{
          className:"error",
          position:"right middle"
        });
    }
  }
 }

 function sys_ShowError2(noti,name='success',position='top center',element=''){
  if(element==''){
    $.notify(noti,{
          className:name,
          position:position
        });
  }else{
    $('.'+element).notify(noti,{
          className:name,
          position:position
        });
  }
 }

function sys_preLoadSubmit() {
      var div = document.createElement('div');
      //var img = document.createElement('img');
      //img.src = base_url+"/public/images/sys/spin2.gif";
      div.setAttribute("id", "vv-main-preload");
      div.innerHTML = "<div class=\"lds-spinner\"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div><br/>Loading ...<br />";
      div.style.cssText = 'position: fixed; top: 0;left:0; z-index: 99999; width: 100%;height:100%; text-align: center; background: #000;opacity: 0.5;padding-top:10%;color:red;';
      //div.appendChild(img);
      document.body.appendChild(div);
      return true;
      // These 2 lines cancel form submission, so only use if needed.
      //window.event.cancelBubble = true;
      //e.stopPropagation();
  }

function sys_preLoadDestroy() {
      $('#vv-main-preload').remove();
      return false;
  }    
