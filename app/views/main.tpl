{extends file="template.tpl"}

{block name=content}
  
    <body data-home-page="main.tpl" data-home-page-title="Strona Główna" class="u-body">
	<header class="u-clearfix u-header u-header" id="sec-08c3">
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                <a href="{url action='show_main_page'}" class="u-image u-logo u-image-1">
                  <img src="{$conf->app_url}/assets/images/default-logo.png" class="u-logo-image u-logo-image-1">
                </a>
		
		<!-- Menu -->
                <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
                  <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                    <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                        <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                                    <rect y="1" width="16" height="2"></rect>
                                    <rect y="7" width="16" height="2"></rect>
                                    <rect y="13" width="16" height="2"></rect>
                                </symbol>
                            </defs>		
                        </svg>
                    </a>
                  </div>
                  <div class="u-nav-container">
                    <ul class="u-nav u-unstyled u-nav-1">
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{url action='show_main_page'}" style="padding: 10px 20px;">Strona Główna</a></li>
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{url action='book_list'}" style="padding: 10px 20px;">Książki</a></li>
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{url action='show_login'}" style="padding: 10px 20px;">Logowanie</a></li>
                    </ul>
                  </div>
                  <div class="u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                      <div class="u-sidenav-overflow">
                        <div class="u-menu-close"></div>
                        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="{url action='show_main_page'}">Strona Główna</a></li>	
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="{url action='book_list'}">Książki</a></li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="{url action='show_login'}">Logowanie</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                  </div>
                </nav>
            </div>
	</header>
	  
	<!-- Opis strony -->  
        <section class="u-clearfix u-section-1" id="carousel_27ac">
          <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
              <div class="u-layout">
                <div class="u-layout-row">
                  <div class="u-container-style u-image u-layout-cell u-size-30 u-image-1" data-image-width="800" data-image-height="827">
                    <div class="u-container-layout u-container-layout-1"></div>
                  </div>
                  <div class="u-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                    <div class="u-container-layout u-valign-middle u-container-layout-2" style="justify-content: start;">
                      <h1 class="u-text u-title u-text-1">Książki</h1>
                      <h5 class="u-text u-text-body-color u-text-2">Na tej stronie możesz czytać lub pisać recenzje książek.</h5>
                      <h4 class="u-text u-text-3">Rafał Łyczek</h4>
                      <a href="mailto:hellodon@gmail.com" class="u-active-none u-btn u-button-style u-hover-none u-none u-text-palette-2-base u-btn-1">mail@gmail.com</a>
                      <a href="tel:+11234567890" class="u-active-none u-btn u-button-style u-hover-none u-none u-text-palette-2-base u-btn-2">+1 123 456 7890</a>
                      <p class="u-custom-font u-font-oswald u-text u-text-5">Zdjęcie zrobione przez: <a href="https://www.freepik.com/jcomp" class="u-active-none u-border-1 u-border-grey-75 u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-btn-5" target="_blank">jcomp</a>z 
                        <a href="https://www.freepik.com/photos/background" class="u-active-none u-border-1 u-border-grey-75 u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-btn-5" target="_blank">Freepik.com</a>
                      </p>
                      <div class="u-palette-2-base u-shape u-shape-circle u-shape-1"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
	
	<!-- Przykładowe książki -->
        <section class="u-clearfix u-palette-5-dark-3 u-section-2" id="carousel_fd80" style="padding-bottom: 100px;">
          <div class="u-clearfix u-sheet u-sheet-1">
            <h1 class="u-text u-text-1">Przykładowe książki</h1>
            <div class="u-expanded-width u-list u-list-1">
              <div class="u-repeater u-repeater-1">

                {foreach $books as $row}
                <div class="u-container-style u-list-item u-repeater-item" style="margin-bottom: 30px; min-height: 375px;">
                  <div class="u-container-layout u-similar-container u-container-layout-1">
                    <img src="{$row['picture']}" alt="" class="u-image u-image-default u-preserve-proportions u-image-1" data-image-width="626" data-image-height="626" style="height: 375px; width: 250px;">
                    <h2 class="u-text u-text-2" style="margin-top: -375px;">{$row['title']}</h2>
                    <h5 class="u-custom-font u-font-pt-sans u-text u-text-3">Wydanie: {$row['release_year']}</h5>
                    <a href="{url action='book_details' id=$row['id']}" class="u-active-white u-border-1 u-border-white u-btn u-button-style u-hover-white u-none u-text-active-palette-5-dark-3 u-text-body-alt-color u-text-hover-palette-5-dark-3 u-btn-1">Więcej</a>
                  </div>
                </div>
                {/foreach}

              </div>
            </div>
          </div>
        </section>
	
	<!-- Stopka -->
        <footer class="u-align-center u-clearfix u-footer u-palette-2-base u-footer" id="sec-8349">
            <div class="u-clearfix u-sheet u-sheet-1">
		<p class="u-small-text u-text u-text-variant u-text-1">Autor strony: Rafał Łyczek<br/>Projekt: Aplikacje Internetowe</p>
            </div>
	</footer>
	
        <section class="u-backlink u-clearfix u-grey-80">
          <p class="u-text">
            <span>Szablon strony z </span>
          </p>
          <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
            <span>Website Templates</span>
          </a>
          <p class="u-text">
            <span> z użyciem</span>
          </p>
          <a class="u-link" href="https://nicepage.com/" target="_blank">
            <span>Website Builder Software</span>
          </a>. 
        </section>
	
    </body>
  
{/block}