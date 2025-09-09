<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$axil_socials = Helper::socials();
$papr_options = Helper::axil_get_options();
$header_top_menu_args = Helper::header_top_menu_args();
?>
<div class="header-top bg-grey-dark-one">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md">
                <div class="d-flex flex-row">
                    <?php if (!empty($papr_options['axil_top_date'])) : ?>
                        <ul class="header-top-nav list-inline justify-content-center justify-content-md-start m-r-xs-20">
                            <li class="current-date"><?php echo current_time('F j, Y'); ?></li>
                        </ul>
                    <?php endif; ?>

                    <?php if ( has_nav_menu('headertop') && !empty($papr_options['header_top_menu_args']) ) : ?>
                        <?php wp_nav_menu($header_top_menu_args); ?>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($axil_socials): ?>
                <div class="col-md-auto">
                    <ul class="ml-auto social-share header-top__social-share">
                        <?php foreach ($axil_socials as $axil_social): ?>
                            <li>
                                <a target="_blank" rel="noopener" href="<?php echo esc_url($axil_social['url']); ?>">
                                    <i class="fab <?php echo esc_attr($axil_social['icon']); ?>"></i>
                                </a>
                            </li>
                        <?php endforeach; ?>

                        <?php if (!empty($papr_options['social_rumble'])): ?>
                            <li>
                                <a target="_blank" rel="noopener" href="<?php echo esc_url($papr_options['social_rumble']); ?>">
                                    <i class="fas fa-play"></i>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($papr_options['social_person_pregnant'])): ?>
                            <li>
                                <a target="_blank" rel="noopener" href="<?php echo esc_url($papr_options['social_person_pregnant']); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 384 512" aria-hidden="true" focusable="false">
                                        <style>svg{fill:#ffffff}</style>
                                        <path d="M192 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM120 383c-13.8-3.6-24-16.1-24-31V296.9l-4.6 7.6c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c15-24.9 40.3-41.5 68.7-45.6c4.1-.6 8.2-1 12.5-1h1.1 12.5H192c1.4 0 2.8 .1 4.1 .3c35.7 2.9 65.4 29.3 72.1 65l6.1 32.5c44.3 8.6 77.7 47.5 77.7 94.3v32c0 17.7-14.3 32-32 32H304 264v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V384h-8-8v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V383z"/>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- ▼ Family Site 드롭다운 (포탈 방식) -->
                        <li class="header-more has-dropdown">
                            <a href="#" class="more-toggle" aria-expanded="false" aria-haspopup="true" aria-controls="header-more-menu" role="button">
                                Family Site <span class="caret">▾</span>
                            </a>
                            <ul id="header-more-menu" class="more-menu" role="menu" aria-label="Family Site">
                                <li role="none"><a role="menuitem" href="https://sedaily.com/" target="_blank" rel="noopener">서울경제</a></li>
                                <li role="none"><a role="menuitem" href="http://www.koreatimes.com/" target="_blank" rel="noopener">한국일보</a></li>
                                <li role="none"><a role="menuitem" href="https://rainfmofficial.com/" target="_blank" rel="noopener">RAINFM</a></li>
                            </ul>
                        </li>
                        <!-- ▲ -->
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- ================= CSS ================= -->
<style>
.header-top__social-share{ display:flex; align-items:center; gap:12px; overflow:visible !important; }

.header-top__social-share > li.header-more{
  width:auto !important; height:auto !important; overflow:visible !important;
  display:inline-flex !important; align-items:center !important;
}
.header-top__social-share > li.header-more > a.more-toggle{
  width:auto !important; height:auto !important;
  border-radius:0 !important; background:transparent !important;
  line-height:1.2 !important; padding:6px 6px !important;
}

.header-more .more-toggle{
  color:#fff; cursor:pointer; display:inline-flex; align-items:center; gap:6px;
  border:0; outline:none; box-shadow:none; text-decoration:none;
}
.header-more .more-toggle:focus,
.header-more .more-toggle:active{
  outline:none !important; box-shadow:none !important; border:0 !important;
}
.header-more .caret{ transition: transform .2s ease; }
.header-more.open .caret{ transform: rotate(180deg); }

.more-menu{
  display:none; position:fixed; min-width:220px;
  background:#fff; color:#111; border:1px solid rgba(0,0,0,.08);
  box-shadow:0 8px 24px rgba(0,0,0,.12);
  padding:8px 0; margin:0; z-index:100000;
}
.more-menu li{ list-style:none; }
.more-menu a{ display:block; padding:10px 16px; text-decoration:none; color:inherit;font-size:1.5rem; }
.more-menu a:hover{ background:#f5f5f7; }

a.more-toggle::after {
  display: none !important;
  content: none !important;
}

.bg-grey-dark-one .header-more .more-toggle{ color:#fff; }
</style>

<!-- ================= JS ================= -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const moreNodes = document.querySelectorAll('.header-more');

  moreNodes.forEach((more) => {
    const btn  = more.querySelector('.more-toggle');
    const menu = more.querySelector('.more-menu');
    if (!btn || !menu) return;

    let placeholder = null; // 원래 자리 표시자 (주석노드)

    function positionMenu() {
      const r = btn.getBoundingClientRect();
      const currentDisplay = menu.style.display;
      if (currentDisplay !== 'block') menu.style.display = 'block';
      const menuWidth = Math.max(menu.offsetWidth || 220, 220);

      // 오른쪽 끝 정렬 + 화면 밖 방지
      let left = Math.min(r.right, window.innerWidth - 8) - menuWidth;
      left = Math.max(8, left);
      const top = Math.min(r.bottom + 8, window.innerHeight - 8);

      menu.style.left = left + 'px';
      menu.style.top  = top  + 'px';
      menu.style.maxHeight = (window.innerHeight - top - 12) + 'px';
      menu.style.overflowY = 'auto';
    }

    function openMenu() {
      // 다른 메뉴 닫기
      document.querySelectorAll('.header-more.open').forEach(m => {
        if (m !== more) {
          const mm = m.querySelector('.more-menu');
          if (mm) {
            m.classList.remove('open');
            if (mm.dataset.portal === '1') {
              mm.style.display = 'none';
              if (mm._placeholder && mm._originalParent) {
                mm._originalParent.insertBefore(mm, mm._placeholder);
                mm._placeholder.remove();
                mm._placeholder = null;
                mm._originalParent = null;
              }
            }
          }
        }
      });

      more.classList.add('open');
      btn.setAttribute('aria-expanded', 'true');

      // body로 포탈 이동
      placeholder = document.createComment('more-menu-placeholder');
      menu._placeholder = placeholder;
      menu._originalParent = more;
      more.appendChild(placeholder);
      menu.dataset.portal = '1';
      document.body.appendChild(menu);

      menu.style.display = 'block';
      positionMenu();

      window.addEventListener('scroll', positionMenu, { passive: true });
      window.addEventListener('resize', positionMenu);
    }

    function closeMenu() {
      more.classList.remove('open');
      btn.setAttribute('aria-expanded', 'false');

      // 원래 자리로 복귀
      if (menu._placeholder && menu._originalParent) {
        menu._originalParent.insertBefore(menu, menu._placeholder);
        menu._placeholder.remove();
        menu._placeholder = null;
        menu._originalParent = null;
      }
      menu.style.display = 'none';

      window.removeEventListener('scroll', positionMenu);
      window.removeEventListener('resize', positionMenu);
    }

    // 클릭 토글 (a라서 기본 이동 막기)
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      more.classList.contains('open') ? closeMenu() : openMenu();
    });

    // 바깥 클릭 닫기
    document.addEventListener('click', (e) => {
      if (menu.style.display === 'block') {
        const withinButton = btn.contains(e.target);
        const withinMenu   = menu.contains(e.target);
        if (!withinButton && !withinMenu) closeMenu();
      }
    });

    // ESC 닫기
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeMenu();
    });
  });
});
</script>
