/* Guardian - small, dependency-free script */
(function () {
  'use strict';
  var doc = document.documentElement;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Sticky header, scroll progress, back-to-top
  var header = document.getElementById('siteHeader');
  var bar = document.getElementById('scrollProgress');
  var toTop = document.getElementById('toTop');
  var ticking = false;

  function onScroll() {
    var y = window.pageYOffset || doc.scrollTop;
    var max = doc.scrollHeight - window.innerHeight;
    if (header) header.classList.toggle('is-scrolled', y > 40);
    if (bar) bar.style.transform = 'scaleX(' + (max > 0 ? Math.min(y / max, 1) : 0) + ')';
    if (toTop) {
      if (y > 600) { toTop.hidden = false; requestAnimationFrame(function () { toTop.classList.add('show'); }); }
      else { toTop.classList.remove('show'); }
    }
    ticking = false;
  }
  window.addEventListener('scroll', function () {
    if (!ticking) { requestAnimationFrame(onScroll); ticking = true; }
  }, { passive: true });
  onScroll();

  if (toTop) {
    toTop.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' });
    });
  }

  // Mobile menu: opens, closes on link, close button, backdrop, Escape
  var nav = document.getElementById('mainNav');
  var toggle = document.getElementById('menuToggle');
  var closeBtn = document.getElementById('navClose');
  var backdrop = document.getElementById('navBackdrop');

  function setMenu(open) {
    if (!nav || !toggle) return;
    nav.classList.toggle('open', open);
    toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    if (backdrop) backdrop.hidden = !open;
    document.body.style.overflow = open ? 'hidden' : '';
    if (open && closeBtn) closeBtn.focus(); else if (!open) toggle.focus({ preventScroll: true });
  }
  if (toggle) toggle.addEventListener('click', function () { setMenu(true); });
  if (closeBtn) closeBtn.addEventListener('click', function () { setMenu(false); });
  if (backdrop) backdrop.addEventListener('click', function () { setMenu(false); });
  if (nav) nav.addEventListener('click', function (e) { if (e.target.closest('a')) setMenu(false); });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && nav && nav.classList.contains('open')) setMenu(false);
  });
  window.addEventListener('resize', function () {
    if (window.innerWidth > 1023 && nav && nav.classList.contains('open')) setMenu(false);
  });

  // Reveal on scroll + animated counters + process line
  var items = document.querySelectorAll('.reveal, .process, [data-count]');
  function runCounter(el) {
    var target = parseInt(el.getAttribute('data-count'), 10);
    var suffix = el.getAttribute('data-suffix') || '';
    if (reduce || isNaN(target)) { el.textContent = target + suffix; return; }
    var start = null, dur = 1400;
    function step(ts) {
      if (start === null) start = ts;
      var p = Math.min((ts - start) / dur, 1);
      el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3))) + suffix;
      if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (!en.isIntersecting) return;
        en.target.classList.add('in-view');
        if (en.target.hasAttribute('data-count')) runCounter(en.target);
        io.unobserve(en.target);
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
    items.forEach(function (el) { io.observe(el); });
  } else {
    items.forEach(function (el) {
      el.classList.add('in-view');
      if (el.hasAttribute('data-count')) runCounter(el);
    });
  }

  // Interactive Manpower Estimator
  var estCard = document.getElementById('manpowerEstimator');
  if (estCard) {
    var counts = { unarmed: 4, armed: 0, super: 1, hk: 2 };
    var facility = 'IT Tech Park / Corporate';
    var shifts = '24/7 (3 Shifts)';
    var mult = 3;

    function updateEst() {
      var total = (counts.unarmed * mult) + (counts.armed * mult) + (counts.super * (mult > 1 ? 2 : 1)) + counts.hk;
      var totalEl = document.getElementById('estTotalStaff');
      var planEl = document.getElementById('estPlanType');
      var shiftsEl = document.getElementById('estShiftsType');
      var coverageEl = document.getElementById('estCoverageHours');
      var waLink = document.getElementById('estWaBtn');

      if (totalEl) totalEl.textContent = total;
      if (planEl) planEl.textContent = facility;
      if (shiftsEl) shiftsEl.textContent = shifts;
      if (coverageEl) coverageEl.textContent = mult === 3 ? '24 Hours / 365 Days' : (mult === 2 ? '12 Hours (Day & Night)' : '8 Hours (Day Shift)');

      if (waLink) {
        var msg = 'Hi Guardian Team, I used your online estimator for ' + facility + ' (' + shifts + '). Recommended strength: ' + total + ' personnel (' + (counts.unarmed * mult) + ' Unarmed Guards, ' + (counts.armed * mult) + ' Armed, ' + (counts.super * (mult > 1 ? 2 : 1)) + ' Supervisors, ' + counts.hk + ' Facility Staff). Please provide an official quotation.';
        waLink.href = 'https://wa.me/919600050935?text=' + encodeURIComponent(msg);
      }
    }

    var facPills = estCard.querySelectorAll('[data-fac]');
    facPills.forEach(function (pill) {
      pill.addEventListener('click', function () {
        facPills.forEach(function (p) { p.classList.remove('is-active'); });
        pill.classList.add('is-active');
        facility = pill.getAttribute('data-fac');
        updateEst();
      });
    });

    var shiftPills = estCard.querySelectorAll('[data-shift]');
    shiftPills.forEach(function (pill) {
      pill.addEventListener('click', function () {
        shiftPills.forEach(function (p) { p.classList.remove('is-active'); });
        pill.classList.add('is-active');
        shifts = pill.getAttribute('data-shift');
        mult = parseInt(pill.getAttribute('data-mult'), 10) || 1;
        updateEst();
      });
    });

    var stepperBtns = estCard.querySelectorAll('[data-op]');
    stepperBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var target = btn.getAttribute('data-target');
        var op = btn.getAttribute('data-op');
        if (op === 'plus' && counts[target] < 50) counts[target]++;
        if (op === 'minus' && counts[target] > 0) counts[target]--;
        var valEl = document.getElementById('val-' + target);
        if (valEl) valEl.textContent = counts[target];
        updateEst();
      });
    });

    updateEst();
  }

  // Security Matrix Tabs
  var matrixSection = document.getElementById('securityMatrix');
  if (matrixSection) {
    var mTabs = matrixSection.querySelectorAll('.matrix-tab');
    var mPanels = matrixSection.querySelectorAll('.matrix-panel');
    mTabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        var targetId = tab.getAttribute('data-matrix-target');
        mTabs.forEach(function (t) { t.classList.remove('is-active'); });
        mPanels.forEach(function (p) { p.classList.remove('is-active'); });
        tab.classList.add('is-active');
        var targetPanel = document.getElementById(targetId);
        if (targetPanel) targetPanel.classList.add('is-active');
      });
    });
  }

  // Claymorphic FAQ Accordion
  var faqItems = document.querySelectorAll('.faq-item');
  if (faqItems.length) {
    faqItems.forEach(function (item) {
      var btn = item.querySelector('.faq-question');
      if (btn) {
        btn.addEventListener('click', function () {
          var isOpen = item.classList.contains('is-open');
          faqItems.forEach(function (fi) {
            fi.classList.remove('is-open');
            var b = fi.querySelector('.faq-question');
            if (b) b.setAttribute('aria-expanded', 'false');
          });
          if (!isOpen) {
            item.classList.add('is-open');
            btn.setAttribute('aria-expanded', 'true');
          }
        });
      }
    });
  }

  // Hero Video & Cinematic Live Reel Controller
  var heroMedia = document.getElementById('heroMediaPlayer');
  if (heroMedia) {
    // 1. Live Tactical Surveillance Clock (IST format HH:MM:SS)
    var clockElem = document.getElementById('hudClockText');
    function updateClock() {
      if (!clockElem) return;
      var now = new Date();
      var h = String(now.getHours()).padStart(2, '0');
      var m = String(now.getMinutes()).padStart(2, '0');
      var s = String(now.getSeconds()).padStart(2, '0');
      clockElem.textContent = h + ':' + m + ':' + s + ' IST';
    }
    updateClock();
    setInterval(updateClock, 1000);

    // 2. Play / Pause Control Toggle
    var playToggle = document.getElementById('heroPlayToggle');
    var isPlaying = true;
    var videoElem = document.getElementById('heroVideoElem');
    var pauseIcon = playToggle ? playToggle.querySelector('.hud-icon-pause') : null;
    var playIcon = playToggle ? playToggle.querySelector('.hud-icon-play') : null;

    // 3. Cinematic Reel Slide Rotator (Continuous Ken Burns Camera Motion)
    var slides = heroMedia.querySelectorAll('.hero-reel-slide');
    var dots = heroMedia.querySelectorAll('.hud-dot');
    var captionElem = document.getElementById('hudCaptionPill');
    var currentSlide = 0;
    var reelInterval = null;
    var slideDuration = 6000;

    function goToSlide(index) {
      if (!slides.length) return;
      currentSlide = (index + slides.length) % slides.length;
      slides.forEach(function (s, i) {
        s.classList.toggle('is-active', i === currentSlide);
      });
      dots.forEach(function (d, i) {
        var active = (i === currentSlide);
        d.classList.toggle('is-active', active);
        d.setAttribute('aria-selected', active ? 'true' : 'false');
      });
      if (captionElem && slides[currentSlide]) {
        var cap = slides[currentSlide].getAttribute('data-caption');
        if (cap) captionElem.textContent = cap;
      }
    }

    function startReel() {
      if (slides.length <= 1 || reduce) return;
      stopReel();
      reelInterval = setInterval(function () {
        goToSlide(currentSlide + 1);
      }, slideDuration);
    }

    function stopReel() {
      if (reelInterval) {
        clearInterval(reelInterval);
        reelInterval = null;
      }
    }

    if (slides.length > 1 && !reduce) {
      startReel();
    }

    dots.forEach(function (dot) {
      dot.addEventListener('click', function () {
        var idx = parseInt(dot.getAttribute('data-slide'), 10);
        if (!isNaN(idx)) {
          goToSlide(idx);
          if (isPlaying) startReel();
        }
      });
    });

    if (playToggle) {
      playToggle.addEventListener('click', function () {
        isPlaying = !isPlaying;
        if (pauseIcon) pauseIcon.style.display = isPlaying ? '' : 'none';
        if (playIcon) playIcon.style.display = isPlaying ? 'none' : '';
        playToggle.setAttribute('aria-label', isPlaying ? 'Pause feed' : 'Play feed');

        if (videoElem) {
          if (isPlaying) videoElem.play();
          else videoElem.pause();
        } else {
          if (isPlaying) startReel();
          else stopReel();
        }
      });
    }
  }
})();

