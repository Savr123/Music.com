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
    console.log(document.querySelector('audio').currentTime);
    console.log(document.querySelector('audio').paused);
    console.log(document.querySelector('audio').ended);
    // if(document.querySelector('audio').ended){
      // var src ='http://localhost/Music.com/audio/music/5ivesta%20Family%20-%20%D0%9F%D1%80%D0%BE%D1%81%D0%B8%D0%BF%D0%B0%D0%B9%D1%81%D1%8F%20%D0%B4%D1%80%D1%83%D0%B3,%20%D0%BF%D0%BE%D1%81%D0%BC%D0%BE%D1%82%D1%80%D0%B8%20%D0%B2%D0%BE%D0%BA%D1%80%D1%83%D0%B3....mp3';
      var src ='http://localhost/Music.com/audio/music/%d0%81%d0%bb%d0%ba%d0%b0%20-%20%d0%9c%d0%b8%d1%80%20%d0%be%d1%82%d0%ba%d1%80%d1%8b%d0%b2%d0%b0%d0%b5%d1%82%d1%81%d1%8f.mp3';
      // console.log(src);
      // $('#bjs').attr('src', src);
    // }

    // var src ='loaclhost/Music.com/audio/music/'+ $(this).data('src')+'.mp3';
    console.log(src);
    console.log(document.getElementById('bjs').src);
    if(document.getElementById('bjs').src!=src){
      $('#bjs').attr('src', src);
      console.log($('bjs'));
    }

    if(document.querySelector('audio').currentTime>0 && !document.querySelector('audio').paused && !document.querySelector('audio').ended){

      document.querySelector('audio').pause()
    }
    else {
      document.querySelector('audio').play();
    }
  }
});
