/* EM Construcciones · Landing */
(function(){
  var WA=document.body.dataset.wa||'https://wa.me/523129432555';
  var reduce=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var $=function(s,c){return Array.prototype.slice.call((c||document).querySelectorAll(s))};
  var byId=function(i){return document.getElementById(i)};
  var hero=document.querySelector('.hero');
  byId('year').textContent=new Date().getFullYear();

  // Titular palabra por palabra
  var t=byId('title');
  if(t){var txt=t.textContent.trim();t.setAttribute('aria-label',txt);
    t.innerHTML=txt.split(/\s+/).map(function(w,i){return '<span class="w" aria-hidden="true"><span style="--i:'+i+'">'+w+'</span></span>'}).join(' ');}

  // Escalonado por grupos
  ['#services','#why','#steps','#faqList'].forEach(function(g){$(g+' .reveal').forEach(function(el,i){el.style.setProperty('--i',i)})});
  $('.points .reveal').forEach(function(el,i){el.style.setProperty('--i',i+1)});

  if(hero)requestAnimationFrame(function(){requestAnimationFrame(function(){hero.classList.add('ready')})});

  // Reveal al entrar en pantalla (una vez)
  var targets=$('.reveal');
  if(!('IntersectionObserver' in window)||reduce){targets.forEach(function(e){e.classList.add('in')})}
  else{
    var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.14,rootMargin:'0px 0px -40px 0px'});
    targets.forEach(function(e){io.observe(e)});
  }

  // Scroll
  var hdr=byId('hdr'),bar=byId('progress'),par=byId('parallax'),waf=byId('waf'),top=byId('toTop'),steps=byId('steps'),line=byId('stepLine'),ticking=false;
  function onScroll(){
    var y=window.scrollY,max=document.documentElement.scrollHeight-innerHeight;
    hdr.classList.toggle('scrolled',y>30);
    bar.style.transform='scaleX('+(max>0?Math.min(y/max,1):0)+')';
    waf.classList.toggle('show',y>500);
    top.classList.toggle('show',y>1100);
    if(par&&hero&&!reduce&&y<innerHeight&&hero.classList.contains('ready')) par.style.transform='scale(1.04) translateY('+(y*0.07).toFixed(1)+'px)';
    if(steps&&line){var r=steps.getBoundingClientRect(),p=(innerHeight*0.85-r.top)/(r.height+innerHeight*0.2);
    line.style.transform='scaleX('+Math.max(0,Math.min(1,p)).toFixed(3)+')';}
    ticking=false;
  }
  addEventListener('scroll',function(){if(!ticking){ticking=true;requestAnimationFrame(onScroll)}},{passive:true});
  onScroll();
  if(par)setTimeout(function(){par.style.transition='none'},1900);
  top.addEventListener('click',function(){window.scrollTo({top:0,behavior:reduce?'auto':'smooth'})});

  // Sección activa
  var links=$('#nav a');
  if('IntersectionObserver' in window){
    var so=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){links.forEach(function(a){a.classList.toggle('active',a.getAttribute('href')==='#'+e.target.id)})}})},{rootMargin:'-45% 0px -50% 0px'});
    $('main section[id]').forEach(function(s){so.observe(s)});
  }

  // Menú móvil
  var burger=byId('burger');
  function setMenu(o){hdr.classList.toggle('menu-open',o);burger.setAttribute('aria-expanded',o);burger.setAttribute('aria-label',o?'Cerrar menú':'Abrir menú')}
  burger.addEventListener('click',function(){setMenu(!hdr.classList.contains('menu-open'))});
  $('#mnav a').forEach(function(a){a.addEventListener('click',function(){setMenu(false)})});

  // Enlaces de servicio con mensaje prellenado
  $('[data-service]').forEach(function(a){a.href=WA+'?text='+encodeURIComponent('Hola, me interesa cotizar '+a.getAttribute('data-service')+'.')});

  // Carrusel y lightbox (solo si existen en la página)
  if(byId('track')){
  var track=byId('track'),slides=$('.slide',track),pv=byId('prev'),nx=byId('next'),barI=byId('bar'),count=byId('count'),auto=null,visible=false,hold=false;
  function stepW(){return slides[0].getBoundingClientRect().width+18}
  function idx(){var max=track.scrollWidth-track.clientWidth;if(track.scrollLeft>=max-4)return slides.length-1;return Math.round(track.scrollLeft/stepW())}
  function upd(){
    var max=track.scrollWidth-track.clientWidth,i=idx(),per=Math.max(1,Math.round(track.clientWidth/stepW()));
    pv.disabled=track.scrollLeft<=4;nx.disabled=track.scrollLeft>=max-4;
    count.textContent=(i+1)+' / '+slides.length;
    var w=Math.min(1,per/slides.length),pos=max>0?track.scrollLeft/max:0;
    barI.style.width=(w*100)+'%';barI.style.transform='translateX('+(pos*(1/w-1)*100).toFixed(2)+'%)';
  }
  function go(dir){var max=track.scrollWidth-track.clientWidth;
    if(dir>0&&track.scrollLeft>=max-4){track.scrollTo({left:0,behavior:reduce?'auto':'smooth'});return}
    track.scrollBy({left:dir*stepW(),behavior:reduce?'auto':'smooth'})}
  pv.addEventListener('click',function(){go(-1)});nx.addEventListener('click',function(){go(1)});
  track.addEventListener('scroll',function(){requestAnimationFrame(upd)},{passive:true});
  addEventListener('resize',upd);upd();
  function start(){stop();if(reduce||!visible||hold)return;auto=setInterval(function(){go(1)},4500)}
  function stop(){clearInterval(auto)}
  var car=byId('carousel');
  car.addEventListener('mouseenter',function(){hold=true;stop()});car.addEventListener('mouseleave',function(){hold=false;start()});
  car.addEventListener('focusin',function(){hold=true;stop()});car.addEventListener('focusout',function(){hold=false;start()});
  track.addEventListener('touchstart',function(){hold=true;stop()},{passive:true});
  track.addEventListener('touchend',function(){setTimeout(function(){hold=false;start()},6000)},{passive:true});
  if('IntersectionObserver' in window){new IntersectionObserver(function(es){visible=es[0].isIntersecting;visible?start():stop()},{threshold:.4}).observe(car)}

  // Lightbox
  var lb=byId('lb'),lbImg=byId('lbImg'),lbCap=byId('lbCap'),cur=0,lastFocus=null;
  function show(i){cur=(i+slides.length)%slides.length;var im=slides[cur].querySelector('img');lbImg.src=im.src;lbImg.alt=im.alt;lbCap.textContent=(cur+1)+' / '+slides.length+' · '+im.alt}
  function openLb(i){lastFocus=document.activeElement;show(i);lb.hidden=false;document.body.style.overflow='hidden';stop();
    requestAnimationFrame(function(){lb.classList.add('open')});byId('lbClose').focus()}
  function closeLb(){lb.classList.remove('open');document.body.style.overflow='';setTimeout(function(){lb.hidden=true},reduce?0:260);if(lastFocus)lastFocus.focus();start()}
  slides.forEach(function(s,i){s.querySelector('button').addEventListener('click',function(){openLb(i)})});
  byId('lbClose').addEventListener('click',closeLb);
  byId('lbPrev').addEventListener('click',function(){show(cur-1)});byId('lbNext').addEventListener('click',function(){show(cur+1)});
  lb.addEventListener('click',function(e){if(e.target===lb)closeLb()});
  document.addEventListener('keydown',function(e){if(lb.hidden)return;if(e.key==='Escape')closeLb();if(e.key==='ArrowRight')show(cur+1);if(e.key==='ArrowLeft')show(cur-1)});
  var sx=0;lb.addEventListener('touchstart',function(e){sx=e.touches[0].clientX},{passive:true});
  lb.addEventListener('touchend',function(e){var dx=e.changedTouches[0].clientX-sx;if(Math.abs(dx)>50)show(cur+(dx<0?1:-1))},{passive:true});

  }

  // FAQ
  $('#faqList .item>button').forEach(function(b){b.addEventListener('click',function(){var it=b.parentNode,o=it.classList.toggle('open');b.setAttribute('aria-expanded',o)})});

  // Formulario a WhatsApp
  var qf=byId('qf');
  if(qf){
  qf.addEventListener('submit',function(e){
    e.preventDefault();
    var n=qf.nombre.value.trim(),s=qf.servicio.value,z=qf.zona.value.trim(),d=qf.detalle.value.trim();
    if(!n){qf.nombre.focus();qf.nombre.style.borderColor='var(--accent)';return}
    if(!s){qf.servicio.focus();qf.servicio.style.borderColor='var(--accent)';return}
    var msg='Hola, soy '+n+'. Quiero una cotización.\n\nServicio: '+s+(z?'\nZona: '+z:'')+(d?'\nDetalle: '+d:'');
    if(window.emTrack)window.emTrack('Lead',{content_name:s});
    window.open(WA+'?text='+encodeURIComponent(msg),'_blank','noopener');
  });
  $('input,select',qf).forEach(function(el){el.addEventListener('input',function(){el.style.borderColor=''})});
  }
})();
