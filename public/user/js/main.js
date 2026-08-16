
const toggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('.nav-inner');
toggle?.addEventListener('click', () => {
  const open = nav.classList.toggle('open');
  toggle.setAttribute('aria-expanded', String(open));
});

const modal = document.querySelector('.demo-modal');
const productVideo = modal?.querySelector('[data-product-video]');
const videoFallback = modal?.querySelector('[data-video-fallback]');
const storyboard = modal?.querySelector('[data-video-storyboard]');
let storyboardTimers = [];

function stopStoryboard(){
  storyboardTimers.forEach(clearTimeout);
  storyboardTimers = [];
  storyboard?.classList.remove('playing');
  storyboard?.setAttribute('aria-hidden','true');
}

function runStoryboard(){
  if(!storyboard) return;
  stopStoryboard();
  videoFallback?.classList.add('hidden');
  storyboard.classList.add('playing');
  storyboard.setAttribute('aria-hidden','false');
  const steps = [...storyboard.querySelectorAll('.story-step')];
  steps.forEach((step,index)=>step.classList.toggle('active',index===0));
  steps.slice(1).forEach((_,index)=>{
    storyboardTimers.push(setTimeout(()=>{
      steps.forEach((step,i)=>step.classList.toggle('active',i===index+1));
    },(index+1)*850));
  });
  storyboardTimers.push(setTimeout(()=>{
    stopStoryboard();
    videoFallback?.classList.remove('hidden');
  },steps.length*850+700));
}

document.querySelectorAll('[data-demo-open]').forEach(btn => btn.addEventListener('click', () => {
  modal?.classList.add('open');
  modal?.setAttribute('aria-hidden','false');
  document.body.style.overflow='hidden';
}));

document.querySelectorAll('[data-demo-close]').forEach(el => el.addEventListener('click', () => {
  modal?.classList.remove('open');
  modal?.setAttribute('aria-hidden','true');
  productVideo?.pause();
  stopStoryboard();
  videoFallback?.classList.remove('hidden');
  document.body.style.overflow='';
}));

modal?.querySelector('[data-storyboard-play]')?.addEventListener('click',runStoryboard);

productVideo?.addEventListener('loadeddata',()=>{
  videoFallback?.classList.add('hidden');
});
productVideo?.addEventListener('error',()=>{
  videoFallback?.classList.remove('hidden');
});

const timerEl = document.getElementById('quoteTimer');
let elapsed = 7;
setInterval(() => {
  elapsed = elapsed >= 58 ? 7 : elapsed + 1;
  timerEl.textContent = `00:${String(elapsed).padStart(2,'0')}`;
}, 900);

const billingOptions=document.querySelectorAll('.billing-option');const displayPrice=document.getElementById('displayPrice');const pricePeriod=document.getElementById('pricePeriod');const billingCopy=document.getElementById('billingCopy');const bestValue=document.getElementById('bestValue');const pricing={monthly:{price:'79',period:'/month',copy:'Billed monthly — cancel anytime',badge:'FLEXIBLE'},annual:{price:'65.83',period:'/month',copy:'Billed annually at AED 790 — save AED 158',badge:'BEST VALUE'}};billingOptions.forEach(option=>{option.addEventListener('click',()=>{billingOptions.forEach(btn=>btn.classList.toggle('active',btn===option));const selected=pricing[option.dataset.billing];displayPrice.textContent=selected.price;pricePeriod.textContent=selected.period;billingCopy.textContent=selected.copy;bestValue.textContent=selected.badge;});});document.querySelectorAll('.faq-question').forEach(button=>{button.addEventListener('click',()=>{const item=button.closest('.faq-item');const willOpen=!item.classList.contains('open');document.querySelectorAll('.faq-item').forEach(other=>{other.classList.remove('open');const q=other.querySelector('.faq-question');q.setAttribute('aria-expanded','false');q.querySelector('b').textContent='+';});if(willOpen){item.classList.add('open');button.setAttribute('aria-expanded','true');button.querySelector('b').textContent='−';}});});


