Array.from(document.getElementsByClassName('spec-btn-imgCtrl')).forEach(function(element){
  element.onfocus=element.onmouseover=function(){
    //code..
  }
  element.onblur=element.onmouseout=function(){
    //code..
  }
  element.onmouseup=function(){
    //code...
  }
  element.onclick = function(){
    console.log(this);
    // console.log(document.querySelector('audio').currentTime);
    // console.log(document.querySelector('audio').paused);
    // console.log(document.querySelector('audio').ended);

    // console.log(this.parentNode);

    var src =$(this).data('src');
    console.log(src);
    console.log('test');
    console.log(document.getElementById('bjs').src);
    var tempAudio=document.createElement('audio');
    tempAudio.id="hideAudio";
    document.getElementById('bjs').parentNode.appendChild(tempAudio);
    $('#hideAudio').attr('src', src);

    if(document.getElementById('bjs').src!=document.getElementById('hideAudio').src){
      $('#bjs').attr('src', src);
      console.log('src!=src');
    }
    document.getElementById('hideAudio').parentNode.removeChild(document.getElementById('hideAudio'));

    // if(document.querySelector('audio').ended)

    if(document.querySelector('audio').currentTime>0 && !document.querySelector('audio').paused && !document.querySelector('audio').ended){

      document.querySelector('audio').pause();
    }
    else {
      document.querySelector('audio').play();
    }
  }
});
