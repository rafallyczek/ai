{extends file="template.tpl"}

{block name=content}
  
    <body class="u-body">
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
                        <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{url action='book_list' page=1}" style="padding: 10px 20px;">Książki</a></li>
                        {if not \core\RoleUtils::inAnyRole()}
                            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{url action='show_login'}" style="padding: 10px 20px;">Logowanie</a></li>
                        {/if}
                        {if \core\RoleUtils::inAnyRole()}
                            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{url action='logout'}" style="padding: 10px 20px;">Wyloguj</a></li>
                        {/if}
                    </ul>
                  </div>
                  <div class="u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                      <div class="u-sidenav-overflow">
                        <div class="u-menu-close"></div>
                        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="{url action='show_main_page'}">Strona Główna</a></li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="{url action='book_list' page=1}">Książki</a></li>
                            {if not \core\RoleUtils::inAnyRole()}
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="{url action='show_login'}">Logowanie</a></li>
                            {/if}
                            {if \core\RoleUtils::inAnyRole()}
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="{url action='logout'}">Wyloguj</a></li>
                            {/if}
                        </ul>
                      </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                  </div>
                </nav>
            </div>
        </header> 
    
        <!-- Lista książek -->
        <section class="u-clearfix u-palette-5-dark-3 u-section-2" id="carousel_fd80" style="padding-bottom: 100px;">
          <div class="u-clearfix u-sheet u-sheet-1">
            <h1 class="u-text u-text-1" style="margin-bottom: 20px;">Książki</h1>
            {if \core\RoleUtils::inRole("admin")}
                <a href="{url action='book_insert'}" class="u-active-white u-border-1 u-border-white u-btn u-button-style u-hover-white u-none u-text-active-palette-5-dark-3 u-text-body-alt-color u-text-hover-palette-5-dark-3 u-btn-1" style="margin-left: 0;">Dodaj książkę</a>
            {/if}
            <form class="pure-form" method="post" action="{url action='find_books'}">
                <fieldset>
                    <input type="text" id="title" name="title" placeholder="Wyszukaj książki" style="color: black; margin-top: 5px; width: 300px;"/>
                    <input type="hidden" id="page" name="page" value="1"/>
                    <button type="submit" class="pure-button pure-button-primary" style="background-color: #1cb841; margin-top: 5px;">Wyszukaj</button>
                </fieldset>
            </form>
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
            
            {if !isset($title)}
                <div style="margin-top: 50px; position: relative;">
                    {if $page!=1}
                        <a class="pure-button" href="{url action='book_list' page=$page-1}" title="Poprzednia strona" style="font-size: 200%; color: black; position: absolute; left: -50px;"><i class="fas fa-angle-left"></i></a>   
                    {/if}
                    {if $page<$max_page}
                        <a class="pure-button" href="{url action='book_list' page=$page+1}" title="Następna strona" style="font-size: 200%; color: black; position: absolute; right: -50px;"><i class="fas fa-angle-right"></i></a>
                    {/if}
                </div>
            {/if}
            
            {if isset($title)}
            <div style="margin-top: 50px; position: relative;">
                {if $page!=1}
                    <form class="pure-form" method="post" action="{url action='find_books'}">
                        <fieldset>
                            <input type="hidden" id="title" name="title" value="{$title}"/>
                            <input type="hidden" id="page" name="page" value="{$page-1}"/>
                            <button type="submit" title="Poprzednia strona" class="pure-button" style="font-size: 200%; color: black; position: absolute; left: -50px;"><i class="fas fa-angle-left"></i></button>
                        </fieldset>
                    </form>
                {/if}
                {if $page<$max_page}
                    <form class="pure-form" method="post" action="{url action='find_books'}">
                        <fieldset>
                            <input type="hidden" id="title" name="title" value="{$title}"/>
                            <input type="hidden" id="page" name="page" value="{$page+1}"/>
                            <button type="submit" title="Następna strona" class="pure-button" style="font-size: 200%; color: black; position: absolute; right: -50px;"><i class="fas fa-angle-right"></i></button>
                        </fieldset>
                    </form>
                {/if}
            </div>
            {/if}
            
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