const roiInputs = {
  jobValue: document.getElementById('jobValue'),
  quotesCount: document.getElementById('quotesCount'),
  acceptanceIncrease: document.getElementById('acceptanceIncrease')
};

const aed = value => `AED ${Math.round(value).toLocaleString('en-US')}`;

function formatJobs(value){
  return value >= 10 ? value.toFixed(1) : value.toFixed(2).replace(/\.00$/, '');
}

function updateRoi(){
  if(!roiInputs.jobValue || !roiInputs.quotesCount || !roiInputs.acceptanceIncrease) return;

  const jobValue = Number(roiInputs.jobValue.value);
  const quotes = Number(roiInputs.quotesCount.value);
  const acceptanceIncrease = Number(roiInputs.acceptanceIncrease.value);

  const extraJobs = quotes * (acceptanceIncrease / 100);
  const monthly = jobValue * extraJobs;
  const annual = monthly * 12;
  const multiple = annual > 0 ? Math.round(annual / 790) : 0;

  document.getElementById('jobValueOutput').textContent = aed(jobValue);
  document.getElementById('quotesOutput').textContent = quotes;
  document.getElementById('acceptanceIncreaseOutput').textContent = `${acceptanceIncrease}%`;
  document.getElementById('extraJobsCalculated').textContent = formatJobs(extraJobs);
  document.getElementById('monthlyRevenue').textContent = aed(monthly);
  document.getElementById('annualRevenue').textContent = aed(annual);
  document.getElementById('roiMultiple').textContent = `${multiple}x`;
}

Object.values(roiInputs).forEach(input => input?.addEventListener('input', updateRoi));
updateRoi();



// QDizer conversation V5 — realistic roles and WhatsApp behaviour
(() => {
  const root = document.querySelector('[data-qdizer-conversation]');
  if (!root) return;
  const messages = [...root.querySelectorAll('[data-v5-message]')];
  const steps = [...root.querySelectorAll('[data-v5-step]')];
  const replay = root.querySelector('[data-v5-replay]');
  const backendState = root.querySelector('[data-backend-state]');
  const backendProgress = root.querySelector('[data-backend-progress]');
  const headerStatus = root.querySelector('[data-header-status]');
  const pdfTicks = root.querySelector('[data-pdf-ticks]');
  let timers = [];
  let currentStage = 0;

  const states = [
    {title:'Inquiry received', note:'Ready to create a quotation', progress:8, visible:[0], status:'online', active:0},
    {title:'Creating quotation', note:'Client, services and totals are being prepared', progress:42, visible:[0,1], status:'online', active:1},
    {title:'Quotation generated', note:'Professional PDF is ready to send', progress:68, visible:[0,1,2], status:'online', active:2},
    {title:'Quotation viewed', note:'Your customer opened the quotation', progress:84, visible:[0,1,2], status:'online', active:3, viewed:true},
    {title:'Quote accepted', note:'The opportunity is ready to proceed', progress:100, visible:[0,1,2,3], status:'online', active:4, accepted:true}
  ];

  function clearTimers(){timers.forEach(clearTimeout);timers=[];}
  function render(stage){
    currentStage = Math.max(0,Math.min(stage,states.length-1));
    const s = states[currentStage];
    messages.forEach((m,i)=>m.classList.toggle('visible',s.visible.includes(i)));
    steps.forEach((b,i)=>b.classList.toggle('active',i===s.active));
    headerStatus.textContent = s.status;
    pdfTicks.style.color = s.viewed || s.accepted ? '#34a9e8' : '#77837f';
    backendState.innerHTML = `<div class="backend-icon">${s.accepted?'✓':currentStage+1}</div><div><strong>${s.title}</strong><small>${s.note}</small></div>`;
    backendProgress.style.width = `${s.progress}%`;
  }
  function play(){
    clearTimers(); render(0);
    [1500,3400,5600,7600].forEach((delay,index)=>timers.push(setTimeout(()=>render(index+1),delay)));
    timers.push(setTimeout(()=>play(),11200));
  }
  steps.forEach((btn,i)=>btn.addEventListener('click',()=>{clearTimers();render(i)}));
  replay?.addEventListener('click',play);
  play();
})();

