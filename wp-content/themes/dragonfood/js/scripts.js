window.onerror=function(desc,page,line,chr){
 console.log('JavaScript error occurred! \n'
  +'\nError description: \t'+desc
  +'\nPage address:      \t'+page
  +'\nLine number:       \t'+line
 );
}
jQuery(document).ready(function($){	
	$('a').focus(function(){this.blur();});
	SI.Files.stylizeAll(); 
	$('input.text-default').each(function(){  $(this).attr('default',$(this).val()); }).focus(function(){
	if($(this).val()==$(this).attr('default')) $(this).val('');
	}).blur(function(){ if($(this).val()=='') $(this).val($(this).attr('default')); });
	$('input.text,textarea.text').focus(function(){ $(this).addClass('textfocus'); }).blur(function(){$(this).removeClass('textfocus'); });
	var popopenobj=0,popopenaobj=null;
	$('a.popup').click(function(){ var pid=$(this).attr('rel').split('|')[0],_os=parseInt($(this).attr('rel').split('|')[1]); var pobj=$('#'+pid); if(!pobj.length) return false;
	if(typeof popopenobj=='object' && popopenobj.attr('id')!=pid){ popopenobj.hide(50); $(popopenaobj).parent().removeClass(popopenobj.attr('id').split('-')[1]+'-open'); popopenobj=null; }
	return false;	});
	$('p.images img').click(function(){ var newbg=$(this).attr('src').split('bg/bg')[1].split('-thumb')[0]; $(document.body).css('backgroundImage','url('+_siteRoot+'images/bg/bg'+newbg+'.jpg)'); $(this).parent().find('img').removeClass('on'); $(this).addClass('on');  return false; });
	$('div.sc-large div.img:has(div.tml)').each(function() {
	$('div.tml',this).hide(); $(this).append('<a href="#" class="tml_open">&nbsp;</a>').find('a').css({ left:parseInt($(this).offset().left)+864,top:parseInt($(this).offset().top)+1 }).click(function(){
	$(this).siblings('div.tml').slideToggle(); return false; }).focus(function(){this.blur();}); 
	});
	//fadeover
	$("img.a").hover( function() { $(this).stop().animate({"opacity": "0"}, "fast");	}, function() { $(this).stop().animate({"opacity": "1"}, "slow"); }); 	
});

// STYLING FILE INPUTS 1.0 | Shaun Inman <http://www.shauninman.com/> | 2007-09-07
if(!window.SI){var SI={};};
	SI.Files={ 
	htmlClass:'SI-FILES-STYLIZED', fileClass:'file',  wrapClass:'cabinet', fini:false, able:false, init:function(){  this.fini=true; }, 
	stylize:function(elem){
		if(!this.fini){this.init();}; if(!this.able){return;};  
		elem.parentNode.file=elem; elem.parentNode.onmousemove=function(e){
			if(typeof e=='undefined') e=window.event;
			if(typeof e.pageY=='undefined' &&  typeof e.clientX=='number' && document.documentElement){
			e.pageX=e.clientX+document.documentElement.scrollLeft; e.pageY=e.clientY+document.documentElement.scrollTop;
			}; var ox=oy=0; var elem=this;
			if(elem.offsetParent){ ox=elem.offsetLeft; oy=elem.offsetTop; while(elem=elem.offsetParent){	ox+=elem.offsetLeft; oy+=elem.offsetTop;  };   };
		};
	}, stylizeAll:function(){  if(!this.fini){this.init();};  if(!this.able){return;}; }
};
