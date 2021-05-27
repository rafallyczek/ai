{extends file="../../templates/main.tpl"}

{block name=content}
    
    <div class="title">Logowanie</div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-12-medium">

                <!-- Form -->
		<section>
                    <form method="post" action="{$config->action_root}login">
			<div class="row gtr-50">
                            <div class="col-6 col-12-small">
                                <label for="login">Login: </label>
				<input type="text" name="login" id="login" placeholder="Login" {if isset($form->login)}value="{$form->login}"{/if}/>
                                <label for="login">Hasło: </label>
				<input type="text" name="password" id="password" placeholder="Hasło" />
                            </div>
                            <div class="col-6 col-12-small">
                                {if $messages->isError()}     
                                    <label for="error">Info: </label>
                                    <ol id="error" style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: rgb(140, 38, 38); color:#fff; width:300px;">
                                        {foreach $messages->getErrors() as $msg}
                                            {strip}
                                                <li>{$msg}</li>
                                            {/strip}
                                        {/foreach}       
                                    </ol>
                                {/if}
                            </div>
                            <div class="col-12">
				<ul class="actions">
                                    <li><input type="submit" class="green" value="Zaloguj" /></li>
				</ul>
                            </div>
			</div>
                    </form>
		</section>

            </div>
        </div>
        <div id="copyright">
            <ul>
                <li>&copy; Rafał Łyczek.</li><li>Projekt szablonu: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </div>
    
{/block}