const footerYear = document.getElementById('footerYear');
if (footerYear) footerYear.textContent = new Date().getFullYear();


// Desktop + mobile platform section
(() => {
  const stage = document.querySelector('[data-platform-demo]');
  if (!stage) return;
  const points = [...stage.querySelectorAll('[data-platform-point]')];
  let active = 0;
  let timer;

  function setActive(index){
    active = index;
    stage.dataset.active = String(index);
    points.forEach((point, i) => point.classList.toggle('active', i === index));
  }

  function start(){
    clearInterval(timer);
    timer = setInterval(() => setActive((active + 1) % points.length), 2600);
  }

  points.forEach((point, index) => {
    point.addEventListener('mouseenter', () => {
      clearInterval(timer);
      setActive(index);
    });
    point.addEventListener('mouseleave', start);
    point.addEventListener('click', () => {
      clearInterval(timer);
      setActive(index);
      start();
    });
  });

  setActive(0);
  start();
})();


// Template gallery real PDF preview modal
(() => {
  const modal = document.querySelector('[data-template-modal]');
  if (!modal) return;

  const openers = [...document.querySelectorAll('[data-template-open]')];
  const closeButtons = [...modal.querySelectorAll('[data-template-close]')];
  const title = modal.querySelector('#templateModalTitle');
  const frame = modal.querySelector('[data-template-pdf]');
  const pdfOpen = modal.querySelector('[data-template-pdf-open]');
  const loading = modal.querySelector('[data-pdf-loading]');
  const prev = modal.querySelector('[data-template-prev]');
  const next = modal.querySelector('[data-template-next]');

const templates = [
    {
        name: 'Classic',
        pdf: `${window.pdfAssetsPath}/classic.pdf`
    },
    {
        name: 'Modern Gold',
        pdf: `${window.pdfAssetsPath}/modern-gold.pdf`
    },
    {
        name: 'Minimal',
        pdf: `${window.pdfAssetsPath}/minimal.pdf`
    },
    {
        name: 'Executive',
        pdf: `${window.pdfAssetsPath}/executive.pdf`
    }
];
  let current = 0;

  function render(index){
    current = (index + templates.length) % templates.length;
    const item = templates[current];
    title.textContent = `${item.name} template`;
    loading.style.display='grid';
    frame.src = `${item.pdf}#page=1&zoom=page-width&toolbar=1&navpanes=0&scrollbar=1`;
    pdfOpen.href = item.pdf;
  }

  frame.addEventListener('load',()=>{loading.style.display='none'});

  function open(name){
    const index = templates.findIndex(item => item.name === name);
    render(index < 0 ? 0 : index);
    modal.classList.add('open');
    modal.setAttribute('aria-hidden','false');
    document.body.style.overflow = 'hidden';
  }

  function close(){
    modal.classList.remove('open');
    modal.setAttribute('aria-hidden','true');
    document.body.style.overflow = '';
    frame.src='about:blank';
  }

  openers.forEach(button => button.addEventListener('click', () => open(button.dataset.templateOpen)));
  closeButtons.forEach(button => button.addEventListener('click', close));
  prev?.addEventListener('click', () => render(current - 1));
  next?.addEventListener('click', () => render(current + 1));
  document.addEventListener('keydown', event => {
    if (!modal.classList.contains('open')) return;
    if (event.key === 'Escape') close();
    if (event.key === 'ArrowLeft') render(current - 1);
    if (event.key === 'ArrowRight') render(current + 1);
  });
})();


// Hero product-flow animation
(() => {
  const hero = document.querySelector('[data-hero-animation]');
  if(!hero) return;

  function replay(){
    hero.classList.remove('hero-running');
    void hero.offsetWidth;
    hero.classList.add('hero-running');
  }

  const observer = new IntersectionObserver(entries=>{
    entries.forEach(entry=>{
      if(entry.isIntersecting){
        replay();
        observer.disconnect();
      }
    });
  },{threshold:.3});
  observer.observe(hero);

  // Repeat gently so the product story remains alive without constant motion.
  setInterval(()=>{
    if(!document.hidden && hero.getBoundingClientRect().bottom>0) replay();
  },9000);
})();
