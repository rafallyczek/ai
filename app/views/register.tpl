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
    
        <!-- Dodawanie książki -->
        <section class="u-clearfix u-palette-5-dark-3 u-section-2" id="carousel_fd80">
          <div class="u-clearfix u-sheet u-sheet-1" style="min-height: 623px">
            <h1 class="u-text u-text-1" style="text-align: center; margin-bottom: 10px;">Rejestracja</h1>
            
                <form class="pure-form pure-form-stacked" method="post" action="{url action='register'}" id="add_book_form">
                    <fieldset style="width: 100px; margin: auto;">
                        <label for="login">Login: </label>
                        <input type="text" name="login" id="login" placeholder="Login" style="color: black;"/>
                        <label for="password">Hasło: </label>
                        <input type="password" name="password" id="password" placeholder="Hasło" style="color: black;"/>
                        <label for="username">Nazwa użytkownika: </label>
                        <input type="text" name="username" id="username" placeholder="Nazwa użytkownika" style="color: black;"/>
                        <button type="submit" class="pure-button pure-button-primary" style="background-color: #1cb841; margin-top: 5px;">Zapisz</button>
                    </fieldset>
                </form>  
                
                {foreach $msgs->getMessages() as $msg}
                    <p style="background-color: #d22d35; padding: 3px 3px 3px 6px; width: 300px; border-radius: 3px; margin: 20px auto 20px auto;">{$msg->text}</p>
                {/foreach}
                    
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