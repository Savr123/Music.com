Array.from(document.getElementsByClassName('spec-btn-focus')).forEach(function(element){
    element.onfocus=element.onmouseover=function(){
      this.classList.add('btn-dark');
    }
    element.onblur=element.onmouseout=function(){
      this.classList.remove('btn-dark');
    }
})
